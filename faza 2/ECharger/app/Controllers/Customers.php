<?php namespace App\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\CreditCard;
use App\Models\Reservation;
use App\Models\Chargers;
use App\Models\Message;

date_default_timezone_set('Europe/Belgrade');

class Customers extends BaseController {
        public function show($page, $data) {
            echo view('template/CustomerHeader', $data);
            echo view("page/$page", $data);
            echo view('template/Footer', $data);
        }
        
        public function index()
	{
                $data['naslov'] = 'Home page';
		$this->show('CustomerIndex', $data);
        }
        
        public function customers()
	{
                $data['naslov'] = 'Customer';
		$this->show('Customer', $data);
	}
        
        public function investors()
	{
                $data['naslov'] = 'Investors';
		$this->show('Investor', $data);
	}
        
        public function contactUs()
	{
            $data['naslov'] = 'Contact us';
		$this->show('ContactUsCustomer', $data);
	}
        
        public function customerIndex(){
            $data['naslov'] = 'Home page';
            $this->show('CustomerIndex', $data);
        }
        
        public function changeProfile(){
            $data['naslov'] = 'Home page';
            $this->show('ChangeProfile', $data);
        }
        
        public function checkout(){
            $data['naslov'] = 'Home page';
            $this->show('Checkout', $data);
        }
        
        public function creditCard(){
            $data['naslov'] = 'Credit card';
            $this->show('AddCreditCard', $data);
        }
        
        public function creditCardList(){
            $data['naslov'] = 'Credit card list';
            $this->show('CreditCardList', $data);
        }
        public function reservationList(){
            $data['naslov'] = 'Credit card list';
            $this->show('ReservationList', $data);
        }
        
        public function deleteCard(){
            $data['naslov'] = 'Delete card';
            $this->show('DeleteCreditCard', $data);
        }
        
        
        public function signOut(){
            $session = session();
            unset($_SESSION['logged']);
            $session->destroy();
            return redirect()->to(site_url('Home'));
        }
        
        public function changeToUnix($date,$time){
            $datumRez = explode('-', $date);
            $danRez = (int) $datumRez[2];
            $mesecRez = (int) $datumRez[1];
            $godinaRez = (int) $datumRez[0];
            
            $vremeRez = explode(':', $time);
            $minutRez = (int) $vremeRez[1];
            $satRez = (int) $vremeRez[0];
            
            $datumRez = mktime($satRez, $minutRez, 0, $mesecRez, $danRez, $godinaRez);
            return $datumRez;
        }
        
        public function checkReservation(){
            $chargerName = $this->request->getVar('charger');
            $date = $this->request->getVar('date');
            $time = $this->request->getVar('time');
            //echo $date."<br/>";
            //echo $time."<br/>";
            $poruka="";
            
            $datumRezUnix=$this->changeToUnix($date, $time);
            //echo "Rezervacija".date("Y-m-d H:i:s",$datumRezUnix)."<br/>";
            $today= time();
            if($datumRezUnix>$today){
            //Pronalazimo punjac na osnovu imena
            $chargerModel = new Chargers();
            $charger = $chargerModel->findCharger($chargerName);
           
            $reservationModel = new Reservation();
            $reservations=$reservationModel->findReservation($charger->chargerID, date("Y-m-d",$datumRezUnix));
            
            $cantBook = 0;
            
            foreach ($reservations as $key) {
                $checkDate=$key->reservationDate;
                $checkTime=$key->reservationTime;
                
                $datumProvera=$this->changeToUnix($checkDate, $checkTime);
                
                //echo "Provera".date("Y-m-d H:i:s",$datumProvera)."<br/>";
                $diff=abs($datumRezUnix-$datumProvera);
                //echo $diff;
                
                if($diff<1800){
                    $cantBook=1;
                }
            }
            
            if($cantBook==0){
               $reservationData['chargerID']=$charger->chargerID;
               $customerModel= new Customer();
               $session = session();
               $email=$_SESSION['email'];
               $customer = $customerModel->getUser($email);
               $reservationData['customerID']=$customer->customerID; echo 2;
               $reservationData['reservationDate']=date("Y-m-d",$datumRezUnix); 
               $reservationData['reservationTime']=date("H:i:s",$datumRezUnix);
               $_SESSION['reservationData']=$reservationData;
               //$reservationModel->insertReservation($data);
               return redirect()->to(site_url('Customers/checkout'));
            } else {
                $datumNext=$this->nextAvailable($datumRezUnix,$charger->chargerID);
                $poruka="Scheduled time is not available.<br/> Next available: ".$datumNext;
            }} else {
                $poruka="You can't book past date.";
            }
            $data['poruka'] = $poruka;
            $data['naslov'] = 'reserve';
            echo $this->show('CustomerIndex', $data);
        }
        
