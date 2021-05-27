<?php
class RegisterController extends BaseController {

    protected $customer;

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
            if(empty($input['name']))
            {
                $errors['email']='* Vui lòng nhập vào họ tên ';
            }

            if(empty($input['email']))
            {
                $errors['email']='* Vui lòng nhập vào địa chỉ Gmail .';
            } elseif(!filter_var($input['email'], FILTER_VALIDATE_EMAIL))
            {
                $errors['email']='* Sai địng dạng Gmail. Yêu cầu nhập lại  .';
            }

            if(empty($input['address']))
            {
                $errors['password'] =' * Vui lòng nhập vào địa chỉ  .';
            }

            if(empty($input['password']))
            {
                $errors['password'] =' * Vui lòng nhập vào password .';
            }

        }


        if(!empty($input['email']) && !empty($input['password']) && !empty($input['name']) && !empty($input['address']))
        {    
            $data=[
                'name'      => $input['name'],
                'email'     => $input['email'],
                'address'   => $input['address'],
                'password'  => md5($input['password']),
             ];
            $this->customer->createNew($data);
            header('location:index.php?controller=login');
        }

        return $this->view('frontend.customer.register',[
            'errors' => $errors,
            'input' =>$input,
        ]);
        
    }
}

?>