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
        <a class="navbar-brand mx-auto" href="Contect.php">
        <img src="uploads/LOGO.png" width="300" height="150" alt=""></a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class ="container">
            <a class="navbar-brand" href="index.php">HOME</a>
            <a class="navbar-brand" href="Crocodile.php">CROCODILE</a>
            <a class="navbar-brand" href="Purchase.php">PURCHASE</a>
            <a class="navbar-brand" href="Bill.php">PAYMENT</a>
            <a class="navbar-brand" href="About.php">ABOUT</a>
            <a class="navbar-brand mb-0 h1" href="#">CONTECT<span class="sr-only">(current)</span></a>                 

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
            <h1 class="display-4o"> CONTECT </h1><br>
            <h5 class="lead"> ที่อยู่ : 1006/95 ตำบล ไสไทย อำเภอเมืองกระบี่ จังหวัดกระบี่ ตู้ไปรษณีย์ 81000 </h5>
            <h5 class="lead"> Email : TeamSE@hotmail.com </h5>
            <h5 class="lead"> เบอร์โทรศัพท์ : 085-697-4759 </h5><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.197283935892!2d98.85356331410016!3d8.081352305336248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDQnNTIuOSJOIDk4wrA1MScyMC43IkU!5e0!3m2!1sth!2sth!4v1554788150384!5m2!1sth!2sth" width="1000" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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
