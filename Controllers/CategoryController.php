<?php

class CategoryController extends BaseController{

    
    private $categoryModel;
    private $productModel;
    
    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel= new CategoryModel;

        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    public function index()
    {
        $categories=$this->categoryModel->getAll(['*'],['col'=>'id','order'=>'desc']);
        return $this->view('frontend.categories.index',[
            'categories'=>$categories,
            
        ]);

    }

    public function store()
    {
        echo __METHOD__;
    }

    public function update()
    {
        $id=$_GET['id'];
        $data=[
            'name'           =>'Sách Tri Thức',

        ];
        $this->categoryModel->updateData($id,$data);
    }

    public function show()
    {
        $params= $_GET;

        $categoryId=$_GET['id'] ?? null;
        $params['category_id'] =$categoryId; // thêm array category_id = ... để khi search luon trong danh mục đó
        // echo '<pre>';
        // print_r($params);
        // echo '</pre>';
        
        $categoriesMenu        = $this->categoryModel->getCategoryMenu();
        $categoryName          = $this->categoryModel->findById($categoryId);
        $products              = !$params ? $this->productModel->getByCategoryId($categoryId) : $this->productModel->search($params);
        $categories            = $this->categoryModel->getAll();

        return $this->view('frontend.categories.show',[
            'menus'         => $categoriesMenu,
            'categoryName'  => $categoryName,
            'products'      => $products,
            'categories'    => $categories,
        ]);
          
    }

    public function delete()
    {
        $id=$_GET['id'];
        $this->categoryModel->destroy($id);
    }
}