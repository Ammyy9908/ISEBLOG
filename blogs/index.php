<?php

include '../includes/dbh.php';
session_start();
ob_start();
if(isset($_POST['key']))
{
  header('Location:search/?key='.$_POST['key']);
}

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
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <style>
      nav.navbar {
              height: 6rem !important;
              box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06) !important;
            }
      </style>

</head>
<body>
<!--top-header-->
<div class="hero is-medium" style="background-color:#fff;">
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
                      <form action="" method="POST">
                        <div class="control has-icons-left">
                              <input type="text" class="input is-rounded" placeholder="Search by Title" name="key" autocomplete="off">
                              <span class="icon is-left">
                                    <i class="fa fa-search"></i>
                              </span>
                        </div>
                        </form>
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
   <div class="navbar-item">
                      <form action="" method="POST">
                        <div class="control has-icons-left">
                              <input type="text" class="input is-rounded" placeholder="Search by Title" name="key" autocomplete="off">
                              <span class="icon is-left">
                                    <i class="fa fa-search"></i>
                              </span>
                        </div>
                        </form>
                  </div>
   
 </div>';
}



?>

    
  </div>
</nav>
      <div class="hero-body">
            <div class="container">
                  <div class="columns">
                    <div class="column is-8 is-offset-2">
                    <h1 style="font-family: 'gilroy';font-size:5em;" class="title">GEEKY BLOGS</h1>
                  <p class="subtitle">On This Page You Find Latest Technical And Student Projects Post and source codes.</p>
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

<section class="hero">
      <div class="hero-body">
            <div class="container">
                  <section class="section">
                        <div class="columns">
                              <div class="column is-8 is-offset-2">
                                      <div class="content is-medium">
                                            
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
                                            <h1 class="title">';echo $row['title'];echo'</h1>
                                            <h2 class="subtitle is-4">';echo $row['dates'];echo'</h2>
                                            <h3 class="subtitle is-5">Post by: ';echo $row['uname'];echo'</h3>
                                            <a href="posts/?id=';echo $row['id'];echo'" class="button is-primary is-rounded">Read Article</a>
          
          ';
          }
        }
        }
        ?>
    </div>
                              </div>
                        </div>
                  </section>
            </div>
      </div>
    </section>
                        
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