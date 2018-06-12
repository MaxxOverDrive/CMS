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

	  include('cmsHeader.php'); ?>

	    <div class="container">
	      <div class="row">
	        <div class="col-sm-3 text-center">
						<?php include('cmsOptions.php'); ?>
					</div>
					<div class="col-sm-9 text-center">
              <div style="font-weight: 700; font-size: 150%; width: 45%; margin: auto; position; relative; right: 25%;">
                <form action="uploadProductClass.php" method="POST" enctype="multipart/form-data" style="margin-top: 3%;">
									<h4>Select Category</h4>
    								<select name="catName">
                      <option>SELECT</option>

                      <?php
												include('db_connect.php');

												$sqlShowSubCatInfo = "SELECT Uploads.image, SubCategory.subCatName FROM Uploads INNER JOIN SubCategory ON Uploads.subCatID = SubCategory.subCatID ORDER BY subCatName";

												$resultShowSubCatInfo = mysqli_query($conn, $sqlShowSubCatInfo);

												if(mysqli_num_rows($resultShowSubCatInfo) > 0) {
											    $GLOBALS['resultShowSubCatInfo'] = $resultShowSubCatInfo;
											  }
											  else {
											    echo "Sub Category Info Not Displayed!";
											  }

                        $varShowCatInfo = $GLOBALS['resultShowCatInfo'];

                        while($rowShowCatInfo = mysqli_fetch_assoc($varShowCatInfo)) { ?>
                          <option value="<?php echo $rowShowCatInfo['catName']; ?>"><?php echo $rowShowCatInfo['catName']; ?></option>
                    <?php }  ?>
                      </select>

											<?php mysqli_close($conn); ?>

											<h4>Select Sub Category</h4>
											<select name="subCatName">
											<?php
												switch($rowShowCatInfo['catName']) {
													case Automotive:
													inlude("db_connect.php");
													$automotiveSQL = "SELECT subCatName FROM SubCategory
													 									WHERE catName = 'Automotive'
																						ORDER BY subCatName DESC";
													$automotiveResult = mysqli_query($conn, $automotiveSQL);

													if(mysqli_num_rows($automotiveResult) > 0) {
														$GLOBALS['automotiveResult'] = $automotiveResult;
													}

													$automotiveVar = $GLOBALS['automotiveResult'];

													while($automotiveRow = mysqli_fetch_assoc($automotiveVar)) { ?>
														<option><?php echo $automotiveRow['subCatName']; ?></option>
												<?php	}
												mysqli_close($conn);
												break;

												case Books & Literature:
												inlude("db_connect.php");
												$booksAndLitSQL = "SELECT subCatName FROM SubCategory
												 									 WHERE catName = 'Books & Literature'
																					 ORDER BY subCatName DESC";
												$booksAndLitResult = mysqli_query($conn, $booksAndLitSQL);

												if(mysqli_num_rows($booksAndLitResult) > 0) {
													$GLOBALS['booksAndLitResult'] = $booksAndLitResult;
												}

												$booksAndLitVar = $GLOBALS['booksAndLitResult'];

												while($booksAndLitRow = mysqli_fetch_assoc($booksAndLitVar)) { ?>
													<option><?php echo $booksAndLitRow['subCatName']; ?></option>
											<?php	}
											mysqli_close($conn);
											break;

											default: ?>
												<option>SELECT</option>
										<?php	}

											?>

										</select>

                  <h4>Enter New Product Class Name</h4>
                  <input type="text" name="productClassName">
									<input type="file" name="prodClassImage"><br />
                  <input type="submit" name="submit" value="UPLOAD">

              </form><br />
          </div>
        </div>
      </div>
    </div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1 style=" margin-top: 5%;">Current Product Classes</h1>
					<?php

						$varShowProdClassInfo = $GLOBALS['resultShowProdClassInfo'];

						while($rowShowProdClassInfo = mysqli_fetch_assoc($varShowProdClassInfo)) {
							 echo '<div class="product_class_results">';
							 echo '<img class="product_class_image" src="data:img/png;base64,'.base64_encode( $rowShowProdClassInfo['image'] ).'"/>';
							 echo '<h3 class="display_title">' . $rowShowProdClassInfo['productClassName'] . '</h3>';
							 echo '</div>';
						}

					?>
				</div>
			</div>
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>
