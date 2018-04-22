<html>
  <head>
  <title>Meal Plan Page</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="icon" type="image/png" href="favicon.ico">
  </head>

  <body>
    <header>
      <h1 style="text-decoration:underline;">Meal Plan Posts</h1>
    </header>

        <!--Social media buttons from: https://www.addtoany.com/-->
        <!-- AddToAny BEGIN -->
        <div id="share">
        <p>Share here!</p>
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="http://panel.uwe.ac.uk/~ekjohnson/ctp/blog.php" data-a2a-title="My Blog Page!">
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_whatsapp"></a>
        <a class="a2a_button_email"></a>
        </div>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->
          <hr>
        </div>

<!--source code from https://www.youtube.com/watch?annotation_id=annotation_699369&feature=iv&src_vid=k2eo5PI5Dvs&v=4tYp4zme_mg-->

<?php
//pull from this table in this database
mysql_connect("localhost", "ekjohnson", "creativeTech");
mysql_select_db("ekjohnso_blog");

//select all of the data and order it this way
$sql = mysql_query("SELECT * FROM mealPlan ORDER BY plan_number DESC");

//pull data in these boxes from this place in database
$plan_number = 'plan_number';
$week =  'week' ;
$monBreak =  'monBreak' ;
$monLun =  'monLun' ;
$monDin =  'monDin' ;
$monSna =  'monSna' ;
$tueBreak =  'tueBreak' ;
$tueLun =  'tueLun' ;
$tueDin =  'tueDin' ;
$tueSna =  'tueSna' ;
$wedBreak =  'wedBreak' ;
$wedLun =  'wedLun' ;
$wedDin =  'wedDin' ;
$wedSna =  'wedSna' ;
$thuBreak =  'thuBreak' ;
$thuLun =  'thuLun' ;
$thuDin =  'thuDin' ;
$thuSna =  'thuSna' ;
$friBreak =  'friBreak' ;
$friLun =  'friLun' ;
$friDin =  'friDin' ;
$friSna =  'friSna' ;
$satBreak =  'satBreak' ;
$satLun =  'satLun' ;
$satDin =  'satDin' ;
$satSna =  'satSna' ;
$sunBreak =  'sunBreak' ;
$sunLun =  'sunLun' ;
$sunDin =  'sunDin' ;
$sunSna =  'sunSna' ;
?>
<div id="food">

  <?php
  //display the data behind these headings from the database
while ($rows = mysql_fetch_assoc($sql)) {
  echo "<u><b>" . 'Week Recorded: ' ."</b></u>" . '</br>' . $rows[$week] . '</br></br>' . "<u><b>" .'Monday' . "</b></u>" . '</br>' . 'Breakfast: ' . $rows[$monBreak] . '</br>' . 'Lunch: ' . $rows[$monLun] . '</br>' . 'Dinner: ' . $rows[$monDin] . '</br>' . 'Snacks: ' . $rows[$monSna] .
              '</br></br>' . "<u><b>" . 'Tuesday' . "</u></b>" . '</br>' . 'Breakfast: ' . $rows[$tueBreak] . '</br>' . 'Lunch: ' . $rows[$tueLun] . '</br>' . 'Dinner: ' . $rows[$tueDin] .'</br>' . 'Snacks: ' . $rows[$tueSna] .
              '</br></br>' . "<u><b>" . 'Wednesday' . "</u></b>" . '</br>' . 'Breakfast: ' . $rows[$wedBreak] . '</br>' . 'Lunch: ' . $rows[$wedLun] . '</br>' . 'Dinner: ' . $rows[$wedDin] .'</br>' . 'Snacks: ' . $rows[$wedSna] .
              '</br></br>' . "<u><b>" . 'Thursday' . "</u></b>" . '</br>' . 'Breakfast: ' . $rows[$thuBreak] . '</br>' . 'Lunch: ' . $rows[$thuLun] . '</br>' . 'Dinner: ' . $rows[$thuDin] .'</br>' . 'Snacks: ' . $rows[$thuSna] .
              '</br></br>' . "<u><b>" . 'Saturday' . "</u></b>" . '</br>' . 'Breakfast: ' . $rows[$satBreak] . '</br>' . 'Lunch: ' . $rows[$satLun] . '</br>' . 'Dinner: ' . $rows[$satDin] .'</br>' . 'Snacks: ' . $rows[$satSna] .
              '</br></br>' . "<u><b>" . 'Sunday' . "</u></b>" . '</br>' . 'Breakfast: ' . $rows[$sunBreak] . '</br>' . 'Lunch: ' . $rows[$sunLun] . '</br>' . 'Dinner: ' . $rows[$sunDin] .'</br>' . 'Snacks: ' . $rows[$sunSna] . '</br></br>'
    .  "<hr>";
    }
?>
</div>
<?php
?>


</body>
</html>
