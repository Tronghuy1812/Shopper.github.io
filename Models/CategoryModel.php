<?php

class CategoryModel extends BaseModel{
    const TABLE ='categories';

    public function getAll($select=['*'],$orderBy=[],$limit=15)
    {
        return $this->all(self::TABLE,$select,$orderBy,$limit);
    }

    public function findById($id)
    {
        return $this->find(self::TABLE,$id);
    }

    public function updateData($id, $data)
    {
        $this->update(self::TABLE,$id,$data);
    }

    public function destroy($id)
    {
        $this->delete(self::TABLE, $id);
    }
    // lấy ra menu category 
    public function getCategoryMenu()
    {
        return  $this->getByQuery("SELECT * FROM " . self::TABLE . " WHERE is_home=0 ");
    }
    // lấy ra menu =1
    public function getCategoryMenu_choose()
    {
        return  $this->getByQuery("SELECT * FROM " . self::TABLE . " WHERE is_home=1 ");
    }

    public function createNew($data)
    {
        return $this->create(self::TABLE,$data);
    }
}