<?php session_start(); 
    include("connect.php");
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
        <a class="navbar-brand mx-auto" href="Shepherd.php">
        <img src="uploads/LOGO.png" width="300" height="150" alt=""></a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class ="container">
            <a class="navbar-brand mb-0 h1" href="#">ข้อมูลจระเข้<span class="sr-only">(current)</span></a>                

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

            $sql = "INSERT INTO tb_crocodile (cro_id,cro_picture, cro_categoty)
            VALUES ('".$_POST["cro_id"]."','".$_POST["cro_picture"]."','".$_POST["cro_categoty"]."')";
 
 
            $result =$conn->query($sql); 
 
            if($result){
                echo'com';
                header('location:Shepherd.php');
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
                        บันทึกข้อมูลจระเข้
                        </div>
                        <div class ="card-body">
                            
                        <div class="form-group row">
                            <label for="id"class="col-sm-3 col-form-label">ID</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="cro_id"name="cro_id"required>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="picture"class="col-sm-3 col-form-label">Picture</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="cro_picture"name="cro_picture"required>
                                * ใส่ที่อยู่ไฟล์รูปภาพในโฟลเดอร์  uploads/1.jpg
                                </div>
                            </div>
           
                            <div class="form-group row">
                            <label for="categoty"class="col-sm-3 col-form-label">Categoty</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="cro_categoty"name="cro_categoty"required>
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
        <h1 align="center">แสดงข้อมูลจระเข้</h1>
        <table width="1000" border="1" align="center" bordercolor="#666666">
        <tr>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>รหัสจระเข้</strong></td>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>ภาพ</strong></td>
            <td width="200" align="center" bgcolor="#CCCCCC"><strong>ชื่อประเภท</strong></td>
            <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
        </tr>
  
        <?php
            //connect db
            include("connect.php");
            $sql = "select * from tb_crocodile order by cro_id";  //เรียกข้อมูลมาแสดงทั้งหมด
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
                  echo "<tr>";
                  echo "<td align='center'>" . $row["cro_id"] . "</td>";
	            echo "<td align='center'><img src=" . $row["cro_picture"] ."  width='200'></td>";
	            echo "<td align='center'>" . $row["cro_categoty"] . "</td>";
                echo "<td align='center'>" .number_format($row["cro_price"],2). "</td>";
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