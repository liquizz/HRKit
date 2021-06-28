<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    
  <meta charset="utf-8">
  <title>HR Kit</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <!-- Шрифт OpenSans -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <!-- Бутстрап -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Основной файл стилей -->
  <link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/logregf.css"> <!-- Стили для всплывающей формы авторизации -->
 
</head>

<body>

   <!-- Панель навигации -->
  <div id="thenavbar" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="index.php"><img src="img/logo_web.png" style=" height:80%"></a> 
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right user-info-main">
          
          <li><a href="catalogue.php" >Каталог</a></li>
          <li><a href="order.php" >Замовити</a></li>
          <li><a href="blog.php" >Блог</a></li>
          <li><a href="authorize.php">Кабінет</a></li>
          
      
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
 
     <!--  Форма входа и регистрации-->
   
<!--Форма -->  
<div class="container" style="padding-top:70px;">
      <div class="row">
          
        <div class="col-md-8 col-md-offset-2">
          <form class="contact-form" action="sendorder.php" method="post">
              
            <!--Имя--> 
            <div class="form-group">
              <input type="name" name="contact-name" class="form-control" id="contact-name" data-rule="required" placeholder="Ваше ім`я">
            </div>
            <!--/Имя-->   
              
            <!--Электронная почта-->   
            <div class="form-group">
              <input type="email" name="contact-email" class="form-control" id="contact-email" data-rule="required" placeholder="Ваша електронна адреса">
            </div>
            <!--/Электронная почта-->  
              
            <!--Текст-->   
            <div class="form-group">
              <textarea class="form-control" name="contact-message" id="contact-message" placeholder="Текст замовлення чи запитання" rows="6" data-rule="required"></textarea>
            </div>
            <!--/Текст--> 
              
            <div class="form-send">
              <button type="submit" name="send_order" class="btn btn-large">Надіслати заявку</button>
            </div>

          </form>
        </div>
      </div>
    </div>
    
    <!--/Форма -->   
    
   
    
  <!-- JavaScript-->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
    	<script src="js/onlog.js"></script>
	<script src="js/onreg.js"></script>
	<script src="js/logregf.js"></script> 
    
</body>
    

</html>
