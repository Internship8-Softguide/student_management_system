<?php require_once ("./layout/header.php") ?>
<h2>Student List in <?= $_GET["class"] ?></h2>
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="./add_student_batch.php?batch_id=<?= $_GET["batch_id"] ?>&class=<?= $_GET["class"] ?>" class="btn btn-secondary"> Add Student</a>
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
                </tr>                  
                <?php $i++;
                } ?>    
            </tbody>
        </table>
    </div>
</div>
<?php require_once ("./layout/footer.php") ?>