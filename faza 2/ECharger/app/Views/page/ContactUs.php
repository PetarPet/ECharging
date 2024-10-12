<div class="container-fluid">
    <div class="row no-gutter bg-light">
        
        <!-- The content half -->
        <div class="col-md-12 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-6 mb-3 text-center">Contact us & ask questions</h3>
                            <?php
                            if(isset($poruka)) { 
                            if(strcmp($poruka, "You have successfully sent your message!") == 0){   
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
                            <form method="POST" action="<?php echo site_url('Home/contactFunction');?>">
                                <div class="form-group mb-3">
                                    <input name="firstName" id="firstName" type="text" placeholder="First name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4 mb-2">
                                    <input name="lastName" id="lastName" type="text" placeholder="Last name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input name="email" id="email" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <textarea name="message" class="form-control border-0 shadow-sm px-4" placeholder="Write your message." rows="10" cols="5">
                                     Write your message. 
                                    </textarea>
                                </div>
                               
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Send message</button>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

        
    </div>
</div>
