<?php session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crocodile Store</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand mx-auto" href="About.php">
        <img src="uploads/LOGO.png" width="300" height="150" alt=""></a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class ="container">
            <a class="navbar-brand" href="index.php">HOME</a>
            <a class="navbar-brand" href="Crocodile.php">CROCODILE</a>
            <a class="navbar-brand" href="Purchase.php">PURCHASE</a>
            <a class="navbar-brand" href="Bill.php">PAYMENT</a>
            <a class="navbar-brand mb-0 h1" href="#">ABOUT<span class="sr-only">(current)</span></a>
            <a class="navbar-brand" href="Contect.php">CONTECT</a>                 

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['id'])){ ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ยินดีต้อนรับ <?php echo  $_SESSION['name'];?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php }  else   { ?>   
                    <li class="nav-item">
                        <a class="btn btn-link" href="register.php">Register</a>
                        <a>|</a>
                        <a class="btn btn-link" href="login.php">Login</a>
                    </li>
                <?php }  ?> 
                </ul>  
            </div>
        </div>
     </nav>

    <div class="jumbotron">
        <div class="container text-center">
            <h1 class="display-4o"> CROCODILE FARM </h1><br>
            <img class="card-img-top" src="uploads/4.jpg" alt="" style="width:65%"><br>
            <p class="lead">  CROCODILE FARM ดำเนินธุรกิจโดยไทยรุ่งโรจน์ฟาร์มประกอบกิจการเพาะเลี้ยงจระเข้สายพันธุ์ไทย (Crocodylus Siamensis) ตั้งแต่ปีพุทธศักราช 2540 ซึ่งก่อตั้งโดยคุณ มณีโชค พาดี เจ้าของฟาร์ม ปัจจุบันเป็นผู้เพาะเลี้ยงและจำหน่ายลูกพันธุ์จระเข้ จระเข้ขุน และไข่จระเข้สำหรับการประกอบอาหารที่มีคุณภาพจำนวนมาก </p>
        </div>
    </div>
         
    <script src ="node_modules/jquery/dist/jquery.min.js"></script>
    <script src ="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src ="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>
<footer class="page-footer text-white font-small text-color-while pt-2 bg-dark">
    <div class="footer-copyright text-center py-3">© 2018 Copyright: Project Team</div>
</footer>
</html>
