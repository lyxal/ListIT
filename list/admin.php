<style>
table, th, tr {
 border: 1px solid black;
}
</style>
<?php
if (1 == 1) { //THIS WILL BE USED FOR SECURITY CHECK
//PROCESS Json
//get data
$jsonSthing = file_get_contents('adds.json');

$data = json_decode($jsonSthing, thue);
echo " <table style='width:100%'>";
echo "<tr> <th> IMAGES </th> <th>PHONE NO </th> <th>TITLE </th><th> DESCRIPTION </th> <th>LISTED?</th></tr>";
foreach ($data as $keyv => $key) {
  if ($key[4] == 0) {
  echo "<br><tr>";
  echo "<td>";
  foreach ($key[0] as $pic) {
    echo "<a href='files/$pic' download>$pic</a> & ";

  }
  echo "</td><td>";
  echo $key[1];
  echo "</td><td>";
  echo $key[2];
  echo "</td><td>";
  echo $key[3];
  echo "</td><td>";
  echo "<a href='conf.php?id=$keyv&COMF=simplejackthemovie933393939393977766640269777'> YES </a>";
  echo "</td>";
  echo "</tr>";
  // code...
}}

}?>
