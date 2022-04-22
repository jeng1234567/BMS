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
    public function addHomeService($dataHome){
        $this->db->query('INSERT INTO homeservice (location, contact, numberOfPerson, date, time) VALUES(:location, :contact, :numberOfPerson, :date, :time)');

        // $this->db->bind(':id', $data['id']);
        $this->db->bind(':location', $dataHome['location']);
        $this->db->bind(':contact', $dataHome['contact']);
        $this->db->bind(':numberOfPerson', $dataHome['numberOfPerson']);
        $this->db->bind(':date', $dataHome['date']);
        $this->db->bind(':time', $dataHome['time']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function viewRegularBookingHistory(){
        $this->db->query('SELECT * FROM regularbooking ORDER BY id ASC ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function viewHomeServiceBookingHistory(){
        $this->db->query('SELECT * FROM homeservice ORDER BY id ASC ');

        $results = $this->db->resultSet();

        return $results;
    }
}
