<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="./assets/logo.svg" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>

      <a class="navbar-item" href="Blog/">
        Blogs
      </a>
      <a class="navbar-item" href="blogs/">
                  Geek Post
      </a>
      <a class="navbar-item" href="feedback/">
        Blog Feedback
      </a>
    </div>
<?php
    if(!isset($_SESSION['member']))
{
   echo '<div class="navbar-end">
   <div class="navbar-item">
     <div class="buttons">
       <a class="button" style="background-color: #6C63FF;color:#ffffff;border:none;" href="Auth/">
         <strong>Member Login</strong>
</a>
<a class="button" style="background-color: #262626;color:#ffffff;border:none;" id="theme">
         
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
       

     <a class="button" style="background-color: #262626;color:#ffffff;border:none;" id="theme">
     
</a>
<a class="button is-light" href="Auth/logout.php">
            Logout
          </a>
     </div>
   </div>
 </div>';
}


?>

    
  </div>
</nav>