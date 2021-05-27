<!-- LOAD VIEWS -->
<!-- LOAD MODEL -->
<?php
class BaseController
{
    public function __construct()
    {
        if(!empty($_GET['module']) && $_GET['module']=='backend' && empty($_SESSION['user']))
        {
         
            header('location:index.php?module=backend&controller=verify');
        }
    }

    const VIEW_FOLDER_NAME ='Views';
    const MODEL_FOLDER_NAME='Models';
    /**
     * Quy tắc về load đường dẫn :
     * + $path name : folderName.fileName
     * + Lấy từ sau thư mục Views
     */
    protected function view($viewPath, array $data =[])
    {
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die;
        foreach($data as $key=>$value)
        {
            $$key = $value;
        }

        require (self::VIEW_FOLDER_NAME.'/'.str_replace('.','/',$viewPath) .'.php');
    }

    protected function loadModel($modelPath)
    {
        require (self::MODEL_FOLDER_NAME.'/'.$modelPath.'.php'); 
    }

    protected function redirect($path)
    {
        header("location:$path");
    }
}