<?php
	include("C:/wamp64/www/placement_cell/conn.php");
?>
<html>
<head>
	<title>Available Jobs</title>
 <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<script type="text/javascript">
		function sort()
		{
			var a2 = document.getElementById("profile").value;
			var b2 = document.getElementById("salary").value;
			var c2 = document.getElementById("location").value;
			var d2 = document.getElementById("fresher").value;

			var obj = new XMLHttpRequest();
			obj.onreadystatechange = function()
			{
				if(this.readyState == 4 && this.status == 200)
				{
					document.getElementById("details").innerHTML = this.responseText;
				}
			};
			obj.open("POST","AJAX.php");
			obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			obj.send("a2="+a2+"&b2="+b2+"&c2="+c2+"&d2="+d2);
		}

		function store(x)
		{
			var jobid = document.getElementById(x).value;

			var obj = new XMLHttpRequest();
			obj.onreadystatechange = function()
			{
				if(this.readyState == 4 && this.status == 200)
				{
					var response = this.responseText;
					if(response == 1)
					{
						window.location = "view_selected.php";
					}
				}
			};
			obj.open("POST","AJAX.php");
			obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			obj.send("jobid1="+jobid);
		}
	</script>
</head>
<body>
<nav class="navbar">
          <label class="navbar-toggle" id="js-navbar-toggle" for="chkToggle">
            <i class="fa fa-bars"></i>
          </label>
          <a style="color: white;">PLACEYOU</a>
          <input type="checkbox" id="chkToggle"></input>
          <ul class="main-nav" id="js-menu">
             <li>
              <a href="student_home.php" class="nav-links">Home</a>
            </li>
            <li>
              <a href="invoke_jobs.php" class="nav-links">Apply Jobs</a>
            </li>
                <li>
              <a href="edit_profile.php" class="nav-links">Edit Profile</a>
            </li>
            <li>
              <a href="index.php" class="nav-links">Logout</a>
            </li>
          </ul>
        </nav>
        <br/>
		<center>
		<table id="filter" class='table table-striped' style='width:1200px;'>
			<th><h3>FILTERS</h3></th>
			<!-- <th colspan="3"><a href="student_home.php"><input type="button" value="Back" style="background-color:#24A0ed;border:none;float: right"s></a></th> -->
			<tr>
				<td>JOB PROFILE</td>
				<td>SALARY</td>
				<td>LOCATION</td>
				<td>FRESHER / EXPERIENCE</td>
			</tr>
			<tr>
				<td>
					<select onchange="sort()" id="profile">
				 		<option value="ALL">ALL</option>
						<option value="SOFTWARE DEVELOPER">SOFTWARE DEVELOPER</option>
						<option value="SOFTWARE TESTER">SOFTWARE TESTER</option>
						<option value="WEB DESIGNER">WEB DESIGNER</option>
						<option value="DATA ANALYST">DATA ANALYST</option>
						<option value="MANAGER">MANAGER</option>
						<option value="HR">HR</option>
						<option value="BPO">BPO</option>
						<option value="MECHANICAL ENGINEER">MECHANICAL ENGINEER</option>
						<option value="ELECTRICAL ENGINEER">ELECTRICAL ENGINEER</option>
						<option value="ACCOUNTANT">ACCOUNTANT</option>
					</select>
				</td>
				<td>
					<select onchange="sort()" id="salary">
						<option value="ALL">ALL</option>
						<option value="10000-20000">10000-20000</option>
						<option value="20000-40000">20000-40000</option>
						<option value="40000-80000">40000-80000</option>
						<option value="80000-ABOVE">80000 ABOVE</option>
					</select>
				</td>
				<td>
					<select onchange="sort()" id="location">
						<option value="ALL">ALL</option>
						<option value="BANGLORE">BANGLORE</option>
						<option value="CHENNAI">CHENNAI</option>
						<option value="MUMBAI">MUMBAI</option>
						<option value="HYDRABAD">HYDRABAD</option>
						<option value="DELHI">DELHI</option>
						<option value="PUNE">PUNE</option>
					</select>
				</td>
				<td>
					<select onchange="sort()" id="fresher">
						<option value="ALL">ALL</option>
						<option value="FRESHER">FRESHER</option>
						<option value="EXPERIENCE">EXPERIENCE</option>
					</select>
				</td>
			</tr>
		</table>
		<br><br>
		<?php
			$result = $conn->query("SELECT * FROM vacancy");
			if($result -> num_rows > 0)
			{
				$i = 1;
				echo "<table id='details' class='table table-striped' style='width:1200px;'> <th>Profile</th><th>Salary</th><th>Location</th><th>Experience</th><th>Fresher</th><th>Add Resume</th>";
				while($row = $result->fetch_assoc())
				{
					
					echo "		<tr>
							  	  <td>".$row['profile']."</td>
							  	  <td>".$row['salary']."</td>
							  	  <td>".$row['location']."</td>
							  	  <td>".$row['experience']."</td>
							  	  <td>".$row['fresher']."</td>
							  	  <td><button class='btn btn-primary' id=".$i." onclick='store(jobid=".$i.")' value=".$row['jobid'].">Click to apply</td>
							  </tr>";
							  $i+=1;
				}
				echo "</table>";
			}
			else
			{
				echo "<h3> NO DATA FOUND </h3>";		
			}
		?>
	</div>
		<div >
			<table id="details" class='table table-striped' style='width:1200px;'>
				
			</table>
		</div>
	</div>
</center>
</body>
</html>