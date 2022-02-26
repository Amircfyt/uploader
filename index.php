<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Upload آپلود رایگان فایل</title>
  
  <!-- HTML -->
  

  <!-- Custom Styles -->
  
</head>
<body>

<center>

<div style="margin-top:30%" class="container">
<br />
<?php
if (isset($_POST['submit']) && !empty($_FILES["fileToUpload"]["tmp_name"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $message = array();
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
    }
 
// Check if file already exists
    if (file_exists($target_file)) {
        $message[] = "فایل در هاست موجود است";
        $uploadOk = 0;
    }
 
// Check file size
 
//Allow certain file formats
    if ( $imageFileType != "html" &&
    $imageFileType != "php") {
    }else{
    $message[] = "از آپلود این فایل جلو گیری کنید";
        $uploadOk = 0;
    }
 
 
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message[] ="عدم آپلود فایل";
 
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $message[] = "فایل " . basename($_FILES["fileToUpload"]["name"]) . "باموفقیت آپلود انجام شد";
        } else {
            $message[] = "عدم اپلود فایل";
        }
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.2/dist/js/bootstrap.min.js"></script>

</head>

<body style="background:white;">
 <center>
 <header>
 <img src="۲۰۲۱۰۷۰۴_۱۴۴۰۴۶.png" class="ico">
 </header>
    <div class="container">
  
        <form id="upload-form" action="index.php" method="post" enctype="multipart/form-data">

            <p class="form-element">
                <label class="label"><b>:‌ انتخاب و اپلود کنید</b></label>
                <br>
                <input style="outline:none" type="file" name="fileToUpload" id="fileToUpload" value="فایل شما">
            </p>

            <p class="form-element">
                <input style="outline: none" type="submit" value="آپلود فایل" name="submit">
            </p>
        </form>
    </div>
    <?php if (isset($message)) { ?>
        <div class="container">
            <?php echo implode('<br>', $message); ?>
        </div>
    <?php 
} ?>
<div class="container">
<?php echo ":لینک دانلود"."https://bazino1.ir/upload/".$target_dir.$_FILES["fileToUpload"]["name"];?>
</div>
<br />
‌
</div>
</center>

</body>
</html>
