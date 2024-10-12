<?php 
use App\Models\Customer;
use App\Models\CreditCard;
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
                        <div class="col-lg-11 col-lg-11 mx-auto my-3 mr-1 pb-5">
                            <?php 
                            $customerModel=new Customer();
                            $session=session();
                            $email=$_SESSION['email'];
                            $customer=$customerModel->getUSer($email);
                            ?>
                            <h3 class="display-6 mb-3 text-center">My credit cards</h3>
                            <?php
                            $i=1;
                            $cardModel=new CreditCard();
                            $cards=$cardModel->findCards($customer->customerID);
                            if($cards!=null){ ?>
                                <table class="table table-striped">
                                     <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Card ID</th>
                                            <th scope="col">Holder name</th>
                                            <th scope="col">Card type</th>
                                            <th scope="col">Card number</th>
                                            <th scope="col">CVV2 Code</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                             foreach ($cards as $key) {?>
                                                <tr>
                                                    <th scope="row"><?php echo $i++;?></th>
                                                    <td><?php echo $key->cardID;?></td>
                                                    <td><?php echo $key->holderName;?></td>
                                                    <td><?php echo $key->cardType;?></td>
                                                    <td><?php echo "**** **** **** ".substr($key->cardNumber,-4)?></td>
                                                    <td><?php echo $key->cvv2;?></td>
                                                </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table> <?php     
                            } else {?>
                                <div class="alert text-center alert-info py-3 mt-2">
                                <strong><?php echo "You haven't added any card yet." ?></strong>
                                </div><?php
                            }
                            ?>
                        </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->
    </div>
</div>
