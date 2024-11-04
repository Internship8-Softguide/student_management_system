<?php require_once ("./layout/header.php") ?>
<?php
$message = '';
if (isset($_GET['present'])) {
    $id = $_GET['present'];
    if (!present_attendence($mysqli, $id)) {
        $message = "Internal server error!";
    }
}
if (isset($_GET['absent'])) {
    $id = $_GET['absent'];
    if (!absent_attendence($mysqli, $id)) {
        $message = "Internal server error!";
    }
}
if (isset($_GET['leave'])) {
    $id = $_GET['leave'];
    if (!leave_attendence($mysqli, $id)) {
        $message = "Internal server error!";
    }
}

?>
<h2>Pay attencence</h2>
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="./add_attendence_batch.php?batch_id=<?= $_GET["batch_id"] ?>&present_all" class="btn btn-success me-3">Present All</a>
    </div>
    <div class="card-body">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $student_list = get_all_student_with_batch_id($mysqli, $_GET["batch_id"]); ?>
                <?php $i = 1;?>
                <?php while ($student = $student_list->fetch_assoc()) { ?>             
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $student["student_name"] ?></td>
                    <td><?= $student["student_email"] ?></td>
                    <td><?= $student["student_address"] ?></td>
                    <td><?= $student["student_age"] ?></td>
                    <td>
                        <a href="./add_attendence_batch.php?batch_id=<?= $_GET["batch_id"] ?>&present=<?= $student["student_batch_id"] ?>" class="btn btn-success btn-sm">Present</a>
                        <a href="./add_attendence_batch.php?batch_id=<?= $_GET["batch_id"] ?>&leave=<?= $student["student_batch_id"] ?>" class="btn btn-warning btn-sm">Leave</a>
                        <a href="./add_attendence_batch.php?batch_id=<?= $_GET["batch_id"] ?>&absent=<?= $student["student_batch_id"] ?>" class="btn btn-danger btn-sm">Absent</a>
                    </td>
                </tr>                  
                <?php $i++;
                } ?>    
            </tbody>
        </table>
    </div>
</div>
<?php require_once ("./layout/footer.php") ?>