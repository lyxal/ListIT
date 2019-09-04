<?PHP
session_start();?>
<!DOCTYPE html>
<html>
<title>Advertise it.</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("img1/typing keyboard.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}

* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('background.jpg');

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: top;
  background-repeat: no-repeat;
  background-size: cover;
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

</style>
<body>

<!-- Navbar (sit on top) -->
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="list">List an Ad</a>
  <a href="list/message.php">Messages</a>
  <a href="list/message.php">Your Ads</a>
<?PHP
$USR = $_SESSION["USR"];
if (isset($_SESSION["USR"])) {

  echo "<div class='login-container' style='margin-right:1%;margin-top:0.5%;'>Welcome $USR</div>";
}
else {
  echo "<div class='login-container'>
    <form action='create/action.php' method='post' enctype='multipart/form-data'>
      <input name='USR' type='text' placeholder='Username'>

      <input name='PSWD' type='password'  placeholder='Password'>

      <input name='logType' type='submit' value='Login'>
      <input name='logType'  type='submit' value='Signup'>
    </form>
  </div>";
}?>

  </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
  <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">List it</span><br>
    <span class="w3-large">Stop wasting time selling stuff.</span>
    <p><a href="list" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">List an item</a></p>
  </div>

</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">WHY LIST IT</h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Ease of use</p>
      <p>No need to log into gumtree, facebook and all the other platforms just to see if you have any messages.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Time saver</p>
      <p>Why spend time making the same add multiple times when you can just create it once.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Biggest audience</p>
      <p>Auto posting on all websites so your add gets the most coverage.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Price</p>
      <p>We are a free website which you can use as much as you want.</p>
    </div>
  </div>
</div>

<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Listing on all platforms.</h3>
      <p>We will list your add on websites including Gumtree, Facebook Marketplace, Ebay so your add can get the most interest possible.</p>
      <p><a href="#work" class="w3-button w3-black"><i class="fa fa-th"> </i> Start selling</a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="img1/gumtree.png" alt="Buildings" width="200" height="100">
      <img class="w3-image w3-round-large" src="img1/facebook.png" alt="Buildings" width="200" height="100">
      <img class="w3-image w3-round-large" src="img1/ebay.png" alt="Buildings" width="200" height="100">
    </div>
  </div>
</div>

<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-quarter">
    <span class="w3-xxlarge">200+</span>
    <br>Accounts
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">1000+</span>
    <br>Ads listed
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>



<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">For any information or questions Send us an email:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: listit@gmail.com</p>



</footer>

<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
