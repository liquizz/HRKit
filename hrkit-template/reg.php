<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Введіть email";
    } 
    else if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST["email"])){
        $email_err = "Email введено некоректно.";
    }
    else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Цей email вже зареэстровано.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Щось пішло не так. Спробуйте знову пізніше.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Введіть пароль.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Пароль має бути довшим за 6 символів";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Підтвердіть пароль";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Паролі не співпадають";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: authorize.php");
            } else{
                echo "Щось пішло не так. Спробуйте знову пізніше.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
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
 
<div class="container" style="padding-top:70px; ">
      <div class="row">
          
        <div  class="col-md-8 col-md-offset-2" >
          
        <h3 style="text-align: center;">Створіть акаунт</h3>
        <p></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div style="text-align: center;" class="form-group  <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
               
                <input  style="width: 300px; margin: auto; display: block;"type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="email">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div style="text-align: center;" class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
               
                <input style="width: 300px; margin: auto; display: block;" type="password" name="password" class="form-control" value="<?php echo $password; ?>"  placeholder="пароль" maxlength="25">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div style="text-align: center;"class="form-group  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
               
                <input style="width: 300px; margin: auto; display: block;" type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"  placeholder="повторити пароль" maxlength="25">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group" style="text-align: center;">
                <input type="submit" class="btn btn-primary" value="Створити">
                
            </div>
            <p style="text-align: center;">Вже маєте акаунт? <a href="authorize.php">Увійдіть тут.</a></p>
        </form>
       
        </div>
      </div>
    </div>   
    
   
    
  <!-- JavaScript-->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/onlog.js"></script>
	<script src="js/onreg.js"></script>
	<script src="js/logregf.js"></script> 
    
</body>
    

</html>
