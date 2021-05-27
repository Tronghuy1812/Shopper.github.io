<?php
class ProductController extends BaseController {

    use UploadFile;
    private $validateErrors = [];
    private $categoryModel;
    private $productModel;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;

        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->loadModel('ProductImageModel');
        $this->productImageModel = new ProductImageModel;
    }

    public function index()
    {
        $products =$this->productModel->getProducts();
        return $this->view('backend.products.index',[
            'products' => $products,
        ]);
    }

    public function delete()
    {
        $id= $_GET['id'] ?? null;
        if($id && is_numeric($id))
        {
            $this->productModel->destroy($id);
            header('location:index.php?module=backend&controller=product');
        }
        else
        {
            echo '<h3> Không tồn tại  sản phẩm </h3>';
        }
    }

    public function create()
    {
        $categories = $this->categoryModel->getAll();
        return $this->view('backend.products.create',[
            'categories' => $categories,
        ]);
    }

    public function edit()
    {
        $productId= $_REQUEST['id'] ?? null ;
        $product = $this->productModel->findById($productId);
        $categories = $this->categoryModel->getAll();
        // echo '<pre>';print_r($product);  echo'</pre>';die;
        return $this->view('backend.products.edit',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function save()
    {  
        $categories = $this->categoryModel->getAll();
        // nếu  fail thì sẽ thực hiện validate truyền dữ liệu lỗi ra ngoài
        if(!$this->validate($_REQUEST)) // fail
        {   
            // khi submit vào save giá trị vấn còn      
            $product = !empty($_GET['id']) ? $this->productModel->findById($_GET['id']) : []; 
            return $this->view('backend.products.create',[
                'errors' => $this->validateErrors, 
                'product'=>$product,
                'categories' => $categories,
            ]);
        }

        $data =[
            'name'           => $_REQUEST['name'],
            'sku'            => $_REQUEST['sku'],
            'price'          => $_REQUEST['price'],
            'description'    => $_REQUEST['description'],
            'user_id'        => $_SESSION['user']['id'],
            'category_id'    => $_REQUEST['category_id'] ?? 0,
        ];

        if($image= $this->getImage())
        {
            $data['image'] = $image;
        }

        if(!empty($_REQUEST['price_sale']))
        {
            $data['price_sale'] = $_REQUEST['price_sale'];
        }

        if(isset($_GET['id']) && $_GET['id'])
        {
            $this->productModel->updateData($_GET['id'],$data);
        } else {
            $this->productModel->createNew($data);
     
        }
        header('location:index.php?module=backend&controller=product');
    }

    public function addImage()
    {
        //  sau khi upload thành công =>gọi ra ảnh thuộc productId đó
        $productId= $_GET['id'] ?? null ;
        $product = $this->productModel->findById($_GET['id']);
        $productImages= $this->productImageModel->getByProductId($productId);
        // echo '<pre>' ;print_r($productImages); echo '</pre>'; die;
        return $this->view('backend.products.images',[
            'product' => $product,
            'productImages' => $productImages,
        ]);
    }

    public function uploadImage()
    {
        $imageValidate= true;
        if(empty($_GET['id']))
        {
            $imageValidate= false;
            $errors['image'] = 'Yêu cầu nhập vào ID sản phẩm';
        }
        else if (empty($_FILES['image']['name'])) {
            $imageValidate = false;
            $errors['image'] = 'Bạn chưa chọn ảnh upload';
        }
        else if (!empty($_FILES['image']['type'])) {
            $type= explode('/',$_FILES['image']['type']);

            if($type[0] !='image')
            {
                $imageValidate = false;
                $errors['image'] ='* Ảnh không đúng định dạng';
            }
        }

        // Trường hợp có lỗi truyền ra bên ngoài
        if(!$imageValidate)
        {
            $product = $this->productModel->findById($_GET['id']);
            $productImages= $this->productImageModel->getByProductId($_GET['id']);
            return $this->view('backend.products.images',[
                'errors' =>$errors,
                'product' => $product,
                'productImages' => $productImages,
            ]);
        }

        $image = $this->getImage();
        if($image)
        {
            $this->productImageModel->createNew([
                'name' => $image,
                'product_id' =>$_GET['id'],
            ]);
        }
        header('location:index.php?module=backend&controller=product&action=addImage&id='.$_GET['id']);
    }

    public function deleteImage()
    {
        $id= $_REQUEST['id'] ?? null;
        $this->productImageModel->destroy($id);
        header('location:index.php?module=backend&controller=product&action=addImage&id='.$_GET['product_id']);
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

        if(empty($input['sku']))
        {
            $errors['sku'] = '* Bạn chưa nhập vào sku !';
        }

        if(empty($input['price']))
        {
            $errors['price'] = '* Bạn chưa nhập giá.';
        } else if(!is_numeric($input['price'])) 
        { 
            $errors['price'] = '* Yêu cầu cầu nhập giá từ 0-9.';
        }

        if(!empty($input['price_sale']) && !is_numeric($input['price_sale']))
        {
            $errors['price_sale'] = '* Yêu cầu nhập giá sale từ 0-9';
        }

        if(empty($input['category_id']))
        {
            $errors['category'] = '* Yêu cầu chọn danh mục cho sản phẩm';
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