<?php
    require_once './Student.php';
    $student = new Student();
   $queryResult =  $student->getAllStudentInfo();
    
    
?>

<hr/>
    <a href="add-student.php"> Add Student </a> 
    <a href="view-student.php"> View Student </a>
<hr/>

<table border="1">
    <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Phone Number</th>
        <th>Email Address</th>
    </tr>
    <?php while ($student = mysqli_fetch_assoc($queryResult)) { 
        echo '<tr>';
            echo '<td>'.$student['id'].'</td>';
            echo "<td>$student[student_name] </td>";
            echo "<td>$student[phone_number]</td>";
            echo "<td>$student[email_address]</td>";
        echo '</tr>';
        } ?>
</table>