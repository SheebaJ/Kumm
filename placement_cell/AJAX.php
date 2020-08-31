<?php
	include("conn.php");
		// Code belongs to Company_login Page
	if(isset($_REQUEST['user']) and isset($_REQUEST['pass']))
	{
		$username = $_REQUEST['user'];
		$password = $_REQUEST['pass'];

		$result = $conn->query("SELECT * FROM company WHERE cname = '$username' and cpassword = '$password' ");
		if($result -> num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($username == $row['cname'] and $password == $row['cpassword'])
				{
					session_start();
					$_SESSION['c_id'] = $row['cid'];
					echo "1";
				}
				else
				{
					echo "01";		
				}
			}
		}
		else
		{
			echo "0";
		}
	}


			// Code belongs to Student_login Page
	elseif(isset($_REQUEST['user1']) and isset($_REQUEST['pass1']))
	{
		$username = $_REQUEST['user1'];
		$password = $_REQUEST['pass1'];

		$result = $conn->query("SELECT * FROM student WHERE name = '$username' and spassword = '$password' ");
		if($result -> num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($username == $row['name'] and $password == $row['spassword'])
				{
					session_start();
					$_SESSION['s_id'] = $row['stdid'];
					echo "1";
				}
				else
				{
					echo "01";
				}
			}
		}
		else
		{
			echo "0";
		}
	}
 

		// code belongs to company registration
	elseif(isset($_REQUEST['name']) and isset($_REQUEST['phoneno']) and isset($_REQUEST['mailid']) and isset($_REQUEST['address']) and isset($_REQUEST['cpass']))
	{
		$name = $_REQUEST['name'];
		$phoneno = $_REQUEST['phoneno'];
		$mailid = $_REQUEST['mailid'];
		$address = $_REQUEST['address'];
		$cpass = $_REQUEST['cpass'];
		

		$sql2 = "INSERT INTO company (cname,cphoneno,cmail,caddress,cpassword) VALUES('$name','$phoneno','$mailid','$address','$cpass')";	
		if($conn->query($sql2) === TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}


	// Code Belongs to Student Registration
	elseif(isset($_REQUEST['sname']) and isset($_REQUEST['dob']) and isset($_REQUEST['mobile']) and isset($_REQUEST['gen']) and isset($_REQUEST['email']) and isset($_REQUEST['add']) and isset($_REQUEST['branch']) and isset($_REQUEST['dper']) and isset($_REQUEST['spassword']) and isset($_REQUEST['sid']))
	{
		$sid = $_REQUEST['sid'];
		$sname = $_REQUEST['sname'];
		$dob = $_REQUEST['dob'];
		$mobile = $_REQUEST['mobile'];
		$gen = $_REQUEST['gen'];
		$email = $_REQUEST['email'];
		$add = $_REQUEST['add'];
		$branch = $_REQUEST['branch'];
		$dper = $_REQUEST['dper'];
		$spass = $_REQUEST['spassword'];

		$sql1 = "INSERT INTO student (stdid,name,dob,mobilenumber,gender,emailid,aggrperc,address,branch,spassword) VALUES ('$sid','$sname','$dob','$mobile','$gen','$email','$dper','$add','$branch','$spass')";
		if($conn->query($sql1) === TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
			//echo " error".mysqli_error($conn);
		}
	}


		// code belongs to add vacancy
	elseif(isset($_REQUEST['a']) and isset($_REQUEST['b']) and isset($_REQUEST['c']) and isset($_REQUEST['d']) and isset($_REQUEST['e']) and isset($_REQUEST['f']) and isset($_REQUEST['g']) and isset($_REQUEST['h']) and isset($_REQUEST['i']) and isset($_REQUEST['j']) and isset($_REQUEST['jobid'])) 
	{
		$a = $_REQUEST['a'];
		$b = $_REQUEST['b'];
		$c = $_REQUEST['c'];
		$d = $_REQUEST['d'];
		$e = $_REQUEST['e'];
		$f = $_REQUEST['f'];
		$g = $_REQUEST['g'];
		$h = $_REQUEST['h'];
		$i = $_REQUEST['i'];
		$j = $_REQUEST['j'];
		$jobid = $_REQUEST['jobid'];

		session_start();
		$cid1 = $_SESSION['c_id'];

		$sql3 = "INSERT INTO vacancy (cid,profile,salary,location,bond,experience,fresher,percentage,backlogs,stream,skills,jobid) VALUES ('$cid1','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$jobid')";

		if($conn->query($sql3) === TRUE)
		{
			echo "1";
		
		}
		else
		{
			echo "0";
		}
	}	
 

	// Code Belongs to Display a table to edit
	elseif(isset($_REQUEST['profile1']))
	{
		session_start();
		$cid2 = $_SESSION['c_id'];
		$profile1 = $_REQUEST['profile1'];
		$result = $conn->query("SELECT * FROM vacancy WHERE jobid = '$profile1' and cid = '$cid2' ");
			if($result -> num_rows > 0)
			{
				echo "<table id='edit'> ";
				while($row = $result->fetch_assoc())
				{
					echo "	
	
						<tr> 
						<td style='color:black;'>Salary</td>
						<td ><input type='text' id='salary' name='salary' value=".$row['salary']." 
						style='text-align:left;border-bottom: 1px solid black;width: 250px;'></td>
						<td>Location</td>
						<td><input type='text' id='location' name='location' value=".$row['location']." style='text-align:left;      border-bottom: 1px solid black;      width: 250px;
'></td>
					</tr>
					<tr>
						<td>Bond</td>
						<td><input type='text' id='bond' name='bond' value=".$row['bond']." style='text-align:left;border-bottom: 1px solid black;width: 250px;'></td>
	 					<td>Experience</td>
						<td><input type='text' id='experience' name='experience' value=".$row['experience']." style='text-align:left;border-bottom: 1px solid black;width: 250px;'></td>
					</tr>
					<tr>
						<td>Fresher</td>
						<td><input type='text' id='fresher' name='fresher' value=".$row['fresher']." style='text-align:left;border-bottom: 1px solid black;width: 250px;'></td>
						<td>Aggreagate</td>
						<td><input type='text' id='percentage' name='percentage' value=".$row['percentage']." style='text-align:left;border-bottom: 1px solid black;width: 250px;'></td>
					</tr>
					<tr><td>Stream</td>
						<td><input type='text' id='stream' name='stream' value=".$row['stream']." style='text-align:left;border-bottom: 1px solid black;width: 250px;'></td>
						<td>Backlogs</td>
						<td><input type='text' id='backlogs' name='backlogs' value=".$row['backlogs']." style='text-align:left;border-bottom: 1px solid black;width: 250px;'></td>
						
					</tr>
					<tr><input type='hidden' value=".$profile1." id='jobidd'></tr>
					<tr><th>Skills</th>
						<td colspan='5'><textarea cols='70' rows='10' id='skills' >".$row['skills']."</textarea></td>
					</tr>
					<tr><td colspan='5'><input type='button' value= 'Update' onclick='up()' style='background-color:red;margin-right:120px;'></td>
		
					</tr>"
					
					;
				}
				echo "</table>";
				echo "</div>";
			}
			else
			{
				echo " NO DATA FOUND";		
			}
	}


	// Code Belongs to Update a Record
elseif(isset($_REQUEST['b1']) and isset($_REQUEST['c1']) and isset($_REQUEST['d1']) and isset($_REQUEST['e1']) and isset($_REQUEST['f1']) and isset($_REQUEST['g1']) and isset($_REQUEST['h1']) and isset($_REQUEST['i1']) and isset($_REQUEST['j1']) and isset($_REQUEST['z'])) 
	{
		$b1 = $_REQUEST['b1'];
		$c1 = $_REQUEST['c1'];
		$d1 = $_REQUEST['d1'];
		$e1 = $_REQUEST['e1'];
		$f1 = $_REQUEST['f1'];
		$g1 = $_REQUEST['g1'];
		$h1 = $_REQUEST['h1'];
		$i1 = $_REQUEST['i1'];
		$j1 = $_REQUEST['j1'];
		$z1 = $_REQUEST['z'];
		$sql3 = "UPDATE vacancy SET  salary='$b1', location='$c1', bond='$d1', experience='$e1', fresher='$f1', percentage='$g1', backlogs='$h1', stream='$i1', skills='$j1' WHERE jobid='$z1' ";

		if($conn->query($sql3) === TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}




	// Code Belongs to Delete a record
	elseif(isset($_REQUEST['jobid']))
	{
		$j = $_REQUEST['jobid'];

		$sql4 = "DELETE FROM vacancy WHERE jobid='$j'";
		if($conn->query($sql4) === TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}


	// Code Belongs to Refresh a table after updated and deleted
	elseif(isset($_REQUEST['refresh']))
	{
		session_start();
			$cid = $_SESSION['c_id'];

			$result = $conn->query("SELECT * FROM vacancy WHERE cid = '$cid'");
			if($result -> num_rows > 0)
			{
				echo "<table border=1> <th>PROFILE</th>
				<th>SALARY</th>
				<th>LOCATION</th>
				<th>BOND</th>
				<th>EXPERIENCE</th>
				<th>FRESHER</th>
				<th>PERCENTAGE</th>
				<th>BACKLOGS</th>
				<th>STREAM</th>
				<th>SKILLS</th>";
				while($row = $result->fetch_assoc())
				{
					echo "		<tr>
							  	  <td style='text-align: center;'>".$row['profile']."</td>
							  	  <td style='text-align: center;'>".$row['salary']."</td>
							  	  <td style='text-align: center;'>".$row['location']."</td>
							  	  <td style='text-align: center;'>".$row['bond']."</td>
							  	  <td style='text-align: center;'>".$row['experience']."</td>
							  	  <td style='text-align: center;'>".$row['fresher']."</td>
							  	  <td style='text-align: center;'>".$row['percentage']."</td>
							  	  <td style='text-align: center;'>".$row['backlogs']."</td>
							  	  <td style='text-align: center;'>".$row['stream']."</td>
							  	  <td style='text-align: center;'>".$row['skills']."</td>
							  </tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<h3 style='text-align:center;'> NO DATA FOUND </h3>";		
			}
	}


	//update profile 
	// elseif(isset($_REQUEST['sid']) and isset($_REQUEST['name']) and isset($_REQUEST['mobile']) and isset($_REQUEST['email']) and isset($_REQUEST['spswd']) and isset($_REQUEST['addr'])) 
	elseif(isset($_REQUEST['sid']) and isset($_REQUEST['name']) and isset($_REQUEST['mobile']) and isset($_REQUEST['email']) and isset($_REQUEST['spswd'])) 
	{
		$sid = $_REQUEST['sid'];
		$name = $_REQUEST['name'];
		$mobile = $_REQUEST['mobile'];
		$email = $_REQUEST['email'];
		$spswd = $_REQUEST['spswd'];
		// $addr = $_REQUEST['addr'];

		$sql3 = "UPDATE student SET  name='$name', mobilenumber='$mobile', emailid='$email', spassword='$spswd' WHERE stdid='$sid' ";

		// $sql3 = "UPDATE student SET  name='$name', mobilenumber='$mobile', emailid='$email', spassword='$spswd', address='$addr' WHERE stdid='$sid' ";

		if($conn->query($sql3) === TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	// Code Belongs to Sort 
	elseif(isset($_REQUEST['a2']) and isset($_REQUEST['b2']) and isset($_REQUEST['c2']) and isset($_REQUEST['d2']))
	{
		error_reporting(0);
		ini_set('display_errors', 0);

		$profile3 = $_REQUEST['a2'];
		$salary1 = $_REQUEST['b2'];
		$str_arr = explode ("-", $salary1);  
		$salary_from = (int)$str_arr[0];
		$salary_to = $str_arr[1];
		if($salary_to!="ABOVE"){
			$salary_to = (int)$salary_to;
		} else {
			$salary_to = 10000000000;
		}

		$location1 = $_REQUEST['c2'];
		$fresher1 = $_REQUEST['d2'];
		if($fresher1=="FRESHER"){
			$fresher1="YES";
		} elseif($fresher1=="EXPERIENCE") { 
			$fresher1="NO"; 
		}

		//no condtion
		if($profile3=="ALL" and $salary1=="ALL" and $location1=="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy");
		}

		//one condition
		if($profile3!="ALL" and $salary1=="ALL" and $location1=="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') ");
		}
		if($profile3=="ALL" and $salary1!="ALL" and $location1=="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE salary between '$salary_from' and '$salary_to' ");
		}
		if($profile3=="ALL" and $salary1=="ALL" and $location1!="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE location='$location1' ");
		}
		if($profile3=="ALL" and $salary1=="ALL" and $location1=="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE fresher='$fresher1' ");
		}

		//two conditions
		if($profile3!="ALL" and $salary1!="ALL" and $location1=="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') and (salary between '$salary_from' and '$salary_to') ");
		}
		if($profile3!="ALL" and $salary1=="ALL" and $location1!="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') and (location='$location1')");
		}
		if($profile3!="ALL" and $salary1=="ALL" and $location1=="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') and (fresher='$fresher1')");
		}
		if($profile3=="ALL" and $salary1!="ALL" and $location1!="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (location='$location1') and (salary between '$salary_from' and '$salary_to') ");
		}
		if($profile3=="ALL" and $salary1!="ALL" and $location1=="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (fresher='$fresher1') and (salary between '$salary_from' and '$salary_to') ");
		}
		if($profile3=="ALL" and $salary1=="ALL" and $location1!="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (fresher='$fresher1') and (location='$location1') ");
		}

		//three condition
		if($profile3!="ALL" and $salary1!="ALL" and $location1!="ALL" and $fresher1=="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') and (location='$location1') and (salary between '$salary_from' and '$salary_to') ");
		}
		if($profile3!="ALL" and $salary1!="ALL" and $location1=="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') and (fresher='$fresher1') and (salary between '$salary_from' and '$salary_to') ");
		}
		if($profile3!="ALL" and $salary1=="ALL" and $location1!="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') and (location='$location1') and (fresher='$fresher1') ");
		}
		if($profile3=="ALL" and $salary1!="ALL" and $location1!="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (fresher='$fresher1') and (location='$location1') and (salary between '$salary_from' and '$salary_to') ");
		}

		//four condition
		if($profile3!="ALL" and $salary1!="ALL" and $location1!="ALL" and $fresher1!="ALL"){
			$result = $conn->query("SELECT * FROM vacancy WHERE (profile='$profile3') and (fresher='$fresher1') and (location='$location1') and (salary between '$salary_from' and '$salary_to') ");
		}

		if($result -> num_rows > 0)
		{
			$i = 1;
			echo "<table class='table'> <th>PROFILE</th><th>SALARY</th><th>LOCATION</th><th>EXPERIENCE</th><th>FRESHER</th><th>View Details</th>";
			while($row = $result->fetch_assoc())
			{
				echo "		<tr>
						  	  <td style='text-align: center;'>".$row['profile']."</td>
	 					  	  <td style='text-align: center;'>".$row['salary']."</td>
						  	  <td style='text-align: center;'>".$row['location']."</td>
						  	  <td style='text-align: center;'>".$row['experience']."</td>
						  	  <td style='text-align: center;'>".$row['fresher']."</td>
						  	  <td style='text-align: center;'><button id=".$i." class='btn btn-primary' onclick='store(jobid=".$i.")' value=".$row['jobid']."><i class='fa fa-folder-open fa-lg' ></button></td>
						  </tr>";
						   $i+=1;
			}
			echo "</table>";
		}
		else
		{
			echo "<h3 style='text-align:center;'> NO DATA FOUND </h3>";		
		}

	
	}




	elseif(isset($_REQUEST['jobid1']))
	{
		$jobid1 = $_REQUEST['jobid1'];

		session_start();
		$_SESSION['jobid'] = $jobid1;

		echo "1";
	}



	elseif(isset($_REQUEST['send_aid']))
	{
		$aid = $_REQUEST['send_aid'];

		session_start();
		$_SESSION['aid'] = $aid;

		echo "1";
	}



	elseif(isset($_REQUEST['to']) and isset($_REQUEST['sub']) and isset($_REQUEST['msg']))
	{
		$to = $_REQUEST['to'];
		$sub = $_REQUEST['sub'];
		$msg = $_REQUEST['msg'];
		$to_email = $to;
		$subject = $sub;
		$message = $msg;
		$header = "From:weerwerwrwr@gmail.com \r\n";
         $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

		if(mail($to_email,$subject,$message,$headers))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}


?>