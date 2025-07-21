<?php
namespace App\Core\Abstract;


abstract class AbstractRepository {
    protected $pdo;
    public function __construct() {}
    abstract public function selectbyId(int $id);
    abstract public function insert(array $data);
    abstract public function update(int $id, array $data);
    abstract public function delete(int $id);
    abstract public function selectAll();
    abstract public function selectBy();
   
    
}