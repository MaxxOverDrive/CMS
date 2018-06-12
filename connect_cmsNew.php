<?php

	$sqlShowCatInfo = "SELECT Uploads.image, Category.catName FROM Uploads INNER JOIN Category ON Uploads.catID = Category.catID ORDER BY catName";
	$sqlShowSubCatInfo = "SELECT Uploads.image, SubCategory.subCatName FROM Uploads INNER JOIN SubCategory ON Uploads.subCatID = SubCategory.subCatID ORDER BY subCatName";
	$sqlShowProdClassInfo = "SELECT Uploads.image, ProductClass.productClassName FROM Uploads INNER JOIN ProductClass ON Uploads.prodClassID = ProductClass.prodClassID";
	$sqlShowProdCatInfo = "SELECT Uploads.image, ProductCategory.productCatName FROM Uploads INNER JOIN ProductCategory ON Uploads.prodCatID = ProductCategory.prodCatID";
	$sqlShowProductInfo = "SELECT Uploads.image, Product.productName, Product.productPrice, Product.affilAdCode FROM Uploads INNER JOIN Product ON Uploads.productID = Product.productID";

	$resultShowCatInfo = mysqli_query($conn, $sqlShowCatInfo);
	$resultShowSubCatInfo = mysqli_query($conn, $sqlShowSubCatInfo);
	$resultShowProdClassInfo = mysqli_query($conn, $sqlShowProdClassInfo);
	$resultShowProdCatInfo = mysqli_query($conn, $sqlShowProdCatInfo);
	$resultShowProductInfo = mysqli_query($conn, $sqlShowProductInfo);


	if(mysqli_num_rows($resultShowCatInfo) > 0) {
    $GLOBALS['resultShowCatInfo'] = $resultShowCatInfo;
  }
  else {
    echo "Category Info Not Displayed!";
  }

	if(mysqli_num_rows($resultShowSubCatInfo) > 0) {
    $GLOBALS['resultShowSubCatInfo'] = $resultShowSubCatInfo;
  }
  else {
    echo "Sub Category Info Not Displayed!";
  }

	if(mysqli_num_rows($resultShowProdClassInfo) > 0) {
    $GLOBALS['resultShowProdClassInfo'] = $resultShowProdClassInfo;
  }
  else {
    echo "Product Category Info Not Displayed!";
  }

	if(mysqli_num_rows($resultShowProdCatInfo) > 0) {
    $GLOBALS['resultShowProdCatInfo'] = $resultShowProdCatInfo;
  }
  else {
    echo "Product Category Info Not Displayed!";
  }

	if(mysqli_num_rows($resultShowProductInfo) > 0) {
    $GLOBALS['resultShowProductInfo'] = $resultShowProductInfo;
  }
  else {
    echo "Product Info Not Displayed!";
  }

?>
