<div class="container-fluid">
    <div class="row no-gutter">
        
    <?php echo $this->include('template/CustomerMenu'); use App\Models\Customer;?>
        
        <!-- The content half -->
        <div class="col-lg-9 bg-light">
            <div class="login d-flex align-items-center">

                <!-- Demo content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-lg-7 mx-auto py-5 mr-1">
                            <?php 
                            $customerModel=new Customer();
                            $session=session();
                            $email=$_SESSION['email'];
                            $customer=$customerModel->getUSer($email);
                            ?>
                            <h3 class="display-6 mb-3 text-center">Change profile</h3>
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
                            <form method="POST" action="<?php echo site_url('Customers/changeProfileFunction')?>">
                                <div class="form-group mb-3">
                                    <input value="<?php echo $customer->firstName;?>" name="firstName" id="firstName" type="text" placeholder="First name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input value="<?php echo $customer->lastName;?>" name="lastName" id="lastName" type="text" placeholder="Last name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input value="<?php echo $customer->address;?>" name="address" id="address" type="text" placeholder="Address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input value="<?php echo $customer->town;?>" name="town" id="town" type="text" placeholder="Town" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                 <div class="form-group mb-3">
                                    <input value="<?php echo $customer->country;?>" name="country" id="country" type="text" placeholder="Country" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input value="<?php echo $customer->email;?>" name="email" id="email" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input value="<?php echo $customer->password;?>" name="password" id="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                 
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Confirm changes</button>
                            </form>
                        </div>
                        <!-- The image half -->
                    <div class="col-lg-4 d-none d-lg-flex bg-image" style="background-size: cover; background-image: url('<?php echo site_url('../images/investor1.jpg');?>');">
                    </div>
                    </div>
                    
                    
                </div><!-- End -->

            </div>
        </div><!-- End -->

        
    </div>
</div>
