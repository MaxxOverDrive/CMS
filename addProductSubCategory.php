<?php include('db_connect.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Matty's CMS!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

		<?php
			include('cmsHeader.php');
		?>

	    <div class="container">
	      <div class="row">
	        <div class="col-sm-3 text-center">
						<?php include('cmsOptions.php'); ?>
					</div>

					<div class="col-sm-9 text-center">
              <div style="font-weight: 700; font-size: 150%; width: 45%; margin: auto; position; relative;">
                <form action="uploadProductSubCategory.php" method="POST" enctype="multipart/form-data" style="margin-top: 3%;">
									<h4>Select Category</h4>
    								<select name="catName">
                      <option>SELECT</option>

                      <?php

												include('connect_cmsNew.php');

                        $varShowCatInfo = $GLOBALS['resultShowCatInfo'];

                        while($rowShowCatInfo = mysqli_fetch_assoc($varShowCatInfo)) {
                          echo "<option value='" . $rowShowCatInfo['catName'] . "'>" . $rowShowCatInfo['catName'] . "</option>";
                        }
                      ?>
                      </select>

											<h4>Select Sub Category</h4>
											<select name="subCatName">
												<option>SELECT</option>
											<?php

											$varShowSubCatInfo = $GLOBALS['resultShowSubCatInfo'];

											while($rowShowSubCatInfo = mysqli_fetch_assoc($varShowSubCatInfo)) {
												echo "<option value='" . $rowShowSubCatInfo['subCatName'] . "'>" . $rowShowSubCatInfo['subCatName'] . "</option>";
											}

											?>
										</select>

                      <h4>Select Product Class</h4>
											<select name="productClassName">
												<option>SELECT</option>
                      <?php

												$varShowProdClassInfo = $GLOBALS['resultShowProdClassInfo'];

												while($rowShowProdClassInfo = mysqli_fetch_assoc($varShowProdClassInfo)) {
													echo "<option value='" . $rowShowProdClassInfo['productClassName'] . "'>" . $rowShowProdClassInfo['productClassName'] . "</option>";
												}

											?>
										</select>

											<h4>Select Product Category</h4>
											<select name="productCatName">
												<option>SELECT</option>
                      <?php

												$varShowProdCatInfo = $GLOBALS['resultShowProdCatInfo'];

												while($rowShowProdCatInfo = mysqli_fetch_assoc($varShowProdCatInfo)) {
													echo "<option value='" . $rowShowProdCatInfo['productCatName'] . "'>" . $rowShowProdCatInfo['productCatName'] . "</option>";
												}

											?>
										</select>


										<h4>Select Product Sub Category</h4>
										<input type="text" name="productSubCatName">

                  <h4>Select image to upload</h4>
                  <input type="file" name="prodSubCatImage" />
                  <input type="submit" name="submit" value="UPLOAD" />
              </form><br />
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <div style="font-weight: 700; font-size: 150%; width: 90%; margin: auto; position; relative; right: 25%;">

						<h1 style=" margin-top: 5%;">Current Product Sub Categories</h1>
						<?php

								 $varShowProdSubCatInfo = $GLOBALS["resultShowProdSubCatInfo"];

								 while($rowShowProdSubCatInfo = mysqli_fetch_assoc($varShowProdSubCatInfo)) {
									 	 echo '<div class="product_sub_category_results">';
										 echo '<img class="product_sub_category_image" src="data:img/png;base64,'.base64_encode( $rowShowProdSubCatInfo['image'] ).'"/>';
										 echo '<h3>' . $rowShowProdSubCatInfo['productSubCatName'] . '</h3>';
										 echo '</div>';
								 }
						 ?>
					 </div>
          </div>
        </div>
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>
<?php mysqli_close($conn); ?>
