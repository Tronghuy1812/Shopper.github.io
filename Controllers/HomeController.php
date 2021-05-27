<?php
class HomeController extends BaseController {

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
        $param= $_GET;

        $categoriesMenu     = $this->categoryModel->getCategoryMenu();
        $category           = $this->categoryModel->getCategoryMenu_choose();
        $products           = !$param ? $this->productModel->getAll() : $this->productModel->search($param);
        $categories         = $this->categoryModel->getAll();
        // echo '<pre>';
        // print_r($param);
        // echo '</pre>';
        
        $this->view('frontend.home.index',[
            'menus'           =>$categoriesMenu,
            'categoryChoose'  =>$category,
            'products'        =>$products,
            'categories'      =>$categories,    
            
        ]);
    }
    
}