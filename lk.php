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
    <title>Личный кабинет</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
        <form class="form-signin ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Please sign up</h2>
        <input name="name" type="text" class="input-block-level" placeholder="name" autofocus>
        <input name="author" type="text" class="input-block-level" placeholder="Password">
        <input name="genre_id" type="number" class="input-block-level" placeholder="Confirm password">
        <input name="price" type="number" class="input-block-level" placeholder="Confirm password">
        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="seller_id" type="number" class="input-block-level" placeholder="Confirm password">
        <input name="image" type="file" class="input-block-level" placeholder="Confirm password">
        <input type="hidden" name="act" value="addBook">
        <button class="btn btn-large btn-primary" type="submit">Register</button>
      </form>
                                    
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Автор</th>
                            <th scope="col">Жанр</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $link = mysqli_connect("localhost","root","root","booksdb");
                        $query = "select * from books where seller_id =".$_SESSION['user_id']; // Fetch all the data from the table customers
                        $result = mysqli_query($link, $query);
                        ?>
                        <?php if ($result->num_rows > 0) : ?>
                            <?php while ($array = mysqli_fetch_row($result)) : ?>
                                <tr>
                                    <th scope="row"><?php echo $array[1]; ?></th>
                                    <td><?php echo $array[2]; ?></td>
                                    <td><?php $query_genres = "select * from genres where id=".$array[3];
                                        $result_genres = mysqli_query($link, $query_genres);
                                        $array_genres = mysqli_fetch_row($result_genres);
                                        echo $array_genres[1];
                                    ?></td>
                                    <td><?php echo $array[4]; ?></td>
                                    <td><?php echo '<img width=30% src="data:image/jpeg;base64,'.base64_encode($array[6]).'"/>'; ?></td>
                                    <td>  
                                    <div class="showdata">
                                    <span class='delete' data-id='<?= $array[0]; ?>'>Удалить</span>
                                    </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            
                        <?php else : ?>
                            <tr>
                                <td colspan="3" rowspan="1" headers="">No Data Found</td>
                            </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result); ?>
                    </tbody>
                </table>
                </form>
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
    <script src="jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#bookInserUpdateForm').submit(function() {
                // ajax
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: $(this).serialize(), // get all form field value in 
                    dataType: 'json',
                    success: function(res) {
                        window.location.reload();
                    }
                });
            });
        });

        $(document).ready(function(){
        // Delete 
        $('.delete').click(function(){
        var el = this;
        
        // Delete id
        var deleteid = $(this).data('id');

        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            // AJAX Request
            $.ajax({
            url: 'delete.php',
            type: 'POST',
            data: { id:deleteid },
            success: function(response){

                if(response == 1){
            // Remove row from HTML Table
            $(el).closest('tr').css('background','tomato');
            $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
            });
                }else{
            alert('Invalid ID.');
                }

            }
            });
        }

        });

        });
    </script>
    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>