<?php
class Customers extends Controller {
    public function __construct() {
        $this->customerModel = $this->model('Customer');
    }

    public function index() {
        // $customers = $this->customerModel->findCustomer();

        // $data = [
        //     'customers' => $customers
        // ];

        $this->view('customers/index');
    }
    public function regularBooking() {
        // $admins = $this->adminModel->findBookingRecords();

        // $data = [
        //     'admins' => $admins
        // ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index/");
        }
        elseif($_SESSION['role'] == "Admin"){
            header("Location: " . URLROOT . "admins/index");
        }
        else{
            $this->view('customers/regularBooking');
        }
        
    }
}