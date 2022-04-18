<?php
class Admin {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function findCustomer() {
        $this->db->query('SELECT * FROM user WHERE role = "Customer"  ORDER BY createdate ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findBookingRecords(){
        $this->db->query('SELECT * FROM booking ORDER BY bookingId ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findBranch(){
        $this->db->query('SELECT * FROM branch ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
    }


    public function findCustomerById($id) {
        $this->db->query('SELECT * FROM user WHERE id = :id AND role = "Customer"');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function findServices() {
        $this->db->query('SELECT * FROM services ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findServicesById($id) {
        $this->db->query('SELECT * FROM services WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function findStylistById($id) {
        $this->db->query('SELECT * FROM stylist WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function findBranchById($id) {
        $this->db->query('SELECT * FROM branch WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function addBranch($data) {
        $this->db->query('INSERT INTO branch (id, branch_name, branch_location) VALUES(:id, :branch_name, :branch_location)');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':branch_name', $data['branch_name']);
        $this->db->bind(':branch_location', $data['branch_location']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addService($data) {
        $this->db->query('INSERT INTO services (id, service, price) VALUES(:id, :service, :price)');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':service', $data['service']);
        $this->db->bind(':price', $data['price']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addStylist($data) {
        $this->db->query('INSERT INTO stylist (id, stylist_name, branch, motto) VALUES(:id, :stylist_name, :branch, :motto)');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':stylist_name', $data['stylist_name']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':motto', $data['motto']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateServices($data){
        $this->db->query('UPDATE services SET service = :service, price = :price WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':service', $data['service']);
        $this->db->bind(':price', $data['price']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function updateStylist($data){
        $this->db->query('UPDATE stylist SET stylist_name = :stylist_name, branch = :branch, motto = :motto WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':stylist_name', $data['stylist_name']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':motto', $data['motto']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function updateBranch($data){
        $this->db->query('UPDATE branch SET branch_name = :branch_name, branch_location = :branch_location WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':branch_name', $data['branch_name']);
        $this->db->bind(':branch_location', $data['branch_location']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function deleteServices($id){
        $this->db->query('DELETE FROM services WHERE id = :id');
        
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteStylist($id){
        $this->db->query('DELETE FROM stylist WHERE id = :id');
        
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBranch($id){
        $this->db->query('DELETE FROM branch WHERE id = :id');
        
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findStylist(){
        $this->db->query('SELECT * FROM stylist ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
    }
}