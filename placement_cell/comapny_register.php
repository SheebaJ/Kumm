<html>
<head>
	<title>
		Company Registration
	</title>
	<style type="text/css">
		*{
				margin: 0;
				padding:0;
				font-family: Century Gothic;
		}
		body
		{
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(10.jpg);
			height: 100vh;
			background-size: cover;
			background-position: center;
		}
		h1{
			color: white;
			margin-top: 20px;
		}
		input[type="text"]
		{
			height: 38px;
			width: 360px;
			background-color: transparent;
			color: black;
			border: none;
			outline: none;
			border-radius: 3px;
			border-bottom: 1px solid black;
			text-align: center;
			font-size: 16px;
		}
		#edit tr td textarea
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
			margin-left: 18%;
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
			font-size: 17px;
		}
		td
		{
			padding: 10px 35px;
		}
		
		#bx{

    background:#ffffff ;
        overflow: hidden;
        opacity: 0.9;
         width:60%;
		}
	</style>

	<script type="text/javascript">
		function store()
		{
			var phoneno_regex = /^[6-9]{1}[0-9]{9}$/;
			var email_regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
			var passwrd_regex = /^[a-zA-Z]\w{3,14}$/;
			var name_regex = 	/^[a-zA-Z\s]+$/;
			var companyname = document.getElementById("name").value;
			var companyphoneno = document.getElementById("phoneno").value;
			var companymailid= document.getElementById("mailid").value;
			var companyaddress = document.getElementById("address").value;
			var cpass = document.getElementById("cpass").value; 	 	

			if(name_regex.test(companyname) == false)
			{
				alert("Enter a Valid Company Name");
			}
			else if(companyphoneno == '')
			{
				alert("Please Enter Your Phoneno");
			}
			else if(phoneno_regex.test(companyphoneno) == false)
			{
				alert("Please Enter Your Mobile Number Properly")
			}
			
			else if(email_regex.test(companymailid) == false)
			{
				alert("Please Enter Proper Email Id");
			} 
			else if(companyaddress == '')
			{
				alert("Please Enter Your Company Address");
			}
			else if(passwrd_regex.test(cpass) == false)
			{
				alert("Please Enter a valid Password");
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
							alert("Registration Success");

							window.location = "company_login.php";
						}
						else if(response == 0)
						{
							alert("data cannot be inserted");
						}
					}
				};
				obj.open("POST","AJAX.php");
				obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				obj.send("name="+companyname+"&phoneno="+companyphoneno+"&mailid="+companymailid+"&address="+companyaddress+"&cpass="+cpass);
			}
		}
	</script>

</head>
<body>
		<center>
<br><br><br><br>
	<div id="bx">
<br>
		<h1 style="color:black;"> Company Registration </h1>

		<br><br>
	<table id='edit'>
		<tr>
			<td><input type="text" id="name" name="name" autocomplete="off" placeholder="Enter Company Name"></td>
			<td><input type="text"id="phoneno" name="phoneno" autocomplete="off" placeholder="Enter Company Phoneno"></td>
		</tr>
		<tr>
			<td><input type="text"id="mailid" name="mailid" autocomplete="off" placeholder="Enter Company Mailid"></td>
			<td><input type="text" id="cpass" name="cpass" autocomplete="off" placeholder="Enter Your Password"></td>
		</tr>
		<tr>
		    <td colspan="2"><textarea id="address" name="address" cols="70" rows="10" autocomplete="off" placeholder="Enter Company Address"></textarea></td>
		</tr>
	</table>
	<br>

	<button id="btn" name="btn" onclick="store()">Register</button>				
												<a href="comapny_register.php"><input type="button" id="btn" value="Refresh" ></a><br/>
		<a href="company_login.php"><button id="btn" name="btn" >Back</button></a>

</div>
</center>

</body>
</html>