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
          <div style="font-weight: 700; font-size: 150%; width: 45%; margin: auto; position; relative; right: 25%;">
            <form action="uploadSubCategory.php" method="POST" enctype="multipart/form-data" style="margin-top: 3%;">
							<h4>Select Category</h4>
								<select name="catName">
                  <option>SELECT</option>
                  <?php

										include('connect_cmsNew.php');

                    $varShowCatInfo = $GLOBALS['resultShowCatInfo'];

                    while($rowShowCatInfo = mysqli_fetch_assoc($varShowCatInfo)) { ?>
                      <option value='<?php echo $rowShowCatInfo['catName']; ?>'><?php echo $rowShowCatInfo['catName']; ?></option>
                  <?php  }  ?>
                  </select>

                  <h4>Add New Sub Category</h4>
                  <input type="text" name="subCatName">
									<h4>Select SubCategory image</h4>
                  <input type="file" name="subCatImage" /><br />
                  <input type="submit" name="submit" value="UPLOAD">
              </form><br />
          </div>
        </div>
      </div>
    </div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1 style=" margin-top: 5%;">Current Sub Categories</h1>
					<div class="col-sm-3">
						<ul>
							<?php

									$varShowSubCatInfo = $GLOBALS['resultShowSubCatInfo'];

									while($rowShowSubCatInfo = mysqli_fetch_assoc($varShowSubCatInfo)) { ?>

										<li class="display_subCatName"><?php echo $rowShowSubCatInfo['subCatName']; ?></li>

							<?php		}	 ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>
<?php mysqli_close($conn); ?>
