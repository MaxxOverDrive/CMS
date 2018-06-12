<?php
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["catImage"]["tmp_name"]);
    if($check !== false) {

        include('db_connect.php');

        $catName = $_POST['catName'];
        $image = $_FILES['catImage']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $dataTime = date("Y-m-d H:i:s");

        if(isset($_POST['catName'])) {
          $sqlCheck = "SELECT * FROM Category WHERE catName = '$catName'";
          $resultCheck = mysqli_query($conn, $sqlCheck);

          if(mysqli_num_rows($resultCheck) > 0) {
            echo "<h1 style='text-align: center; font-size: 200%; color: red;'>This Category Already Exists!</h1>";
            echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
          }
          else {

        $sqlNewCat = "INSERT INTO Category (catName, created) VALUES ('$catName', '$dataTime')";

        $resultNewCat = mysqli_query($conn, $sqlNewCat);

        if(mysqli_affected_rows($conn) > 0) {
          $lastID = mysqli_insert_id($conn);
          $sqlNewCatImage = "INSERT INTO Uploads (catID, catName, image, created) VALUES('$lastID', '$catName', '$imgContent', '$dataTime')";
          $resultNewCatImage = mysqli_query($conn, $sqlNewCatImage);
            header('location:index.php');
            echo "File uploaded successfully.";
        }
        else {
            echo "<h1 style='text-align: center; font-size: 200%; color: red;'>File upload failed, please try again.</h1>";
            echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
        }
      }
    }
  }
  else {
      echo "Please select an image file to upload.";
  }
}
?>
