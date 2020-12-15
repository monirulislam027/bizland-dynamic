<?php

use App\Admin\Client;

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

$client = new Client();
$logos = $client->all_logo();

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Client Logo</h2>
                    <a href="add_client_logo.php" class="btn btn-primary ">Add Logo</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable">
                        <thead>
                        <th>NO.</th>
                        <th >Image</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $sr=1;
                        while($logo = $logos->fetch_assoc()){?>

                            <tr id="remove-row-<?=$logo['id']?>">
                                <td><?= $sr ?></td>
                                <td><img class="image-preview-client-logo text-center" src="<?= $client->baseUrl?>uploads/logo/<?= $logo['image'] ?>"  alt=""></td>
                                <td><input type="checkbox" class="toggle-button" data-id="<?= $logo['id'] ?>"
                                           data-action="logo-status"
                                           data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                           data-off="Inactive" <?= $logo['status'] == 1 ? 'checked' : '' ?> ></td>
                                <td >
                                    <button data-url-id="<?= ($logo['id']) ?>" type="button" data-action="logo-delete"
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
