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

class Investor extends Model
{
    protected $table      = 'investors';
    protected $primaryKey = 'investorID';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['investorID', 'companyName','address','town','country','PIB','email','password'];
    
    public function getInvestor($TaxNumber) {
        return $this->where('PIB', $TaxNumber);
    }
    
    public function getInvestorByEmail($email){
        return $this->where('email',$email);
    }
    
    public function addInvestor($data) {
        return $this->insert($data);
    }
    
}
