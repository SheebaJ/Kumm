<html>
	<head>
		<title>
		Company login 
		</title>
			<style type="text/css">
				body{
					margin: 0;
					padding: 0;
					background-image: url(9.jpg);
					background-size: cover;
					height: 100vh;
					font-family: Century Gothic;
				}
				.box{
					width: 380px;
					height: 420px;
					background-color: #000000b3;
					color: #fff;
					position: absolute;
					transform: translate(-50%,-50%);
					left: 70%;
					top:50%;
					padding: 70px 30px;
					box-sizing: border-box;;
					border-radius: 10px;
				}
				.avatar{
					width: 100px;
					height: 100px
					border-radius50%;
					position:absolute;
					top: -50px;
					left:calc(50% - 50px);
				}
				h1{
					margin: 0;
					padding: 0 0 20px;
					text-align: center;
					font-size: 22px;
				}
				.box input{
					width: 100%;
					margin-bottom: 20px;
				}
				.box input[type="text"],input[type="password"]{
					border:none;
					border-bottom: 1px solid #fff;
					background-color: transparent;
					outline: none;
					height: 40px;
					color: #fff;
					font-size: 16px;
				}
				.box input[type="button"]{
					border:none;
					outline: none;
					height: 40px;
					background-color: #fb2525;
					color: #fff;
					font-size: 18px;
					border-radius: 20px;
					transition: 0.4s ease;
				}
				.box input[type="button"]:hover{
					cursor: pointer;
					background-color: #ffc107;
					color: #000;

				}
				.box a{
					text-decoration: none;
					font-size: 15px;
					line-height: 20px;
					color: darkgrey;
					transition: 0.4s ease;
				}
				.box a:hover{
					color: #ffc107;

				}
						#btn1
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
			</style>

			<script type="text/javascript">
				function check()
				{
					var username = document.getElementById("username").value;
					var password = document.getElementById("password").value;
					if(username == '' || password == '')
					{
						alert("Please Enter Username / Password");
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
									window.location = "view_profile.php";
								}
								else if(response == 0)
								{
									alert("Incorrect password");
								}
								else if(response == '01')
								{
									alert("No Data found");
								}
							}
						};
						obj.open("POST","AJAX.php");
						obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						obj.send("user="+username+"&pass="+password);
					}
					
				}
			</script>
	</head>


		<div class="box">
			<img src="avatar.png" class="avatar">
			<h1>Company Login</h1>
			<form>
				<input type="text" name="username" id="username" placeholder="Enter your user name" autocomplete="off">
				<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off"> 
				<input type="button" id="btn" value="LOGIN" onclick="check()">
								<a href="index.php"><input type="button" id="btn" value="BACK" ></a>

				<h4>Not a Member? <a href="comapny_register.php">  Register now</a></h4>
			</form>
		</div>
</html>