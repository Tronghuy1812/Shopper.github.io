<?php
class ProductImageModel extends BaseModel {
    const TABLE = 'product_images';

    public function createNew($data)
    {
        return $this->create(self::TABLE,$data);
    }

    public function getByProductId($product_id)
    {
        $sql = "SELECT * FROM " . self::TABLE ." WHERE product_id= '".$product_id."'";
        return $this->getByQuery($sql);
    }

    public function destroy($id)
    {
        $this->delete(self::TABLE, $id);
    }
}

?>