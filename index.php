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
            <a class="navbar-brand mb-0 h1" href="#">HOME<span class="sr-only">(current)</span></a>
            <a class="navbar-brand" href="Crocodile.php">CROCODILE</a>
            <a class="navbar-brand" href="Purchase.php">PURCHASE</a>
            <a class="navbar-brand" href="Bill.php">PAYMENT</a>
            <a class="navbar-brand" href="About.php">ABOUT</a>
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
    
     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="uploads/2.jpg" class="rounded mx-auto d-block w-95" >
                  </div>
                  <div class="carousel-item">
                    <img src="uploads/3.jpg" class="rounded mx-auto d-block w-95" >
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>  

    <div class="jumbotron">
        <div class="container text-center">
            <h1 class="display-4o"> CROCODILE FARM </h1>
            <p class="lead"> Crocodile Farm is number one farm For your selling </p>
            <p class="lead"> at unbeatable prices. Our website offers you a sample of our items. </p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img class="card-img-top" src="uploads/จระเข้น้ำจืด1.png" alt="Card image cap">
                        <h4 class="card-title"> แม่พันธุ์จระเข้ </h4>
                        <h6 class="card-text">แม่พันธุ์โตเต็มวัยที่จะผสมพันธุ์ให้เมื่ออายุ 10 ปีขึ้นไปเมื่ออายุได้ประมาณ 20-25 ปีแล้ว การวางไข่ก็จะเริ่มลดลงหรืออาจวางไข่เว้นปี</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center">
                        <br><img class="card-img-top" src="uploads/จระเข้น้ำจืด.png" alt="Card image cap">
                        <h4 class="card-title"> พ่อพันธุ์จระเข้ </h4>
                        <h6 class="card-text"> ตัวผู้จะโตเต็มวัยที่จะผสมพันธุ์ได้เมื่ออายุ 10 ปีขึ้นไปและสามารถที่จะผสมพันธุ์ได้เรื่อยๆ โดยไม่จำกัดอายุ </h6>
                    </div>
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