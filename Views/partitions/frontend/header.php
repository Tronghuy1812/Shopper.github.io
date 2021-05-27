<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopper</title>
    <link rel="shortcut icon" href="./public/frontend/images/shopper-com-logo.png" />
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css">
    <link rel="stylesheet" href="./public/frontend/css/style.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="./public/frontend/css/stylesheet.css">
    <link rel="stylesheet" href="./public/frontend/css/jquery.fancybox.css">
    <link rel="stylesheet" href="./public/frontend/css/style.css">
    <!-- style giỏ hàng -->
    <link rel="stylesheet" href="./public/frontend/css/scroll.css">


    <link rel="stylesheet" href="./public/frontend/css/style_cart.css">
    <link rel="stylesheet" href="./public/frontend/css/style_user.css">

    <style>
        footer .container .row-footer .item >ul li {
        display: inline-block;
        }
        .carts_qty{
            position: relative;
      
            
        }
        span.order_qty{
            color: rgb(36, 36, 36);
            background: rgb(253, 216, 53);
            height: 18px;
            width: 20px;
            left: 13px;
            top: -8px;
            border-radius: 40px;
            display: inline-block;
            text-align: center;
            line-height: 20px;
            font-size: 13px;
            font-weight: 500;
            position: absolute;
            padding: 0px 7px;
            
            
        }
        .carts_qty:hover span.order_qty {
            color: #ff6f61;
        }

    </style>
</head>
<body>
<line-header>
    <div class="container">
        <div class="row row-column">
            <div class="left">⚡ HAPPY HOLIDAY DEALS ON EVERYTHING ⚡</div>
            <div class="right">
                <a href="">Shipping</a>
                <a href="">FAQ</a>
                <a href="">Contact</a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-google-plus-g"></i></a>
            </div>
        </div>
    </div>
</line-header>
<header>
    <div class="container">
        <div class="row rowAlign row-column">
            <div class="logo">
                <a href="index.php" class="logo-to">
                    <img src="./public/frontend/images/Capture.png" alt="">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <?php 
                    if(!empty($menus)) :
                        foreach($menus as $menu) :  ?>
                            <li><a href="index.php?controller=category&action=show&id=<?=$menu['id']?>"><?=$menu['name']?></a></li>
                        <?php  endforeach; endif; ?>
                </ul>
            </div>
            <div class="subFunctional">
                <a href=""><i class="far fa-search"></i></a>
                <a href=""><i class="fal fa-heart"></i></a>
                <a href="#"  >
                    <i class="fal fa-user" >
                    </i>
                </a>
                <a href="index.php?controller=cart" class="carts_qty"><i class="fal fa-shopping-cart"><span class="order_qty"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span></i></a>

                <div class="login">
                    <ul class="sublogin">
                        <li><i class="fas fa-sign-in-alt"></i><a href="index.php?controller=customer">Đăng nhập</a></li>
                        <li><i class="fas fa-sign-out-alt"></i><a href="index.php?controller=customer&action=logout">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</header>


