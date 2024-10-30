<?php require_once ("./layout/header.php") ?>
<?php
$class_name = $description = $class_name_err = $description_err =  "";
$invalid = false;
if (isset($_POST['class_name'])) {
    $class_name =  $_POST['class_name'];
    $description = $_POST['description'];
    if ($class_name === "") {
        $class_name_err = "Class name can not be blank!";
    }
    if ($description === "") {
        $description_err = "Description can not be blank!";
    }
    if ($class_name_err === "" && $description_err === "") {
        if (add_class($mysqli, $class_name, $description)) {
            header("Location:class_list.php");
        } else {
            $invalid = true;
        }
    }
}
?>
<h2>Class Registeration</h2>
<div class="card">
    <div class="card-body">
        <div class="card col-4">
            <div class="card-body">
            <form method="post">
                <?php if ($invalid) { ?>
                    <div class="alert alert-danger">New class can't be register!</div>
                <?php } ?>
            <div class="form-group my-3">
                <label for="class_name" class="form-label">Class Name</label>
                <input type="text" name="class_name" class="form-control" id="class_name">
                <div class="text-danger" style="font-size:12px;"><?= $class_name_err ?></div>
            </div>
            <div class="form-group my-3">
                <label for="description" class="form-label">Class Name</label>
                <textarea name="description" id="description" class="form-control" style="height: 150px;"></textarea>
                <div class="text-danger" style="font-size:12px;"><?= $description_err ?></div>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
            </div>
        </div>
            
    </div>
</div>
<?php require_once ("./layout/footer.php") ?>