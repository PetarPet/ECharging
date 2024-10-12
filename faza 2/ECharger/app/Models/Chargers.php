<?php namespace App\Models;

use CodeIgniter\Model;

class Chargers extends Model
{
    protected $table      = 'chargers';
    protected $primaryKey = 'chargerID';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['chargerID', 'name','owner','investorID'];
    
    public function findCharger($data){
        return $this->where('name',$data)->first();
    }
    
}
