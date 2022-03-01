<?php
session_start();
require_once('../util/security.php');
require_once('../util/file_utilities.php');

//confirm user is authorized for the page
Security::checkAuthority('tech');

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
//get logs directory in current working directory
$dir = getcwd() . "/logs/";
$editFile = '';

//User selected to view file contents
if (isset($_POST['view'])) {
    $fName = $_POST['fileToUpdate'];
    $editFile = FileUtilities::GetFileContents($dir . $fName);
}

//User is loading a file to edit
if (isset($_POST['load'])) {
    $fName = $_POST['fileToUpdate'];
    $editFile = FileUtilities::GetFileContents($dir . $fName);
}
//User wants to save edited file contents
if (isset($_POST['save'])) {
    $fName = $_POST['fileToUpdate'];
    $content = $_POST['editFile'];
    FileUtilities::WriteFile($dir . $fName, $content);
    $editFile = '';
}

//User wants to create a new file
if (isset($_POST['create'])) {
    $fName = $_POST['newFileName'];
    $content = $_POST['editFile'];
    FileUtilities::WriteFile($dir . $fName, $content);
    $editFile = '';
}
?>
<html>
    <head>
        <title>Andrew O'Brien Wk 5 Performance Assessment</title>
    </head>
    <body>
        <h1>Andrew O'Brien Wk 5 Performance Assessment</h1>
        <h3>Text File Operations</h3>
        <form method="POST">
            
            <h3>View Text File: <select name="fileToUpdate">
                <?php foreach(FileUtilities::GetFileList($dir) as $file) : ?>
                    <option value="<?php echo $file; ?>"><?php echo $file; ?>
                    </option>
                <?php endforeach; ?></select>
                <input type="submit" value="View File" name="view">
                <input type="submit" value="Edit File" name="load">
                <input type="submit" value="Save Edits" name="save">
                <br><input type="text" name="newFileName">
                <input type="submit" value="Create File" name="create">
            </h3>
            <textarea id="editFile" name="editFile" rows="15" cols="50"
                <?php if (isset($_POST['view'])) { echo 'disabled';} ?>><?php echo $editFile ?></textarea>

        </form>
        <form method='POST'>
            <input type="submit" value="Logout" name="logout">
        </form>
        <h2><a href="tech.php">Home</a></h2>
    </body>
</html>