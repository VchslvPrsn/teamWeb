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
    <link rel="shortcut icon" href="..." type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                              <button class="btn btn-large btn-primary" type="submit">Logout</button>
                          </div>
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
                  <a class="nav-link" aria-current="page" href="#scroll1"><h5>Образование</h5></a>
                  <a class="nav-link" href="#scroll2"><h5>Рассказы</h5></a>
                  <a class="nav-link" href="#scroll3"><h5>Детективы</h5></a>
                  <a class="nav-link" href="#scroll4"><h5>Фантастика</h5></a>
                  <a class="nav-link" href="#scroll5"><h5>Поэзия</h5></a>
                  <a class="nav-link" href="#scroll6"><h5>Романы</h5></a>
                  <a><form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Введите название книги" aria-label="Введите название книги">
                  <button class="btn btn-outline-light" type="submit">Поиск</button>
                </form></a>
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


            <div class="studies">
            <h2 id="scroll1" style="text-align:center;">Образование</h2><br/>
                 <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">

              <div class="col">
                <div class="card h-100">
                  <img src="images/mole.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Молекулы и кристаллы</h5>
                    <p class="card-text">И.В. Обреимов</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">2 999 руб</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="images/word.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">В стране драконов и сказочных птиц</h5>
                    <p class="card-text">Хайнц Зильман</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">1 599 руб</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="images/music.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Как работает музыка</h5>
                    <p class="card-text">Дэвид Бирн</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">1 999 руб</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="images/clin.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Клиническая токсикология</h5>
                    <p class="card-text">Е.А. Лужников</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">1 299 руб</small>
                  </div>
                </div>
              </div>
               <div class="col">
                <div class="card h-100">
                  <img src="images/blood.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Болезни системы крови</h5>
                    <p class="card-text">Н.М. Зубарева</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">799 руб</small>
                  </div>
                </div>
              </div>
            </div>
          </div>

              <div class="story">
              <h2 id="scroll2" style="text-align:center;">Рассказы</h2><br/>
              <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">

              <div class="col">
                <div class="card h-100">
                  <img src="images/mos.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Путешествие из Петербурга в Москву</h5>
                    <p class="card-text">А.Н. Радищев</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">1 999 руб</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="images/rus.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Николаевская Россия</h5>
                    <p class="card-text">Маркиз де-Кюстин</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">2 699 руб</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="images/cap.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Капитан Кук</h5>
                    <p class="card-text">Э. Маклин</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">1 299 руб</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="images/oce.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Пешком через ледовитый океан</h5>
                    <p class="card-text">У. Херберт</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">1 499 руб</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="images/hant.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Записки охотника</h5>
                    <p class="card-text">И.С. Тургенев</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">1 999 руб</small>
                  </div>
                </div>
              </div>
            </div>
          </div>

             <div class="detective">
             <h2 id="scroll3" style="text-align:center;">Детективы</h2><br/>
              <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">

              <div class="col">
              <div class="card h-100">
              <img src="images/reporter.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Репортер</h5>
                <p class="card-text">Ю.С. Семонов</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 099 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/agent.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Агент абвера</h5>
                <p class="card-text">В. Владимиров</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 099 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/order.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Ордер на убийств</h5>
                <p class="card-text">А.С. Ромов </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 299 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/heaven.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Небеса рассудили иначe</h5>
                <p class="card-text">Т.В. Полякова </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 399 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/cave.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Пещера</h5>
                <p class="card-text">Дж. Роллинс</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 499 руб</small>
              </div>
            </div>
          </div>
        </div>
      </div>


          <div class="fantastic">
           <h2 id="scroll4" style="text-align:center;">Фантастика</h2><br/>
              <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">

              <div class="col">
              <div class="card h-100">
              <img src="images/light.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Огни небес</h5>
                <p class="card-text">Р. Джордан</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">2 999 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/garden.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Садовник</h5>
                <p class="card-text">С. Бодин</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 699 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/star.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Созвездие Пса</h5>
                <p class="card-text">А. Валентинов</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 299 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/dark.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Темный паладин</h5>
                <p class="card-text">В. Маханенко</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 999 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/king.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Возвращение государя</h5>
                <p class="card-text">Джон Толкин</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 299 руб</small>
              </div>
            </div>
          </div>
        </div>
      </div>

         <div class="poetry">
         <h2 id="scroll5" style="text-align:center;">Поэзия</h2><br/>
              <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">

              <div class="col">
              <div class="card h-100">
              <img src="images/new book.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Новая книга</h5>
                <p class="card-text">Л. Мартынов</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 499 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/songs.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Где же наша звезда? Песни</h5>
                <p class="card-text">В. Высоцкий</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 399 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/akhmatova.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Стихотворения и поэмы</h5>
                <p class="card-text">А. Ахматова</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 299 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/tsvetaeva.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Стихотворения и поэмы</h5>
                <p class="card-text">М.И. Цветаева</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 999 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/bunin.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Стихотворения. Повести. Рассказы</h5>
                <p class="card-text">И.А. Бунин</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">2 999 руб</small>
              </div>
            </div>
          </div>
        </div>
      </div>

          <div class="novels">
         <h2 id="scroll6" style="text-align:center;">Романы</h2><br/>
              <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">

              <div class="col">
              <div class="card h-100">
              <img src="images/novels.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Избранные романы</h5>
                <p class="card-text">А. Беляев</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 799 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/conq.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Завоеватель</h5>
                <p class="card-text">Э. Чедвик</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 699 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/wings.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Трепет черных крыльев</h5>
                <p class="card-text">Т. Корсакова</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">2 299 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/composit.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Собрание сочинений</h5>
                <p class="card-text">Э. Хемингуэй</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 999 руб</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/financier.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Финансист</h5>
                <p class="card-text">Т. Драйзер</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">1 499 руб</small>
              </div>
            </div>
          </div>
        </div>
      </div>

         <div class="reviews">
         <h2 id="scroll6" style="text-align:center;">Отзывы</h2><br/>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-left: 2%; margin-right: 2%; margin-bottom: 20px">
                    <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="images/medicine.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Ирина, 20</h5>
                    <p class="card-text">Спасибо большое этому магазину за то, что смогла найти нужную мне книгу. Обыскала все книжные, но увы, ничего не нашла. Книга помогла подготовиться к важному экзамену в институте.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="images/symbols .png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Владимир, 32</h5>
                    <p class="card-text">Эта книга дополнила мою большую колллекцию, было интересно и познавательно узнавать что-то новое. Самое интересное, что эту книгу нигде не встречал, было приятно увидеть ее в этом магазине.</p>
                  </div>
                </div>
              </div>
            </div>
                </div>
                </div> <br/>  

              <div class="about us">
                <h2 id="scroll6" style="text-align:center;">О нас</h2>
                <p style="text-align:center; margin-left: 10%; margin-right: 10%;">Наш магазин специализируетсяся на продаже изданий, вышедших из тиража. Оказываем помощь в поиске книг, будь-то редкое коллекционное издание или специализированная литература.  Интернет-магазин не имеет розничных магазинов, складов и шоу-румов. Отправка заказанных книг осуществляется почтой России или транспортными компаниями. Книги на реализацию не принимаем.</p>
              </div>
            </div>
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


        


  















    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>
</body>
</html>