        public function nextAvailable($datumRezUnix,$charger){
            $reservationModel = new Reservation();
            $reservations=$reservationModel->findReservation($charger, date("Y-m-d",$datumRezUnix));
            //$datumRezUnix+=1800;
            
            foreach ($reservations as $key) {
                $checkDate=$key->reservationDate;
                $checkTime=$key->reservationTime;
                $datumProvera=$this->changeToUnix($checkDate, $checkTime);
                
                //echo "Provera".date("Y-m-d H:i:s",$datumProvera)."<br/>";
                $diff=abs($datumRezUnix-$datumProvera);
                //echo $diff;
                
                if($diff<1800){
                    if($datumProvera==$datumRezUnix){
                    $datumRezUnix+=1800;} else {
                        $datumRezUnix=$datumProvera;
                        $datumRezUnix+=1800;
                    }
                }
            }
                return date("Y-m-d H:i",$datumRezUnix,);
        }
        
        public function payment() {
        $session = session();
        $reservationData = $_SESSION['reservationData'];
        $rules['cardNumber'] = 'numeric';
        $rules['cvv2'] = 'numeric';
        $messages['cardNumber'] = "Card number must contain only d/igits.";
        $messages['cvv2'] = "CVV2 code must contain only digits.";

        $cardValue = $this->request->getVar('card');
        $reservationModel = new Reservation();
        $reservationModel->insertReservation($reservationData);
        $reservationID = $reservationModel->getInsertID();

        $paymentModel = new Payment();

        if ($cardValue == 0) {
            if (!$this->validate($rules, $messages)) {
                if ($this->validator->hasError('cardNumber'))
                    $poruka = $this->validator->getError('cardNumber');
                else if ($this->validator->hasError('cvv2'))
                    $poruka = $this->validator->getError('cvv2');
            } else {
                //popunjeno je za novu karticu
                $paymentData['customerID'] = $reservationData['customerID'];
                $paymentData['reservationID'] = $reservationID;
                $paymentData['holderName'] = $this->request->getVar('cardHolder');
                $paymentData['cardNumber'] = $this->request->getVar('cardNumber');
                $paymentData['expiration'] = $this->request->getVar('expiration');
                $paymentData['cvv2'] = $this->request->getVar('cvv2');
                $paymentModel->insertPayment($paymentData);
                return redirect()->to(site_url('Customers/index'));
            }
            $data['poruka'] = $poruka;
            $data['naslov'] = 'reserve';
            echo $this->show('Checkout', $data);
            return;
           }
           else {
                //koristi se postojeca
                $paymentData['customerID'] = $reservationData['customerID'];
                $paymentData['cardID'] = $this->request->getVar('card');
                $paymentData['reservationID'] = $reservationID;

                $paymentModel->insertPayment($paymentData);
                return redirect()->to(site_url('Customers/index'));
           }
        }
        
        public function changeProfileFunction(){
            $rules['firstName'] = 'alpha';
            $rules['lastName'] = 'alpha';
            $rules['address'] = 'alpha_numeric_space';
            $rules['town'] = 'alpha_space';
            $rules['country'] = 'alpha_space';
            $rules['email'] = 'valid_email';
            
            $messages['firstName']['alpha'] = 'Incorrect input for first name.';
            $messages['lastName']['alpha'] = 'Incorrect input for last name.';
            $messages['address']['alpha_numeric_space'] = 'Incorrect input for address.';
            $messages['town']['alpha_space'] = 'Incorrect input for town.';
            $messages['country']['alpha_space'] = 'Incorrect input for country.';
            $messages['email']['valid_email'] = 'Incorrect input for email.';
            $data=null;
            $poruka='';
            if(!$this->validate($rules,$messages)){
                if ($this->validator->hasError('firstName')) $poruka=$this->validator->getError('firstName');
                else if($this->validator->hasError('lastName')) $poruka=$this->validator->getError('lastName');
                else if($this->validator->hasError('address')) $poruka=$this->validator->getError('address');
                else if($this->validator->hasError('town')) $poruka=$this->validator->getError('town');
                else if($this->validator->hasError('country')) $poruka=$this->validator->getError('country');
                else if($this->validator->hasError('email')) $poruka=$this->validator->getError('email');
            } else {
                $firstName = $this->request->getVar('firstName');
                $lastName = $this->request->getVar('lastName');
                $address = $this->request->getVar('address');
                $town = $this->request->getVar('town');
                $country = $this->request->getVar('country');
                $email = $this->request->getVar('email');
                echo("<script>console.log('PHP: " . $email. "');</script>");
                $password = $this->request->getVar('password');
                
                $customerModel = new Customer();
                $userExists = $customerModel->getUser($email);
                
                $session=session();
                $myEmail=$_SESSION['email'];
                if($userExists != null && $userExists->email!=$myEmail){
                    $poruka = "User with this email address already exists!";
                } else {
                    $myUser=$customerModel->getUser($myEmail);
                    $user['firstName']=$firstName;
                    $user['lastName']=$lastName;
                    $user['address']=$address;
                    $user['town']=$town;
                    $user['country']=$country;
                    $user['email']=$email;
                    $user['password']=$password;
                    $customerModel->changeUser($myUser->customerID,$user);
                    $_SESSION['poruka']="You have updated successfully!";
                    return redirect()->to(site_url('Customers/changeProfile'));
                }
            }
            $data['poruka'] = $poruka;
            echo $this->show('ChangeProfile', $data);
            return;
        }
        
