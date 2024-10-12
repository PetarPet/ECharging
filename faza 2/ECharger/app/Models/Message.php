<?php namespace App\Models;

use CodeIgniter\Model;

class Message extends Model
{
    protected $table      = 'messages';
    protected $primaryKey = 'messageID';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['messageID', 'firstName','lastName','email','message'];
    
    
    public function addMessage($data) {
        return $this->insert($data);
    }
    
}
