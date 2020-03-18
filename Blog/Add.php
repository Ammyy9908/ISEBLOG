<?php

include '../includes/dbh.php';
session_start();
if(!isset($_SESSION['member']))
{
      header('Location:../index.php?error=Authentication Required');
}
//check is upload button is clicked
if (isset($_POST['upload'])) {
	
      //get another data
            $author=$_SESSION['member'];
            $title = $_POST['title'];;
            $description = $_POST['description'];
            //echo $description;
            //echo $title;
            $datetime = new DateTime();
            $count=0;
            $datetime=$datetime->format('d-m-Y');
            //echo $datetime;
            
            //echo $title;
            //echo $desc;
            //echo $personName;
            //print_r($file);
            $img_url = $_POST['url'];
            
            if(empty($title)|| empty($img_url) || empty($description))
            {
                  header('location:Add.php?error=All Fields Required!');
                  exit();
            }
            else
            {
            
                  $sql = "SELECT * FROM collegepost";
                  $stmt = mysqli_stmt_init($conn);
                  //check for any statement error
                  if (!mysqli_stmt_prepare($stmt,$sql)) {
                        echo "Statement error!1";
                        exit();
                  }
                  else
                  {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $sql = "INSERT INTO collegepost(uname,dates,title,descriptions,seen_count,img_url)VALUES(?,?,?,?,?,?);";
                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                              echo "Statement Error2";
                              exit();
                        }
                        else
                        {
                              
                              mysqli_stmt_bind_param($stmt,"ssssss",$author,$datetime,$title,$description,$count,$img_url);
                              mysqli_stmt_execute($stmt);
                              header("location:index.php?success='Post Added!'");
                        }
                  }
           }
            
            
      }
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ADD Blog</title>
      <link rel="stylesheet" href="../css/bulma.min.css">
      <link rel="stylesheet" href="../css/custom.css">
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
       <a class="button" style="background-color: #6C63FF;color:#ffffff;border:none;" href="Auth/">
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
       <a class="button" style="background-color: #6C63FF;color:#ffffff;border:none;">
         <strong>';echo $_SESSION['member'];echo'</strong>
</a>
<a class="button is-light" href="../Auth/logout.php">
            Logout
          </a>
     </div>
   </div>
 </div>';
}



?>

    
  </div>
</nav>

<!--errors-->

<?php if(isset($_GET['error']))
{
      echo '<div class="notification is-primary">
      <button class="delete"></button>
      ';echo $_GET['error'];echo'
    </div>';
}?>

<!--Blog Add Form-->
<div class="hero is-fullheight">
      <div class="hero-body">
            <div class="container">
                  <h1 class="title" style="font-size: 5em;">Add a Post</h1>
                  <form action="" method="POST" enctype="multipart/form-data">
                 

<div class="field">
  <label class="label">Title</label>
  <div class="control">
    <input class="input" type="text" placeholder="Title" name="title">
   
  </div>
</div>

<div class="field">
  <label class="label">Thumbnail URL</label>
  <div class="control">
    <input class="input" type="text" placeholder="Image URL" name="url">
   
  </div>
</div>


<div class="field">
  <label class="label">Full Description</label>
  <div class="control">
    <textarea class="textarea" placeholder="Description...." name="description"></textarea>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" name="upload" type="submit">Post</button>
  </div>
  <div class="control">
    <a class="button is-link is-light" href="../">Cancel</a>
  </div>
</div>
                  </form>
            </div>
      </div>
</div>      



<script>
      document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
</script>
</body>
</html>