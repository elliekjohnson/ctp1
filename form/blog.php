<html>
  <head>
  <title>Blog Page</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="icon" type="image/png" href="favicon.ico">
  </head>

  <body>
    <header>
      <h1 style="text-decoration:underline;">Blog Posts</h1>
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
$sql = mysql_query("SELECT * FROM blog ORDER BY post_number DESC");

//pull data in these boxes to this place in database
$post_number = 'post_number';
$date = 'date';
$title = 'title';
$post = 'post';
?>

<div id="blog">
  <?php
//display the data behind these headings
while ($rows =mysql_fetch_assoc($sql)) {
  echo 'Date: ' . $rows[$date] . '</br>' . 'Title: ' . $rows[$title] . '</br>' . 'Post: ' . $rows[$post] . '</br>'  .  "<hr>";
}
?>
</div>
<?php
?>



</body>
</html>
