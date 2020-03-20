<?php
session_start();

if(isset($_SESSION['member']))
{
    header('location:../index.php');
    exit();
}

else
{
    if (isset($_POST['login'])) {
        require '../includes/dbh.php';
    
        $mailid = $_POST['userid'];
        $pass = $_POST['password'];
        $hashedPass=$pass;
        
    
        //check for empty fields
    
        if (empty($mailid) ||  empty($pass)) {
            header('location:index.php?error=Empty Fields! Try Again!');
            exit();
        }
        else
        {
            $sql = "SELECT * FROM members WHERE uname = ?  AND passwords= ?;";
    
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo 'statement error!';
                exit();
            }
    
            else
            {
                mysqli_stmt_bind_param($stmt,"ss",$mailid,$hashedPass);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
    
                if ($resultCheck > 0) {
    
                    session_start();
                    $_SESSION['member']=$mailid;
                    
                    header('location:../index.php?login=success');
    
                    
                }
                else
                {
    
                    header('location:index.php?error=Wrong Cerdidentials!Try Again');
                    exit();
                    
    
                }
            }
    
        }
    
    
    }


}


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Member Login</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css"/ id="styles">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation" style="background-color: #ccc;">
  <div class="navbar-brand">
    <a class="navbar-item" href="../">
      <i class="material-icons">arrow_backward</i>
    </a>
  </div>

  
  </div>
</nav>
<?php if(isset($_GET['error']))
{
      echo '<div class="notification is-danger">
      <button class="delete"></button>
      ';echo $_GET['error'];echo'
    </div>';
}?>
<section class="hero is-fullheight" style="background-color: transparent;">

 

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        Member Login
      </h1>
      <div class="container">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
          <form action="" class="box" method="POST">
            <div class="field">
              <label for="" class="label">Username</label>
              <div class="control has-icons-left">
                <input type="text" placeholder="e.g. bobsmith@gmail.com" class="input" autocomplete="off" name="userid">
                <span class="icon is-small is-left">
                  <i class="fa fa-user"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label for="" class="label">Password</label>
              <div class="control has-icons-left">
                <input type="password" placeholder="*******" class="input" autocomplete="off" name="password">
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <button class="button" type="submit" name="login" style="background-color: #6C63FF;color:#ffffff;">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
     
    </div>
    
  </div>
  
  
</section>


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