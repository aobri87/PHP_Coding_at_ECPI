<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/course.php');
require_once('../controller/course_controller.php');
require_once('../controller/validator.php');

$courses = CourseController::getAllCourses();


    //default course for add - empty strings and first level
    //in list
    $course = new Course('', '', '');
    //
    $pageTitle = "Add a New Course";
    //validation 
    //Declare and clear variables for error message
    $cName_error = 'Required';
    $cTopic_error = 'Required';
    $cCredit_error = 'Required';
    
    //Retrieve the courseId from the query string and
    //and use it to create a course object for that cName
    if (isset($_GET['cNo'])) {
        $course = 
            CourseController::getCourseById($_GET['cNo']);
        $pageTitle = "Update an Existing Course";
        $cNo = $course->getCourseID();
        //Declare and clear variables for error message
        $cName_error = '';
        $cTopic_error = '';
        $cCredit_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //courseFirstNameOptions are 1, 2 ,3
        $upCourse = new Course($_POST['cName'], $_POST['cTopic'], $_POST['cCredit']);
        //$upCourse->setCourseId($_POST['cName']); 

        //validate the values entered
        //$cCredit_error = OBrien_validation\stringValid($course->getFirstName(), 2, $cCredit_error);
        //$aZip_error = OBrien_validation\stringValid($course->getLastName(), 2, $aZip_error);
        //$cName_error = OBrien_validation\stringValid($course->getCourseName(), 4, $cName_error);
        //$cTopic_error = OBrien_validation\passValid($course->getPassword(), $cTopic_error);
        //$hPhone_error = OBrien_validation\birthValid($course->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($course->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($course->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($cCredit_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($cName_error) === 0 && strlen($cTopic_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($_GET['cNo'] === '-1') {
                //add
                CourseController::addACourse($upCourse);
                //header('Location: ./admin_manage_courses.php');
            } else {
                //update
                CourseController::updateACourse($upCourse);
                //header('Location: ./admin_manage_courses.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_courses.php');
    }



?>
<html>
    <head>
        <title>ECPI Student Tracker</title>
    </head>

    <body>
        <h1>ECPI Student Tracker</h1>
        <h2><?php echo $pageTitle; ?></h2>
        <form method='POST'>
            
            <input type="hidden" name="cNo"
            <?php if (!isset($_GET['cNo'])) {echo 'value="-1"'; $cNo = -1;}?>>
            <h3>Course Name: <input type="text" name="cName" <?php if ($cNo != '-1') {echo "readonly";}?>
                value="<?php echo $course->getCourseID(); ?>">
                <?php if (strlen($cName_error) > 0)
                    echo "<span style='color: red;'>{$cName_error}</span>"; ?>
            </h3>
            <h3>Course Topic: <textarea name="cTopic" rows="4" cols="30"
                value="<?php echo $course->getCourseTopic(); ?>"><?php echo $course->getCourseTopic(); ?></textarea>
                <?php if (strlen($cTopic_error) > 0)
                    echo "<span style='color: red;'>{$cTopic_error}</span>"; ?>
            </h3>
            <h3>Credit Hours: <input type="text" name="cCredit"
                value="<?php echo $course->getCourseHours(); ?>">
                <?php if (strlen($cCredit_error) > 0)
                    echo "<span style='color: red;'>{$cCredit_error}</span>"; ?>
            </h3>
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>