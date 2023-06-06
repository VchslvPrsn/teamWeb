<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();
require_once './classes/Auth.class.php';

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Ajax Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Личный кабинет</h1>
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
                                          <?php echo '<img width=8% src="data:image/jpeg;base64,'.base64_encode($row['preview']).'"/>'; ?>
                                            
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
                                              <?php
                                                $querydel = "delete * from books where id =".$arraybook['id'];
                                              ?>
                                              <br/>
                                              <button class="btn">Удалить</button>
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
      <!-- <form class="form-signin ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Please sign up</h2>
        <input name="username" type="text" class="input-block-level" placeholder="Username" autofocus>
        <input name="password1" type="password" class="input-block-level" placeholder="Password">
        <input name="password2" type="password" class="input-block-level" placeholder="Confirm password">
        <input type="hidden" name="act" value="register">
        <button class="btn btn-large btn-primary" type="submit">Register</button>
        <div class="alert alert-info" style="margin-top:15px;">
            <p>Already have account? <a href="/">Sign In.</a>
        </div>
      </form>
      <?php else: ?>
        <h1>Вы не авторизованы</h1>
      <a href='/index.php'>На главную</a>

      <?php endif; ?> -->

    </div> <!-- /container -->

    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>