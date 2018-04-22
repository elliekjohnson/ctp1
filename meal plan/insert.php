<html>
  <head>
  <title>Meal Plan Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/png" href="favicon.ico">
  </head>
<?php
//declare all connections to database
$servername = "localhost";
$username = "ekjohnson";
$password = "creativeTech";
$dbname = "ekjohnso_blog";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(array_key_exists("submit", $_POST)) {

//variables for input data
$week = $_POST['week'];
$monBreak = $_POST['monBreak'];
$monLun = $_POST['monLun'];
$monDin = $_POST['monDin'];
$monSna = $_POST['monSna'];
$tueBreak = $_POST['tueBreak'];
$tueLun = $_POST['tueLun'];
$tueDin = $_POST['tueDin'];
$tueSna = $_POST['tueSna'];
$wedBreak = $_POST['wedBreak'];
$wedLun = $_POST['wedLun'];
$wedDin = $_POST['wedDin'];
$wedSna = $_POST['wedSna'];
$thuBreak = $_POST['thuBreak'];
$thuLun = $_POST['thuLun'];
$thuDin = $_POST['thuDin'];
$thuSna = $_POST['thuSna'];
$friBreak = $_POST['friBreak'];
$friLun = $_POST['friLun'];
$friDin = $_POST['friDin'];
$friSna = $_POST['friSna'];
$satBreak = $_POST['satBreak'];
$satLun = $_POST['satLun'];
$satDin = $_POST['satDin'];
$satSna = $_POST['satSna'];
$sunBreak = $_POST['sunBreak'];
$sunLun = $_POST['sunLun'];
$sunDin = $_POST['sunDin'];
$sunSna = $_POST['sunSna'];


//insert into table using values provided in form
$sql = "INSERT INTO mealPlan (week, monBreak, monLun, monDin, monSna, tueBreak, tueLun, tueDin, tueSna, wedBreak, wedLun, wedDin, wedSna, thuBreak, thuLun, thuDin, thuSna, friBreak, friLun, friDin, friSna, satBreak, satLun, satDin, satSna, sunBreak, sunLun, sunDin, sunSna) VALUES ";
$sql .= "('" . $week  . "','" . $monBreak  . "','" . $monLun  . "','" . $monDin  . "','" . $monSna  . "','" . $tueBreak  . "',
'" . $tueLun  . "','" . $tueDin  . "','" . $tueSna  . "','" . $wedBreak  . "','" . $wedLun  . "','" . $wedDin  . "',
'" . $wedSna  . "','" . $thuBreak  . "','" . $thuLun  . "','" . $thuDin  . "','" . $thuSna  . "','" . $friBreak  . "',
'" . $friLun  . "','" . $friDin  . "','" . $friSna  . "','" . $satBreak  . "','" . $satLun  . "','" . $satDin  . "',
'" . $satSna  . "','" . $sunBreak  . "','" . $sunLun  . "','" . $sunDin  . "','" . $sunSna . "');";

#echo $sql;

//response to upload, if it's been excpeted or not
if ($conn->query($sql) === TRUE) {
    echo "Thanks! Your Meal Plan post has been stored. Please click the link below to go to see this weeks Meal Plan."?>
    <a href="http://panel.uwe.ac.uk/~ekjohnson/ctp/meal_plan/mealPlan.php">Click here</a> <?php;

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>
</html>
