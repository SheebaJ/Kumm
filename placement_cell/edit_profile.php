<?php
include("conn.php");
session_start();
?>
<html>
<head>
  <title>edit_profile</title>

  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<style type="text/css">
  .bx{
    margin-top: 420px;
    background: #dcdcdc; 
    border-radius: 20px;
    overflow: hidden;
    opacity: 0.9;
    width:50%;
    height: 190px;

  }
</style>
<script type="text/javascript">

  function updateprofile()
  {
    var sid=document.getElementById("sidd").value;
    var name = document.getElementById("name").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("emailid").value;
    var spswd = document.getElementById("spswd").value;

    if(sid == '' || name == '' || mobile == '' || email == '' || spswd == '')
    {
      alert("All Field Are Mandatory");
    }
    else if(isNaN(mobile))
    {
      alert("Please Enter valid Mobile number");
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
            alert("Profile updated Successfully");
            window.location.href= "edit_profile.php";

          }
          else if(response == 0)
          {
            alert("Data cannot be updated");
            window.location.href= "edit_profile.php";

          }
        }
      };

      obj.open("POST","AJAX.php");
      obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      obj.send("&sid="+sid+"&name="+name+"&mobile="+mobile+"&email="+email+"&spswd="+spswd);
      // obj.send("&sid="+sid+"&name="+name+"&mobile="+mobile+"&email="+email+"&spswd="+spswd);
    }
  }

</script>
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
  <div class="main-wrap1" style='width:700px'>

    <?php
    $stid = $_SESSION['s_id'];
    $result = $conn->query("SELECT * FROM student where stdid = '$stid' ");
    if($result -> num_rows > 0)
    {
      echo "<table class='table'  ><thead>

      </thead><tbody>";
      while($row=$result->fetch_assoc())
      {
        echo "

        <tr><th>Name</th><td ><input type='text' value=".$row['name']."	style='width:200px;text-align:left;' id='name'></td></tr>
        <tr><th>Mobile</th><td style=';'><input type='text' value=".$row['mobilenumber']."  style='width:200px;text-align:left;' id='mobile'></td></tr>
        <tr><th>EmailId</th><td style=''><input type='text' value=".$row['emailid']."   style='width:300px;text-align:left;' id='emailid'></td></tr>
     
        <tr><th>Password</th><td style=''><input type='text' value=".$row['spassword']."  style='width:200px;text-align:left;'  id='spswd'></td></tr>
        <input type='hidden' value=".$row['stdid']."  id='sidd'></td>";
        echo '<tr><td colspan="3"><input type="button" value="Update" onclick="updateprofile()" style="background-color:#24A0ed;border:none;float:right;"></td></tr></tr>';
      }
      echo "</tbody></table>";
    }
    else
    {
      echo "NO DATA FOUND";		
    }
    ?>
  </div>
</body>
</html>