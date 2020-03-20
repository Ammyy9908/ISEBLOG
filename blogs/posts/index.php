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
      <link rel="stylesheet" href="../../css/custom.css" id="styles">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<!--top-header-->
<div class="hero is-large" style="background-color:transparent;">
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
                        $keyword = "%{$_GET['id']}%";
        $id=$_GET['id'];
      $sql="SELECT seen_count from Articles WHERE id='$id'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_row($result);
      $count=$row[0];
      $count=(int)$count+1;
      $count=strval($count);
      $sql="UPDATE Articles SET seen_count='$count' WHERE id='$id'";
      mysqli_query($conn,$sql);
        $sql = "SELECT * FROM Articles WHERE id LIKE ?";
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
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
         <div class="addthis_inline_share_toolbox"></div>
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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-588e9cccbbeee2c6"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
      $(document).ready(function()
      {
//check theme onload
var theme=localStorage.getItem('theme');
                  if(theme==null || theme=='' || theme=='light')
                  {
                        $('#styles').attr('href','../../css/custom.css'); 
                        
            
                  }
                  else
                  {
                        $('#styles').attr('href','../../css/custom2.css');
                        $('#theme').css('background-color','#ffffff');   
                        $('#theme').css('color','#000000'); 
                        $('#theme').html('<i class="fas fa-sun"></i> Light Theme</strong>');
                        $('#theme').attr('id','light');
                        
                  }
      });
</script>
</body>
</html>