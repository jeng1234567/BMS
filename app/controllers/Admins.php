<?php
class Admins extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Admin');
    }

    public function index() {
        $admins = $this->adminModel->findBookingRecords();

        $data = [
            'admins' => $admins
        ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index/");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/customers/index");
        }
        else{
            $this->view('admins/index');
        }
        
    }

    public function bookingStatus() {
        // $admins = $this->adminModel->findBookingRecords();

        // $data = [
        //     'admins' => $admins
        // ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/bookingStatus');
        }
        
    }

    public function feedbacks() {
        // $admins = $this->adminModel->findBookingRecords();

        // $data = [
        //     'admins' => $admins
        // ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/feedbacks');
        }
        
    }

    public function branch(){
        $admins = $this->adminModel->findBranch();

        $data = [
            'admins' => $admins
        ];

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/branch', $data);
        }
    }

    public function customers() {
        $admins = $this->adminModel->findCustomer();
        // var_dump($admins);
        $data = [
            'admins' => $admins
        ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/customers', $data);
        }
    }

    public function stylist() {
        $admins = $this->adminModel->findStylist();
        // var_dump($admins);
        $data = [
            'admins' => $admins
        ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/stylist', $data);
        }

    }

    public function services() {
        $admins = $this->adminModel->findServices();
        // var_dump($admins);
        $data = [
            'admins' => $admins
        ];
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/services', $data);
        }
    }

    public function regularBookingRecords(){
        $admins = $this->adminModel->viewRegularBookingRecords();

        $data = [
            'admins' => $admins
        ];

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/regularBookingRecords', $data);
        }
    }

    public function homeServiceRecords(){
        $admins = $this->adminModel->viewHomeServiceRecords();

        $data = [
            'admins' => $admins
        ];

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        else{
            $this->view('admins/homeServiceRecords', $data);
        }
    }
    public function addBranch() {
        // $admins = $this->adminModel->addService();
        // var_dump($admins);
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
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

    public function addServices() {
        // $admins = $this->adminModel->addService();
        // var_dump($admins);
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }

        $data = [
            'service'=> '',
            'price' => '',
            'serviceError' => '',
            'priceError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id'=> $_SESSION['user_id'],
                'service'=> trim($_POST['service']),
                'price' => trim($_POST['price']),
                'serviceError' => '', 
                'priceError' => ''
            ];
            // var_dump($data['service']);
            if (empty($data['service'])) {
                $data['serviceError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['price'])) {
                $data['priceError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['serviceError']) && empty($data['priceError'])) {
                if ($this->adminModel->addService($data)) {
                    header("Location: " . URLROOT . "/admins/services");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/addServices', $data);
            }
        }

        $this->view('admins/addServices', $data);
    }

    public function addStylist() {
        // $admins = $this->adminModel->addService();
        // var_dump($admins);
        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }

        $data = [
            'stylist_name'=> '',
            'branch' => '',
            'motto' => '',
            'stylistError' => '', 
            'branchError' => '',
            'mottoError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id'=> $_SESSION['user_id'],
                'stylist_name'=> trim($_POST['stylist_name']),
                'branch' => trim($_POST['branch']),
                'motto' => trim($_POST['motto']),
                'stylistError' => '', 
                'branchError' => '',
                'mottoError' => ''
            ];
            // var_dump($data['service']);
            if (empty($data['stylist_name'])) {
                $data['stylistError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['branch'])) {
                $data['branchError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['motto'])) {
                $data['mottoError'] = 'Please enter a value in this fields.';
            } 
            if (empty($data['stylistError']) && empty($data['branchError']) && empty($data['mottoError'])) {
                if ($this->adminModel->addStylist($data)) {
                    header("Location: " . URLROOT . "/admins/stylist");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/addStylist', $data);
            }
        }

        $this->view('admins/addStylist', $data);
    }

    public function updateServices($id){
        $admins = $this->adminModel->findServicesById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'admins' => $admins,
            'service'=> '',
            'price' => '',
            'serviceError' => '',
            'priceError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'admins' => $admins,
                'user_id'=> $_SESSION['user_id'],
                'service'=> trim($_POST['service']),
                'price' => trim($_POST['price']),
                'serviceError' => '', 
                'priceError' => ''
            ];
            // var_dump($data['service']);
            if($data['service'] == $this->adminModel->findServicesById($id)->service) {
                $data['serviceError'] == 'At least change the service!';
            }

            if($data['price'] == $this->adminModel->findServicesById($id)->price) {
                $data['priceError'] == 'At least change the price!';
            }

            if (empty($data['service'])) {
                $data['serviceError'] = 'Please enter a value in this fields.';
            } 

            if (empty($data['price'])) {
                $data['priceError'] = 'Please enter a value in this fields.';
            } 

            if (empty($data['serviceError']) && empty($data['priceError'])) {
                if ($this->adminModel->updateServices($data)) {
                    header("Location: " . URLROOT . "/admins/services");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/updateServices', $data);
            }
        }

        $this->view('admins/updateServices', $data);
    }

    public function updateStylist($id){
        $admins = $this->adminModel->findStylistById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'admins' => $admins,
            'stylist_name'=> '',
            'branch' => '',
            'motto' => '',
            'stylistNameError' => '',
            'branchError' => '',
            'mottoError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'admins' => $admins,
                'user_id'=> $_SESSION['user_id'],
                'stylist_name'=> trim($_POST['stylist_name']),
                'branch' => trim($_POST['branch']),
                'motto' => trim($_POST['motto']),
                'stylistNameError' => '',
                'branchError' => '',
                'mottoError' => ''
            ];
            // var_dump($data['service']);
            if($data['stylist_name'] == $this->adminModel->findStylistById($id)->stylist_name) {
                $data['stylistNameError'] == 'At least change the stylist name!';
            }

            if($data['branch'] == $this->adminModel->findStylistById($id)->branch) {
                $data['branchError'] == 'At least change the branch!';
            }

            if($data['motto'] == $this->adminModel->findStylistById($id)->motto) {
                $data['mottoError'] == 'At least change the motto!';
            }

            if (empty($data['stylist_name'])) {
                $data['stylistNameError'] = 'Please enter a value in this fields.';
            } 

            if (empty($data['motto'])) {
                $data['mottoError'] = 'Please enter a value in this fields.';
            } 

            if (empty($data['branch'])) {
                $data['branchError'] = 'Please enter a value in this fields.';
            } 

            if (empty($data['stylistNameError']) && empty($data['branchError']) && empty($data['mottoError'])) {
                if ($this->adminModel->updateStylist($data)) {
                    header("Location: " . URLROOT . "/admins/stylist");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/updateStylist', $data);
            }
        }

        $this->view('admins/updateStylist', $data);
    }

    public function updateBranch($id){
        $admins = $this->adminModel->findBranchById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'admins' => $admins,
            'branch_name'=> '',
            'branch_location' => '',
            'branchNameError' => '',
            'branchLocationError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'admins' => $admins,
                'user_id'=> $_SESSION['user_id'],
                'branch_name'=> trim($_POST['branch_name']),
                'branch_location' => trim($_POST['branch_location']),
                'branchNameError' => '',
                'branchLocationError' => ''
            ];
            // var_dump($data['service']);
            if($data['branch_name'] == $this->adminModel->findBranchById($id)->branch_name) {
                $data['branchNameError'] == 'At least change the Branch name!';
            }

            if($data['branch_location'] == $this->adminModel->findBranchById($id)->branch_location) {
                $data['branchLocationError'] == 'At least change the Location!';
            }

            if (empty($data['branch_name'])) {
                $data['branchNameError'] = 'Please enter a value in this fields.';
            } 

            if (empty($data['branch_location'])) {
                $data['branchLocationError'] = 'Please enter a value in this fields.';
            } 

            if (empty($data['branchNameError']) && empty($data['branchLocationError'])) {
                if ($this->adminModel->updateBranch($data)) {
                    header("Location: " . URLROOT . "/admins/branch");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/updateBranch', $data);
            }
        }

        $this->view('admins/updateBranch', $data);
    }

    public function updateHomeServiceRecords($id){
        $admins = $this->adminModel->findHomeServiceRecordsById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'id' => $id,
            'admins' => $admins,
            'remark'=> '',
            'remarkError' => ''

        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'admins' => $admins,
                'user_id'=> $_SESSION['user_id'],
                'remark'=> trim($_POST['remark']),
                'remarkError' => '',
            ];
            // var_dump($data['service']);
            if($data['remark'] == $this->adminModel->findHomeServiceRecordsById($id)->remark) {
                $data['remarkError'] == 'At least change the Status name!';
            }

            if (empty($data['remarkError'])) {
                if ($this->adminModel->updateHomeServiceRecords($data)) {
                    header("Location: " . URLROOT . "/admins/homeServiceRecords");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/updateHomeServiceRecords', $data);
            }
        }

        $this->view('admins/updateHomeServiceRecords', $data);

    }

    public function updateRegularBookingRecords($id){
        $admins = $this->adminModel->findRegularBookingRecordsById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'id' => $id,
            'admins' => $admins,
            'remark'=> '',
            'remarkError' => ''

        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'admins' => $admins,
                'user_id'=> $_SESSION['user_id'],
                'remark'=> trim($_POST['remark']),
                'remarkError' => '',
            ];
            // var_dump($data['service']);
            if($data['remark'] == $this->adminModel->findRegularBookingRecordsById($id)->remark) {
                $data['remarkError'] == 'At least change the Status name!';
            }

            if (empty($data['remarkError'])) {
                if ($this->adminModel->updateRegularBookingRecords($data)) {
                    header("Location: " . URLROOT . "/admins/regularBookingRecords");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/updateRegularBookingRecords', $data);
            }
        }

        $this->view('admins/updateRegularBookingRecords', $data);

    }

    public function delete($id) {
        $admins = $this->adminModel->findServicesById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'admins' => $admins,
            'service'=> '',
            'price' => '',
            'serviceError' => '',
            'priceError' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->adminModel->deleteServices($id)) {
                header("Location: " . URLROOT . "/admins/services");
            } else {
               die('Something went wrong!');
            }
        }
    }

    public function deleteStylist($id) {
        $admins = $this->adminModel->findStylistById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'admins' => $admins,
            'stylist_name'=> '',
            'branch' => '',
            'motto' => '',
            'serviceError' => '',
            'priceError' => '',
            'stylistNameError' => '',
            'branchError' => '',
            'mottoError' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->adminModel->deleteStylist($id)) {
                header("Location: " . URLROOT . "/admins/stylist");
            } else {
               die('Something went wrong!');
            }
        }
    }

    public function deleteBranch($id) {
        $admins = $this->adminModel->findBranchById($id);

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/index");
        }
        elseif($_SESSION['role'] == "Customer"){
            header("Location: " . URLROOT . "/index");
        }
        // var_dump($admins);
        $data = [
            'admins' => $admins,
            'branch_name'=> '',
            'branch_location' => '',
            'branchNameError' => '',
            'branchLocationError' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->adminModel->deleteBranch($id)) {
                header("Location: " . URLROOT . "/admins/branch");
            } else {
               die('Something went wrong!');
            }
        }
    }
}