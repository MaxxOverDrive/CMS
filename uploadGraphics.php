<?php
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if($check !== false) {

        include('db_connect.php');

        $image = $_FILES['logo']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $dataTime = date("Y-m-d H:i:s");

        $sqlNewLogo = "INSERT INTO Uploads (logo, created) VALUES ('$imgContent', '$dataTime')";

        $resultNewLogo = mysqli_query($conn, $sqlNewLogo);

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
    }
  }
  ?>
