<?php namespace App\Models;

use CodeIgniter\Model;

class Reservation extends Model
{
    protected $table      = 'reservation';
    protected $primaryKey = 'reservationID';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['reservationID', 'reservationDate','reservationTime','chargingType','customerID','chargerID'];
    
    public function findReservation($charger,$date1){
        return $this->where('chargerID',$charger)->where('reservationDate',$date1)->findAll();
    }
    
    public function insertReservation($data){
        return $this->insert($data);
    }
    
    public function findReservationCustomer($cID){
        return $this->where('customerID',$cID)->orderBy('reservationDate',"ASC")->orderBy('reservationTime',"ASC")->findAll();
    }
    
}
