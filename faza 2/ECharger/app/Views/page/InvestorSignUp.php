<div class="container-fluid">
    <div class="row no-gutter bg-light">
        
        <!-- The content half -->
        <div class="col-md-8 offset-md-2 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-6 mb-3 text-center">Investor registration</h3>
                            <?php
                            if(isset($poruka)) { 
                            if(strcmp($poruka, "You have registered successfully!") == 0){   
                            ?>
                            <div class="row justify-content-center">
                                <div class="alert text-center alert-success py-3">
                                <strong><?php echo $poruka; ?></strong>
                                </div>
                            </div> <?php
                            } else { ?>
                             <div class="row justify-content-center">
                                <div class="alert text-center alert-danger py-3">
                                <strong><?php echo $poruka; ?></strong>
                                </div>
                            </div> <?php   
                            }}
                         ?>
                            <form method="POST" action="<?php echo site_url('Home/InvestorSignUpFunction')?>" autocomplete="off">
                                <div class="form-group mb-3">
                                    <input name="companyname" id="companyname" type="text" placeholder="Company name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="address" id="address" type="text" placeholder="Address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="town"id="town" type="text" placeholder="Town" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                 <div class="form-group mb-3">
                                    <input name="country" id="country" type="text" placeholder="Country" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="taxnumber" id="taxnumber" type="text" placeholder="Tax number" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="email"id="email" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="password" id="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                 
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign up</button>
                                <div class="text-center d-flex justify-content-between mt-4"><p>If you have account sign in <a href="<?php echo site_url('Home/signIn')?>" class="font-italic text-muted"> 
                                        <u>here!</u></a></p></div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

        
    </div>
</div>