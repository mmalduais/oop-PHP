<?php

include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];
$sql = "SELECT balance from users where id = $user_id";
$result = mysqli_query($conn,$sql);
$balance = mysqli_fetch_assoc($result);
$numbalance = $balance['balance'];

$number_a="";
$money="";
if(isset($_POST['Deposity'])){
  $money = $_POST['money'];
  $numbalance+= $money;
  $sql = "UPDATE users SET balance= $numbalance WHERE id = $user_id";
  mysqli_query($conn, $sql);
  $number_a =rand(100000,100000000);
  header("Location: account.php");
}
if(isset($_POST['withdraw'])){
  $money = $_POST['money'];
   if($money < $numbalance){
    $numbalance -= $money;
    $sql = "UPDATE users SET balance = $numbalance WHERE id = $user_id";
    mysqli_query($conn,$sql);
  header("Location: account.php");


 }



  $sql = "UPDATE users SET balance = $numbalance WHERE id = $user_id";
  mysqli_query($conn,$sql);  mysqli_query($conn, $sql);
  $number_a =rand(100000,100000000);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">


</head>
<body>
  <!-- Navbar start -->
  <?php include_once('components/nav2.php'); ?>
  <!-- Navbar end -->



  <div class="form-container">

   <form action="" method="post">
      <h3>Ewallet Electronic</h3>
      <img src="images/Ewallet.png" style="width: 100px;
      <br>
      <br>
      <input type="text" name="money" placeholder="enter your Mony" required class="box">
      <input type="number" name="money" placeholder="enter your Mony" required class="box">
     
     
  
      <input type="submit" name="Deposity" value="Deposity" class="btn">
      <input type="submit" name="withdraw" value="withdraw" class="btn">
     
   </form>

</div>
<div class="personal" style="background-color: #857676; background-color: #857676;
    width: 150px;
    padding-bottom: -5px;
    margin-bottom: 30px;
    position: relative;
    bottom: 50px;" > 
<h4 style="font-size:15px;">Personal Information </h4>
<p style="font-size:15px;"> User_ Number:  </p>
<br>
<p style="font-size:15px;"><?php  echo $number_a; ?> </p>
<p style="font-size:15px;"><?php echo $money; ?>
<h3 style="font-size:15px;">Balance: <?php echo $numbalance ?></h3>


<div>
</body>

</html>