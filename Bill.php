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
        <a class="navbar-brand mx-auto" href="Bill.php">
        <img src="uploads/LOGO.png" width="300" height="150" alt=""></a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class ="container">
            <a class="navbar-brand" href="index.php">HOME</a>
            <a class="navbar-brand" href="Crocodile.php">CROCODILE</a>
            <a class="navbar-brand" href="Purchase.php">PURCHASE</a>
            <a class="navbar-brand mb-0 h1" href="#">PAYMENT<span class="sr-only">(current)</span></a>
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
    
    <div class="jumbotron">
    <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
        <table width="600" border="0" align="center" class="square">
            <tr>
                <td width="1558" colspan="4" bgcolor="#FFDDBB">
                <strong>การชำระเงิน</strong></td>
            </tr>
            <tr>
                <td bgcolor="#F9D5E3">สินค้า</td>
                <td align="center" bgcolor="#F9D5E3">ราคา</td>
                <td align="center" bgcolor="#F9D5E3">จำนวน</td>
                <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
            </tr>
        <?php
	        $total=0;
	        foreach($_SESSION['cart'] as $cro_id=>$qty)
	    {
		    $sql	= "select * from tb_crocodile where cro_id=$cro_id";
		    $query	= mysqli_query($conn, $sql);
		    $row	= mysqli_fetch_array($query);
		    $sum	= $row['cro_price']*$qty;
		    $total	+= $sum;
            echo "<tr>";
            echo "<td>" . $row["cro_categoty"] . "</td>";
            echo "<td align='right'>" .number_format($row['cro_price'],2) ."</td>";
            echo "<td align='right'>$qty</td>";
            echo "<td align='right'>".number_format($sum,2)."</td>";
            echo "</tr>";
	    }
	    echo "<tr>";
        echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
        echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
        echo "</tr>";
        ?>
        </table>
        <p>    
        <table border="0" cellspacing="0" align="center">
            <tr>
	            <td colspan="2" bgcolor="#CCCCCC">รายละเอียดการชำระเงิน</td>
            </tr>
            <tr>
                <td bgcolor="#EEEEEE">ชื่อ</td>
                <td><input name="name" type="text" id="re_name" required/></td>
            </tr>
            <tr>
  	            <td bgcolor="#EEEEEE">เลขที่ใบเสร็จ</td>
  	            <td><input name="bill" type="text" id="re_bill"  required/></td>
            </tr>
            <tr>
  	            <td bgcolor="#EEEEEE">ธนาคาร</td>
  	            <td><input name="bank" type="text" id="re_bank" required /></td>
            </tr>
            <tr>
	            <td colspan="2" align="center" bgcolor="#CCCCCC">
	            <input type="submit" name="Submit2" value="ยืนยัน" onClick="window.print()"/>
                </td>
            </tr>
        </table><br>
        <h5 align="center">*หากชำระเงินแล้วสามารถรับจระเข้ได้ที่ฟาร์มภายหลัง 7 วัน</h5><br>
        <h3 align="center">วิธีการชำระเงิน</h3>
		<h5 align="center">ธนาคารไทยพาณิชย์ 142-5-85746-9 น.ส.พาวิณี   สาลี</h5>
		<h5 align="center">ธนาคารกรุงเทพ 145-5-96857-9 น.ส.พาวิณี   สาลี</h5><br>  
    </form>
         
    <script src ="node_modules/jquery/dist/jquery.min.js"></script>
    <script src ="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src ="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>
<footer class="page-footer text-white font-small text-color-while pt-2 bg-dark">
    <div class="footer-copyright text-center py-3">© 2018 Copyright: Project Team</div>
</footer>
</html>
