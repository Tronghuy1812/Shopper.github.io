<?php
class CustomerController extends BaseController {

    private $customer;

    public function __construct()
    {
        $this->loadModel('CustomerModel');
        $this->customer = new CustomerModel;
    }

    public function index ()
    {

        $errors=[];
        $input= $_REQUEST;
        if(isset($_POST['btn_login']))
        {
            if(empty($input['email']))
            {
                $errors['email']='* Vui lòng nhập vào địa chỉ Gmail .';
            }else if(!filter_var($input['email'], FILTER_VALIDATE_EMAIL))
            {
                $errors['email']='* Sai địng dạng Gmail. Yêu cầu nhập lại  .';
            }

            if(empty($input['password']))
            {
                $errors['password'] =' * Vui lòng nhập vào password .';
            }
            // echo '<pre>';
            // print_r($_REQUEST);
            // echo '</pre>';

        }
        
        // check tồn tại của 
        if(!empty($input['email']) && !empty($input['password']))
        {
            
            if($customer= $this->checkUser($input['email'],$input['password']))
            {
                $_SESSION['customer']= $customer;
                header('location:index.php');
            }
            $errors['all']='* Sai địa chỉ email hoặc mật khẩu .';
        }
      
        return $this->view('frontend.customer.login',[
            'errors' => $errors,
            

        ]);
    }

    private function checkUser($email, $password)
    {
        $result=  $this->customer->checkEmailPassword($email,$password);
        return $result   ;

    }

    public function logout()
    {
        // echo __METHOD__;
        if(isset($_GET['action'])=='logout' && isset($_GET['controller'])=='customer' && !empty($_SESSION['customer']))
        {
            unset($_SESSION['customer']);
        }
        header('location:index.php');
    }
}

?>