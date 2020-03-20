<?php

include '../includes/dbh.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Blogs</title>
      <link rel="stylesheet" href="../css/bulma.min.css">
      <link rel="stylesheet" href="../css/custom.css" id="styles">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<!--top-header-->
<div class="hero is-medium" style="background-color:#ccc;">
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="../">
      <img src="../assets/logo.svg" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">

<?php
    if(!isset($_SESSION['member']))
{
   echo '<div class="navbar-end">
   <div class="navbar-item">
     <div class="buttons">
       <a class="button" style="background-color: #6C63FF;color:#ffffff;border:none;" href="../Auth/">
         <strong>Authenticate</strong>
</a>
     </div>
   </div>
 </div>';
}?>

<?php
    if(isset($_SESSION['member']))
{
   echo '<div class="navbar-end">
   <div class="navbar-item">
     <div class="buttons">
       <a class="button" style="background-color: #6C63FF;color:#ffffff;border:none;" href="Add.php">
         <strong>Add Post</strong>
</a>
     </div>
   </div>
 </div>';
}


?>

    
  </div>
</nav>
      <div class="hero-body">
            <div class="container">
                  <div class="columns">
                    <div class="column">
                    <h1 style="font-family: 'gilroy';font-size:5em;" class="title">GEEKY BLOG</h1>
                  <p class="subtitle">Welcome to the Department of Information Science and Engineering at Sir M Visvesvaraya Institute of Technology, Bengaluru. We started our journey in the year 1999 with an intake of 60 students. Over the last 20 years, we have grown our expertise and competence in the core field of Information Science and Engineering.</p>
                    </div>
                    <div class="column">
                      <figure class="image is-square">
                        <img src="../assets/geek.svg" alt="">
                      </figure>
                    </div>
                  </div>
            </div>
      </div>
</div>  

<!--blogs-->

<div class="hero">
      <div class="hero-body">
            <h1 class="has-text-centered" style="font-size: 4em;font-weight:200;">Geek Posts</h1>
            <div class="container">
                  <div class="columns is-half">
                  <div class="column">
                        
                        <?php
        $sql = "SELECT * FROM Articles";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Statement Error!";
        }
        else
        {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount > 0) {
        
          while($row = mysqli_fetch_assoc($result))
          {
          echo '
         
          <div class="notification" style="background-color:transparent;">
         <img src="';echo $row['img_url'];echo'" width="500" height="500">
          <h1 class="title is-size-1">';echo $row['title'];echo'</h1>
          <p class="subtitle"> posted by';echo $row['uname'];echo'</p>
          Total Reads: ';echo $row['seen_count'];echo'
          <p class="subtitle">';echo $row['dates'];echo'</p>
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
         <div class="addthis_inline_share_toolbox"></div>
          <a href="posts/?id=';echo $row['id'];echo'" class="button is-primary is-rounded">Read Article</a>
          </div>
          
          ';
          }
        }
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
<script>
      document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

});




</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
      $(document).ready(function()
      {
//check theme onload
var theme=localStorage.getItem('theme');
                  if(theme==null || theme=='' || theme=='light')
                  {
                        $('#styles').attr('href','../css/custom.css'); 
                        
            
                  }
                  else
                  {
                        $('#styles').attr('href','../css/custom2.css');
                        $('#theme').css('background-color','#ffffff');   
                        $('#theme').css('color','#000000'); 
                        $('#theme').html('<i class="fas fa-sun"></i> Light Theme</strong>');
                        $('#theme').attr('id','light');
                        
                  }
      });
</script>
</body>
</html>