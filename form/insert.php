<html>
  <head>
  <title>Blog Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/png" href="favicon.ico">
  </head>
<?php

//declare all connections to database
$servername = "localhost";
$username = "ekjohnson";
$password = "Scuryandjet2";
$dbname = "ekjohnso_blog";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(array_key_exists("submit", $_POST)) {

//variables for input data
$date = $_POST['date'];
$title = $_POST['title'];
$post = $_POST['post'];


//insert into table using values provided in form
$sql = "INSERT INTO blog (date, title, post) VALUES ";
$sql .= "('" . $date . "', '" . $title . "', '" . $post . "');";


//response to upload, if it's been excpeted or not
if ($conn->query($sql) === TRUE) {
    echo "Thanks! Your blog post has been stored. Please click the link below to go to the Blog."?>
    <a href="http://panel.uwe.ac.uk/~ekjohnson/ctp/blog.php">Click here</a> <?php;

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>
</html>
