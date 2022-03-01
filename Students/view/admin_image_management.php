<?php
require_once('../controller/image_functions.php'); 

//get logs directory in current working directory
$dir = getcwd() . '/images/';
$imgName = '';
//User wants to view the images for the selection
if (isset($_POST['view'])) {
    $imgName = $_POST['image_file'];
}

//User wants to delete the images for the selection
if (isset($_POST['delete'])) {
    $fName = $_POST['image_file'];
    $editFile = ImageUtilities::DeleteImageFiles($dir, $fName);
    $imgName = '';
}

//User wants to upload a new file
if (isset($_POST['upload'])) {
    //Note: normally would want some error checking on file
    //size and type here; for demonstration of this ability
    //we're not performing all those checks
    $target = $dir . $_FILES['new_file']['name'];
    move_uploaded_file($_FILES['new_file']['tmp_name'],
        $target);
    ImageUtilities::ProcessImage($target);
    $imgName = '';
}
?>
<html>
    <head>
        <title>Andrew O'Brien Wk 5 Performance Assessment</title>
    </head>
    <body>
        <h1>Andrew O'Brien Wk 5 Performance Assessment</h1>
        <form method="POST">
            <h3>Image Files: <select name="image_file">
                <?php foreach(ImageUtilities::GetBaseImagesList($dir) as $file) : ?>
                    <option value="<?php echo $file; ?>"><?php echo $file; ?>
                    </option>
                <?php endforeach; ?></select>
                <input type="submit" value="View Images" name="view">
                <input type="submit" value="Delete Image" name="delete">
            </h3>
        </form>
        <h3>Upload Image File:
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="new_file" id="new_file">
                <input type="submit" value="Upload" name="upload">
            </form>
        </h3>
        <h4>Original Image:</h4>
            <img src="images/<?php echo $imgName; ?>" alt="<?php echo $imgName; ?>">
        <h4>200px Max Image:</h4>
            <img src="images/200/<?php echo $imgName; ?>" alt="<?php echo $imgName; ?>">
        <h2><a href="admin.php">Home</a></h2>
    </body>
</html>