<?php namespace App\Controllers;

use App\Models\Customer;
use App\Models\Investor;
use App\Models\Message;

class Home extends BaseController
{
        public function show($page, $data) {
            echo view('template/Header', $data);
            echo view("page/$page", $data);
            echo view('template/Footer', $data);
        }
        
        public function index()
	{
                $data['naslov'] = 'Home page';
		$this->show('Home', $data);
        }
      
        public function signIn()
	{
                $data['naslov'] = 'Sign In';
		$this->show('signIn', $data);
	}
        
        public function signUp()
	{
                $data['naslov'] = 'Customer sign up';
		$this->show('CustomerSignUp', $data);
	}
        
        public function investorSignUp()
	{
                $data['naslov'] = 'Investor sign up';
		$this->show('InvestorSignUp', $data);
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
		$this->show('ContactUs', $data);
	}
        
        public function customerSignUp(){
            
            $rules['firstname'] = 'alpha';
            $rules['lastname'] = 'alpha';
            $rules['address'] = 'alpha_numeric_space';
            $rules['town'] = 'alpha_space';
            $rules['country'] = 'alpha_space';
            $rules['email'] = 'valid_email';
            
            $messages['firstname']['alpha'] = 'Incorrect input for first name.';
            $messages['lastname']['alpha'] = 'Incorrect input for last name.';
            $messages['address']['alpha_numeric_space'] = 'Incorrect input for address.';
            $messages['town']['alpha_space'] = 'Incorrect input for town.';
            $messages['country']['alpha_space'] = 'Incorrect input for country.';
            $messages['email']['valid_email'] = 'Incorrect input for email.';
            $data=null;
            $poruka='';
            if(!$this->validate($rules,$messages)){
                if ($this->validator->hasError('firstname')) $poruka=$this->validator->getError('firstname');
                else if($this->validator->hasError('lastname')) $poruka=$this->validator->getError('lastname');
                else if($this->validator->hasError('address')) $poruka=$this->validator->getError('address');
                else if($this->validator->hasError('town')) $poruka=$this->validator->getError('town');
                else if($this->validator->hasError('country')) $poruka=$this->validator->getError('country');
                else if($this->validator->hasError('email')) $poruka=$this->validator->getError('email');
            } else {
                $firstName = $this->request->getVar('firstname');
                $lastName = $this->request->getVar('lastname');
                $address = $this->request->getVar('address');
                $town = $this->request->getVar('town');
                $country = $this->request->getVar('country');
                $email = $this->request->getVar('email');
                echo("<script>console.log('PHP: " . $email. "');</script>");
                $password = $this->request->getVar('password');
                
                $investorModel = new Investor();
                $customerModel = new Customer();
                $userExists = $customerModel->getUser($email);
                $investorExists = $investorModel->getInvestorByEmail($email);
                if($userExists != null || $investorExists!= null){
                    $poruka = "User with this email address is already registered!";
                } else {
                    $user['firstName']=$firstName;
                    $user['lastName']=$lastName;
                    $user['address']=$address;
                    $user['town']=$town;
                    $user['country']=$country;
                    $user['email']=$email;
                    $user['password']=$password;
                    $customerModel->addUser($user);
                    $data['poruka']="You have registered successfully!";
                    echo $this->show('CustomerSignUp', $data);
                    return;
                }
            }
            $data['poruka'] = $poruka;
            echo $this->show('CustomerSignUp', $data);      
    }
    
    public function InvestorSignUpFunction(){
            
            $rules['companyname'] = 'alpha_numeric_space';
            $rules['address'] = 'alpha_numeric_space';
            $rules['town'] = 'alpha_space';
            $rules['country'] = 'alpha_space';
            $rules['taxnumber'] = 'numeric|max_length[9]|min_length[9]';
            $rules['email'] = 'valid_email';
            
            $messages['companyname']['alpha_numeric_space'] = 'Incorrect input for company name.';
            $messages['address']['alpha_numeric_space'] = 'Incorrect input for address.';
            $messages['town']['alpha_space'] = 'Incorrect input for town.';
            $messages['country']['alpha_space'] = 'Incorrect input for country.';
            $messages['taxnumber']['numeric'] = 'Tax number must contain only numbers.';
            $messages['taxnumber']['min_length[9]'] = 'Tax number is too short.';
            $messages['taxnumber']['max_length[9]'] = 'Tax number is too long.';
            $messages['email']['valid_email'] = 'Incorrect input for email.';
            $data=null;
            $poruka='';
            if(!$this->validate($rules,$messages)){
                if ($this->validator->hasError('companyname')) $poruka=$this->validator->getError('companyname');
                else if($this->validator->hasError('address')) $poruka=$this->validator->getError('address');
                else if($this->validator->hasError('town')) $poruka=$this->validator->getError('town');
                else if($this->validator->hasError('country')) $poruka=$this->validator->getError('country');
                else if($this->validator->hasError('taxnumber')) $poruka=$this->validator->getError('taxnumber');
                else if($this->validator->hasError('email')) $poruka=$this->validator->getError('email');
            } else {
                $companyName = $this->request->getVar('companyname');
                $address = $this->request->getVar('address');
                $town = $this->request->getVar('town');
                $country = $this->request->getVar('country');
                $taxNumber = $this->request->getVar('taxnumber');
                $email = $this->request->getVar('email');
                echo("<script>console.log('PHP: " . $email. "');</script>");
                $password = $this->request->getVar('password');
                
                $customerModel = new Customer();
                $userExists = $customerModel->getUser($email);
                $investorModel = new Investor();
                $investorExists = $investorModel->getInvestor($taxNumber);
                if($investorExists != null || $userExists!= null){
                    $poruka = "User with this email address is already registered!";
                } else {
                    $investor['companyName']=$companyName;
                    $investor['address']=$address;
                    $investor['town']=$town;
                    $investor['country']=$country;
                    $investor['PIB']=$taxNumber;
                    $investor['email']=$email;
                    $investor['password']=$password;
                    $investorModel->addInvestor($investor);
                    $data['poruka']="You have registered successfully!";
                    echo $this->show('InvestorSignUp', $data);
                    return;
                }
            }
            $data['poruka'] = $poruka;
            echo $this->show('InvestorSignUp', $data);      
    }
    
    public function signInFunction() {
            $rules['email'] = 'valid_email';
            $messages['email']['valid_email'] = 'Please enter valid email address.';
            $poruka = '';
            if(!$this->validate($rules, $messages)) {
                if($this->validator->hasError('email')) $poruka = $this->validator->getError ('email');
            } else {
                $email = $this->request->getVar('email');
                $pass = $this->request->getVar('password');
                $customerModel = new Customer();
                $customer = $customerModel->getUSer($email);
                echo("<script>console.log('SIGN IN email and password: " . $email. " ".$pass."');</script>");
                if($customer != null && $customer->password == $pass) {
                    $session = session();
                    $_SESSION['logged']=true;
                    $_SESSION['type']='customer';
                    $_SESSION['email']=$email;
                    $_SESSION['password']=$pass;
                    return redirect()->to(site_url('Customers/customerIndex'));
                } else $poruka = 'Incorrect email or password.';
            }
            $data['poruka'] = $poruka;
            $data['naslov'] = 'login';
            return $this->show('signIn', $data);
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
                return redirect()->to(site_url('Home/contactUs'));
            }
            $data['poruka']=$poruka;
            return $this->show('ContactUs',$data);
        }
  
}
