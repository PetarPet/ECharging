<?php namespace App\Models;

use CodeIgniter\Model;

class CreditCard extends Model
{
    protected $table      = 'creditcard';
    protected $primaryKey = 'cardID';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['cardID', 'holderName','cardNumber','cvv2','cardType','customerID'];
    
    public function findCards($data){
        return $this->where('customerID',$data)->findAll();
    }
    
    public function addCard($data){
        return $this->insert($data);
    }
    
    public function deleteCard($idCard){
        return $this->delete($idCard);
    }
    
    public function findCardByNumber($data){
        return $this->where('cardNumber',$data)->first();
    }
}
