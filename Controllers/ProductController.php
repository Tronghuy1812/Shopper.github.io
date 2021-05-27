<?php

class ProductController extends BaseController
{
    private $productModel;
    public function __construct() 
    {
        // dùng chung chạy đầu tiên
        $this->loadModel('ProductModel'); // load file in ProductModel
        $this->productModel = new ProductModel;
        
        $this->loadModel('ProductImageModel'); // load file in ProductModel
        $this->productImageModel = new ProductImageModel;
          
    }

    public function index()
    {
        $selectColmns=['id', 'name','category_id','price'];
        $orders=['column'=> 'id','order'=> 'desc'];

        $products= $this->productModel->getAll($selectColmns,$orders);
        return $this->view('frontend.products.index',[
            'pageTitle'=>'Trang danh sách sản phẩm',
            'products'=>$products,
        ]);
    }

    public function store()
    {
        $data=[
            'name'           =>'Sách đỏ',
            'price'          =>'25000000',
            'image'          => null,
            'category_id'    =>1
        ];
        $this->productModel->store($data);
    }

    public function update()
    {
        $id=$_GET['id'];
        $data=[
            'name'           =>'Sách đỏ',

        ];
        $this->productModel->updateData($id,$data);
    }

    public function show()
    {
        $productId      = $_GET['id'] ?? null;
        $product        = $this->productModel->Detail($productId);
        
        $products       = $this->productModel->getByCategoryId($product['category_id'], $productId);
        $images   =$this->productImageModel->getByProductId($productId);
        return $this->view('frontend.products.show',[
            'product'  => $product,
            'products' => $products,
            'images'   => $images,
        ]);
    }
}