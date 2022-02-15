<?php
require_once "./app/movies.php";

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ./login.php");
    
}
require_once "./header.php";
$movies = new movies();
$all_movies = $movies->get_all_movies();
if ($all_movies){?>
<section class="inner_content no_pad">
<center>
  <div class="column_wrapper">
    <div class="content_wrapper no_bottom_pad wrap">

      <div class="column">
        <div class="column_header">
          <h2>What's Popular</h2>
              <div class="anchor hide">
                <h3><a href="#" class="no_click" data-panel="popular_scroller" data-group="for-rent">For Rent <span class="glyphicons_v2 chevron-down"></span></a></h3>
              </div>

              
            </div>
          </div>
        </div>
        
        <div id="popular_scroller" class="media discover scroller_wrap should_fade is_fading">
          <div class="column_content flex scroller loaded" style=""> 
               
<?php
    $all_movies = json_decode($all_movies);
    foreach($all_movies as $movie){
        
   ?>
 
   <div class="card style_1">
   <center>
    <div class="wrapper">
    <div class="content">
    <div class="consensus tight">
      <div class="outer_ring">
        <div class="user_score_chart " data-percent=<?php echo $movie->score.".0";?> data-track-color="#204529" data-bar-color="#21d07a">
          <div class="percent">
            
              <span class=<?php echo "\"icon icon-r".$movie->score."\"";?>></span>
            
          </div>
        <canvas height="42" width="42" style="height: 34px; width: 34px;"></canvas>
    </div>
      </div>
    </div>
   
    <h2><?php echo "<a href=\"/app/create_page.php?name=$movie->name\" target=_blank>".$movie->name."</a>";?></h2>
    <p><?php echo $movie->release_date;?></p>
  </div>

</div>
</center>
</div>
    
   

<?php }
 ?>

    </div>
    </div>
    </div>
    <script></script>
    </center>
    </section>
    
    <?php }

?>

<a href="logout.php">Logout</a>
