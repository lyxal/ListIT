<?php
session_start();

//echo "<br> <b>ADD ID:</b>".$_SESSION["USR"]."69420666777".$_POST['title'];
$ID = $_SESSION["USR"]."69420666777".$_POST['title'];
//echo "<br>";
//echo "<br> [0]<b>FILES FOR THIS ADD:</b>";
$VAR0 = $_FILES['fileUpload']['name'];
//print_r($_FILES['fileUpload']['name']);

//echo "<br> [1]<b>ADD NUMBER:</b>";
//echo $_POST['number'];
$VAR1 = $_POST['number'];

//echo "<br> [2]<b>ADD title: </b>";
//echo $_POST['title'];
$VAR2 = $_POST['title'];

//echo "<br>[3]<b> ADD DETIALS: </b>";
//echo $_POST['details'];
$VAR3 = $_POST['details'];

//echo "<br>[4]<b>USR: </b>";
//echo $_SESSION["USR"];
$VAR4 = $_POST['USR'];

//echo "<br>[4]<b>LISTED: </b>";
$VAR4 = 0; #BOOL.
//echo "0";

//PROCESS Json
//get data
$jsonString = file_get_contents('adds.json');

$data = json_decode($jsonString, true);
//set Stuff

$data[$ID][0] = $VAR0;
$data[$ID][1] = $VAR1;
$data[$ID][2] = $VAR2;
$data[$ID][3] = $VAR3;
$data[$ID][4] = $VAR4;
$ar1 = array('There are no messages.');
$data[$ID][5] = array($ar1);


//put new data back in
$newJsonString = json_encode($data);
file_put_contents('adds.json', $newJsonString);




// Set Upload Path
$target_dir = 'files/';
if( isset($_FILES['fileUpload']['name'])) {

  $total_files = count($_FILES['fileUpload']['name']);

  for($key = 0; $key < $total_files; $key++) {

    // Check if file is selected
    if(isset($_FILES['fileUpload']['name'][$key])
                      && $_FILES['fileUpload']['size'][$key] > 0) {

      $original_filename = $_FILES['fileUpload']['name'][$key];
      $target = $target_dir . basename($original_filename);
      $tmp  = $_FILES['fileUpload']['tmp_name'][$key];
      #echo "<br>".$tmp."  |  ".$target;
      move_uploaded_file($tmp, $target);
    }

  }

}
header('location: ../index.php');

?>
