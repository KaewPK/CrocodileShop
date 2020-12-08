<?php session_start(); 
    include("connect.php");
    $cro_id = $_REQUEST['cro_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($cro_id))
	{
		if(isset($_SESSION['cart'][$cro_id]))
		{
			$_SESSION['cart'][$cro_id]++;
		}
		else
		{
			$_SESSION['cart'][$cro_id]=1;
		}
	}

	if($act=='remove' && !empty($cro_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$cro_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $cro_id=>$amount)
		{
			$_SESSION['cart'][$cro_id]=$amount;
		}
	}
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
        <a class="navbar-brand mx-auto" href="Purchase.php">
        <img src="uploads/LOGO.png" width="300" height="150" alt=""></a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class ="container">
            <a class="navbar-brand" href="index.php">HOME</a>
            <a class="navbar-brand" href="Crocodile.php">CROCODILE</a>
            <a class="navbar-brand mb-0 h1" href="#">PURCHASE<span class="sr-only">(current)</span></a>
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

    <div class="jumbotron">
        <form id="frmcart" name="frmcart" method="post" action="?act=update">
            <table width="600" border="0" align="center" class="square">
                <tr>
                    <td colspan="5" bgcolor="#CCCCCC">
                    <b>สั่งซื้อสินค้า</span></td>
                </tr>
                <tr>
                    <td bgcolor="#EAEAEA">สินค้า</td>
                    <td align="center" bgcolor="#EAEAEA">ราคา</td>
                    <td align="center" bgcolor="#EAEAEA">จำนวน</td>
                    <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
                    <td align="center" bgcolor="#EAEAEA">ลบ</td>
                </tr>
                <?php
                    $total=0;
                    if(!empty($_SESSION['cart']))
                    {
	                    include("connect.php");
	                    foreach($_SESSION['cart'] as $cro_id=>$qty)
	                {
		                $sql = "select * from tb_crocodile where cro_id=$cro_id";
		                $query = mysqli_query($conn, $sql);
		                $row = mysqli_fetch_array($query);
		                $sum = $row['cro_price'] * $qty;
		                $total += $sum;
		                echo "<tr>";
		                echo "<td width='334'>" . $row["cro_categoty"] . "</td>";
		                echo "<td width='46' align='right'>" .number_format($row["cro_price"],2) . "</td>";
		                echo "<td width='57' align='right'>";  
		                echo "<input type='text' name='amount[$cro_id]' value='$qty' size='2'/></td>";
		                echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		                //remove product
		                echo "<td width='46' align='center'><a href='Purchase.php?cro_id=$cro_id&act=remove'>ลบ</a></td>";
		                echo "</tr>";
	                }
	                echo "<tr>";
  	                echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	                echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	                echo "<td align='left' bgcolor='#CEE7FF'></td>";
	                echo "</tr>";
                }
                ?>

                <tr>
                    <td colspan="4" align="right">
                        <input type="submit" name="button" id="button" value="ปรับปรุง" />
                        <input type="button" name="Submit2" value="ชำระเงิน" onclick="window.location='Bill.php';" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
         
    <script src ="node_modules/jquery/dist/jquery.min.js"></script>
    <script src ="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src ="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>
<footer class="page-footer text-white font-small text-color-while pt-2 bg-dark">
    <div class="footer-copyright text-center py-3">© 2018 Copyright: Project Team</div>
</footer>
</html>