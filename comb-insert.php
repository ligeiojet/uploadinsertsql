<?php
$link = mysqli_connect("localhost", "user", "pass", "tabledata");

// Check connection
if ($link === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$category = mysqli_real_escape_string($link, $_REQUEST['category']);
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$embedcode = mysqli_real_escape_string($link, $_REQUEST['embedcode']);
$video_platform = mysqli_real_escape_string($link, $_REQUEST['video_platform']);

// Attempt insert query execution
$sql = "INSERT INTO tbl_video (category, title, embedcode, video_platform) VALUES ('$category', '$title', '$embedcode', '$video_platform')";
if (mysqli_query($link, $sql)) {
  echo "Records added successfully.<br />";
} else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>

// Upload File
<?php
$allowedExts = array("mp3", "mp4");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
    || ($_FILES["file"]["type"] == "audio/mp3")($_FILES["file"]["type"] == "audio/wma")($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/gif")($_FILES["file"]["type"] == "image/jpeg"))
  && ($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts)
) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  } else {
    echo "Din Video er blevet oploaded!!";
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Størrelse: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " findes allerede!. ";
    } else {
      move_uploaded_file(
        $_FILES["file"]["tmp_name"],
        "upload/" . $_FILES["file"]["name"]
      );
      echo "Gemt i: " . "upload/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}

?>
