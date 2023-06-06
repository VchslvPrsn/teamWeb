<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}

session_start();
require_once 'classes/Auth.class.php';

?>
<!doctype html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="jquery-ui.css">
    <link rel="shortcut icon" href="..." type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <title>Ком</title>
    <meta name="keywords" content="..." />
    <meta name="description" content="..." />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content=" ">
    <title>  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        .col {
          margin-bottom: 15px;
        }
        .card-footer {
          background-color: white;
          border-top: 0px;
        }
        .text-body-secondary {
          font-size: 1.2em;
          color: red;
          font-weight: 460;
        }
        .navbar-toggler-icon {
          width: 1em;
          height: 1em;
          color: white;
        }
        .l {
          margin-left: 10%;
          margin-right: 10%;
        }
        .ui-autocomplete {
          max-height: 20em;
          overflow: hidden;
          overflow-y: scroll;
        }
    </style>
<!-- @media-breakpoint-up(lg) {
        .d-flex {
          position: absolute;
          float: right;
          right: 15px;
        }
      }-->
    
    
  </head>
  <body> 
    <div class="header">
        <nav id="navbar-example2" class="navbar" style="background-color: #73afdc;">
            <div class="navbar-brand" href="#" style="text-align:left; font-size: calc(1.8rem + .9vw); color: white;">
            <img src="images/favicon.png" alt="Bbook" style="width:90px;"> 
            </div>
                <ul class="nav nav-pills">
                    <a style="color: white;">
                     <span>
                     <div class="container">

                      <?php if (Auth\User::isAuthorized()): ?>

                      <form class="ajax" method="post" action="./ajax.php">
                          <input type="hidden" name="act" value="logout">
                          <div class="form-actions">
                              <button class="btn btn-large btn-primary" type="submit">Выйти</button>
                          </div>
                      </form>
                      <form action="/lk.php" target="_blank">
                      <button class="btn btn-large btn-primary" type="submit">Личный кабинет</button>
                      </form>
                      <?php else: ?>

                      <form class="form-signin ajax" method="post" action="./ajax.php">
                        <div class="main-error alert alert-error hide"></div>

                        <h2 class="form-signin-heading">Please sign in</h2>
                        <input name="username" type="text" class="input-block-level" placeholder="Username" autofocus>
                        <input name="password" type="password" class="input-block-level" placeholder="Password">
                        <label class="checkbox">
                          <input name="remember-me" type="checkbox" value="remember-me" checked> Remember me
                        </label>
                        <input type="hidden" name="act" value="login">
                        <button class="btn btn-large btn-primary" type="submit">Sign in</button>

                        <div class="alert alert-info" style="margin-top:15px;">
                            <p>Not have an account? <a href="/register.php">Register it.</a>
                        </div>
                      </form>

                      <?php endif; ?>

                      </div> <!-- /container -->
                    </span> 
                    </a>
              </ul>
        </nav>
      </div>
       
        <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #73afdc">
            <div class="container-fluid">
              <a class="navbar-brand" href="#" style="color: white"><h5>Каталог</h5></a>
              <button style="background-color: white" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <!-- <a class="nav-link" aria-current="page" href="#scroll1"><h5>Образование</h5></a>
                  <a class="nav-link" href="#scroll2"><h5>Рассказы</h5></a>
                  <a class="nav-link" href="#scroll3"><h5>Детективы</h5></a>
                  <a class="nav-link" href="#scroll4"><h5>Фантастика</h5></a>
                  <a class="nav-link" href="#scroll5"><h5>Поэзия</h5></a>
                  <a class="nav-link" href="#scroll6"><h5>Романы</h5></a> -->
                  <div class="search_box">
                  <form action="">
                    <input type="text" name="search" id="search" placeholder="Введите название">		
                  </form>
                  <div id="search_box-result"></div>
                </div>
                </div>
              </div>
            </div>
          </nav><br/>
      
          <div class="l">
         <div class="carousel">
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/bn3.jpeg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-md-block">
                <h3>Скидки на весь ассортимент до -20%</h3>
              </div>
            </div>
            <div class="carousel-item">
              <img src="images/book1.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption  d-md-block">
                <h3>При первой покупке вторая книга в подарок</h3>
              </div>
            </div>
            <div class="carousel-item">
              <img src="images/book3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-md-block">
                <h3>Промокод HELLO для дополнительной скидки</h3>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
          </button>
            </div>
          </div> <br/>
            <?php        
                        $query_genres = "select * from genres"; // Fetch all the data from the table customers
                        $link = mysqli_connect("localhost","root","root","booksdb");
                        $result = mysqli_query($link, $query_genres);
                        ?>
                        <?php if ($result->num_rows > 0) : ?>
                            <?php while ($array = mysqli_fetch_row($result)) : ?>
                                    <h2 style="text-align:center;"><?php echo $array[1]; ?></h2>
                                    <?php
                                    $query_books = "select * from books where genre_id =".$array[0];
                                    $resultbooks = mysqli_query($link, $query_books);
                                    ?>
                                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">
                                    <?php while ($arraybook = mysqli_fetch_row($resultbooks)) : ?>
                                      
                                        <div class="col">
                                          <div class="card h-100">
                                          <?php $sql = "SELECT * FROM books WHERE id =".$arraybook[0];
                                            $stmt = $link->prepare($sql);
                                            // $stmt->bind_param('s', $id);
                                            $stmt->execute();
                                            $resultimg = $stmt->get_result();
                                            $row = $resultimg->fetch_array();
                                            
                                          ?>
                                          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['preview']).'"/>'; ?>
                                            
                                            <div class="card-body">
                                              <h5 class="card-title"><?php echo $arraybook[1]; ?></h5>
                                              <p class="card-text"><?php echo $arraybook[2]; ?></p>
                                            </div>
                                            <div class="card-footer">
                                              <small class="text-body-secondary"><?php echo $arraybook[4]; ?> руб</small><br/>
                                              <?php
                                              $query_users = "select * from users where id =".$arraybook[5];
                                              $resultuser = mysqli_query($link, $query_users);
                                              $arraybook = mysqli_fetch_assoc($resultuser)
                                              ?>
                                              <?php echo 'Продавец: '.$arraybook['name']; ?>
                                            </div>
                                          </div>
                                        </div>  
                                    <?php endwhile; ?>
                                    <?php mysqli_free_result($resultbooks); ?>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            
                                <a colspan="3" rowspan="1" headers="">No Data Found</a>
                            
                        <?php endif; ?>
                        <?php mysqli_free_result($result); ?>
                        
           
            <br/>
       





         <div class="footer">
         <nav class="navbar" style="background-color: #5694c3;">
        <div class="container-fluid">
            <p class="navbar-brand" href="#" style="color: white; font-size: calc(1.4rem + .3vw)">Bbook</p>
            <p style="color: white; font-size: calc(1.2rem + .3vw)">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg> г. Челябинск&nbsp&nbsp
            </p>
            <p style="color: white; font-size: calc(1.2rem + .3vw)">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                +7&nbsp(951)&nbsp678-98-87
            </p>
            </div>
        </nav>
      </div>
      </div>
      <script>
        $(document).ready(function() {	
        var $result = $('#search_box-result');
        
        $('#search').on('keyup', function(){
          var search = $(this).val();
          if ((search != '') && (search.length > 1)){
            $.ajax({
              type: "POST",
              url: "/search.php",
              data: {'search': search},
              success: function(msg){
                $result.html(msg);
                if(msg != ''){	
                  $result.fadeIn();
                } else {
                  $result.fadeOut(100);
                }
              }
            });
          } else {
            $result.html('');
            $result.fadeOut(100);
          }
        });
      
        $(document).on('click', function(e){
          if (!$(e.target).closest('.search_box').length){
            $result.html('');
            $result.fadeOut(100);
          }
        });
        
        $(document).on('click', '.search_result-name a', function(){
          $('#search').val($(this).text());
          $result.fadeOut(100);
          return false;
        });
        
        $(document).on('click', function(e){
          if (!$(e.target).closest('.search_box').length){
            $result.html('');
            $result.fadeOut(100);
          }
        });
        
        });
      </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="jquery.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>
</body>
</html>