<?php
class OrderModel extends BaseModel
{
    const TABLE= 'orders';
    const TABLES='order_details';
    
    public function getAll($select=['*'],$orderBy=[],$limit=15)
    {
        return $this->all(self::TABLE,$select,$orderBy,$limit);
    }

    public function findById($id)
    {
        return $this->find(self::TABLE,$id);
    }

    public function getByOrderDetail($orderId)
    {
        $sql= 'SELECT * FROM order_details WHERE order_id= "'.$orderId.'" ';
        return $this->getByQuery($sql);
    }

    public function store($input)
    {
        return $this->create(self::TABLE,[
            'code'           => rand(10000,1000000000),
            'customer_name'  => $input['customer_name'] ,
            'customer_email' => $input['customer_email'],
            'customer_phone' => $input['customer_phone'],
        ]);

    }
    
    public function storeOrderDetail($input)
    {
        return $this->create('order_details',[
            'order_id'          => $input['order_id'] ,
            'product_id'        => $input['product_id'],
            'product_name'      => $input['product_name'],
            'product_price'     => $input['product_price'],
            'product_qty'       => $input['product_qty'],
        ]);
    }

    public function getByTotalPrice()
    {
        $sql = "SELECT sum(product_price) as totalPrice  FROM " . self::TABLES ;
        
        return $this->getFirstByQuery($sql);
    }

    public function getTotalOrder()
    {
        $sql = "SELECT count(*) as totalOrder FROM ". self::TABLE;
        return $this->getFirstByQuery($sql);
    }

    public function getNewsOrder()
    {
        $sql="SELECT * FROM orders JOIN order_details ON orders.id=order_details.order_id ORDER BY orders.id DESC LIMIT 2";
        return $this->getByQuery($sql);
    }
    
}
?>