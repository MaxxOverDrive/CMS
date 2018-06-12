<?php
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["prodCatImage"]["tmp_name"]);
    if($check !== false) {

        include('db_connect.php');

        $catName = $_POST['catName'];
        $subCatName = $_POST['subCatName'];
        $productClassName = $_POST['productClassName'];
        $productCatName = $_POST['productCatName'];
        $image = $_FILES['prodCatImage']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $dataTime = date("Y-m-d H:i:s");

        if(isset($_POST['productCatName'])) {
          $sqlCheck = "SELECT * FROM ProductCategory WHERE productCatName = '$productCatName'";
          $resultCheck = mysqli_query($conn, $sqlCheck);

          if(mysqli_num_rows($resultCheck) > 0) {
            echo "<h1 style='text-align: center; font-size: 200%; color: red;'>This Product Category Already Exists!</h1>";
            echo "<a href='index.php'><h1 style='text-align: center; font-size: 200%;'>BACK TO HOME PAGE</h1></a>";
          }
          else {

        $sqlNewProductCatName = "INSERT INTO ProductCategory (catName, subCatName, productClassName, productCatName, created)
                      VALUES ('$catName', '$subCatName', '$productClassName', '$productCatName', '$dataTime')";

        $resultNewProductCatName = mysqli_query($conn, $sqlNewProductCatName);

        if(mysqli_affected_rows($conn) > 0) {
          $lastID = mysqli_insert_id($conn);
          $sqlNewProdCatImage = "INSERT INTO Uploads (catName, subCatName, productClassName, prodCatID, productCatName, image, created)
                                 VALUES ('$catName', '$subCatName', '$productClassName', '$lastID', '$productCatName', '$imgContent', '$dataTime')";
          $resultNewProdCatImage = mysqli_query($conn, $sqlNewProdCatImage);
            header('location:addProductCategory.php');
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
