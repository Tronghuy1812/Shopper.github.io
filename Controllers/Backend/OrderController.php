<?php
class OrderController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;

        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->loadModel('OrderModel');
        $this->orderModel = new OrderModel;
    }

    public function index()
    {
        $orders= $this->orderModel->getAll();

        return $this->view('backend.orders.index',[
            'orders' => $orders,
        ]);
    }

    public function detail()
    {
        $orderId= $_REQUEST['id'] ?? null;
        $order= $this->orderModel->findById($orderId);
        $products = $this->orderModel->getByOrderDetail($orderId);
  
        return $this->view('backend.orders.detail',[
            'order' => $order,
            'products' => $products ,
        ]);
    }
}