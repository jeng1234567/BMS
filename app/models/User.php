<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT IGNORE INTO user (username, email, address, number, password) VALUES(:username, :email, :address, :number, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $value = json_decode(json_encode($row), true);

        $hashedPassword = $value['password'];
        
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    // public function loginCustomer($username, $password) {
    //     $this->db->query('SELECT * FROM user WHERE username = :username AND role = "Customer"');

    //     //Bind value
    //     $this->db->bind(':username', $username);

    //     $row = $this->db->single();

    //     $value = json_decode(json_encode($row), true);

    //     $hashedPassword = $value['password'];
        
    //     if (password_verify($password, $hashedPassword)) {
    //         return $row;
    //     } else {
    //         return false;
    //     }
    // }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM user WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
