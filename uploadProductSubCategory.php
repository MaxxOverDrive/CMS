<?php

if(isset($_POST["submit"])){

    $check = getimagesize($_FILES['prodSubCatImage']['tmp_name']);

    if($check !== false) {

      include('db_connect.php');

      $catName = $_POST['catName'];
      $subCatName = $_POST['subCatName'];
      $productClassName = $_POST['productClassName'];
      $productCatName = $_POST['productCatName'];
      $productSubCatName = $_POST['productSubCatName'];
      $image = $_FILES['prodSubCatImage']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
      $dataTime = date("Y-m-d H:i:s");


      $sqlNewProductSubCategory = "INSERT INTO ProductSubCategory (catName, subCatName, productClassName, productCatName, productSubCatName, created)
                        VALUES ('$catName', '$subCatName', '$productClassName', '$productCatName', '$productSubCatName', '$dataTime')";

      $resultNewProductSubCategory = mysqli_query($conn, $sqlNewProductSubCategory);

      if(mysqli_affected_rows($conn) > 0) {
          $lastID = mysqli_insert_id($conn);
          $sqlNewProdSubCatImage = "INSERT INTO Uploads (prodSubCatID, catName, subCatName, productClassName, productCatName, productSubCatName, image, created)
                                 VALUES('$lastID', '$catName', '$subCatName', '$productClassName', '$productCatName', '$productSubCatName', '$imgContent', '$dataTime')";
          $resultNewProdSubCatImage = mysqli_query($conn, $sqlNewProdSubCatImage);
          header('location:addProductSubCategory.php');
          echo "File uploaded successfully.";
      }
      else {
          echo "<h1 style='text-align: center; font-size: 200%; color: red;'>File upload failed, please try again.</h1>";
          echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
      }

    }

    else {
        echo "Please select an image file to upload.";
        echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
    }
}

?>
