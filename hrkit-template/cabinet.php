<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: authorize.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Кабінет</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <link href="css/style.css" rel="stylesheet">
    
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
          
      
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <div class="container" style="padding-top:70px; ">
      <div class="row">
          
        <div id="info-block">
    <div class="container">
      <div class="row">
        

        <div class="col-lg-7 centered">
            <p>Ви увійшли як <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
             <p> <a href="logout.php" class="btn btn-danger">Вийти з акаунту</a></p>
        </div>
      </div>
    </div>
  </div>
    
   
</div>
</div>
</div>
</body>
</html>