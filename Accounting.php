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
        <a class="navbar-brand mx-auto" href="index.php">
        <img src="uploads/LOGO.png" width="300" height="150" alt=""></a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class ="container">
            <a class="navbar-brand mb-0 h1" href="#">Rrport<span class="sr-only">(current)</span></a>       

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

     <div class ="container">
        <div class ="row">
            <div class ="col-md-8 mx-auto mt-5">
                <div class ="card">
                    <form action=""method="POST" enctype="multipart/form-data">
                        <div class ="card-header text-center">
                        รายงานระบบ
                        </div>
                        <div class ="card-footer text-center">
                        <a class="btn btn-primary" href="ReportMember.php" role="button">รายงานข้อมูลลูกค้า</a>
                        </div>
                        <div class ="card-footer text-center">
                        <a class="btn btn-secondary" href="ReportCrocodile.php" role="button">รายงานข้อมูลจระเข้</a>
                        </div>
                        <div class ="card-footer text-center">
                        <a class="btn btn-success" href="ReportOrder.php" role="button">รายงานข้อมูลการสั่งซื้อจระเข้</a>
                        </div>
                        <div class ="card-footer text-center">
                        <a class="btn btn-warning" href="ReportPayment.php" role="button">รายงานข้อมูลชำระเงิน</a>
                        </div>
                        <div class ="card-footer text-center">
                        <a class="btn btn-info" href="ReportFoodCro.php" role="button">รายงานข้อมูลสั่งซื้ออาหารจระเข้</a>
                        </div>
                    </form>
                </div>
            </div>
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