<?php session_start(); 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
        include_once('connect.php');
        if(isset($_POST['submit'])){

            $sql = "INSERT INTO tb_member (m_name, m_username, m_password, m_email, m_address, m_phone, m_position)
            VALUES ('".$_POST["m_name"]."','".$_POST["m_username"]."','".$_POST["m_password"]."'
            ,'".$_POST["m_email"]."','".$_POST["m_address"]."','".$_POST["m_phone"]."','".$_POST["m_position"]."')";
 
 
            $result =$conn->query($sql); 
 
            if($result){
                echo'com';
                header('location:login.php');
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
                        Register
                        </div>
                        <div class ="card-body">
                            <div class="form-group row">
                            <label for="firstname"class="col-sm-3 col-form-label">Name</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="m_name"name="m_name"required>
                                </div>
                            </div>
           
                            <div class="form-group row">
                            <label for="username"class="col-sm-3 col-form-label">Username</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="m_username"name="m_username"required>
                                </div>
                            </div>
            
                            <div class="form-group row">
                            <label for="password"class="col-sm-3 col-form-label">Password</label>
                                <div class ="col-sm-9">
                                <input type ="password"class="form-control"id ="m_password"name="m_password"required>
                                </div>
                            </div>
           
                            <div class="form-group row">
                            <label for="email"class="col-sm-3 col-form-label">Email</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="m_email"name="m_email"required>
                                </div>
                            </div>
        
                            <div class="form-group row">
                            <label for="addess"class="col-sm-3 col-form-label">Addess</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="m_address"name="m_address"required>
                                </div>
                            </div>
            
                            <div class="form-group row">
                            <label for="number"class="col-sm-3 col-form-label">Phone</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="m_phone"name="m_phone"required>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="number"class="col-sm-3 col-form-label">Position</label>
                                <div class ="col-sm-9">
                                <input type ="text" class="form-control" id ="m_position"name="m_position"required>
                                * ถ้าเป็นลูกค้ากรุณากรอกคำว่า"๊User"เพื่อระบุตำแหน่งในการเข้าใช้
                                </div>
                            </div>
           
                            <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="col-sm-3 col-form-check-label" for="exampleCheck1">ยืนยันการสมัคร</label>
                            </div>
                        </div>
                        <div class ="card-footer text-center">
                        <input type ="submit" name="submit"class= "btn btn-success" value="Register" >
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
</html>