<?php 
session_start();
include 'database.php';
$isClicked = '';
$ID= $_SESSION["ID"];
$sql=mysqli_query($conn,"SELECT * FROM user where id='$ID' ");
$row  = mysqli_fetch_array($sql);
if(isset($_SESSION["ID"])){
  
}else{
  header("Location: login.php"); 
  exit;
}

function allPVote(){
  include 'database.php';
  $sql=mysqli_query($conn,"SELECT * FROM ballotbox where party='PDP'");
  return mysqli_num_rows($sql);
}

function allAVote(){
  include 'database.php';
  $sql=mysqli_query($conn,"SELECT * FROM ballotbox where party='APC'");
  return mysqli_num_rows($sql);
}

function allVotes(){
  include 'database.php';
  $sql=mysqli_query($conn,"SELECT count(*) FROM ballotbox");
  return $sql;
}




?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>LogIn and SignUp Page</title>

    <link rel="stylesheet" type="text/css" href="flex&responsiveness.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
</head>

<body>
<div class="whole">
<header>
    <div class="header">
        <p>
            <a href="harddrive.html">Hard&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   </a>
    
            <a href="https://www.w3schools.com">Keyboard&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
    
            <a href="https://www.w3schools.com">Memory&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </a>
    
            <a href="chargingproblems.html">Charging&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </a> 
    
            <a href="monitorproblems.html">Monitor&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </a> 

            <a href="logout.php">logout&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </a> 
        </p>
    </div>
</header>
<div class="container">
  <div class="box">
    <img src="banana.jpg"><br>
    <p>Aspirant 1</p>
    <button id="btn1">+Vote</button> 
    <div id='meter'>
        <div id='progress1'></div> <br>
        <input type="text" id="tb1" value="<?php echo allAVote() ?>" disabled> 
    </div>
  </div>
  
  <div class="box">
        <img src="banana.jpg"><br>
        <p>Aspirant 2</p>
        <button id="btn">+Vote</button> 
        <div id='meter'><div id='progress2'></div> <br>
          <input type="text" id="tb2" value="<?php echo allPVote() ?>" disabled> 
        </div>
    </div>
   
</div>
<script>
  console.log("here")
  document.addEventListener('DOMContentLoaded', function () {
  // do something here ...
  document.getElementById('btn').addEventListener("click",function(){
  console.log('here')
  $.ajax({
  method: "POST",
  url: "votingProcess.php",
  data: { id: '<?php echo $ID ?>', party: 'PDP' }
  })
  .done(function( response ) {
    alert(response)
    window.location.reload();
  })
    return;
  })


  document.getElementById('btn1').addEventListener("click",function(){
    console.log('heres')
    $.ajax({
    method: "POST",
    url: "votingProcess.php",
    data: { id: '<?php echo $ID ?>', party: 'APC' }
  })
  .done(function( response ) {
    alert(response)
    window.location.reload();
  })
    return;
  })
}, false);
  
</script>

</body>