        public function addCreditCard(){
            $rules['cardNumber'] = 'numeric';
            $rules['cvv2'] = 'numeric';
            $messages['cardNumber']['numeric'] = "Card number must contain only digits.";
            $messages['cvv2']['numeric'] = "CVV2 code must contain only digits.";
            
            if (!$this->validate($rules, $messages)) {
                if ($this->validator->hasError('cardNumber')) $poruka = $this->validator->getError('cardNumber');
                else if ($this->validator->hasError('cvv2')) $poruka = $this->validator->getError('cvv2');
            } else {
                $cardData['holderName'] = $this->request->getVar('cardHolder');
                $cardData['cardNumber'] = $this->request->getVar('cardNumber');
                $cardData['expiration'] = $this->request->getVar('expiration');
                $cardData['cvv2'] = $this->request->getVar('cvv2');
                $cardData['cardType']=$this->request->getVar('type');
                
                $session=session();
                $email=$_SESSION['email'];
                
                $customerModel=new Customer();
                $customer=$customerModel->getUSer($email);
                $cardData['customerID']=$customer->customerID;
                
                $cardModel=new CreditCard();
                $cardModel->addCard($cardData);
                $_SESSION['poruka']="You have successfully added new card!";
                return redirect()->to(site_url('Customers/creditCard'));
            }
            $data['poruka'] = $poruka;
            echo $this->show('AddCreditCard', $data);
            return;
        }
        
        public function delete(){
            $rules['cardNumber'] = 'numeric';
            $rules['cvv2'] = 'numeric';
            $messages['cardNumber']['numeric'] = "Card number must contain only digits.";
            $messages['cvv2']['numeric'] = "CVV2 code must contain only digits.";
            $poruka="";
            if (!$this->validate($rules, $messages)) {
                if ($this->validator->hasError('cardNumber')) $poruka = $this->validator->getError('cardNumber');
                else if ($this->validator->hasError('cvv2')) $poruka = $this->validator->getError('cvv2');
            } else {
                $cardNumber= $this->request->getVar('cardNumber');
                $cvv2 = $this->request->getVar('cvv2');
                
                $session=session();
                $email=$_SESSION['email'];
                
                $cardModel=new CreditCard();
                $card= $cardModel->findCardByNumber($cardNumber);
                if($card!=null){
                $cardModel->delete($card->cardID);
                $_SESSION['poruka']="You have successfully delete your card!";
                return redirect()->to(site_url('Customers/deleteCard')); 
                }
                else { 
                    $poruka="You don't have card with that number!";
                }
            }
            $data['poruka'] = $poruka;
            echo $this->show('DeleteCreditCard', $data);
            return;
        }
        
        public function contactFunction(){
            $rules['firstName'] = 'alpha';
            $rules['lastName'] = 'alpha';
            $rules['email'] = 'valid_email';
            
            $messages['firstName']['alpha'] = 'Incorrect input for first name.';
            $messages['lastName']['alpha'] = 'Incorrect input for last name.';
            $messages['email']['valid_email'] = 'Incorrect input for email.';
            $poruka="";
            if(!$this->validate($rules,$messages)){
                if ($this->validator->hasError('firstName')) $poruka=$this->validator->getError('firstName');
                else if($this->validator->hasError('lastName')) $poruka=$this->validator->getError('lastName');
                else if($this->validator->hasError('email')) $poruka=$this->validator->getError('email');
            } else {
                $messageData['firstName']=$this->request->getVar('firstName');
                $messageData['lastName']=$this->request->getVar('lastName');
                $messageData['email']=$this->request->getVar('email');
                $messageData['message']=$this->request->getVar('message');
                $messageModel= new Message();
                $messageModel->addMessage($messageData);
                return redirect()->to(site_url('Customers/contactUs'));
            }
            $data['poruka']=$poruka;
            return $this->show('ContactUsCustomer',$data);
        }
    }