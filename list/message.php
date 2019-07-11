<?PHP
session_start();
//THIS IS ACTUALLY THE LIST OF ADDS AND MESSAGES
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;

  font-family: Arial, Helvetica, sans-serif;



  /* Full height */
  /*height: 100%;*/
//  background-image: url('../tile.jpg');
//  background-repeat: repeat;

  /* Center and scale the image nicely */

}
.linkos {
  text-decoration: none;
  color: black;
}
.linkos:hover {
  text-decoration: none;
  color: black;
  color: #08b5cc;
}
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .login-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}
.topnav input[type=password] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}

.topnav .login-container input[type=submit] {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #555;
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color: green;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav a, .topnav input[type=password], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
  .topnav input[type=password] {
    border: 1px solid #ccc;
  }
}
h2 {
  color: #08b5cc;
  font-size: 300%;
}
.messages {
  margin-left:3%;
  color:white;
  font-size: 200%;
}
</style>
</head>
<body>

<div class="topnav">
  <a href="../">Home</a>
  <a href="index.html">List an Add</a>
  <a class="active" href="">Messages</a>
  <a class="active" href="">Your Adds</a>
<?PHP
$USR = $_SESSION["USR"];
if (isset($_SESSION["USR"])) {

  echo "<div class='login-container' style='margin-right:1%;margin-top:0.5%;'>Welcome $USR</div>";
}
else {
  echo "<div class='login-container'>
    <form action='../create/action.php' method='post' enctype='multipart/form-data'>
      <input name='USR' type='text' placeholder='Username'>

      <input name='PSWD' type='password'  placeholder='Password'>

      <input name='logType' type='submit' value='Login'>
      <input name='logType'  type='submit' value='Signup'>
    </form>
  </div>";
}?>
</div><div class='messages'>
<h2> Adds: </h2>
<h2 style="font-size: 50%;"> Click add to read messages </h2>
<?PHP
//PRINT OFF MESSAGES....:
$jsonString = file_get_contents('adds.json');

$data = json_decode($jsonString, true);
//set Stuff

foreach ($data as $key => $value) {
  $name = explode("69420666777",$key);
  $name = $name[0];
  $addname = $value[2];

  if ($name == $_SESSION['USR']) {
    echo "<br><a href='addDetail.php?add=$key' class='linkos'>$addname </a>";
    /*foreach ($value[5] as $message) {
      $nds = $value[2];
      echo "<br><span style='visibility: hidden;'>$nds:  </span>";
      print_r($message);
      echo "<br>";
      print_r($value);
      echo '<br>';
      foreach ($message as $key) {
        echo $message + " : " + $key;
        // code...
      }
      // code...
    }*/
  }
  // code...
}


//put new data back in
$newJsonString = json_encode($data);
file_put_contents('adds.json', $newJsonString);

//header('location: ../index.php');
?>
