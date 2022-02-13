
<?php

require "./movies.php";
require "./rentals.php";
require "./user.php";
$moviesActions = new movies();
$rentalActions = new rentals(); 
$userActions = new user();

if(!isset($_SESSION['user_login'])){
   header("Location:../login.php?location=/app/create_page.php");
   
}
else{
    $id = $_SESSION['user_login'];
}
$user = $userActions->get_user_by_id($id);

if (!empty($_GET)){
    $movie_name = $_GET['name'];
}
else{//for testing purpose
    $movie_name="Forrest Gump";
}

$movie = $moviesActions->get_movie($movie_name);
if (!empty($movie)){
    ?>
    <div class="header large border first">
      <div class="keyboard_s custom_bg">
        <div class="single_column">
          <section id="original_header" class="images inner">
            <div class="poster_wrapper false">
              <div class="poster">
                <div class="image_content backdrop">

                    <img class="poster lazyload lazyloaded" src=<?php echo "\"/".$movie["image"]."\"";?>>
                    
                </div>

                <div class="header_poster_wrapper false">
                  <section class="header poster">
                    <div class="title ott_false" dir="auto">

                        <h2 class="13">
                            <?php echo $movie_name;?>
                        </span>
                    </h2>
                    <div class="facts">
                     <span class="release">
                        <?php echo $movie["release_date"];?>
                    </span>
                    
                    </div>
                </div>

            <ul class="auto actions">

                <li class="chart">
                  <div class="consensus details">
                    <div class="outer_ring">
                      <div class="user_score_chart" data-percent="87.0" data-track-color="#204529" data-bar-color="#21d07a">
                        <div class="percent">
                            <span class=<?php echo "icon icon-r".$movie["score"];?>></span>
                        </div>
                        <canvas height="75" width="75" style="height: 60px; width: 60px;"></canvas></div>
                    </div>
                </div>
                <div class="text">User<br>Score</div>
            </li>
            <li>
                <?php $movie_rentals = $rentalActions->get_rentals_of_movie($movie['name']);
                if($movie_rentals){
                    foreach($movie_rentals as &$rental){
                        if($rental['user_id']==$id ){
                            $now =new DateTime('NOW');
                            $ttl =new DateTime($rental['TTL']);
                           
                            $diff = $ttl->diff($now);
                            if ($diff->d>0){
                                echo "You have ".$diff->d." more days to return this movie";
                            }
                            else if($diff->d==0){
                                echo "you have ".$diff->h." hours, ".$diff->i." minutes and ".$diff->s." seconds to return this movie";
                            }
                            break;
                        }
                        
                    }
                }
                else if(!$movie_rentals || empty($movie_rentals)){?>
                    <a onclick="<?php $moviesActions->rent_movie($id,$movie_name);?>">Rent Movie</a>
                    <?php
                }
                else{?>
                    <a href="<?php $moviesActions->rent_movie($id,$movie_name);?>">Rent Movie</a>
                    <?php
                }
                ?>

            </li>
        </ul>
        <div class="header_info">
            <h3 dir="auto">Overview</h3>
            <div class="overview" dir="auto">
                <p><?php echo $movie['overview'];?></p>
            </div>
        </div>
            </div>
            </div>

        </section>
        <?php } ?>
    </div>
</div>
</section>
</div>
</div>
</div>

<a href="logout.php">Logout</a>
