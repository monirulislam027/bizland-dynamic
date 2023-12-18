<?php

use App\Admin\Ability;

require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

$ability = new Ability();
$counters = $ability->all_counter();

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Counters</h2>
                    <a href="add_counter.php" class="btn btn-primary ">Add Counter</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $sr=1;
                        while($counter = $counters->fetch_assoc()){?>

                            <tr id="remove-row-<?=$counter['id']?>">
                                <td><?= $sr ?></td>
                                <td><?= $counter['name']?></td>
                                <td><?= $counter['number']?></td>
                                <td><?= $counter['icon']?></td>
                                <td><input type="checkbox" class="toggle-button" data-id="<?= $counter['id'] ?>"
                                           data-action="counter-status"
                                           data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                           data-off="Inactive" <?= $counter['status'] == 1 ? 'checked' : '' ?> ></td>
                                <td class="action-bars">
                                    <a href="edit_counter.php?action=edit-counter&data=<?= base64_encode($counter['id']) ?>"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button data-url-id="<?= ($counter['id']) ?>" type="button" data-action="counter-delete"
                                            class="btn btn-danger btn-sm remove_item"><i class="fa fa-trash-alt"></i></button>

                                </td>

                            </tr>

                            <?php $sr++; } ?>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/footer.php';

?>
