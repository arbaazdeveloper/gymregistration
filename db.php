
 <?php

// storing variable of form
$to = "arbaazuniquegzp@gmail.com";
$subject = "Gym Registration";

$email = $_POST["email"];
$name = $_POST['name'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$address = $_POST['address'];


//the message
$message = "<p>Name : '$name'.<p/>";
$message .= "<p>Email:- <p/> <h4>'$age'.</h4>";
$message .= "<p>Email:- <p/> <h4>'$email'.</h4>";
$message .= "<p>Contact:-<p/> <h5>'$contact'.</h5>";
$message .= "<p>Address:-<p/> <p>'$address'.</p>";


$header = "From:abc@somedomain.com \r\n";
$header .= "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);

if( $retval == true ) {
  header('location:thanks2.php');
}else {
   echo "Message could not be sent due some internal error...";
}




ini_set("display_errors", "off");

// Initialize a database connection
$conn = mysqli_connect("localhost", "root", "", "gymdata");

// Destroy if not possible to create a connection
if(!$conn){
    echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
}
 
// Get data to display on index page
$sql = "SELECT * FROM `data`";
$query = mysqli_query($conn, $sql);

//register user
if(isset($_REQUEST['register'])){
    $email = $_REQUEST["email"];
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $contact = $_REQUEST['contact'];
    $address = $_REQUEST['address'];

    $sql = "INSERT INTO `data` (name, email, age , contact ,address) VALUES('$name', '$email',  '$age','$conatct','$address')";
    mysqli_query($conn, $sql);

    echo $sql;

    header("Location: thanks.php");
    exit();
}
?>