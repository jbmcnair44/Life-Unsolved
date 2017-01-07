<!DOCTYPE html>
    <html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Life Unsolved</title>
        <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Amatic+SC">
        <link rel="stylesheet" href="w3.css">
        <link rel="stylesheet" href="main.css">

    </head>
    
        
        
<?php
    
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
require_once '/home/jbmcnair44/vendor/swiftmailer/swiftmailer/lib/swift_required.php';


 // define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = $comment = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $comment = test_input($_POST["comment"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    header('Location: http://lifeunsolved.com/letstalk.html')
    exit("Only letters and white space allowed")
    ;

    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

}   
    
   

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('lifeunsolved@gmail.com')
  ->setPassword('JBMmlb44')
  ;

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject')
     // Give the message a subject
  ->setSubject('Life Unsolved Comment')
    
  // Set the From address with an associative array
  ->setFrom(array('lifeunsolved@gmail.com' => 'Life Unsolved'))

  // Set the To addresses with an associative array
  ->setTo(array('jbmcnair44@gmail.com' => 'Jonathan McNair'))
    
  // Give it a body
  ->setBody("Name: $name\r\n\r\nEmail: $email\r\n\r\nComment: $comment")
  ;

// Send the message
$result = $mailer->send($message);
echo "<h3>Thanks for contacting us $name! we will respond as soon as possible. Have a nice day.</h3>"
?>
<body>
    
    <!Navagation!>   
<div class="w3-top w3-white w3-bottombar w3-border-black w3-hide-small">
  <ul class="w3-navbar w3-white w3-displayleft">
      <li><a class="logo" href="index.html"> <img src="imgaes/logo.jpg" style="width:50px;height:50px;padding-top:20px;"></a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="archive.html">Archive</a></li>
    <li><a href="donate.html">Donate</a></li>
    <li><a href="letstalk.html">Let's Talk</a></li>
        </ul>
    </div>
<div class="w3-accordion w3-center w3-hide-large w3-hide-medium" style="margin-bottom:-90px;" >
        <a onclick="myAccFunc()" href="#"><img src="imgaes/logo.jpg" style="width:50px;height:50px;padding-top:20px;"><i class="fa fa-caret-down"></i></a>
  <div id="demoAcc" class="w3-accordion-content w3-white w3-card-4">
    <div class="MNav">
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="archive.html">Archive</a>
    <a href="donate.html">Donate</a>
    <a href="letstalk.html">Let's Talk</a>
    </div>
        </div>
        
      
<script>
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-green";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-green", "");
    }
}
</script>
      
  </div>

<div class="w3-content w3-padding">
  
<p class="w3-center w3-content title">Life Unsolved</p>



    
</div>    
    
</body>
</html>
    
    