<?php
class ProductModel extends BaseModel{
    const TABLE ='products';

    public function getAll($select=['*'],$orderBy=[],$limit=15)
    {
        return $this->all(self::TABLE,$select,$orderBy,$limit);
    }

    public function findById($id)
    {
        return $this->find(self::TABLE,$id);
    }

    // lấy ra danh sách sản phẩm có cùng danh mục
    public function getByCategoryId($categoryId,$productId=null)
    {
        $sql= " SELECT * FROM " .self::TABLE." WHERE category_id=$categoryId";
        if($productId)
        {
            $sql="SELECT * FROM ".self::TABLE . " WHERE category_id=${categoryId} and id !=${productId}";
        }
        return $this->getByQuery($sql);
        
    }
    // lấy ra sản phẩm theo id chuyền vào / xử lý đang ở danh mục nào (products -> detail)
    public function Detail($id)
    {
        $sql= " SELECT products.*, categories.name as category_name FROM ".self::TABLE ." JOIN  categories ON products.category_id=categories.id WHERE products.id=${id} ";
        return $this->getFirstByQuery($sql);
    }
    // search product
    public function search(array $input = [])
    {

        $sql= "SELECT * FROM products";
        if(!empty($input['product_name']))
        {
            $whereName = "name LIKE  '%".$input['product_name']."%'";
            $sql .= " WHERE  ${whereName}";
        }

        $wherePriceCheck= false;
        if(!empty($input['start_price']) && !empty($input['end_price']))
        {
            $wherePriceCheck=true;
            $wherePrice= "price >=".$input['start_price']." AND price <=". $input['end_price'];
            if(empty($input['product_name']))
            {
                $sql .= " WHERE ${wherePrice}";
            }
            else
            {
                $sql .= " AND ${wherePrice}";
            }
        }

        if(!empty($input['category_id']))
        {
            $whereCategory= 'category_id='.$input['category_id'];
            if($wherePriceCheck || !empty($input['product_name']))
            {
                $sql .= " AND ${whereCategory}";
            }

            if(empty($input['product_name']) && !$wherePriceCheck )
            {
                $sql .= " WHERE ${whereCategory}";
            }
        }
        // echo $sql;
        return $this->getByQuery($sql);
    }

    public function store($data)
    {
        $this->create(self::TABLE,$data);
    }

    public function getProducts()
    {
        $sql= "SELECT products.* , categories.name as category_name FROM products JOIN categories ON products.category_id=categories.id ORDER BY ID DESC";
        return $this->getByQuery($sql);
    }

    public function updateData($id, $data)
    {
        $this->update(self::TABLE,$id,$data);
    }

    public function createNew($data)
    {
        $this->create(self::TABLE,$data);
    }

    public function destroy($id)
    {
        $this->delete(self::TABLE, $id);
    }

    public function getTotalProduct()
    {
        $sql= " SELECT count(*) as totalProduct FROM ". self::TABLE;
        return $this->getFirstByQuery($sql);
    }

}