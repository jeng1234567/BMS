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
        
        $customers = $this->customerModel->findBranch();
    
        $data = [
            'customers' => $customers,
            'id' => '',
            'branch' => '',
            'date' => '',
            'time' => '',
            'dateError' => '',
            'timeError' => ''
        ];

        $dataHome = [
            'customers' => $customers,
            'location' => '',
            'contact' => '',
            'numberOfPerson' => '',
            'date'=> '',
            'time'=> '',
            'locationError' => '',
            'contactError' => '',
            'noOfPersonError' => '',
            'dateErrorHome' => '',
            'timeErrorHome' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id'=> $_SESSION['user_id'],
                'branch' => trim($_POST['branch']),
                'date' => trim($_POST['date']),
                'time'=> trim($_POST['time']),
                'dateError' => '', 
                'timeError' => ''
            ];

            $dataHome = [
                'user_id'=> $_SESSION['user_id'],
                'location' => trim($_POST['location']),
                'contact' => trim($_POST['contact']),
                'numberOfPerson' => trim($_POST['numberOfPerson']),
                'date'=> trim($_POST['date']),
                'time'=> trim($_POST['time']),
                'locationError' => '', 
                'contactError' => '', 
                'noOfPersonError' => '', 
                'dateErrorHome' => '', 
                'timeErrorHome' => ''
            ];

            // var_dump($data['service']);
            if (empty($data['date'])) {
                $data['dateError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['time'])) {
                $data['timeError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['dateError']) && empty($data['timeError'])) {
                if ($this->customerModel->addRegularBooking($data)) {
                    header("Location: " . URLROOT . "/customers/index");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('customers/index', $data);
            }
            //HomeServiceBooking
            if (empty($dataHome['location'])) {
                $dataHome['locationError'] = 'Please enter a value in this fields.';
            } 
            if (empty($dataHome['contact'])) {
                $dataHome['contactError'] = 'Please enter a value in this fields.';
            } 
            if (empty($dataHome['numberOfPerson'])) {
                $dataHome['noOfPersonError'] = 'Please enter a value in this fields.';
            } 
            if (empty($dataHome['date'])) {
                $dataHome['dateErrorHome'] = 'Please enter a value in this fields.';
            } 
            if (empty($dataHome['time'])) {
                $dataHome['timeErrorHome'] = 'Please enter a value in this fields.';
            } 
            if (empty($dataHome['locationError']) && empty($dataHome['contactError']) && empty($dataHome['noOfPersonError']) && empty($dataHome['dateErrorHome']) && empty($dataHome['timeErrorHome'])) {
                if ($this->customerModel->addHomeService($dataHome)) {
                    header("Location: " . URLROOT . "/customers/index");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('customers/index', $dataHome);
            }

        }
        $this->view('customers/index', $data, $dataHome);
    }

    public function regularBooking(){
        $customers = $this->customerModel->findBranch();

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index/");
        }
        elseif($_SESSION['role'] == "Admin"){
            header("Location: " . URLROOT . "admins/index");
        }
        
        $data = [
            'customers' => $customers,
            'id' => '',
            'branch' => '',
            'date' => '',
            'time' => '',
            'dateError' => '',
            'timeError' => ''
            ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id'=> $_SESSION['user_id'],
                'branch' => trim($_POST['branch']),
                'date' => trim($_POST['date']),
                'time'=> trim($_POST['time']),
                'dateError' => '', 
                'timeError' => ''
            ];
            if (empty($data['date'])) {
                $data['dateError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['time'])) {
                $data['timeError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['dateError']) && empty($data['timeError'])) {
                if ($this->customerModel->addRegularBooking($data)) {
                    header("Location: " . URLROOT . "/customers/regularBooking");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('customers/regularBooking', $data);
            }
        }
        $this->view('customers/regularBooking', $data);
    
    }

    public function regularBookingHistory(){
        $customers = $this->customerModel->viewRegularBookingHistory();
        // var_dump($admins);
        $data = [
            'customers' => $customers
        ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index/");
        }
        elseif($_SESSION['role'] == "Admin"){
            header("Location: " . URLROOT . "admins/index");
        }
        else{
            $this->view('customers/regularBookingHistory', $data);
        }
    }

    public function homeServiceBookingHistory(){
        $customers = $this->customerModel->viewHomeServiceBookingHistory();
        // var_dump($admins);
        $data = [
            'customers' => $customers
        ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index/");
        }
        elseif($_SESSION['role'] == "Admin"){
            header("Location: " . URLROOT . "admins/index");
        }
        else{
            $this->view('customers/homeServiceBookingHistory', $data);
        }
    }
    public function homeServiceBooking(){

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index/");
        }
        elseif($_SESSION['role'] == "Admin"){
            header("Location: " . URLROOT . "admins/index");
        }
        $data = [
            'location' => '',
            'contact' => '',
            'numberOfPerson' => '',
            'date'=> '',
            'time'=> '',
            'locationError' => '',
            'contactError' => '',
            'noOfPersonError' => '',
            'dateErrorHome' => '',
            'timeErrorHome' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id'=> $_SESSION['user_id'],
                'location' => trim($_POST['location']),
                'contact' => trim($_POST['contact']),
                'numberOfPerson' => trim($_POST['numberOfPerson']),
                'date'=> trim($_POST['date']),
                'time'=> trim($_POST['time']),
                'locationError' => '', 
                'contactError' => '', 
                'noOfPersonError' => '', 
                'dateErrorHome' => '', 
                'timeErrorHome' => ''
            ];

            //HomeServiceBooking
            if (empty($data['location'])) {
                $data['locationError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['contact'])) {
                $data['contactError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['numberOfPerson'])) {
                $data['noOfPersonError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['date'])) {
                $data['dateErrorHome'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['time'])) {
                $data['timeErrorHome'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['locationError']) && empty($data['contactError']) && empty($data['noOfPersonError']) && empty($data['dateErrorHome']) && empty($data['timeErrorHome'])) {
                if ($this->customerModel->addHomeService($data)) {
                    header("Location: " . URLROOT . "/customers/homeServiceBooking");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('customers/homeServiceBooking', $data);
            }
        }
        $this->view('customers/homeServiceBooking', $data);
        
    }
    public function bookingHistory() {
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
            $this->view('customers/bookingHistory');
        }
        
    }

    public function selectBranch(){
        $customers = $this->customerModel->findBranch();
        
        $data = [
            'customers' => $customers,
        ];

        $this->view('customers/index', $data);
    }

    public function bookingStatus() {
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
            $this->view('customers/bookingStatus');
        }
        
    }

    public function addRegularBooking() {
        // $admins = $this->adminModel->addService();
        // var_dump($admins);
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index/");
        }
        elseif($_SESSION['role'] == "Admin"){
            header("Location: " . URLROOT . "admins/index");
        }

        $data = [
            'branch_name' => '',
            'branch_location' => '',
            'branchNameError' => '',
            'branchLocationError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id'=> $_SESSION['user_id'],
                'branch_name'=> trim($_POST['branch_name']),
                'branch_location' => trim($_POST['branch_location']),
                'branchNameError' => '', 
                'branchLocationError' => ''
            ];
            // var_dump($data['service']);
            if (empty($data['branch_name'])) {
                $data['branchNameError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['branch_location'])) {
                $data['branchLocationError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['branchNameError']) && empty($data['branchLocationError'])) {
                if ($this->adminModel->addBranch($data)) {
                    header("Location: " . URLROOT . "/admins/branch");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/addBranch', $data);
            }
        }

        $this->view('admins/addBranch', $data);
    }
}