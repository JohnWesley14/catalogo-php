<?php

namespace App\Repositories;

use App\Database\Connection;
use PDO;

class ProductRepository
{
    private PDO $db;

    public function __construct(){
        $this->db = Connection::get();
    }

    public function findAll(){
        
    }

    public function create(array $data){
      
    }
}