<?php
	include("conn.php");
	session_start();
?>
<html>
<head>
	<title>VIEW EDIT VACANCY</title>
	  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
     <style type="text/css">
    body{
              background-image:linear-gradient(rgba(0,0,0,0.0),rgba(0,0,0,0.0)), url(11.jpg);

    }
  </style>
	<script type="text/javascript">
		function call(jid)
		{
				var obj = new XMLHttpRequest();
				obj.onreadystatechange = function()
				{
					if(this.readyState == 4 && this.status == 200)
					{
						document.getElementById("edit").innerHTML = this.responseText;					
					}
				};
				obj.open("POST","AJAX.php");
				obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				obj.send("profile1="+jid);
			}
		
			function up()
		{
			var b = document.getElementById("salary").value;
			var c = document.getElementById("location").value;
			var d = document.getElementById("bond").value;
			var e = document.getElementById("experience").value;
			var f = document.getElementById("fresher").value;
			var g = document.getElementById("percentage").value;
			var h = document.getElementById("backlogs").value;
			var i = document.getElementById("stream").value;
			var j = document.getElementById("skills").value;
			var jid=document.getElementById('jobidd').value;


			if(b == '' || c == '' || d == '' || e == '' || f == '' || g == '' || h == '' || i == '' || j == '' || jid == '')
			{
				alert("All Field Are Mandatory");
			}
			else if(isNaN(h))
			{
				alert("Please Enter backlogs in Number");
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
							alert("Vacancy updated Successfully");
    						window.location.href= "view_vacancy.php";

						}
						else if(response == 0)
						{
							alert("Data cannot be updated");
						}
					}
				};
				obj.open("POST","AJAX.php");
				obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				obj.send("&b1="+b+"&c1="+c+"&d1="+d+"&e1="+e+"&f1="+f+"&g1="+g+"&h1="+h+"&i1="+i+"&j1="+j+"&z="+jid);
			}
		}

		
		function deleteRow(jid)
		{
				var obj = new XMLHttpRequest();
				obj.onreadystatechange = function()
				{
					if(this.readyState == 4 && this.status == 200)
					{
						var response = this.responseText;
						if(response == 1)
						{
							alert("Vacancy DELETED Successfully");
							window.location.href= "view_vacancy.php";
						}
						else if(response == 0)
						{
							alert("Data cannot be DELETED");
						}
					}
				};
				obj.open("POST","AJAX.php");
				obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				obj.send("jobid="+jid);
			}

		// }
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
<center>
		<?php
			$cid = $_SESSION['c_id'];
			
			$result = $conn->query("SELECT * FROM vacancy WHERE cid = '$cid'");
			if($result -> num_rows > 0)
			{
				echo "<table class='table table-striped' style='width:1200px;'><thead>
        <tr> 
        <th>Profile</th>
        <th>Salary</th>
        <th>Location</th><th>Bond</th><th>Experience</th><th>Fresher</th><th>Aggregate</th><th>Backlogs</th><th>Stream</th><th  colspan='2'>Skills</th><th>Delete</th><th>Edit</th></tr>
        </thead><tbody>";
				while($row = $result->fetch_assoc())
				{
					// $jid = $row['jobid'];
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
							  	  <td style='text-align: center;'  colspan='2'>".$row['skills']."</td>";
							  	  echo '<td> <button type="button" class="btn btn-danger" onclick="deleteRow(\''.$row['jobid'].'\')"><span class="fa fa-trash-o fa-lg"></span></button></td>'; 		  	  
							  	  echo '<td><button  type="button" class="btn btn-warning"  onclick="call(\''.$row['jobid'].'\')"><span class="fa fa-pencil-square-o fa-lg"></span></button></a></td>';
							  	  // echo '<td><a href="edit_vacancy.php?edit='.$row['jobid'].'";<button  type="button" class="btn btn-warning" ><span class="fa fa-pencil-square-o fa-lg"></span></button></a></td>'; 	

							  	  echo "</tr>";
				}
				echo "</tbody></table>";
			}
			else
			{
				echo "NO DATA FOUND";		
			}
		?>

		<table id="edit"class='table table-striped' style='width:1200px;opacity:0.9;border:none;'>
			
		</table>
		<center>
	</div>
</body>
</html>