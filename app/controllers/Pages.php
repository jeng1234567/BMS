<?php
class Pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Jay Tayers Booking System'
        ];

        $this->view('index', $data);
    }

    // public function customer() {
    //     $data = [
    //         'title' => 'Jay Tayers Booking System'
    //     ];

    //     $this->view('customers/index', $data);
    // }
}
