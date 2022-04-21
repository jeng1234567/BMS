<?php
class Customer {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function findBranch(){
        $this->db->query('SELECT branch_name FROM branch ORDER BY id ASC ');

        $results = $this->db->resultSet();

        return $results;
    }
    public function addRegularBooking($data){
        $this->db->query('INSERT INTO regularbooking (branch, date, time) VALUES(:branch, :date, :time)');

        // $this->db->bind(':id', $data['id']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':time', $data['time']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
