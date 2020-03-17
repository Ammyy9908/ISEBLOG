<?php
$faculty_names=array('Dr. P Vijayakarthik','Dr. S N Sheshappa','Dr. Vanipriya CH','Mr. Raghav S	','Mr. Manohar R','Mr. VijayaKumara Y.M','Mrs. Suguna MK','Mr. Byre Gowda B.K','Mrs. Shanta Biradar');
$avatars=array('sir.svg','sn.svg','vn.svg','rg.svg','mn.svg','vj.svg','sg.svg','bg.svg','snt.svg');
$post=array('Professor and Head','Associate Professor','Associate Professor','Associate Professor','Associate Professor','Associate Professor','Associate Professor','Associate Professor','Associate Professor','Associate Professor');
$qualifications=array('M.E, Ph.D','Ph.D','M.Tech','M.Tech., (Ph.D.)','M.Tech','M.Tech','M.Tech','M.Tech(Phd).')
?>
<div class="hero">
      <div class="hero-body">
            <h1 class="title has-text-centered">Our Faculty</h1>
            <div class="container has-text-centered">
                  <center>
                  <div class="columns">
                              <!--card-->
                              <?php
                              for($p=0;$p<4;$p++)
                              {
                                    echo '
                                    <div class="notification" style="background-color:transparent;">
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img src="./img/';echo $avatars[$p];echo'" alt="Placeholder image">
        </figure>
      </div>
      <div class="media-content">
        <p class="subtitle is-size-4">';echo $faculty_names[$p];echo'</p>
        <p class="subtitle is-size-6">';echo $post[$p];echo'</p>
      </div>
      
    </div>
    

    
  </div>
</div>
      
                                    ';
                              }?>
                              <!--card-end-->

                              
                  </div>
                  </center>

                  <div class="columns">
                        <?php
                  for($q=4;$q<9;$q++)
                              {
                                    echo '
                                    <div class="notification" style="background-color:transparent;">
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
        <img src="./img/';echo $avatars[$q];echo'" alt="Placeholder image">
        </figure>
      </div>
      <div class="media-content">
        <p class=" subtitle is-size-4">';echo $faculty_names[$q];echo'</p>
        <p class="subtitle is-size-6">';echo $post[$q];echo'</p>
      </div>
    </div>

    
  </div>
</div>
      
                                    ';
                              }

                              ?>
                  </div>
            </div>
      </div>
</div>