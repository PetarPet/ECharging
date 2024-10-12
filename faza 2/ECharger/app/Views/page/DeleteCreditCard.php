<div class="container-fluid">
    <div class="row no-gutter">
        
    <?php echo $this->include('template/CustomerMenu'); use App\Models\Customer;?>
        
        <!-- The content half -->
        <div class="col-lg-9 bg-light">
            <div class=" d-flex align-items-center">

                <!-- Demo content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-lg-6 mx-auto py-5 mr-1 mb-5 pb-5">
                            <?php
                            $session=session();
                            ?>
                            <h3 class="display-6 mb-3 text-center">Delete credit card</h3>
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
                            <form method="POST" action="<?php echo site_url('Customers/delete')?>">
                                <div class="form-group mb-3">
                                    <input name="cardNumber" id="firstName" type="text" placeholder="Credit card number" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="cvv2" id="lastName" type="text" placeholder="CVV2 code" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Delete credit card</button>
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
