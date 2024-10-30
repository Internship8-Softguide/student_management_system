<?php


function add_student($mysqli, $student_name, $student_address, $student_age, $student_email)
{
    $sql = "INSERT INTO `student` (`student_name`,`student_address`,`student_age`,`student_email`) VALUES ('$student_name','$student_address','$student_age','$student_email')";
    return $mysqli->query($sql);
}

function get_all_student($mysqli)
{
    $sql = "SELECT * FROM `student`";
    return $mysqli->query($sql);
}

function get_student_id($mysqli, $student_id)
{
    $sql = "SELECT * FROM `student` WHERE `student_id`=$student_id";
    $resule = $mysqli->query($sql);
    return $resule->fetch_assoc();
}

function update_student($mysqli, $student_id, $student_name, $student_address, $student_age, $student_email)
{
    $sql = "UPDATE  `student` SET `student_name`='$student_name', `student_address`='$student_address', `student_age`='$student_age', `student_email`='$student_email',  WHERE `student_id`=$student_id";
    $resule = $mysqli->query($sql);
    return $resule->fetch_assoc();
}

function delete_student($mysqli, $student_id)
{
    $sql = "DELETE  FROM `student` WHERE `student_id`=$student_id";
    return $mysqli->query($sql);
}
