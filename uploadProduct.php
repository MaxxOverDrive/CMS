<?php

if(isset($_POST["submit"])){

    $check = getimagesize($_FILES['productImage']['tmp_name']);

    if($check !== false) {

      include('db_connect.php');

      $catName = $_POST['catName'];
      $subCatName = $_POST['subCatName'];
      $productClassName = $_POST['productClassName'];
      $productCatName = $_POST['productCatName'];
      $productName = $_POST['productName'];
      $productPrice = $_POST['productPrice'];
      $image = $_FILES['productImage']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
      $affiliateName = $_POST['affiliateName'];
      $affilAdCode = $_POST['affilAdCode'];
      $affilAd = htmlentities(addslashes($affilAdCode));
      $dataTime = date("Y-m-d H:i:s");


      $sqlNewProduct = "INSERT INTO Product (catName, subCatName, productClassName, productCatName, productName, productPrice, affiliateName, affilAdCode, created)
                        VALUES ('$catName', '$subCatName', '$productClassName', '$productCatName', '$productName', '$productPrice', '$affiliateName', '$affilAd', '$dataTime')";

      $resultNewProduct = mysqli_query($conn, $sqlNewProduct);

      if(mysqli_affected_rows($conn) > 0) {
          $lastID = mysqli_insert_id($conn);
          $sqlNewProductImage = "INSERT INTO Uploads (catName, subCatName, productClassName, productCatName, productID, image, created)
                                 VALUES('$catName', '$subCatName', '$productClassName', '$productCatName', '$lastID', '$imgContent', '$dataTime')";
          $resultNewProductImage = mysqli_query($conn, $sqlNewProductImage);
          header('location:addProduct.php');
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
