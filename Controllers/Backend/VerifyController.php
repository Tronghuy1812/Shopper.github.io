<?php
class VerifyController extends BaseController {

    private $userModel;

    public function __construct()
    {
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
    }

    public function index()
    {
        $errors=[];
        $input= $_REQUEST;
        if(isset($_POST['btn_login']))
        {
            if(empty($input['email']))
            {
                $errors['email']='* Vui lòng nhập vào địa chỉ Gmail .';
            }

            if(empty($input['password']))
            {
                $errors['password'] =' * Vui lòng nhập vào password .';
            }

            if(isset($input['remember']))
            {
                setcookie('email',$input['email'],time() + 3600);
                setcookie('password',$input['password'],time() + 3600);

            }
        }
        // check tồn tại của 
        if(!empty($input['email']) && !empty($input['password']))
        {
            if($user= $this->checkUser($input['email'],$input['password']))
            {
                $_SESSION['user']= $user;
                header('location:index.php?module=backend&controller=dashboar');
            }
            $errors['all']='* Sai địa chỉ email hoặc mật khẩu .';
        }

        // thiết lập cooke lưu mật khẩu
        $check=false;
        if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
        {
            $input['email'] = $_COOKIE['email'];
            $input['password'] = $_COOKIE['password'];
            $check= true;
        }

        return $this->view('backend.verifies.login',[
            'errors' => $errors,
            'input'  => $input,

        ]);
    }

    public function logout()
    {
        if(!empty($_SESSION['user']))
        {
            unset($_SESSION['user']);
        }
        header('location:index.php?module=backend&controller=verify');
    }

    private function checkUser($email, $password)
    {
        $result=  $this->userModel->checkEmailPassword($email,$password);
        return $result   ;

    }
}