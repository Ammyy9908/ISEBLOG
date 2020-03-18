<?php

include '../../includes/dbh.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Blogs</title>
      <link rel="stylesheet" href="../../css/bulma.min.css">
      <link rel="stylesheet" href="../../css/custom.css">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<!--top-header-->
<div class="hero is-large" style="background-color:#fff;">
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="../">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
</nav>
</div>  

<!--blogs-->

<div class="hero">
      <div class="hero-body">
           
            <div class="container">
                  <div class="columns is-half">
                  <div class="column">
                        
                  <?php
                  if(isset($_GET['id']))
                  {
                  
$id=$_GET['id'];
$sql="SELECT seen_count from collegepost WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);
$count=$row[0];
$count=(int)$count+1;
$count=strval($count);
$sql="UPDATE collegepost SET seen_count='$count' WHERE id='$id'";
mysqli_query($conn,$sql);

                        $keyword = "%{$_GET['id']}%";
        $sql = "SELECT * FROM collegepost WHERE id LIKE ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Statement Error!";
        }
        else
        {
        mysqli_stmt_bind_param($stmt,"s",$keyword);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount > 0) {
        
          while($row = mysqli_fetch_assoc($result))
          {
          echo '
          <img src="';echo $row['img_url'];echo'">
          <h1 class="subtitle">by: ';echo $row['uname'];echo'</h1>
          <p class="subtitle" style="color:#ccc;">';echo $row['dates'];echo'</p>
          <h1 class="title">';echo $row['title'];echo'
          <p class="subtitle is-size-3">';echo $row['descriptions'];echo'</p>
          ';
          }}
        else
        {
        header('location:../../errors/');
        exit();
        }
        }
                  }
                  else
                  {
                        header('location:../../errors/');
                        exit();    
                  }


        
        ?>   
                  </div>
                        
                        </div>
                  </div>
            </div>
      </div>
      
</div>



</body>
</html>