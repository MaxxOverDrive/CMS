<?php
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["subCatImage"]["tmp_name"]);
  if($check !== false) {
        include('db_connect.php');

        $catName = $_POST['catName'];
        $subCatName = $_POST['subCatName'];
        $image = $_FILES['subCatImage']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $dataTime = date("Y-m-d H:i:s");

        if(isset($_POST['subCatName'])) {
          $sqlCheck = "SELECT * FROM SubCategory WHERE subCatName = '$subCatName'";
          $resultCheck = mysqli_query($conn, $sqlCheck);

          if(mysqli_num_rows($resultCheck) > 0) {
            echo "<h1 style='text-align: center; font-size: 200%; color: red;'>This SubCategory Already Exists!</h1>";
            echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
          }
          else {

            $sqlNewSubCatName = "INSERT INTO SubCategory (catName, subCatName, created)
                                 VALUES ('$catName', '$subCatName', '$dataTime')";

            $resultNewSubCatName = mysqli_query($conn, $sqlNewSubCatName);

            if(mysqli_affected_rows($conn) > 0) {
              $lastID = mysqli_insert_id($conn);
              $sqlNewSubCatImage = "INSERT INTO Uploads (catName, subCatID, subCatName, image, created)
                                    VALUES('$catName', '$lastID', '$subCatName', '$imgContent', '$dataTime')";
              $resultNewSubCatImage = mysqli_query($conn, $sqlNewSubCatImage);
                header('location:addSubCategory.php');
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
