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
        <a class="navbar-brand mx-auto" href="login.php">
        <img src="uploads/LOGO.png" width="300" height="150" alt=""></a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class ="container">
            <a class="navbar-brand mb-0 h1" href="index.php">HOME<span class="sr-only">(current)</span></a>
            <a class="navbar-brand" href="Crocodile(freshwater).php">CROCODILE</a>
            <a class="navbar-brand" href="Purchase.php">PURCHASE</a>
            <a class="navbar-brand" href="Bill.php">PAYMENT</a>
            <a class="navbar-brand" href="About.php">ABOUT</a>
            <a class="navbar-brand" href="Contect.php">CONTECT</a>                 

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-link" href="register.php">Register</a>
                        <a>|</a>
                        <a class="btn btn-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
     </nav>
    
     
     <?php
        include_once('connect.php');
        
        if(isset($_POST['submit'])){
            $username = $_POST['m_username'];
            $password = $conn->real_escape_string($_POST['m_password']);
        
            $sql ="SELECT * FROM `tb_member` WHERE `m_username` = '".$username."' AND `m_password` = '".$password."'";
                 $result =$conn->query($sql);

            if($result ->num_rows >0){
                $row =$result->fetch_assoc();
                $_SESSION['id'] =$row['m_id'];
                $_SESSION['name'] =$row['m_name'];
                $_SESSION["position"] = $row["m_position"];

                      if($_SESSION["position"]=="Shepherd"){ //ถ้าเป็น ผู้เลี้ยง
                        Header("Location: Shepherd.php");
                      }

                      if($_SESSION["position"]=="Farmer"){ //ถ้าเป็น เจ้าของฟาร์ม
                        Header("Location: Farmer.php");
                      }

                      if($_SESSION["position"]=="Marketing"){ //ถ้าเป็น ฝ่ายขาย
                        Header("Location: Marketing.php");
                      }

                      if($_SESSION["position"]=="Finance"){ //ถ้าเป็น ฝ่ายการเงิน
                        Header("Location: Finance.php");
                      }

                      if($_SESSION["position"]=="Accounting"){ //ถ้าเป็น ฝ่ายบัญชี
                        Header("Location: Accounting.php");
                      }

                      if($_SESSION["position"]=="Purchasing"){ //ถ้าเป็น ฝ่ายจัดซื้อ
                        Header("Location: Purchasing.php");
                      }
 
                      if ($_SESSION["position"]=="User"){  //ถ้าเป็น ลูกค้า
                        Header("Location: index.php");
                      }
            }
            else{
                echo 'Username and Password is invaild';
            }
        }
     ?>
           
    <div class ="container">
        <div class ="row">
            <div class ="col-md-8 mx-auto mt-5">
                <div class ="card">
                    <form action=""method="POST">
                        <div class ="card-header text-center">
                            Log in to Your Account !!!
                        </div>
                        <div class ="card-body">
                            <div class="form-group row">
                                <label for="username"class="col-sm-3 col-form-label">Username</label>
                                <div class ="col-sm-9">
                                    <input type ="text" class="form-control" id ="m_username"name="m_username" required="required">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"class="col-sm-3 col-form-label">Password</label>
                                <div class ="col-sm-9">
                                    <input type ="password"class="form-control"id ="m_password"name="m_password" required="required">
                                </div>
                            </div>
                        </div>
                        <div class ="card-footer text-center">
                            <input type ="submit" name="submit"class= "btn btn-success" value="Login">
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