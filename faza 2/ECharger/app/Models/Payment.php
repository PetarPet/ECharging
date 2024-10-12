<?php namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model
{
    protected $table      = 'payment';
    protected $primaryKey = 'paymentID';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['paymentID', 'customerID','cardID','reservationID','cardNumber','cvv2','holderName','expiration'];
    
    public function findCards($data){
        return $this->where('customerID',$data)->findAll();
    }
    
    public function insertPayment($data){
        return $this->insert($data);
    }
}
