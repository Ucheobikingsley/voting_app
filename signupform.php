<?php
    extract($_POST);
    include("database.php");
    $msg = '';
    $msgClass = '';
    if (isset($_POST['submit'])){
    $sql=mysqli_query($conn,"SELECT * FROM user where email='$email'");
    if(mysqli_num_rows($sql)>0){
    $msg = "Email Id Already Exists";
    $msgClass = 'error';
    
    }else{
    $query="INSERT INTO user(email, username, d_password ) VALUES ('$email', '$name', '$d_password')";
    $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
    $msg = "Registration Successful"; 
    $msgClass = 'success';
    header ("Location: login.php?status=success");
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
                <a id="login" class="active" href="#login">Signup</a>
               
            </div>
            <?php if($msgClass == 'error'): ?>
            <div id="errorMsg"><?php echo $msg?></div>
            <?php endif; ?>
        
            <div class="content">
             <form class="signup"  action="signupform.php" name="signupForm" onsubmit="return validateSignupForm()" method="POST">
                    <input type="email" name="email" id="signEmail" placeholder="Email" required>
                    <input type="text" name="name" id="signName" placeholder="Username" required>
                    <input type="password" name="d_password" id="signPassword" placeholder="Password" required><br>
                    <input type="submit"  name="submit" value="SignUp">
                    <a href="front.html.php">back</a>
                </form>

            </div>
        </div>
    </div>
</div>
 
    <script src="js.js"></script>
</body>