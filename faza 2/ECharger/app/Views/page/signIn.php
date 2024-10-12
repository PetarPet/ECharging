<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-lg-6 d-none d-lg-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-lg-6 bg-light">
            <div class="login d-flex align-items-center py-2">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto ">
                            <h3 class="display-4">Welcome back!</h3>
                            <?php
                            if(isset($poruka)) {   
                            ?>
                            <div class="row justify-content-center">
                                <div class="alert text-center alert-danger py-3">
                                <strong><?php echo $poruka; ?></strong>
                                </div>
                            </div> <?php
                            }?>
                            <form method="POST" action="<?php echo site_url('Home/signInFunction')?>">
                                <div class="form-group mb-3">
                                    <input name="email"id="email" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="password" id="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                <div class="text-center d-flex justify-content-between mt-4"><p>If you don't have account sign up <a href="<?php echo site_url('Home/signUp')?>" class="font-italic text-muted blue"> 
                                        <u>here</u></a></p></div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>
