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
                <form action="uploadGraphics.php" method="POST" enctype="multipart/form-data" style="margin-top: 3%;">

                  <h1>Select Logo to upload</h1>
                  <input type="file" name="logo" /><br />
                  <input type="submit" name="submit" value="UPLOAD" />

              </form><br />
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>
<?php mysqli_close($conn); ?>
