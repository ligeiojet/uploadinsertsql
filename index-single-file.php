<head>
  <meta charset="UTF-8">
  <title>Upload file and add to database</title>
</head>

<body>
  <form action="comb-insert.php" method="post" enctype="multipart/form-data">
    <p>
      <label for="file">Choose file:</label>
      <input type="file" name="file" id="file">
    </p>

    <p>
      <label for="category">category:</label>
      <input type="text" name="category" id="category">
    </p>

    <p>
      <label for="title">title:</label>
      <input type="text" name="title" id="title">
    </p>

    <p>
      <label for="embedcode">embedcode:</label>
      <input type="text" name="embedcode" id="embedcode">
    </p>

    <p>
      <label for="video_platform">video_platform:</label>
      <input type="text" name="video_platform" id="video_platform">
    </p>


    <input type="submit" value="Submit">
  </form>
</body>

</html>
<?php include 'comb-insert.php';?>
