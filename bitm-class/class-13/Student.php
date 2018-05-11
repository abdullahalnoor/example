<?php

class Student {

    protected $link;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', '', 'bitm_php_64');
    }

    private function queryExecution($sql, $status = NULL) {
        if (mysqli_query($this->link, $sql)) {
            if($status) {
                 $queryResult = mysqli_query($this->link, $sql);
                 return $queryResult;
            } else {
                $message = 'Student info save successfully';
                return $message;
            }
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function saveStudentInfo($data) {
        $sql = "INSERT INTO students (student_name, phone_number, email_address) VALUES ('$data[student_name]', '$data[phone_number]', '$data[email_address]')";
        $message = $this->queryExecution($sql);
        return $message;
    }
    public function getAllStudentInfo() {
        $sql = "SELECT * FROM students";
        $status = 'bobita';
        $queryResult = $this->queryExecution($sql, $status);
        return $queryResult;
    }

}
