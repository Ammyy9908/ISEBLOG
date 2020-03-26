<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Not Found!</title>
      <link rel="stylesheet" href="../css/bulma.min.css">
      <link rel="stylesheet" href="../css/custom.css" id="styles">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
      <div class="hero is-fullheight" style="background-color: transparent;">
            <div class="hero-body">
                  <div class="container">
                        <div class="columns">
                              <div class="column">
                              <h1 class="title is-size-1" style="font-family: 'gilroy" id="head1">Oops! You ran out of oxygen.</h1>
                        <p class="subtitle is-size-5" id="head2">The page what you looking for is not found!</p>
                        <span class="subtitle" id="counter" id="head3">Back Home in 00:00:15</span><br><br>
                        
                              </div>

                              <div class="column">
                                    <figure>
                                          <img src="../assets/404.svg" alt="">
                                    </figure>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

      <script>
            $(document).ready(function()
            {
                  var theme=localStorage.getItem('theme');
                  if(theme==null || theme=='' || theme=='light')
                  {
                        $('#styles').attr('href','../css/custom.css');
                         
                        
                        
            
                  }
                  else
                  {
                        $('#styles').attr('href','../css/custom2.css');
                        $('#head1').css('color','#ffffff');
                        $('#head2').css('color','#ffffff');
                        $('#head3').css('color','#ffffff');
                        
                        
                  }
            });
      </script>
      <script>
var count = 15;
function decrement() {
    count--;
    if(count == 0) {
        window.location = '../';
    }
    else {
        document.getElementById("counter").innerHTML = "Back Home in 00:00:" + count;
        setTimeout("decrement", 1000);
    }
}
setInterval(decrement,1000);


      </script>
</body>
</html>