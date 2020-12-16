<?php

use App\Admin\Services;

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

$services = new Services();
$all_services = $services->all_service();


?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Manage Services </h2>
                    <a href="add_services.php" class="btn btn-primary ">Add Service</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable">
                        <thead>
                        <th>NO.</th>
                        <th >Title</th>
                        <th >Icon</th>
                        <th >Desc</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $sr=1;
                        while($service = $all_services->fetch_assoc()){?>

                            <tr id="remove-row-<?=$service['id']?>">
                                <td><?= $sr ?></td>
                                <td><?= $service['title'] ?> </td>
                                <td><?= $service['icon'] ?> </td>
                                <td><?= $service['desc'] ?> </td>
                                <td><input type="checkbox" class="toggle-button" data-id="<?= $service['id'] ?>"
                                           data-action="service-status"
                                           data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                           data-off="Inactive" <?= $service['status'] == 1 ? 'checked' : '' ?> ></td>
                                <td><input type="checkbox" class="toggle-button" data-id="<?= $service['id'] ?>"
                                           data-action="service-featured-status"
                                           data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                           data-off="Inactive" <?= $service['featured'] == 1 ? 'checked' : '' ?> ></td>
                                <td class="action-bars">
                                    <a href="edit_services.php?action=edit-service&data=<?= base64_encode($service['id']) ?>"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button data-url-id="<?= ($service['id']) ?>" type="button" data-action="service-delete"
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
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
he