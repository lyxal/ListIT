<?PHP
if ($_GET['COMF'] == 'simplejackthemovie933393939393977766640269777') {echo 'excepcted';
//get data
$jsonString = file_get_contents('adds.json');

$data = json_decode($jsonString, true);
//set Stuff

$ID = $_GET['id'];
$data[$ID][4] = 1;
$data[$ID][5] = array('There are no messages.');


//put new data back in
$newJsonString = json_encode($data);
file_put_contents('adds.json', $newJsonString);
}
//header('location: ../index.php');
