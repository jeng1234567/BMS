<?php
class Customer {
    private $db;
    private $db1;
    public function __construct() {
        $this->db = new Database;
    }

    public function findBranch(){
        $this->db->query('SELECT branch_name FROM branch ORDER BY id ASC ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addRegularBooking($data){
        $customerId = $_SESSION['user_id'];

        $this->db->query('INSERT INTO regularbooking (branch, date, time, user_id) VALUES(:branch, :date, :time, :customerId)');

        // $this->db->bind(':id', $data['id']);
        $this->db->bind(':customerId', $data['user_id']);
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
        $customerId = $_SESSION['user_id'];

        $this->db->query('INSERT INTO homeservice (location, contact, numberOfPerson, date, time, user_id) VALUES(:location, :contact, :numberOfPerson, :date, :time, :customerId)');

        // $this->db->bind(':id', $data['id']);
        $this->db->bind(':customerId', $dataHome['user_id']);
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
        $customerId = $_SESSION['user_id'];

        $this->db->query('SELECT * FROM regularbooking WHERE user_id ='.$customerId.'');

        $results = $this->db->resultSet();

        return $results;
    }

    public function viewHomeServiceBookingHistory(){
        $customerId = $_SESSION['user_id'];

        $this->db->query('SELECT * FROM homeservice WHERE user_id ='.$customerId.'');

        $results = $this->db->resultSet();

        return $results;
    }

}
