<html>
<head>
	<title>
		Add Vacancy
	</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	     <style type="text/css">
    body{
              background-image:linear-gradient(rgba(0,0,0,0.0),rgba(0,0,0,0.0)), url(11.jpg);

    }
  </style>
	<script type="text/javascript">
		function add()
		{
			var jobid = "";
			var char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			for(var i=0; i < 5; i++ )
			{  
				jobid += char_list.charAt(Math.floor(Math.random() * char_list.length));
			}

			var a = document.getElementById("profile").value;
			var b = document.getElementById("salary").value;
			var c = document.getElementById("location").value;
			var d = document.getElementById("bond").value;
			var e = document.getElementById("experience").value;
			var f = document.getElementById("fresher").value;
			var g = document.getElementById("aggregate").value;
			var h = document.getElementById("backlogs").value;
			var i = document.getElementById("stream").value;
			var j = document.getElementById("skills").value;

			if(a == 'Job_profile')
			{
				alert("Please Select Your Job Profile");
			}
			else if(b == '')
			{
				alert("Please Enter Salary");
			}
			else if(isNaN(b))
			{
				alert("Please Enter Salary in Numbers");
			}
			else if(c == 'Location')
			{
				alert("Please Select Location");
			}
			else if(d == 'Bond')
			{
				alert("Please Select Bond");
			}
			else if(e == 'Experience')
			{
				alert("Please Select Experience");
			}
			else if(f == 'Fresher')
			{
				alert("Please Select Fresher");
			}
			else if(g == '')
			{
				alert("Please Enter Aggreagate");
			}
			else if(h == '')
			{
				alert("Please Enter Backlogs");
			}
			else if(isNaN(h))
			{
				alert("Enter Backlogs in Numbers");
			}
			else if(i == '')
			{
				alert("Enter Stream Can Attend");
			}
			else if(j == '')
			{
				alert("Enter Skills");
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
							alert("Vacancy Added Successfully");
							window.location.href= "add_vocancy.php";
						}
						else if(response == 0)
						{
							alert("Data cannot be Inserted");
						}
					}
				};
				obj.open("POST","AJAX.php");
				obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				obj.send("a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&g="+g+"&h="+h+"&i="+i+"&j="+j+"&jobid="+jobid);
			}
		}
	</script>

</head>
<body>
	<!-- <div class="main-wrap"> -->

		<nav class="navbar">
			<label class="navbar-toggle" id="js-navbar-toggle" for="chkToggle">
				<i class="fa fa-bars"></i>
			</label>
          <a style="color: white;">PLACEYOU</a>
			<input type="checkbox" id="chkToggle"></input>
			<ul class="main-nav" id="js-menu">
			 <li>
              <a href="view_profile.php" class="nav-links">View Profile</a>
            </li>
            <li>
              <a href="add_vocancy.php" class="nav-links">Add Vacancy</a>
            </li>
            <li>
              <a href="view_vacancy.php" class="nav-links">Delete/Edit</a>
            </li>
            <li>
              <a href="index.php" class="nav-links">Logout</a>
            </li>
			</ul>
		</nav>
		<br/>
			  <!-- <div class="main-wrap"> -->
			<center>
				<table id='edit' class='table table-striped' style='width:1200px;'>
					<tr>
						<td style='text-align: center;'>
							<select id="profile">
								<option value="Job_profile">Job profile</option>
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
						<td style='text-align: center;'><input type="text" id="salary" name="salary" placeholder="Enter Salary" autocomplete="off"></td>
					</tr>
					<tr>
						<td style='text-align: center;'>
							<select id="location">
								<option value="Location">Location</option>
								<option value="BANGLORE">BANGLORE</option>
								<option value="CHENNAI">CHENNAI</option>
								<option value="MUMBAI">MUMBAI</option>
								<option value="HYDRABAD">HYDRABAD</option>
								<option value="DELHI">DELHI</option>
								<option value="PUNE">PUNE</option>
							</select>
						</td>
						<td style='text-align: center;'>
							<select id="bond">
								<option value="Bond">Bond</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5 ABOVE">5 ABOVE</option>
								<option value="NO BOND">NO BOND</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style='text-align: center;'>
							<select id="experience">
								<option value="Experience">Experience</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5 ABOVE">5 ABOVE</option>
								<option value="NO Experience">NO Experience</option>
							</select>
						</td>
						<td style='text-align: center;'>
							<select id="fresher">
								<option value="Fresher">Fresher</option>
								<option value="YES">YES</option>
								<option value="NO">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style='text-align: center;'><input type="text" id="aggregate" name="aggregate" placeholder="Enter Aggreagate" autocomplete="off"></td>
						<td style='text-align: center;'><input type="text" id="backlogs" name="backlogs" placeholder="Enter Backlogs" 		autocomplete="off"></td>
					</tr>
					<tr>
						<td style='text-align: center;'><input type="text" id="stream" name="stream" placeholder="Enter Streams Can Attend" autocomplete="off"></td>

						<td style='text-align: center;'><textarea cols="60" rows="10" id="skills" placeholder="Skills Required"></textarea></td>
					</tr>
					<tr >
					<td colspan="2" style="text-align:left;"><input type="button" id="submit" name="btn" value="SUBMIT" onclick="add()"></td>
					</tr>
				</table>
			</center>
		</div>
	</body>
	</html>