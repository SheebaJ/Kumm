<?php
include("conn.php");
?>
<html>
<head>
	<title>Send Email</title>

	<style type="text/css">
		* {
  box-sizing: border-box;
}

		body{
 
      background-image:linear-gradient(rgba(0,0,0,0.25),rgba(0,0,0,0.25)), url(12.jpg);
      background-size: cover;

		}
	#to
{
height: 38px;
width: 360px;
color: black;
border: none;
outline: none;
border-radius: 3px;
border-bottom: 1px solid #000;
text-align: center;
font-size: 16px;
}
#sub
{
height: 38px;
width: 360px;
color: black;
border: none;
outline: none;
border-radius: 3px;
border-bottom: 1px solid #000;
text-align: center;
font-size: 16px;
}
#message
{
background-color: #000000b3;
color: white;
border: none;
outline: none;
text-align: center;
border-radius: 10px;
border-bottom: 1px solid white;
margin-bottom: 1px;
font-size: 16px;
}
#btn
{
cursor: pointer;
height: 37px;
background-color: #000000b3;
color: white;
border: 2px solid white;
border-radius: 10px;
padding: 3px;
width: 150px;
margin-left: 300%;
margin-top: 10px;
font-size: 17px;
}
#btn1
{
cursor: pointer;
height: 37px;
background-color: #24a0ed;
color: white;
border: 2px solid white;
border-radius: 10px;
padding: 3px;
width: 150px;
margin-left: 300%;
margin-top: 10px;
font-size: 17px;
}
	.column {
	float: left;
	width: 50%;
	padding: 10px;
	height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
	content: "";
	display: table;
	clear: both;
}
#bx
{margin-top: 120px;
	    background:#ffffff ;
        overflow: hidden;
        opacity: 0.9;
         width:50%;
}
</style>

<script type="text/javascript">
	function send()
	{
		var to = document.getElementById("to").value;
		var sub = document.getElementById("sub").value;
		var msg = document.getElementById("message").value;

		if(sub == '')
		{
			alert("Please Enter Subject");
		}
		else if(msg == '')
		{
			alert("Please Enter Your Message");
		}
		else
		{
			var obj = new XMLHttpRequest();
			obj.onreadystatechange = function()
			{
				if(this.readyState == 4 && this.status == 200)
				{
					var response = this.responseText;
					if(response == 1)
					{
						alert("Email Sent");
					}
					else if(response == 0)
					{
						alert("Unable to Send Email");
					}
				}
			};
			obj.open("POST","AJAX.php");
			obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			obj.send("to="+to+"&sub="+sub+"&msg="+msg);
		}
	}

</script>
</head>


	<!-- <form action="view_resume.php" method="POST"> -->
			<br>
<body>			<div class="row">

							<div class='column'>

					<?php
					session_start();
					$cid = $_SESSION['c_id']; 
					$aid = $_SESSION['aid'];
					$result4 = $conn->query("SELECT * FROM applied WHERE aid = '$aid' ");
					if($result4 -> num_rows > 0)
					{
						while($row = $result4->fetch_assoc())
						{
							$student = $row['stdid'];
							$file = "resumes/".$row['resume'];
						}
						echo "<embed src='".$file."' type='application/pdf' width='100%'' height='690px' />";
					}
					?>
					<br><br><br><br>
				</div>
				<div class='column'>
					
						<?php
						$result1 = $conn->query("SELECT * FROM student WHERE stdid ='$student' ");
						if($result1 -> num_rows > 0)
						{
							while($row = $result1->fetch_assoc())
							{
								$email = $row['emailid'];
							}
						}
						else
						{
							echo "No Data Found";
						}
						echo "
						<table style='padding:60px;' id='bx'>
						<tr>
						<td><h5>TO </h5></td>
						<td><input type='text' id='to' name='to' value=".$email."></td>
						</tr>
						<tr>
						<td><h3>Subject </h3></td>
						<td><input type='text' id='sub' name='sub' autocomplete='off'></td>
						</tr>
						<tr>
						<td><h3>Message </h3></td>
						<td><textarea id='message' name='message' cols='50' rows='10'></textarea></td>
						</tr>
						<tr>
						<td><button onclick='send()' id='btn1'>Send Mail</button></td>
						</tr>
						<tr>
						<td><a href='view_profile.php'><button id='btn' name='btn'>Back</button></a></td>
						</tr>
						</table>";
						?>
						<a href="company_login.php"><button id="btn" name="btn" >Back</button></a>

				</div>
		
		<!-- </form> -->
							</div>

	</body>
	</html>