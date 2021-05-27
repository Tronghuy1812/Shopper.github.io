<?php
class DashboarController extends BaseController {

    protected $orderModel;
    protected $userModel;
    protected $productModel;

    public  function __construct()
    {
        parent::__construct(); // chống ghi đè construct đã có ở BaseController
        $this->loadModel('OrderModel');
        $this->orderModel= new OrderModel;

        $this->loadModel('UserModel');
        $this->userModel= new UserModel;

        $this->loadModel('ProductModel');
        $this->productModel= new ProductModel;


    }
    public function index()
    {
        $totalPriceOrder = $this->orderModel->getByTotalPrice();
        $totalUser       = $this->userModel->getByTotalMember();
        $totalOrder      = $this->orderModel->getTotalOrder();
        $totalProduct    = $this->productModel->getTotalProduct();

        $user          = $this->userModel->getAll(['*'],['id' => 'id desc']);

        return $this->view('backend.dashboar.index',[
            'price_total'   => $totalPriceOrder,
            'totalUser'     => $totalUser,
            'totalOrder'    => $totalOrder,
            'totalProduct'  => $totalProduct,
            'users'     => $user,
        ]);
    }

}

?>