<?php
include 'conn.php';

if(isset($_POST['name']) and isset($_POST['phoneno']) and isset($_POST['mailid']) and isset($_POST['address']) and isset($_POST['cpass']) and isset($_POST['cid']))
	{
		$name = $_POST['name'];
		$phoneno = $_POST['phoneno'];
		$mailid = $_POST['mailid'];
		$address = $_POST['address'];
		$cpass = $_POST['cpass'];
		// $cid = $_POST['cid'];
		
		// $sql2 = "INSERT INTO company (cid,cname,cphoneno,cmail,caddress,cpassword) VALUES('$cid','$name','$phoneno','$mailid','$address','$cpass')";

		$sql2 = "INSERT INTO company (cname,cphoneno,cmail,caddress,cpassword) VALUES('$name','$phoneno','$mailid','$address','$cpass')";
		if($conn->query($sql2))
		{
			alert("registered");
		}
		else
		{
			alert("not registered");
		}
	}
?>