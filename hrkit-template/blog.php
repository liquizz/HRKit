<?php

$db = mysqli_connect ("localhost","root","");
mysqli_select_db ($db, "blog");
mysqli_query($db,"SET NAMES 'utf8'"); 
mysqli_query($db,"SET CHARACTER SET 'utf8'");
mysqli_query($db,"SET SESSION collation_connection = 'utf8_general_ci'");
$counter = mysqli_query($db,'SELECT COUNT(`id`) FROM `blog`');
$counter = mysqli_fetch_array($counter);
$pages = intval( ($counter[0] - 1) / 5) + 1;


if( isset($_GET['page'])) {
// Да, пользователь что-то передал
$page = (int) $_GET['page'];
	if ( $page > 0 && $page <= $pages ) {
		// Вычисляем с какого номера статьи надо начинать выводить
		$start = $page * 5 - 5;
		$sql = "SELECT * FROM `blog` ORDER BY `id` DESC LIMIT {$start}, 5";
	}
	else { 
		$sql = 'SELECT * FROM `blog` ORDER BY `id` DESC LIMIT 5 '; 
		$page = 1;
	}
}
else {
$sql = 'SELECT * FROM `blog` ORDER BY `id` DESC LIMIT 5';
$page = 1;
}
$otvet = mysqli_query($db,$sql);
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">   
<title>HRKit-test</title>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">      

<link href="css/blogtest.css" rel="stylesheet"> 
<link href="css/style.css" rel="stylesheet"><!-- Основной файл стилей -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
   
</head>

<body>




<div id="thenavbar" class="navbar navbar-default navbar-fixed-top" >
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
          <li class="user-info main-nav"><a href="authorize.php">Кабінет</a></li>
            
        
      
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
    
    <div class="row" style="padding-top:40px;  background-color: #112434;">
        
        <div class="col-md-8" style="border:3px solid white; border-radius:15px;  margin-left:30px;   margin-bottom:30px; background-color:white;">
            <article> 
 		<!-- content -->
 		<?php
 		while($row = mysqli_fetch_assoc($otvet)){
 			echo "<section>
 			<h2>{$row['title']}</h2>
 			{$row['content']}
 			<p class=\"date\">{$row['date']}</p>
 			</section> <hr>";
 		
 		}
 		?>
 	      </article>
            <?php
if( $page > 1 ) echo '<a href="blog.php?page='.($page-1).'">← на следующую</a>';
if( $page < $pages ) echo '<a href="blog.php?page='.($page+1).'">на предыдущую →</a>';
?>
        </div>
        

<?php

$db = mysqli_connect ("localhost","root","");
mysqli_select_db ($db, "blog");
mysqli_query($db,"SET NAMES 'utf8'"); 
mysqli_query($db,"SET CHARACTER SET 'utf8'");
mysqli_query($db,"SET SESSION collation_connection = 'utf8_general_ci'");
$counter = mysqli_query($db,'SELECT COUNT(`id`) FROM `updates`');
$counter = mysqli_fetch_array($counter);
$pages = intval( ($counter[0] - 1) / 5) + 1;


if( isset($_GET['page'])) {
// Да, пользователь что-то передал
$page = (int) $_GET['page'];
	if ( $page > 0 && $page <= $pages ) {
		// Вычисляем с какого номера статьи надо начинать выводить
		$start = $page * 5 - 5;
		$sql = "SELECT * FROM `updates` ORDER BY `id` DESC LIMIT {$start}, 5";
	}
	else { 
		$sql = 'SELECT * FROM `updates` ORDER BY `id` DESC LIMIT 5 '; 
		$page = 1;
	}
}
else {
$sql = 'SELECT * FROM `updates` ORDER BY `id` DESC LIMIT 5';
$page = 1;
}
$otvet = mysqli_query($db,$sql);
?>
        <div class="col-md-3" style="border:3px solid white; border-radius:15px; margin-left:30px;background-color:white;  margin-bottom:30px;">

          <article> 
 		<!-- content -->
 		<?php
 		while($row = mysqli_fetch_assoc($otvet)){
 			echo "<section>
 			<h3>{$row['title']}</h3>
 			{$row['content']}
 			<p class=\"date\">{$row['date']}</p>
 			</section> ";
 		
 		}
 		?>
 	      </article>
              
            </div>
        </div>

    <div id="copyrights">
    <div class="container">
      <p>
         KeepSolid Project Lab Onat 
      </p>
     
    </div>
  </div>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>

  
    </body>
</html>
