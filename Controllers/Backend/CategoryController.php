<?php
class CategoryController extends BaseController
{
    use UploadFile;
    private $validateErrors = [];
    private $categoryModel;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
    }
    public function index()
    {
        $categories= $this->categoryModel->getAll(['*'],['id' => 'id desc']);
        return $this->view('backend.categories.index',[
            'categories' =>$categories,
        ]);
    }

    public function delete()
    {
        $id= $_GET['id'] ?? null;
        if($id && is_numeric($id))
        {
            $this->categoryModel->destroy($id);
            header('location:index.php?module=backend&controller=category');
        }
        else
        {
            echo '<h3> Không tồn tại danh mục sản phẩm </h3>';
        }
    }

    public function create()
    {
        return $this->view('backend.categories.create');
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null ;
        $product = $this->categoryModel->findById($id);
        return $this->view('backend.categories.edit',[
            'product' =>$product,
        ]);
    }

    public function store()
    {

        if(!$this->validate($_REQUEST)) // fail
        {        
            $product = !empty($_GET['id']) ? $this->categoryModel->findById($_GET['id']) : [];
            return $this->view('backend.categories.create',[
                'errors' => $this->validateErrors, 
                'product'=>$product, 
            ]);
        }

        $data = [
            'name' => $_REQUEST['name'],
            'slug' => $_REQUEST['slug'],
            'description' => $_REQUEST['description'],
            'user_id'     => $_SESSION['user']['id'],
            'is_home'     => $_REQUEST['is_home'] ??  0,
        ];

        if($image= $this->getImage()) // nếu tồn tại image thì moi thêm 
        {
            $data['image'] = $image;
        }

        if(isset($_GET['id']) &&($_GET['id']))
        {
            $this->categoryModel->updateData($_GET['id'],$data);
        }
        else
        {
            $this->categoryModel->createNew($data);
        }
        header('location:index.php?module=backend&controller=category');
        
    }

    private function getImage()
    {
        $image = null;
        if(!empty($_FILES['image']['name']))
        {
            $this->setFileName($_FILES['image']['name']);
            $this->setFolderUpload('./public/uploads');
            $this->setFileTem($_FILES['image']['tmp_name']);
            $image = $this->upload();
            
        }
        return $image;
    }

    private function validate(array $input)
    {
        $errors= [];

        if(empty($input['name']))
        {
            $errors['name'] ='* Bạn chưa nhập vào tên danh mục sản phẩm !';
        }
        else if(strlen(trim($input['name'])) < 2)
        {
            $errors['name'] ='* Tên danh mục quá ngắn';
        }

        if(empty($input['slug']))
        {
            $errors['slug'] = '*Bạn chưa nhập vào slug !';
        }

        // validate image 
        if(!empty($_FILES['image']['type']))
        {
            $type= explode('/',$_FILES['image']['type']);
            if($type[0] !='image')
            {
                $errors['image'] ='* Ảnh không đúng định dạng';
            }

        }
        $this->validateErrors = $errors;
        return count($errors) ===0; // true
    }
}
?>