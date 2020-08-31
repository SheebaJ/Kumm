<?php
include("conn.php");
session_start();
?>
<html>
<head>
	<title>Display's Selected Company Job Details</title>
      <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>	
</head>
<body >
	<center>
	<div class="card text-center" style="width: 700px;margin-top: 40px">
  <div class="card-body">
  	 <h3 class="card-title text-white bg-dark mb-3">JOB DETAILS</h3>
  	   
	<!-- <div class="row"> -->

	<form action="view_selected.php" method="POST" enctype="multipart/form-data">
		<?php
		$jobid = $_SESSION['jobid'];
		$stdid = $_SESSION['s_id'];
		$result2 = $conn->query("SELECT * FROM vacancy WHERE jobid ='$jobid' ");
		if($result2 -> num_rows > 0)
		{
			while($row = $result2->fetch_assoc())
			{
				$cid = $row['cid'];
			}
		}
		else
		{
			echo " NO DATA FOUND ";	
//echo " error".mysqli_error($conn);	
		}


		$result1 = $conn->query("SELECT * FROM company WHERE cid ='$cid' ");
		if($result1 -> num_rows > 0)
		{
			while($row = $result1->fetch_assoc())
			{
				$cname = $row['cname'];
			}
		}
		else
		{
			echo " NO DATA FOUND ";		
		}


		$result = $conn->query("SELECT * FROM vacancy WHERE jobid='$jobid' ");
		if($result -> num_rows > 0)
		{
			echo "<table>";
			while($row = $result->fetch_assoc())
			{
				$prof = $row['profile'];
				echo "	<tr>
				<th> Company Name </th>
				<td style='font-weight: bold;'>".$cname."</td>
				</tr>
				<tr>
				<th>  Role </th>
				<td >".$row['profile']."</td>
				</tr>
				<tr>
				<th > Salary </th>
				<td style='font-weight: bold;'> ".$row['salary']."</td>
				</tr>
				<tr>
				<th>  location </th>
				<td > ".$row['location']."</td>
				</tr>
				<tr>
				<th>  Experience</th>
				<td >".$row['experience']."</td>
				</tr>
				<tr>
				<th> Fresher </th>
				<td > ".$row['fresher']."</td>
				</tr>
				<tr>
				<th> Bond </h>
				<td >".$row['bond']."</td>
				</tr>
				<tr>
				<th>  Backlogs</th>
				<td >".$row['backlogs']."</td>
				</tr>
				<tr>
				<th> Percentage </th>
				<td >".$row['percentage']."</td>
				</tr>
				<tr>
				<th> Stream </th>
				<td >".$row['stream']."</td>
				</tr>
				<tr>
				<th >  Skills</th>
				<td style='font-weight: bold;'>".$row['skills']."</td>
				</tr> ";
			}
			echo "</table>";
		}
		else
		{
			echo " NO DATA FOUND ";		
		}
		?>
	</div>
		<p style="color: black;text-align: left;font-weight: bolder;">Upload Resume :</p>
		<input type="file" name="filee" class="btn btn-warning" accept="application/pdf"><br><br>
		<button id="btn" name="btn" class="btn btn-primary">Apply</button><br>
				<!-- <button id="btn" name="btn" class="btn btn-primary">Apply</button> -->

		<?php
		if(isset($_POST['btn']))
		{

			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$aid = '';
			for ($i = 0; $i < 5; $i++) 
			{
				$aid .= $characters[rand(0, $charactersLength - 1)];
			}

			$fname = $_FILES["filee"]["name"];
			$tname = $_FILES['filee']['tmp_name'];
			$target = "C:/wamp64/www/placement_cell/resumes/".basename($_FILES['filee']['name']);
			if(move_uploaded_file($_FILES['filee']['tmp_name'] , $target))
			{
				$sql6 = "INSERT INTO applied(aid,stdid,profile,jobid,resume,cid) VALUES('$aid','$stdid','$prof','$jobid','$fname','$cid')";
				if($conn->query($sql6) === TRUE)
				{
					echo "<script type='text/javascript'>alert('Successfully Sent a resume');</script>";
				}
				else
				{
//echo "<script type='text/javascript'>alert('Fail to send a resume');</script>";
					echo " error".mysqli_error($conn);
				}	
			}
			else
			{
				echo "<script type='text/javascript'>alert('Upload PDF files ');</script>";
			}
		}
		?>
	</form>
</div>
</div>
</center>
<div style="margin-right: 200px;margin-top: 10px;">
	<a href="student_home.php"><input type="button" value="Back" style="background-color:red;border:none;float: right;"></a>
</div>
</body>
</html>