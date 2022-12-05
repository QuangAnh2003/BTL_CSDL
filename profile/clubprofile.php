<!DOCTYPE html>
<html lang="">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=" viewport " content=" width = device-width, initial-scale = 1 ">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="../css/player_profile.css">

    <meta name="theme-color" content="#fafafa">

</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light justify-content-center fixed-top">
    <a class="navbar-brand d-flex col-sm-4 mr-auto" href="../welcome.php">FIO team</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">
        <ul class="nav navbar-nav mr-auto justify-content-end">
            <li class="col-sm-4"></li>
            <li class="nav-item col-sm-2">
                <a href="../home.php" class="stretched-link text-center" style="color: black">Home</a>
            </li>
            <li class="nav-item col-sm-2">
                <a href="../player.php" class="stretched-link text-center" style="color: black">Player</a>
            </li>
            <li class="nav-item col-sm-2">
                <a href="../clubs.php" class="stretched-link text-center" style="color: black">Clubs</a>
            </li>
            <li class="nav-item col-sm-2">
                <a href="../competitions.php" class="stretched-link text-center" style="color: black">Competitions</a>

            </li>
        </ul>
    </div>
    <form action="" id="search-box">
        <input type="text" id="search-text">
        <button id="search-btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</nav>

<?php
include('../admincp/config/config.php');
$sql_club_info = "select clubs.*, comp.pretty_name as league_name, comp.country_name, comp.img_url as league_url , s.stadium_seats, country.flag_url
from clubs join competitions as comp on clubs.`domestic_competition_id` = comp.competition_id
join stadiums as s on clubs.stadium_name = s.stadium_name
join country on comp.country_name = country.country_name
where club_id = $_GET[id]";
$query_club_info = mysqli_query($conn, $sql_club_info);
$row_title = mysqli_fetch_array($query_club_info);
?>

<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="<?php echo $row_title['img_url'] ?>" style="width: 300px; margin-left: 80px" alt="Card image">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0"><?php echo $row_title['pretty_name'] ?></h3>
                                    <span class="text-primary">
                                        <b><?php echo $row_title['country_name'] ?></b>
                                        <img src="<?php echo $row_title['flag_url'] ?>" style="height: 18px; background-color: white; margin-bottom: 5px">
                                    </span>
                                </div>
                                <img src="<?php echo $row_title['league_url'] ?>" style="margin-bottom: 42px; margin-left: 50px; height: 120px">
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">
                                            League:
                                        </span>
                                        <b style="font-size: 25px"><?php echo $row_title['league_name'] ?></b>
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Total market value: </span><b> <?php echo '€'.$row_title['total_market_value'].'m' ?> </b></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Squad size: </span><b> <?php echo $row_title['squad_size'] ?> </b></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Average age: </span><b> <?php echo $row_title['average_age'] ?> </b></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Foreigners: </span><b> <?php echo $row_title['foreigners_number'] ?> </b>&nbsp;<span style="font-size: 12px"><?php echo $row_title['foreigners_percentage'].'%' ?></span></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">National team players: </span><b> <?php echo $row_title['national_team_players'] ?> </b></li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Stadium: </span><b> <?php echo $row_title['stadium_name'] ?> </b>&nbsp;<span style="font-size: 12px"><?php echo $row_title['stadium_seats'].' seats' ?></span></li>
                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">SQUAD OF <?php echo $row_title['pretty_name'] ?></span>
                    <p>Edith is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="mb-4 mb-sm-5">
                            <span class="section-title text-primary mb-3 mb-sm-4">Skill</span>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Driving range</div>
                                    <div class="col-6 text-end">80%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Short Game</div>
                                    <div class="col-6 text-end">90%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:10%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Side Bets</div>
                                    <div class="col-6 text-end">50%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Putting</div>
                                    <div class="col-6 text-end">60%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                        </div>
                        <div>
                            <span class="section-title text-primary mb-3 mb-sm-4">Education</span>
                            <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                            <p class="mb-1-9">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
