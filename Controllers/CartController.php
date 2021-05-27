<?php
class CartController extends BaseController{

    protected $categoryModel;
    protected $productModel;
    
    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;

        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    public function index()
    {
   
        // echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';die;

        $categoriesMenu     = $this->categoryModel->getCategoryMenu();
        $categories         = $this->categoryModel->getAll();
        $products            = $_SESSION['cart']  ??  [];
        //  echo '<pre>';print_r($products) ;echo '</pre>'; die;
        return $this->view('frontend.carts.index',[
            'menus'         => $categoriesMenu,
            'categories'    => $categories,
            'products'       => $products ,
        ]);
    } 

    //  thêm
    public function store()
    {
        $productId= $_GET['id'] ?? null;
        $product= $this->productModel->findById($productId);
        
      
        if(empty($_SESSION['cart']) || !array_key_exists($productId,$_SESSION['cart']))
        {
            $product['qty']=1;
            $_SESSION['cart'][$productId]= $product;
            
        }
        else
        {
            $product['qty'] = $_SESSION['cart'][$productId]['qty'] + 1;

            $_SESSION['cart'][$productId]= $product;
            
        }
        header('location:index.php?controller=cart');
    }

    public function delete()
    {
        $productId= $_GET['id']?? null;
        unset($_SESSION['cart'][$productId]);
        header('location:index.php?controller=cart');
    }
    
    public function update()
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // die;
        foreach($_POST['qty'] as $productId => $qty)
        {
            if($qty <0)
            {
                continue;
            }
            else if( $qty == 0)
            {
                unset($_SESSION['cart'][$productId]);
            }
            else
            {
                $_SESSION['cart'][$productId]['qty'] =$qty;
            }
        }

        header('location:index.php?controller=cart');
    }

 

    public function destroy()
    {
        unset($_SESSION['cart']);
        header('location:index.php?controller=cart');
    }
}
?>