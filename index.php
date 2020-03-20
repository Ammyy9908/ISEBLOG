<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ISE-Blog</title>
      <link rel="stylesheet" href="css/bulma.min.css">
      <link rel="stylesheet" href="css/custom.css" id="styles">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>

<!--Header-->
<?php
include 'includes/header.php';
include 'includes/overview.php';
include 'includes/visionMission.php';
include 'includes/faculty.php';
include 'includes/footer.php';

if(isset($_SESSION['member']))
{
      echo '<div class="modal">
      <div class="modal-background"></div>
      <div class="modal-content">
        <!-- Any other Bulma elements you want -->
      </div>
      <button class="modal-close is-large" aria-label="close"></button>
    </div>';
}

?>





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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-588e9cccbbeee2c6"></script>

<script>
      $(document).ready(function()
      {
            var is_down=true;

            var con=0;
            function check(){
            
            if(con==0){
                con=1;
            }
            else{
                con=0;
            }
            return con;
            }
            
            function getstatus()
            {
            
            if(check()==1)
            {
                $('#readmore').html('Read Less <i class="fas fa-sort-up" id="icon"></i>');
                
                
            }
            else{$('#readmore').html('Read More <i class="fas fa-sort-down" id="icon"></i>');
            
                
                
                
            }
                
            }
            $('#readmore').on('click',function()
            {
                  
                  getstatus();
                        $('#more').toggle();
                        
                        
            });



            //Theme implementation
            //check theme onload
            var theme=localStorage.getItem('theme');
                  if(theme==null || theme=='' || theme=='light')
                  {
                        $('#styles').attr('href','css/custom.css');
                         
                        $('#theme').html('<strong><i class="fas fa-moon"></i> Dark Theme</strong>');
                        $('#hero').addClass('is-warning');
                        $('#footer').addClass('is-warning');
                        $('#headerI').attr('src','assets/light.svg');
                        
            
                  }
                  else
                  {
                        $('#styles').attr('href','css/custom2.css');
                        $('#theme').css('background-color','#ffffff');   
                        $('#theme').css('color','#000000'); 
                        $('#theme').html('<i class="fas fa-sun"></i> Light Theme</strong>');
                        $('#theme').attr('id','light');
                        $('#hero').addClass('is-dark');
                        $('#footer').addClass('is-dark');
                        $('#headerI').attr('src','assets/dark.svg');
                        
                  }
            //change theme onclick

            $('#theme').on('click',function()
            {
                  
                localStorage.setItem('theme','dark');
                location.reload(true);
            });

            $('#light').on('click',function()
            {
                  
                localStorage.setItem('theme','light');
                location.reload(true);
            });

      });
</script>
      
</body>
</html>