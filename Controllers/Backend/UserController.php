<?php

class UserController extends BaseController {
    
    protected $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        return $this->view('backend.users.index',[
            'users' => $users ,
        ]);
    }

    public function create()
    {
        return $this->view('backend.users.create');
    }

    public function edit()
    {
        $id= $_GET['id'] ?? null;
        $user= $this->userModel->findById($id);
        if(!$user)
        {
            echo "<h2>không có user ID: ${id}</h2>";
            return;
        }
        return $this->view('backend.users.create',[
            'user' => $user ,
        ]);
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        $user= $this->userModel->findById($id);
        
        if(!$user)
        {
            echo "<h3>Không thấy user</h3>";
            return;
        }
        $this->userModel->destroy($id);
        // nesu user đang đăng nhập mà xóa thì sẽ unset => logout website.
        if($user['id'] == $_SESSION['user']['id'])
        {
            unset($_SESSION['user']);
        }
        $this->redirect('index.php?module=backend&controller=user');
    }

    public function save()
    {

        if($errors= $this->validation($_REQUEST))
        {
            return  $this->view('backend.users.create',[
                'errors' => $errors ,
            ]);
        }

        $data= [
            'name'      => $_REQUEST['name'],
            'email'     => $_REQUEST['email'],
            'phone'     => $_REQUEST['phone'],
            'age'       => $_REQUEST['age'],
            'address'   => $_REQUEST['address'],
            'gender'    => $_REQUEST['gender'],
        ];

        if(isset($_GET[id]) && $_GET['id'])
        {
            // khi sửa k muốn nhập lại pass lưu lại vẫn giữ dc
            if(!empty($_REQUEST['password']))
            {
                $data['password'] = md5($_REQUEST['password']);
            }
            $this->userModel->updateData($_GET['id'],$data);
        }
        else {
            $data['password'] = md5($_REQUEST['password']);
            $this->userModel->createNew($data);
        }
        header('location:index.php?module=backend&controller=user');
    }

    public function validation( array $input)
    {
        $errors = [];
        if(empty($input['name']))
        {
            $errors['name']= '* Vui lòng nhập vào họ tên ';
        } elseif(strlen(trim($input['name'])) <= 2)
        {
            $errors['name']= '* Họ tên không được nhỏ hơn 2 ký tự';
        }

        if(empty($input['email'])){
            $errors['email']= '* Vui lòng nhập vào email';
        } elseif(!filter_var($input['email'],FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = '* Định dạng E-mail không đúng. Yêu cầu nhập lại';
        }

        if(empty($input['phone']))
        {
            $errors['phone'] = '* Vui lòng nhập vào số điện thoại';
        } elseif(!is_numeric($input['phone']))
        {
            $errors['phone'] = '* Vui lòng nhập dạng số 0-9 ';
        }

        if(empty($input['gender']))
        {
            $errors['gender'] = '* Vui lòng chọn giới tính';
        }

        // check khi sửa 
        if(isset($_GET['id']) && !empty($_GET['id']))
        {
            if(!empty($input['password']) || !empty($input['repassword']))
            {
                array_merge($errors,$this->validatePassword($input));
            }
        }
        else {
            array_merge($errors,$this->validatePassword($input));
        }

        return $errors;
    }

    
    private function validatePassword($input)
    {
        $errors=[];
        if(empty($input['password']))
        {
            $errors['password'] = 'Vui lòng nhập mật khẩu';
        } else if(strlen(trim($input['password'])) < 6){
            $errors['password'] = 'Mật khẩu phải dài hơn 6 ký tự';
        }
    
        if(empty($input['repassword']))
        {
            $errors['repassword'] = 'Vui lòng xác nhận lại mật khẩu';
        } else if($input['repassword'] != $input['password']) {
            $errors['repassword'] = 'Mật khẩu không trùng khớp';
        }
        return $errors;
    }

}