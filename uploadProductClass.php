<?php

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES['prodClassImage']['tmp_name']);
    if($check !== false) {

      include('db_connect.php');

      $catName = $_POST['catName'];
      $subCatName = $_POST['subCatName'];
      $productClassName = $_POST['productClassName'];
      $image = $_FILES['prodClassImage']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
      $dataTime = date("Y-m-d H:i:s");

      if(isset($_POST['productClassName'])) {
        $sqlCheck = "SELECT * FROM ProductClass WHERE productClassName = '$productClassName'";
        $resultCheck = mysqli_query($conn, $sqlCheck);

        if(mysqli_num_rows($resultCheck) > 0) {
          echo "<h1 style='text-align: center; font-size: 200%; color: red;'>This Product Class Already Exists!</h1>";
          echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
        }
        else {

      $sqlNewProductClassName = "INSERT INTO ProductClass (catName, subCatName, productClassName, created)
                                 VALUES ('$catName', '$subCatName', '$productClassName', '$dataTime')";

      $resultNewProductClassName = mysqli_query($conn, $sqlNewProductClassName);

      if(mysqli_affected_rows($conn) > 0) {
        $lastID = mysqli_insert_id($conn);
        $sqlNewProdClassImage = "INSERT INTO Uploads (catName, subCatName, prodClassID, productClassName, image, created)
                                 VALUES ('$catName', '$subCatName', '$lastID', '$productClassName', '$imgContent', '$dataTime')";
        $resultNewProdClassImage = mysqli_query($conn, $sqlNewProdClassImage);
          header('location:addProductClass.php');
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
        echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
    }
}

?>
