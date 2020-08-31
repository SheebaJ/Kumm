
<html>
<head>
	<title>
		Job Seeker Registration
	</title>

	<style type="text/css">
		body
		{
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(6.jpeg);
			height: 100vh;
			background-size: cover;
			background-position: center;
		}
		h1
		{
			color: black;
		}
		#name
		{
			height: 38px;
			width: 330px; 
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}

		#dob
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#mobile
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}

		#emailid
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#address
		{
			background-color: #000000b3;
			color: white;
			border: none;
			outline: none;
			text-align: center;
			border-radius: 10px;
			border-bottom: 1px solid black;
			margin-bottom: 1px;
			font-size: 16px;
			margin-left: 20%;
		}
		#per10
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#pass10
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#perpuc
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#passpuc
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#branch
		{
			color: white;
			background-color: #000000b3;
			height: 38px;
			width: 340px;
			border: none;
			border-bottom: 1px solid black;
			border-radius: 10px;
			outline: none;
			text-align-last: center;
			font-size: 16px;
		}
		#gen
		{
			color: white;
			background-color: #000000b3;
			height: 38px;
			width: 340px;
			border: none;
			border-bottom: 1px solid black;
			border-radius: 10px;
			outline: none;
			text-align-last: center;
			font-size: 16px;
		}
		#dper
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#passd
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#pass
		{
			height: 38px;
			width: 330px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
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
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 17px;
		}
		td
		{
			padding: 10px 25px;
		}
		h2
		{
			color: black;
			text-align: center;
		}
			#bx{

    background:#ffffff ;
        overflow: hidden;
        opacity: 0.9;
         width:80%;
		}
	</style>

	<script type="text/javascript">
		function store()
		{
			var phoneno_regex = /^[6-9]{1}[0-9]{9}$/;
			var name_regex = /^[a-zA-Z\s]+$/;
			//var dob_regex = /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;
			var email_regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
			var sid = "";
			var char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			for(var i=0; i < 5; i++ )
			{  
				sid += char_list.charAt(Math.floor(Math.random() * char_list.length));
			}

			var name = document.getElementById("name").value;
			var dob = document.getElementById("dob").value;
			var mobile = document.getElementById("mobile").value;
			var gen = document.getElementById("gen").value;
			var email = document.getElementById("emailid").value;
			var add = document.getElementById("address").value;
			var branch = document.getElementById("branch").value;
			var dper = document.getElementById("dper").value;
			var pass = document.getElementById("pass").value;

			if(name_regex.test(name) == false)
			{
				alert("Please Enter Your Name");
			}
			else if(dob == '')
			{
				alert("Please Enter Proper Date of Birth");
			}
			else if(phoneno_regex.test(mobile) == false)
			{
				alert("Please Enter Your Mobile Number");
			}
			else if(email_regex.test(email) == false)
			{
				alert("Please Enter Your Email Address");
			}
			else if(add == '')
			{
				alert("Please Enter Your Address");
			}
			else if(dper == '' || dper.length < 2)
			{
				alert("Enter valid percentage");
			}
			else if(branch == 'SELECT_STREAM')
			{
				alert("Please select Proper Branch");
			}
			else if(pass == '')
			{
				alert("Please Enter Your Password");
			}
			else if(isNaN(mobile))
			{
				alert("Please Enter Your Mobile Number In Numbers");
			}
			else if(mobile.length > 10 || mobile.length < 10)
			{
				alert("Please Enter Your Mobile Number Properly")
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
							alert("Successsfully registered");
							window.location = "student_login.php";
						}
		 				else if(response == 0)
						{
							alert("Data Cannot Be Inserted");
						}
					}
				};
				obj.open("POST","AJAX.php");
				obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				obj.send("sname="+name+"&dob="+dob+"&mobile="+mobile+"&gen="+gen+"&email="+email+"&add="+add+"&branch="+branch+"&dper="+dper+"&spassword="+pass+"&sid="+sid);
			}
		}
	</script>

<body>
	<br><br>
	<center>
			<div id="bx">
		<h1 style="color:black;"> Job Seeker Registration</h1>
		<table>
			<div>
				<td><input type="text" id="name"name="name" autocomplete="off" placeholder="Enter Your Name"></td>
				<td><input type="date" id="dob"name="dob" autocomplete="off" placeholder="Enter Your Date of Birth"></td>
					<td>
					<select id = "gen">
						<option value="select gender">Select Your Gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</td>

			</tr>
			<tr>
		<td><input type="email id" id="emailid"name="emailid" autocomplete="off" placeholder="Enter Your Email ID"></td>
				<td><input type="text" id="mobile"name="mobile" autocomplete="off" placeholder="Enter Your Mobile Number"></td>

								<td>
					<select id="branch">
						<option value="SELECT_STREAM">Select Stream</option>
						<option value="BCA">BCA</option>
						<option value="BCOM">BCOM</option>
						<option value="BBA">BBA</option>
						<option value="BSc">BSc</option>
						<option value="BE">BE</option>
						<option value="BEd">BEd</option>
						<option value="-MCA">MCA</option>
						<option value="MBA">MBA</option>
						<option value="MS">MS</option>
						<option value="MTECH">MTECH</option>
					</select>
				</td>
				<tr>
				<td><input type="text" id="pass" name="pass" autocomplete="off" placeholder="Enter Your Password"></td>
				<td><input type="text" id="dper" name="dper" autocomplete="off" maxlength="2" placeholder="Enter Aggregate Percentage"></td></tr>
				<tr>
				<td colspan="3"><textarea id="address" name="address" cols="70" rows="10" autocomplete="off" placeholder="Enter Your Address"></textarea></td>
			</tr>
		</tr>
		</table>

			<input type="button" value="Register" name="btn" id="btn" onclick="store()">
			<a href="student_register.php"><button id="btn" name="btn" >Refresh</button></a>
			<br>	<a href="student_login.php"><button id="btn" name="btn" >Back</button></a>

		</div>
	</center>
</body>
</html>