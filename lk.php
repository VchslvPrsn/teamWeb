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
    <input type="hidden" name="act" value="logout">
                          <div class="form-actions">
                          <form action="./index.php">
                              <button class="btn btn-large btn-primary" type="submit">Выйти</button>
                          </form>
                          </div>
                      </form>
                      <div id="book-model" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="bookModel"></h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="bookInserUpdateForm" name="bookInserUpdateForm" class="form-horizontal" method="POST">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Название</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="name" name="name" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Автор</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="author" name="author" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Жанр</label>
                                        <div class="col-sm-12">
                                            <!-- <input type="text" class="form-control" id="genre" name="genre" value="" required=""> -->
                                            <select name="genres" >
                                                <?php
                                                    // use a while loop to fetch data
                                                    // from the $all_categories variable
                                                    // and individually display as an option
                                                    $link = mysqli_connect("localhost","root","root","booksdb");
                                                    $query_genres = "select * from genres";
                                                    $result_genres = mysqli_query($link,$query_genres);
                                                    while ($genre = mysqli_fetch_array(
                                                            $result_genres)):;
                                                ?>
                                                    <option id="genre" name="genre" value="<?php echo $genre[0];?>">
                                                        <?php echo $genre[1];
                                                            // To show the category name to the user
                                                        ?>
                                                    </option>
                                                <?php
                                                    endwhile;
                                                    // While loop must be terminated
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Цена</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="price" name="price" value="" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Картинка</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="image" name="image" value="" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Добавить
                                        </button>
                                    </div>
                                    </form>
				                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                                    
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
      </form>-->
      <?php else: ?>
        <h1>Вы не авторизованы</h1>
      <a href='/index.php'>На главную</a>

      <?php endif; ?> 

    </div> <!-- /container -->
    <script src="jquery.js"></script>
    <script>
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