<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location:../login.php?location=./app/create_page.php");
}
require_once "./movies.php";
require_once "./rentals.php";
require_once "./user.php";
require_once "../header.php";
if (!empty($_SESSION['id']))
{
    $id = $_SESSION['id'];
}
else{
    // for tests
    $id = 12;
}
$moviesActions = new movies();
$rentalActions = new rentals(); 
$userActions = new user();



if (!empty($_GET)){
    $movie_name = trim($_GET['name']);
}
else if(!empty($_POST)){
    $movie_name = trim($_POST['name']);
}
else{
    //for tests
    $movie_name="Pulp Fiction";
}

$user = $userActions->get_user_by_id($id);
$movie = $moviesActions->get_movie($movie_name);

if(isset($_POST['rent'])){
    $moviesActions->rent_movie($id,$movie_name);
}
if (!empty($movie) && !empty($user)){ ?>
    <div class="header large border first">
    <div class="keyboard_s custom_bg">
        <div class="single_column">
            <section id="original_header" class="images inner">
                <div class="poster_wrapper false">
                    <div class="poster">
                        <div class ="image_content backdrop">
                            <img class="poster lazyload lazyloaded" src=<?php echo "\"../".$movie["image"]."\"";?> data-loaded="true">
                        </div>

                    </div>
                </div>
                <div class="header_poster_wrapper false">
                    <section class="header poster">
                        <div class="title ott_false" dir="auto">
                            <h2 class="23">
                                <a><?php echo $movie_name;?></a> 

                                <span class="release">
                                    <?php echo $movie["release_date"];?>
                                </span>
                            </h2>
                        </div>
                        <ul class="auto actions">
                            <li class="chart">
                                <div class="consensus details">
                                    <div class="outer_ring">
                                        <div class="user_score_chart" data-percent=<?php echo $movie["score"].".0";?> data-track-color="#204529" data-bar-color="#21d07a">
                                            <div class="percent">
                                                <span class=<?php echo "icon icon-r".$movie["score"];?>></span>
                                            </div>
                                            <canvas height="75" width="75" style="height: 60px; width: 60px;"></canvas></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text"><?php echo $movie["score"];?></div>
                            </li>
                            
                            <?php
                            $movie_rentals = $rentalActions->get_rentals_of_movie($movie['name']);
                            if(!$movie_rentals || empty($movie_rentals)){  ?>
                                <li class ="submit">
                                <form method="post">
                                    <input type="submit" value="Rent Movie" name="rent"/>
                                </form>
                                <?php
                            }
                            else if($movie_rentals){?>
                            <li class="text">
                        <?php
                    foreach($movie_rentals as $rental){
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
                else{?>
                        <li class ="submit">
                        <form method="post">
                            <input type="submit" value="Rent Movie" name="rent"/>
                        </form>
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
                
            </section>
        </div>
    </section>
</div>
</div>
</div>

<?php

} ?>