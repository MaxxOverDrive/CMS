<?php

if(isset($_POST["update"])) {
  $check = getimagesize($_FILES["updateImage"]["tmp_name"]);
  if($check !== false) {
    include('db_connect.php');

    $updateImage = $_FILES['updateImage']['tmp_name'];
    $imgContent = addslashes(file_get_contents($updateImage));
    $dataTime = date("Y-m-d H:i:s");

    $getID = "SELECT subCatID FROM SubCategory WHERE subCatName = ";
    $sqlSelectCurrentImage = "SELECT image FROM Uploads WHERE ";
    $sqlUpdateImage = "UPDATE Uploads SET image = '$imgContent' WHERE ";

  }
}

?>
