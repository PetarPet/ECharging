<?php 
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Chargers;
?>

<div class="container-fluid">
    <div class="row no-gutter">
        
    <?php echo $this->include('template/CustomerMenu');?>
        
        <!-- The content half -->
        <div class="col-lg-9 bg-light">
            <div class=" d-flex align-items-center">

                <!-- Demo content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-lg-12 mx-auto my-3 mr-1 pb-5">
                            <?php 
                            $customerModel=new Customer();
                            $session=session();
                            $email=$_SESSION['email'];
                            $customer=$customerModel->getUSer($email);
                            ?>
                            <h3 class="display-6 mb-3 text-center">My bookings</h3>
                            <?php
                            $i=1;
                            $reservationModel=new Reservation();
                            $reservations=$reservationModel->findReservationCustomer($customer->customerID);
                            if($reservations!=null){ ?>
                                <table class="table table-striped">
                                     <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Reservation ID</th>
                                            <th scope="col">Reservation date</th>
                                            <th scope="col">Reservation time</th>
                                            <th scope="col">Charger</th>
                                            <th scope="col">Customer ID</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                             foreach ($reservations as $key) {?>
                                                <tr>
                                                    <th scope="row"><?php echo $i++;?></th>
                                                    <td><?php echo $key->reservationID;?></td>
                                                    <td><?php echo $key->reservationDate;?></td>
                                                    <td><?php echo substr($key->reservationTime,0,5);?></td>
                                                    <td><?php
                                                           $chargerModel=new Chargers();
                                                           $charger=$chargerModel->find($key->chargerID);
                                                           echo $charger->name;
                                                    ?></td>
                                                    <td class="text-center"><?php echo $key->customerID;?></td>
                                                </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table> <?php     
                            } else {?>
                                <div class="alert text-center alert-info py-3 mt-2">
                                <strong><?php echo "You haven't booked any charging yet." ?></strong>
                                </div><?php
                            }
                            ?>
                        </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->
    </div>
</div>
