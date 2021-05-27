<?php 
    session_start();
    require './Core/Database.php';
    require './Core/UploadFile.php';
    require './Helper/Common.php';
    require './Models/BaseModel.php';
    require './Controllers/BaseController.php';
  
    $moduleName= $_GET['module'] ?? null;
    $controllerName= ucfirst((strtolower($_REQUEST['controller'] ?? 'Home')) .'Controller'); // lấy ra controller nào .
    // echo $controllerName. '</br>';
    $actionName=$_REQUEST['action'] ?? 'index'; // lấy ra methob trong class gán vào action 

    $controllerFile = $moduleName ==='backend' ? "./Controllers/Backend/${controllerName}.php" : "./Controllers/${controllerName}.php";

    if(file_exists($controllerFile)) {
        require_once $controllerFile;
    } else {
        echo "<h2>Lỗi file truyền vào ${controllerName}</h2>";
        die();  
    }

    $controllerProject= new $controllerName;
    if(method_exists($controllerProject,$actionName)) {
        $controllerProject->$actionName(); // gọi đến phương thức trong class
    } else {
        echo "<h3>Không tìm thấy ${actionName} trong ${controllerName} </h3>";
    }

    
    

    