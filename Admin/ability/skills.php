<?php

use App\Admin\Ability;

require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

$ability = new Ability();
$skills = $ability->all_skills();

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Skills</h2>
                    <a href="add_skill.php" class="btn btn-primary ">Add Skill</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $sr=1;
                        while($skill = $skills->fetch_assoc()){?>

                            <tr id="remove-row-<?=$skill['id']?>">
                                <td><?= $sr ?></td>
                                <td><?= $skill['name']?></td>
                                <td><?= $skill['percentage']?>%</td>
                                <td><input type="checkbox" class="toggle-button" data-id="<?= $skill['id'] ?>"
                                           data-action="skill-status"
                                           data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                           data-off="Inactive" <?= $skill['status'] == 1 ? 'checked' : '' ?> ></td>
                                <td class="action-bars">

                                    <a href="edit_skill.php?action=edit-skill&data=<?= base64_encode($skill['id']) ?>"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button data-url-id="<?= ($skill['id']) ?>" type="button" data-action="skill-delete"
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
