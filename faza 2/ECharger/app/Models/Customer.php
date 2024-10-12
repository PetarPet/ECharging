<?php namespace App\Models;

use CodeIgniter\Model;

/*
 * 
 * IsplataModel
 * 
 * klasa sadrži metode koje služe za izvršavanje 
 * 
 * osnovnih upita nad tabelom ISPLATA
 * 
 * 
 */

class Customer extends Model
{
    protected $table      = 'customers';
    protected $primaryKey = 'customerID';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['customerID', 'firstName', 'lastName','address','town','country','email','password'];
    
    public function getUSer($email) {
        return $this->where('email', $email)->first();
    }
    
    public function addUser($data) {
        return $this->insert($data);
    }
    
    public function changeUser($id,$data){
        return $this->update($id, $data);
    }
}
