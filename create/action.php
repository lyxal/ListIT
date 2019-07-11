<?PHP
session_start();
$USR = $_POST['USR'];
$PSWD = $_POST['PSWD'];
$salt = "Your thought it was this easy, im not including the encryption keys in the githib repo.";
//echo $USR."<br>".$PSWD."<br>";
$crypt_pswd = crypt($PSWD,$salt);
//echo $crypt_pswd;
$COMB = $USR.$PSWD.$USR;
$crypt_log = crypt($COMB, $salt);


$jsonString = file_get_contents('../private/usr.json');
$data = json_decode($jsonString, true);

if (array_key_exists($USR,$data)) {
  echo "LOGGING IN....<br>";
  if ($data[$USR][0] == $crypt_pswd) {
    $_SESSION["USR"] = $USR;
    $_SESSION["CRYPT"] = $crypt_log;
    echo "LOGIN SUCCEEDED";
    header("location: ../index.php");

  }
  else {
    echo "LOGIN FAILED! INCORRECT PASSWORD";
    header("location: index.php?err=Incorrect password.");
  }

}
elseif ( $_POST['logType'] == 'Signup')  {
  if (strlen($USR) > 2) {
  $data[$USR] = array($crypt_pswd);
  $newJsonString = json_encode($data);
  file_put_contents('../private/usr.json', $newJsonString);
  echo "SIGN UP SUCCESSFUL";
  $_SESSION["USR"] = $USR;
  $_SESSION["CRYPT"] = $crypt_log;
  echo strlen($_SESSION["USR"]);
  header("location: sucess.php");
}
else {
  header("location: index.php");
}

}

else {
  header("location: index.php?err=Incorrect Email.");
}



//header('location: ../index.php');
?>
