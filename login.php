

<?php 
session_start();
if(isset($_POST['submit']))
{

    extract($_POST);
    include 'database.php';
    $msg = '';
    $msgClass = '';
    $sql=mysqli_query($conn,"SELECT * FROM user where email='$email' and d_password='$d_password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['id'];
        $_SESSION["Email"]=$row['email'];
        $_SESSION["username"]=$row['username'];
        header("Location: voting.php"); 
    }
    else
    {
        $msg = "Invalid Email ID/Password";
        $msgClass = 'error';
      
    }
}

?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>LogIn and SignUp Page</title>
    <link rel="stylesheet" type="text/css" href="front.css.css">


</head>

<body>
    <div class="whole">
        <br>
        <br>
        <br>
        <br>
        <br>
    <div class="box">
        
        <div class="page">
            <div class="header">
                <a id="login" class="active" href="#login">login</a>
               
            </div>
            <?php if($msgClass == 'error'): ?>
            <div id="errorMsg"><?php echo $msg?></div>
            <?php endif; ?>
            <div class="content">
                <form class="login"action="login.php" name="loginForm"                                                                                                           method="POST">
                    <input type="text" name="email" id="logName" placeholder="Username">
                    <input type="password" name="d_password" id="logPassword" placeholder="Password">
                    <div id="check">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" value="Login">
                    <a href="#">Forgot Password?</a>
                    <a href="signupform.php">SignUp</a>
                </form>
              
            </div>
        </div>
    </div>
</div>
  
    <script src="js.js"></script>
</body>