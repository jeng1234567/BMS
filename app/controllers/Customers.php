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
}