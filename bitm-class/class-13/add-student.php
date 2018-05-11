<?php
$message='';
    if(isset($_POST['btn'])) {
        require_once './Student.php';
        $student = new Student();
        $message= $student->saveStudentInfo($_POST);
    }

?>

<hr/>
    <a href="add-student.php"> Add Student </a> 
    <a href="view-student.php"> View Student </a>
<hr/>

<h1><?php echo $message; ?></h1>
<form action="" method="POST">
    <table>
        <tr>
            <td>Student Name</td>
            <td><input type="text" name="student_name"></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><input type="number" name="phone_number"></td>
        </tr>
        <tr>
            <td>Email Address</td>
            <td><input type="email" name="email_address"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="Save Student Info"></td>
        </tr>
    </table>
</form>