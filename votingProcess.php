<?php
$id = $_POST['id'];
$party = $_POST['party'];

function PDPVOTE($id){
    include 'database.php';
    
    $sql=mysqli_query($conn,"SELECT * FROM user where id='$id'");
    if(mysqli_num_rows($sql)>0){
      $sql2=mysqli_query($conn,"SELECT * FROM ballotbox where userId='$id'");
      if(mysqli_num_rows($sql2)>0){
        return 'You have already casted your vote and you cannot engage this action anymore';
      }
      $query="INSERT INTO ballotbox(userId,party ) VALUES ('$id', 'PDP')";
      $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
      return 'You have successfully casted your vote';
    }
  
    return 'An Error Occured';
}


function voteA($id){
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM user where id='$id'");
    if(mysqli_num_rows($sql)>0){
      $sql2=mysqli_query($conn,"SELECT * FROM ballotbox where userId='$id'");
      if(mysqli_num_rows($sql2)>0){
        return 'You have already casted your vote and you cannot engage this action anymore';
      }
      $query="INSERT INTO ballotbox(userId,party ) VALUES ('$id', 'APC')";
      $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
      return 'You have successfully casted your vote';
    }
  
    return 'An Error Occured';
  }


if(empty($id)){
    echo 'you are not login';
    
}else{
    if($party == 'PDP'){
        echo PDPVOTE($id);
        return;
    }
    echo voteA($id);
}
?>