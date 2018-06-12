<?php
if(isset($_POST["submit"])){
    $checkCatImage = getimagesize($_FILES["catImage"]["tmp_cat_name"]);
    $checkSubCatImage = getimagesize($_FILES["subCatImage"]["tmp_subCat_name"]);
    $checkProdClassImage = getimagesize($_FILES["prodClassImage"]["tmp_prodClass_name"]);
    $checkProductImage = getimagesize($_FILES["productImage"]["tmp_product_name"]);
    if(($checkCatImage !== false) or ($checkSubCatImage !== false) or ($checkProdClassImage !== false) or ($checkProductImage !== false)) {
        $catImage = $_FILES['catImage']['tmp_cat_name'];
        $subCatImage = $_FILES['subCatImage']['tmp_subCat_name'];
        $prodClassImage = $_FILES['prodClassImage']['tmp_prodClass_name'];
        $productImage = $_FILES['productImage']['tmp_product_name'];

        $subImgContent = addslashes(file_get_contents($subCatImage));

        include('db_connect.php');

        $catName = $_POST['catName'];
      	$subCatName = $_POST['subCatName'];
      	$productClass = $_POST['productClass'];
      	$productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $affilAdCode = $_POST['affilAdCode'];
		    $affilAd = htmlentities(addslashes($affilAdCode));
        $dataTime = date("Y-m-d H:i:s");

        $sqlInsertSubCatName = "INSERT INTO SubCategory (catName, subCatName, subCatImage, created) VALUES ('$catName', '$subCatName', '$subImgContent', '$dataTime')";
        $sqlNewProduct = "INSERT INTO Product (catName, subCatName, productClass, productName, productPrice, productImage, affilAdCode, created)
                                   VALUES ('$catName', '$subCatName', '$productClass', '$productName', '$productPrice', '$imgContent', '$affilAd', '$dataTime')";

        $resultInsertSubCatName = mysqli_query($conn, $sqlInsertSubCatName);
        $resultNewProduct = mysqli_query($conn, $sqlNewProduct);

        if(mysqli_affected_rows($conn) > 0) {
            echo "File uploaded successfully.";
            header('location:index.php');
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
