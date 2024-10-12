<div class="container-fluid">
    <div class="row no-gutter">
        
       <?php echo $this->include('template/CustomerMenu'); ?>
        
        <!-- The content half -->
        <div class="col-lg-9 bg-light">
                <!-- Demo content-->
                    <div class="row">
                        <div class="col-lg-5 py-2 mx-auto my-3">
                            <h3 class="display-8 mb-3 text-center">Book charging</h3>
                            <?php
                            if(isset($poruka)) {   
                            ?>
                            <div class="row justify-content-center">
                                <div class="alert text-center alert-danger py-3">
                                <strong><?php echo $poruka; ?></strong>
                                </div>
                            </div> <?php
                            }   
                            ?>
                            <form method="POST" action="<?php echo site_url('Customers/checkReservation');?>">
                                <div class="form-group mb-3">
                                    <select name="charger" class="custom-select form-control rounded-pill border-0 shadow-sm px-4" id="inlineCharger" required="" autofocus="">
                                        <option selected>Choose charger...</option>
                                        <option value="Bubanj Potok">Bubanj Potok</option>
                                        <option value="IKEA Bubanj Potok">IKEA Bubanj Potok</option>
                                        <option value="Obilicev Venac Belgrade">Obilicev Venac Belgrade</option>
                                        <option value="Hyatt Regency Belgrade">Hyatt Regency Belgrade</option>
                                        <option value="ProCredit Belgrade">ProCredit Belgrade</option>
                                        <option value="Novi Banovci">Novi Banovci</option>
                                        <option value="Promenada Novi Sad">Promenada Novi Sad</option>
                                        <option value="EuroPetrol Palic">EuroPetrol Palic</option>
                                        <option value="Don Caffee Simanovci">Don Caffee Simanovci</option>
                                        <option value="NIS Velika Plana">NIS Velika Plana</option>
                                        <option value="Lukoil Aleksinac">Lukoil Aleksinac</option>
                                        <option value="Presevo">Presevo</option>
                                        <option value="Rtanj">Rtanj</option>
                                    </select>  
                                </div>
                                <div class="form-group mb-3">
                                    <input name="date" id="inputDate" type="date" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                 <div class="form-group mb-3">
                                    <input name="time" id="inputTime" type="time" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Proceed to checkout</button>
                            </form>
                        </div>
                        <div class="col-lg-7 py-3 mx-auto">
                            <iframe style="border: 10px groove whitesmoke" loading="eager" importance="high" src="https://www.google.com/maps/d/u/0/embed?mid=1xkqiURsUTd-bsObxJkG_GnS58-0UquBk"  width="100%" height="600px"></iframe>
                        </div>
                    </div>

        </div><!-- End -->
        
    </div>
</div>
