<?php
class BaseModel extends Database {
    protected $connect;

    public function __construct()
    {
        $this->connect=$this->connect();
    }
    public function all($table, $select=['*'], $orderBys = [],$limit=15 )
    {
        // echo '<pre>';
        // print_r($orderBys);
        // echo  implode(',',$select);
        // echo '</pre>';
        // die;
        $colunm= implode(',',$select);
        $orderByString= implode(' ',$orderBys);
        // echo '<pre>' ;print_r($orderByString) ;echo '</pre>';
        // die;
        if($orderByString)
        {
            $sql="SELECT ${colunm} FROM ${table} ORDER BY ${orderByString} LIMIT ${limit}";
        }
        else
        {
            $sql="SELECT ${colunm} FROM ${table} LIMIT ${limit}";
        }
        
        $query=$this->_query($sql);

        $data=[];
        while($row= mysqli_fetch_assoc($query))
        {
            array_push($data,$row);
        }
        return $data;
    }
    // 

    public function getByQuery($sql)
    {
        $query=$this->_query($sql);
        $data=[];
        while($row= mysqli_fetch_assoc($query))
        {
            array_push($data,$row);
        }
        return $data;
    }
    // lấy ra 1 ban ghi dữ liệu
    public function getFirstByQuery($sql)
    {
        $query=$this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
    /**
     * Lấy ra 1 bản ghi trong bang 
     */
    public function find($table,$id)
    {
        $sql= "SELECT * FROM ${table} WHERE id=${id} LIMIT 1";
        $query=$this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    /**
     * Thêm dữ liệu vao bang 
     */
    public function create($table,$data=[])
    {   
        // echo $table;
        // echo '<pre>'; 
        // print_r($data);
        // echo '</pre>'; 
        // die;
        $columns= implode(',',array_keys($data));

        $values = implode(',',array_values($data));
        $newValues = array_map(function ($value){
            return "'". $value ."'";
        },array_values($data));

        $newValues=implode(',', $newValues);

        $sql="INSERT INTO ${table}(${columns}) VALUES(${newValues}) ";

        $this->_query($sql);
        // order detail xử lý
        
        return $this->getFirstByQuery("SELECT * FROM ${table} ORDER BY ID DESC LIMIT 1");
    }
    /**
     * update dữ liệu vao bang 
     */
    public function update($table, $id, $data)
    {   
        $dataSet=[];
        
        foreach($data as $key=> $val)
        {
            array_push($dataSet,"${key}='".$val."'");
        }
        // echo '<pre>';print_r($dataSet) ;echo '</pre>';
        $dataSetString=implode(',',$dataSet);
        //  echo '<pre>';print_r($dataSetString) ;echo '</pre>';

        $sql="UPDATE ${table} SET ${dataSetString}  WHERE id = ${id}";
 
        $this->_query($sql);

    }
    /**
     * Delete dữ liệu vao bang 
     */
    public function delete($table,$id)
    {   
        $sql="DELETE FROM ${table}  WHERE id = ${id}";
        $this->_query($sql);

    }

    private function _query($sql)
    {
       return  mysqli_query($this->connect(), $sql);
    }
}