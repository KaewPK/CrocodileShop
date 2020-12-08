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
            <a class="navbar-brand mb-0 h1" href="#">ข้อมูลการสั่งซื้ออาหารจระเข้<span class="sr-only">(current)</span></a>               

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

     <?php
        include_once('connect.php');
        if(isset($_POST['submit'])){

            $sql = "INSERT INTO tb_ordercro (oCro_list,oCro_num, oCro_price, oCro_date)
            VALUES ('".$_POST["oCro_list"]."','".$_POST["oCro_num"]."','".$_POST["oCro_price"]."','".$_POST["oCro_date"]."')";
 
 
            $result =$conn->query($sql); 
 
            if($result){
                echo'com';
                header('location:Purchasing.php');
            }
            else{
                echo'Fall!';
            }
        }
    ?>

    <div class ="container">
        <div class ="row">
            <div class ="col-md-8 mx-auto mt-5">
                <div class ="card">
                    <form action=""method="POST" enctype="multipart/form-data">
                        <div class ="card-header text-center">
                        บันทึกข้อมูลการสั่งซื้ออาหารจระเข้
                        </div>
                        <div class ="card-body">
                            
                        <div class="form-group row">
                            <label for="id"class="col-sm-3 col-form-label">List</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="oCro_list"name="oCro_list"required>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="picture"class="col-sm-3 col-form-label">Num</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="oCro_num"name="oCro_num"required>
                                </div>
                            </div>
           
                            <div class="form-group row">
                            <label for="categoty"class="col-sm-3 col-form-label">Price</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="oCro_price"name="oCro_price"required>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="categoty"class="col-sm-3 col-form-label">Date</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="oCro_date"name="oCro_date"required>
                                </div>
                            </div>
           
                            <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="col-sm-3 col-form-check-label" for="exampleCheck1">ยืนยันการบันทึก</label>
                            </div>
                        </div>
                        <div class ="card-footer text-center">
                        <input type ="submit" name="submit"class= "btn btn-success" value="OK" >
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>

     <div class="jumbotron">
        <h1 align="center">แสดงข้อมูลการสั่งซื้ออาหารจระเข้</h1>
        <table width="1000" border="1" align="center" bordercolor="#666666">
        <tr>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>รหัสสั่งซื้ออาหารจระเข้</strong></td>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>รายการ</strong></td>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>จำนวน</strong></td>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>วันที่</strong></td>
        </tr>
  
        <?php
            //connect db
            include("connect.php");
            $sql = "select * from tb_ordercro order by oCro_id";  //เรียกข้อมูลมาแสดงทั้งหมด
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
                  echo "<tr>";
                  echo "<td align='center'>" . $row["oCro_id"] . "</td>";
                echo "<td align='center'>" . $row["oCro_list"] . "</td>";
                echo "<td align='center'>" . $row["oCro_num"] . "</td>";
                echo "<td align='center'>" .number_format($row["oCro_price"],2). "</td>";
                echo "<td align='center'>" . $row["oCro_date"] . "</td>";
	            echo "</tr>";
            }
        ?>
        </table>
    </div>
         
    <script src ="node_modules/jquery/dist/jquery.min.js"></script>
    <script src ="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src ="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>
<footer class="page-footer text-white font-small text-color-while pt-2 bg-dark">
    <div class="footer-copyright text-center py-3">© 2018 Copyright: Project Team</div>
</footer>
</html>