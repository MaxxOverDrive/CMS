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

	<?php	include('cmsHeader.php');	?>

    <div class="container">
      <div class="row">
        <div class="col-sm-3 text-center">
					<?php include('cmsOptions.php'); ?>
				</div>

				<div class="col-sm-9 text-center">
						<h1 style=" margin-top: 5%;">Current Categories</h1>
						<?php

								include('connect_cmsNew.php');

								 $varShowCatInfo = $GLOBALS["resultShowCatInfo"];

								 while($rowShowCatInfo = mysqli_fetch_assoc($varShowCatInfo)) { ?>
									 	 <div class="col-sm-3 text-center">
								 				<div class="category_results" id="<?php echo $rowShowCatInfo['catName']; ?>">
													 <img class="category_image" src="data:img/png;base64,<?php echo base64_encode( $rowShowCatInfo['image'] ); ?>"/>
													 <h3><?php echo $rowShowCatInfo['catName']; ?></h3>
												</div>
										</div>
							<?php	 }	?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-9 text-center">
						<?php

								$varShowSubCatInfo = $GLOBALS['resultShowSubCatInfo'];

							 while($rowShowSubCatInfo = mysqli_fetch_assoc($varShowSubCatInfo)) { ?>
								 <div class="col-sm-3 text-center">
									 <div class="category_results" id="<?php echo $rowShowSubCatInfo['subCatName']; ?>">
											<img class="category_image" src="data:img/png;base64,<?php echo base64_encode( $rowShowSubCatInfo['image'] ); ?>"/>
											<h3><?php echo $rowShowSubCatInfo['subCatName']; ?></h3>
										</div>
									</div>
						<?php	 } ?>
					 </div>
				 </div>
				 <div class="row">
					 <div class="col-sm-9 text-center">
						 <h1 style=" margin-top: 5%;">Current Product Classes</h1>
						 <?php
						 		$varShowProdClassInfo = $GLOBALS['resultShowProdClassInfo'];

								while($rowShowProdClassInfo = mysqli_fetch_assoc($varShowProdClassInfo)) { ?>
									 <div class="col-sm-3 text-center">
									 				<div class="category_results">
		 								 <img class="category_image" src="data:img/png;base64,<?php echo base64_encode( $rowShowProdClassInfo['image'] ); ?>"/>
		 								 <h3 class="display_title"><?php echo $rowShowProdClassInfo['productClassName']; ?></h3>
		 								</div>
									</div>
							<?php	} ?>
					 </div>
				 </div>
				 <div class="row">
					 <div class="col-sm-9 text-center">
						 <h1 style=" margin-top: 5%;">Current Product Categories</h1>
						 <?php
						 		$varShowProdCatInfo = $GLOBALS['resultShowProdCatInfo'];

								while($rowShowProdCatInfo = mysqli_fetch_assoc($varShowProdCatInfo)) { ?>
									<div class="col-sm-3 text-center">
													<div class="category_results">
											<img class="category_image" src="data:img/png;base64,<?php echo base64_encode( $rowShowProdCatInfo['image'] ); ?>"/>
											<h3 class="display_title"><?php echo $rowShowProdCatInfo['productCatName']; ?></h3>
											</div>
										</div>
							<?php	} ?>
					 </div>
				 </div>
			 </div>

			 <div class="container">
				 <div class="row">
					 <div class="col-sm-9 text-center">
						 <h1 style=" margin-top: 5%;">Current Products</h1>

						 <?php
						 		$varShowProductInfo = $GLOBALS['resultShowProductInfo'];

								while($rowShowProductInfo = mysqli_fetch_assoc($varShowProductInfo)) {
									$search = array('&quot;', '&lt;', '&gt;');
					        $replace = array( '"', '<', '>');
					        $subject = $rowShowProductInfo['affilAdCode']; ?>
									<div class='row display_product'>
										<div class="col-sm-12">
														<div class="product_name_box">
															<h3 class="product_name"><?php echo $rowShowProductInfo['productName']; ?></h3>
														</div>
													</div>
													<div class="col-sm-4">
															<div class="info_box">
																<img class="product_image" src="data:img/png;base64,<?php echo base64_encode($rowShowProductInfo['image'] ); ?>" />
															</div>
														</div>
														<div class="col-sm-4">
															<table style="width: 100%; border: 1px solid black;">
																<tr style="font-weight: 800; font-size: 125%;">
																	<td class="product_info_table">UPC</td>
																	<td class="product_info_table">Model #</td>
																	<td class="product_info_table">SKU</td>
																	<td class="product_info_table">Price</td>
																</tr>
																<tr>
																	<td class="product_info_table">29304022</td>
																	<td class="product_info_table">MR-P-Body-22</td>
																	<td class="product_info_table">34059403A</td>
																	<td class="product_info_table"><?php echo $rowShowProductInfo['productPrice']; ?></td>
																</tr>
															</table>
														</div>
														<div class='col-sm-4'>
															<div class='affilAd'><?php echo str_replace($search, $replace, $subject); ?></div>
														</div>
													</div>
												<?php	} ?>
							    </div>
							  </div>
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>
<?php mysqli_close($conn); ?>
