<?php
$user = 'root';
$password = 'root';
$db = 'blog_db';
$table = 'blog';
$host = 'localhost';
$port = 3306;

$link = mysql_connect(
   "$host:$port",
   $user,
   $password
);
$db_selected = mysql_select_db(
   $db,
   $table,
   $link
);

$date=$_POST['Date:'];
$title=$_POST['Post Title:'];
$post=$_POST['Post:'];

$mysqli = new mysqli("localhost", $user, $password, $db, $table;
@mysql_select_db($db) or die( "Unable to select database");
$query = "INSERT INTO tablename VALUES('','$date','$title','$post')";
$mysqli->query($query);
$mysqli->close();
?>
<?php
//Connection to MySQL
    $con = mysqli_connect('localhost', 'root', 'root');

    if(!$con) {
        die('Not Connected To Server');
    }

    //Connection to database
    if(!mysqli_select_db($con, 'tutorial')) {
        echo 'Database Not Selected';
    }

    //Create variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = mysqli_query($con,"SELECT * FROM person WHERE name='$name' OR email='$email'");
    $sql = "INSERT INTO person (name, email) VALUES ('$name', '$email')";

    //Make sure name is valid
    if(!preg_match("/^[a-zA-Z'-]+$/",$name)) {
        die ("invalid first name");
    }

    //Response
    //Checking to see if name or email already exsist
    if(mysqli_num_rows($query) > 0) {
        echo "The name, " . $_POST['name'] . ", or email, " . $_POST['email'] . ", already exists.";
    }
    elseif(!mysqli_query($con, $sql)) {
        echo 'Could not insert';
    }
    else {
        echo "Thank you, " . $_POST['name'] . ". Your information has been inserted.";
    }

    //Close connection
    mysqli_close($con);

?>
