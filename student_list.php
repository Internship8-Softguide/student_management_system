<?php require_once ("./layout/header.php") ?>
<h2>Student List</h2>
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="./add_student.php" class="btn btn-secondary"> Add New Student</a>
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
                    <th>Batches</th>
                </tr>
            </thead>
            <tbody>
                <?php $student_list = get_all_student($mysqli); ?>
                <?php $i = 1;?>
                <?php while ($student = $student_list->fetch_assoc()) { ?>             
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $student["student_name"] ?></td>
                    <td><?= $student["student_email"] ?></td>
                    <td><?= $student["student_address"] ?></td>
                    <td><?= $student["student_age"] ?></td>
                    <td><a href="./student_detail_batch_list.php?student_id=<?= $student["student_id"] ?>" class="btn btn-sm btn-secondary">Class</a></td>
                </tr>                  
                <?php $i++;
                } ?>    
            </tbody>
        </table>
    </div>
</div>
<?php require_once ("./layout/footer.php") ?>