<?php
	session_start();
    include("connect.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
	$name = $_REQUEST["name"];
	$bill = $_REQUEST["bill"];
	$bank = $_REQUEST["bank"];
	$total_qty = $_REQUEST["total_qty"];
	$total = $_REQUEST["total"];
	//บันทึกการสั่งซื้อลงใน payment
	mysqli_query($conn, "BEGIN"); 
	$sql1	= "insert into payment values(null, '$name', '$bill', '$bank', '$total_qty', '$total')";
	$query1	= mysqli_query($conn, $sql1);
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "select max(p_id) as p_id from payment where p_name='$name' and p_bill='$bill' and p_bank='$bank' ";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);
	$p_id = $row["p_id"];
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $cro_id=>$qty)
	{
		$sql3	= "select * from tb_crocodile where cro_id=$cro_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['cro_price']*$qty;
		
		$sql4	= "insert into order values(null, '$p_id', '$cro_id', '$qty', '$total')";
		$query4	= mysqli_query($conn, $sql4);
	}
	
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $cro_id)
		{	
			//unset($_SESSION['cart'][$cro_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='Crocodile.php';
</script>
</body>
</html>