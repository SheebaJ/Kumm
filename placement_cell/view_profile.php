  <?php
  include("conn.php");
  session_start();
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>View Profile</title>
      <script type="text/javascript">
        function send(x)
        {
          var a = document.getElementById(x).value;
          var obj = new XMLHttpRequest();
          obj.onreadystatechange = function()
          {
            if(this.readyState == 4 && this.status == 200)
            {
              var response = this.responseText; 
              if(response == 1)
              {
                window.location = "view_resume.php";
              }
              else if(response == 0)
              {
                alert("Unable to open");
              }
            }
          };
          obj.open("POST","AJAX.php");
          obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          obj.send("send_aid="+a);
        }
      </script>
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
            <!-- <div class="main-wrap"> -->
              <center>
      <?php
      $cid = $_SESSION['c_id'];
      $result = $conn->query("SELECT * FROM applied where cid = '$cid' ");
      if($result -> num_rows > 0)
      {
        $i = 1;
        echo "<table class='table table-striped' style='width:1200px;'><thead>
        <tr>
        <th>Student Name</th><th>Applied For</th><th>Email</th><th>Percentage</th><th>View Details</th></tr>
        </thead><tbody>";
        while($row = $result->fetch_assoc())
        {
          $stid = $row['stdid'];
          $prof = $row['profile'];
          $_SESSION['aid'] = $row['aid'];

          $result1 = $conn->query("SELECT * FROM student where stdid = '$stid' ");
          if($result1 -> num_rows > 0)
          {

            while($row = $result1->fetch_assoc())
            {
              echo "<tr>
              <td >".$row['name']."</td>
              <td >".$prof."</td>
              <td >".$row['emailid']."</td>
              <td >".$row['aggrperc']."</td>
              <td ><button type='button' class='btn btn-primary' id=".$i." onclick='send(stdid=".$i.")' value=".$_SESSION['aid']."><i class='fa fa-folder-open fa-lg' ></i>
</button></td>
              </tr>";
              $i+=1;
            }

          }
        }
        echo "</tbody></table>";
      }
      else
      {
        echo "<h3> NO DATA FOUND </h3>";    
      }
      ?>
</center>s
    </div>
  </body>
  </html>