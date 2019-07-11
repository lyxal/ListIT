
# LIST IT (Or advertise.it )
1283 Lines of code
***A site that allows you to submit an add, and it automatically posts on facebook marketplace, gumtree, ebay etc.***

    <?PHP 
    echo "HTML5 with PHP backend. Uses JSON files to store data, in a folder called private";
    ?>

# Run down of the different files:
## /Index.php
The main page of the site. Has a interactive menu bar, which uses PHP once signed in to display the user email

![image After a user has signed in.](https://i.imgur.com/XpYhoSl.png)

Instead of the login information:

![enter image description here](https://i.imgur.com/u6eGEAd.png)

Also has a simple *Why use list it and stuff like that.* further down the page.

all the images for this page are in the `/img1`directory.

the php code for the above: `[PHP 7]`

        <!-- Navbar (sit on top) -->
    <div class="topnav">
      <a class="active" href="#home">Home</a>
      <a href="list">List an Add</a>
      <a href="list/message.php">Messages</a>
      <a href="list/message.php">Your Adds</a>
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

## /create/index.php
This has no PHP code in it, so no idea why its a .php file.

Basically a CSS POST form for creating an account. Thats it.

HTML 5 form code:

    <input name='USR' type="text" class="sign-up-input" placeholder="What's your username?" autofocus>

    <input name='PSWD' type="password" class="sign-up-input" placeholder="Choose a password">

    <input name='logType' type="submit" value="Login" class="sign-up-button">
    <input name='logType'  type="submit" value="Signup" class="sign-up-button">
## /create/action.php
The action page for the index.php file, ALSO the action page of the login bar on the main page. **This file is used to create AND authenticate user accounts. So to login and to Sign up.** 

## User account Encryption (Done in create/action.php)
We just use the standard `$crypt_pswd = crypt($PSWD,$salt);` In PHP to do this. Storing the password information in /private/usr.json

Here is what the formatting for that file looks like:

    {
    "example@hotdog.com":["RoSaCsdf4vnuQ"],
    "clayton.angus@outlook.com":["RoSaCsdf4vnuQ"],
    "jack":["Ro.Xk.aegVQVI"]
    }
We store the account in a PHP session variable.

    $crypt_pswd = crypt($PSWD,$salt);
    $COMB = $USR.$PSWD.$USR;
    $crypt_log = crypt($COMB, $salt);
    $_SESSION["USR"] = $USR;
    $_SESSION["CRYPT"] = $crypt_log;
The `$COMB` Variable here is used to allow the backend to know that it is really you, not someone who just changed the `$_SESSION["USR"]` variable to your email address. The `$COMB` varible is made up of the encrypted password, so someone would need to have acess to the `usr.json` file ***Which BTW the private folder needs to not be publicly accessible, best way is via the use of .htaccess*** 

## /create/SUCESS.php
Yes i know i spelt it wrong, but my engrish is not good.
Anyway, it basically just displays a message after someone has created their account. This is like the entire thing when you forget about CSS:

       <body>
        <h1> Welcome to List It! </h1>
        <h2> Your email is: <?PHP echo $_SESSION["USR"]; ?></h2>
       <a href="../index.php" class="w3-bar-item w3-button"></i> Get started.</a>
  And is used by the create/action.php file.

## /list/index.html
Is a HTML form where you can upload the photos for your add (Yes, multiple photos), enter contact information and details and price etc. **All fields on the form must be made into required fields. I stupidly built the whole system around the position in the list, instead of using a $key and $value system. :(** This page should also not be accesable if you are not logged in, simple fix to this:
1. Make it a PHP FILE.

>     >     <?PHP 
>     >     SessionStart();
>     >     if (isset($_SESSION['USR'])) {//Actually do nothing and continue loading the wepage}
>     >     else { header('location: err.php?data=Sorry you need an account for this.') }\
>     >     
>     >     ?>



## /list/action_page.php
Pretty much process the data, and saves data to adds.json. Also saves pictures into `/list/files`
Its pretty simple so just have a look. 

JSON FILE FORMAT BTW.

>     "clayton.angus@outlook.com69420666777Ya mums house":[  
>     [  
>     "Screen Shot 2019-05-25 at 8.18.44 pm.png"  
>     ],  
>     "69420",  
>     "Ya mums house",  
>     "its worthless.",  
>     0  
>     ],  
>     "":{  
>     "4":1,  
>     "5":[  
>     "There are no messages."  
>     ]  
>     },

**How the json is made: (list/action_page.php):**

    $ID = $_SESSION["USR"]."69420666777".$_POST['title'];
    $VAR0 = $_FILES['fileUpload']['name'];
    
    
    $VAR1 = $_POST['number'];
    
    
    $VAR2 = $_POST['title'];
    
    
    $VAR3 = $_POST['details'];
    
    
    $VAR4 = $_POST['USR'];
    
    
    $VAR4 = 0; #BOOL.
    
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

## /list/admin.php
Is a page that lists all the adds, that haven't been marked as uploaded. (The 4th element in the json array ^^)

## /list/Message.php
in the /list directory as uses the `adds.json` *Array with all the messages is in each adds data in the json file.*
ATM just lists all the adds, with each being a link to this page: (add detail.php)
## /list/adddetail.php
Does not exist yet, but uses the `$_GET['add']` data from `Message.php` to determine the add to list messages off, as well as options to delete and reply.

# HOW WE READ MESSAGES.
The idea was to use the linux server running on AWS light sail to download emails from a gmail account, which we use to list all the adds on. Then a python script would analyze the email, and get the responder name and their message, then display on the site, as well as forwarding that message to them. When you reply to the message on the site, a python script would be excecuted that sent a reply gmail, with the reply contents (This would work with gumtree and ebay but dont know about Facebook as never used personal y)

# How we post adds:
Lubuntu *Light weight version of ubuntu, but any linux distro will work fine here.* and some custom python scripts. using the pynput libary

    sudo apt-get install pip3
    pip3 install pynput
    python3
    >> import pynput #Python shouldn't error if it has been installed sucesfully.
    >> 

Basilcy, autoclicker which would use information from a text file to determine what to type. Here is the code for gum tree i have created, for a `800x600 (RES) virtual box VM` running lubuntu. (PYTHON3.7): 
**BTW, the type(x) function i made is very helpful with this library, as by default you can only do individual keys.**

**The scrollneg(x) function is needed as the program scrolls to quickly for the system to handell, so scrollneg puts a delay in.**

    >     from pynput.mouse import Button, Controller
    >     import time
    >     
    >     from pynput.keyboard import Key, Controller as KeyboardController
    >     keyboard = KeyboardController()
    >     mouse = Controller()
    >     
    >     #QUICK VARIBLES:
    >     title = "example add"
    >     description = "example description"
    >     price = '69.95'
    >     
    >     #TYPE A STRING:
    >     def type(x):
    >     	time.sleep(0.1)
    >     	for i in x:
    >     		keyboard.press(i)
    >     		time.sleep(0.1)
    >     		keyboard.release(i)
    >     	
    >     
    >     
    >     def scrollneg(x):
    >     	a = x + 1
    >     	for i in range(1,a):
    >     		mouse.scroll(0,-1)
    >     		time.sleep(0.4)
    >     #OPEN THE WEB BROWSER!
    >     mouse.position = (99,580)
    >     mouse.click(Button.left,1)
    >     time.sleep(1)
    >     #GO TO THE URL BAR
    >     mouse.position = (299,77)
    >     mouse.click(Button.left,1)
    >     time.sleep(1)
    >     #TYPE GUMTREE.com.au
    >     type('gumtree.com.au')
    >     keyboard.press(Key.enter)
    >     keyboard.release(Key.enter)
    >     
    >     #GO TO THE URL BAR again
    >     time.sleep(3)
    >     mouse.position = (400,77)
    >     mouse.click(Button.left,1)
    >     time.sleep(1)
    >     
    >     #POST ADD BUTTON
    >     mouse.position = (689,189)
    >     mouse.click(Button.left,1)
    >     time.sleep(4)
    >     
    >     #POST ADD TITLE
    >     mouse.position = (216,345)
    >     mouse.click(Button.left,1)
    >     
    >     type(title)
    >     time.sleep(2)
    >     #GREEN ARROW
    >     mouse.position = (617, 341)
    >     mouse.click(Button.left,1)
    >     time.sleep(6)
    >     #POST CATAGORY
    >     scrollneg(8)
    >     mouse.position = (247, 539)
    >     mouse.click(Button.left,1)
    >     time.sleep(4)
    >     #GREEN ARROW
    >     mouse.position = (617, 341)
    >     mouse.click(Button.left,1)
    >     time.sleep(4)
    >     #selecet want to sell...
    >     scrollneg(4)
    >     mouse.position = (219, 385)
    >     mouse.click(Button.left,1)
    >     time.sleep(2)
    >     mouse.click(Button.left,1)
    >     ######### THAT PAGE NOW DONE DONE ######
    >     ###SET THE PRICE:
    >     scrollneg(4)
    >     mouse.position = (169, 510)
    >     time.sleep(2)
    >     mouse.click(Button.left,1)
    >     time.sleep(2)
    >     type(price)
    >     time.sleep(1)
    >     #DESC
    >     scrollneg(6)
    >     time.sleep(2)
    >     mouse.position = (170, 508)
    >     mouse.click(Button.left,1)
    >     type(description) #NEEDS TO HAVE SPECIALIZED FUNCION DUE TO \n.
    >     mouse.click(Button.left,1)
   
# Why use AWS lightsail:
   Aws Lightsail is a scalable web application server. It is a linux virtual machine, which can be setup so that as demand rises and decreases, AWS fires up more Virtual machines, and then shuts them down.
   
   This is usefull as AWS virtualmachines you pay for by the hour. (As ours are ON DEMAND)
   
   However... If you were to use this, you'd need a way for all the virtual machines to acess the same `usr.json` and `adds.json` files. The best way to do this would be to create a AWS virtual storage of some type **S3 would do fine** and mount the Virtual storage as the private folder in each of these directorys: The following turorial may help:
   
   https://cloudkul.com/blog/mounting-s3-bucket-linux-ec2-instance/
   
   Obv mount in a non publically acessible folder, but somewhere that PHP can still acess it.
# Author:
Angus Clayton 2019. 

