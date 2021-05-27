<?php
class UserModel extends BaseModel
{
    const TABLE='users';

    
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

    public function createNew($data)
    {
        $this->create(self::TABLE,$data);
    }
    public function destroy($id)
    {
        $this->delete(self::TABLE, $id);
    }
    
    public function checkEmailPassword($email,$password)
    {   
        $sql= 'SELECT * FROM '. self::TABLE . " WHERE email= '".$email."' AND password='".md5($password)."'  ";

        return $this->getFirstByQuery($sql);
    }
    // lấy ra tổng thành viên 
    public function getByTotalMember()
    {
        $sql = 'SELECT count(*) as totalMember From '. self::TABLE;
        return $this->getFirstByQuery($sql);
    }
}

?>