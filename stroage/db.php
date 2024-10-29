<?php


$mysqli = new mysqli("localhost", "root", "");


if ($mysqli->connect_error) {
    echo "Cann't connect to DB!";
} else {
    $sql = "CREATE DATABASE IF NOT EXISTS `student_management_system`";
    if ($mysqli->query($sql)) {
        if ($mysqli->select_db("student_management_system")) {
            if (!create_tables($mysqli)) {
                echo "Can not create Tables!";
                die();
            }
        }
    }
}


function create_tables($mysqli)
{
    $sql = "CREATE TABLE IF NOT EXISTS `student`(`student_id` INT AUTO_INCREMENT,`student_name` VARCHAR(45) NOT NULL,`student_address` VARCHAR(45),`student_age` INT NOT NULL,`student_email`  VARCHAR(100) NOT NULL,PRIMARY KEY(`student_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `class`(`class_id` INT AUTO_INCREMENT,`description` VARCHAR(225) NOT NULL,`class_name` VARCHAR(150),PRIMARY KEY(`class_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `teacher`(`teacher_id` INT AUTO_INCREMENT,`teacher_name` VARCHAR(45) NOT NULL,`teacher_email` VARCHAR(105)  NOT NULL,`exp` INT NOT NULL,PRIMARY KEY(`teacher_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `marking_type`(`marking_type_id` INT AUTO_INCREMENT,`type_name` VARCHAR(45) NOT NULL,`min_mark` INT NOT NULL,`max_mark` INT NOT NULL,PRIMARY KEY(`marking_type_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `batch`(`batch_id` INT AUTO_INCREMENT,`batch_name` VARCHAR(80), `fees` INT NOT NULL, `description` VARCHAR(225) NOT NULL, `start_date` DATETIME NOT NULL , `end_date` DATETIME NOT NULL,`teacher_id` INT NOT NULL,`class_id` INT NOT NULL,PRIMARY KEY(`batch_id`),FOREIGN KEY (`class_id`) references `class`(`class_id`),FOREIGN KEY (`teacher_id`) references `teacher`(`teacher_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `student_batch`(`student_batch_id` INT AUTO_INCREMENT,`student_id` INT NOT NULL,`batch_id` INT NOT NULL,PRIMARY KEY(`student_batch_id`),FOREIGN KEY (`batch_id`) references `batch`(`batch_id`),FOREIGN KEY (`student_id`) references `student`(`student_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `marking`(`marking_id` INT AUTO_INCREMENT,`student_batch_id` INT NOT NULL,`marking_type_id` INT NOT NULL,`mark` INT NOT NULL,PRIMARY KEY(`marking_id`),FOREIGN KEY (`marking_type_id`) references `marking_type`(`marking_type_id`),FOREIGN KEY (`student_batch_id`) references `student_batch`(`student_batch_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `attendence`(`attendence_id` INT AUTO_INCREMENT,`present` BOOLEAN NOT NULL DEFAULT FALSE ,`leave` BOOLEAN NOT NULL DEFAULT FALSE,`student_batch_id` INT NOT NULL,PRIMARY KEY(`attendence_id`),FOREIGN KEY (`student_batch_id`) references `student_batch`(`student_batch_id`))";

    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `student_grade`(`student_grade_id` INT AUTO_INCREMENT,`student_grade` VARCHAR(10) NOT NULL,`student_batch_id` INT NOT NULL,PRIMARY KEY(`student_grade_id`),FOREIGN KEY (`student_batch_id`) references `student_batch`(`student_batch_id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    return true;
}
