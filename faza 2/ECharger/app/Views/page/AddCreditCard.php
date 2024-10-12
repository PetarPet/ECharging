<div class="container-fluid">
    <div class="row no-gutter">
        
    <?php echo $this->include('template/CustomerMenu'); use App\Models\Customer;?>
        
        <!-- The content half -->
        <div class="col-lg-9 bg-light">
            <div class="login d-flex align-items-center">

                <!-- Demo content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-lg-8 mx-auto py-4 mr-1">
                            <?php 
                            $customerModel=new Customer();
                            $session=session();
                            $email=$_SESSION['email'];
                            $customer=$customerModel->getUSer($email);
                            ?>
                            <h3 class="display-6 mb-3 text-center">Add credit card</h3>
                            <?php
                            if(isset($poruka)) {?>
                             <div class="row justify-content-center">
                                <div class="alert text-center alert-danger py-3">
                                <strong><?php echo $poruka; ?></strong>
                                </div>
                            </div> <?php   
                            } else 
                            if(isset($_SESSION['poruka'])){   
                            ?>
                            <div class="row justify-content-center">
                                <div class="alert text-center alert-success py-3">
                                    <strong><?php echo $_SESSION['poruka']; unset($_SESSION['poruka']); ?></strong>
                                </div>
                            </div> <?php
                            } ?> 
                            <form method="POST" action="<?php echo site_url('Customers/addCreditCard')?>">
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
                                <div class="form-group mb-3">
                                    <input name="type" id=type" type="text" placeholder="Credit card type (Visa,Mastercard, ...)" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Add credit card</button>
                            </form>
                        </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

        
    </div>
</div>
