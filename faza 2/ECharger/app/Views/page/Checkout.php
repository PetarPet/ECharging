<?php 
use App\Models\Customer;
use App\Models\CreditCard;
?>
<div class="container-fluid">
    <div class="row no-gutter bg-light">
        
        <!-- The content half -->
        <div class="col-md-8 offset-md-2 bg-light">
            <div class="login d-flex align-items-center py-3">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <h3 class="display-6 mb-3 text-center">Payment</h3>
                            <div class="row">
                                <div class="col-lg-10 col-xl-9 mx-auto mb-2 text-center">
                                    <img src="<?php echo site_url('../images/visa.png')?>" width="100" height="100">
                                    <img src="<?php echo site_url('../images/master.png')?>" width="100" height="100">
                                    <img src="<?php echo site_url('../images/diners.png')?>" height="100" width="auto">
                                    <img src="<?php echo site_url('../images/american.png')?>" width="auto" height="100">
                                </div>
                            </div>
                            <?php
                            if(isset($poruka)) {   
                            ?>
                            <div class="row justify-content-center">
                                <div class="alert text-center alert-danger py-3">
                                <strong><?php echo $poruka; ?></strong>
                                </div>
                            </div> <?php
                            }?>
                            <form method="POST" action="<?php echo site_url('Customers/payment');?>">
                                <?php
                                $customerModel= new Customer();
                                $session = session();
                                $email=$_SESSION['email'];
                                $customer = $customerModel->getUSer($email);
                                $cardModel = new CreditCard();
                                $data=$_SESSION['reservationData'];
                                $customerID=$data['customerID'];
                                $cards=$cardModel->findCards($customerID);
                                if($cards!=null){ ?>
                                    <h5 class="display-7 mb-3 text-left">Select your credit card to pay</h3>
                                    <div class="form-group mb-3">
                                    <select name="card" class="custom-select form-control rounded-pill border-0 shadow-sm px-4" id="inlineCharger" required="" autofocus="">
                                        <option selected value="0">Choose card...</option>
                                <?php
                                foreach ($cards as $key) { ?>
                                    <option value="<?php echo $key->cardID?>"><?php echo $key->cardType." "."**** **** **** ".substr($key->cardNumber,-4);?></option>
                                    
                                    <?php }
                                ?>
                                </select>  
                                </div>
                                <?php }
                                ?>
                                <h5 class="display-7 mb-3 text-left">Or insert another credit card info</h3>
                                <div class="form-group mb-3">
                                    <input name="cardHolder" id="inputCardName" type="text" placeholder="Credit card holder" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="cardNumber" id="inputNumber" type="text" maxlength="16" size="16" placeholder="Credit card number"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="expiration" id="inputExpiration" maxlength="5" size="5" type="text" placeholder="Expiration mm/yy"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                 <div class="form-group mb-3">
                                    <input name="cvv2" id="inputCVV" type="text" maxlength="4" size="4" placeholder="CVV2" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Pay</button>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

        
    </div>
</div>