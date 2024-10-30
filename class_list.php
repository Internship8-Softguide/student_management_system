<?php require_once ("./layout/header.php") ?>
<h2>Class List</h2>
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="./add_class.php" class="btn btn-secondary"> Add New Class</a>
    </div>
    <div class="card-body">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php $class_list = get_all_class($mysqli); ?>
                <?php $i = 1;?>
                <?php while ($class = $class_list->fetch_assoc()) { ?>             
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $class["class_name"] ?></td>
                    <td>
                        <?= substr($class["description"], 0, 60) ?> 
                        <?php if (strlen($class["description"]) > 100) {
                            echo "...";
                        } ?>
                    </td>
                </tr>                  
                <?php $i++;
                } ?>  
            </tbody>
        </table>
    </div>
</div>
<?php require_once ("./layout/footer.php") ?>