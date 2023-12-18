<?php

use App\Admin\Client;

require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

$client = new Client();
$testimonials = $client->all_testimonials();


?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Manage Testimonials </h2>
                    <a href="add_testimonials.php" class="btn btn-primary ">Add Testimonial</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable">
                        <thead>
                        <th>NO.</th>
                        <th >Name</th>
                        <th >Post</th>
                        <th >Review</th>
                        <th >Image</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $sr=1;
                        while($testimonial = $testimonials->fetch_assoc()){?>

                            <tr id="remove-row-<?=$testimonial['id']?>">
                                <td><?= $sr ?></td>
                                <td><?= $testimonial['name'] ?> </td>
                                <td> <?= $testimonial['post'] ?></td>
                                <td><?= $testimonial['review']?></td>
                                <td><img class="image-preview" src="<?= $client->baseUrl?>uploads/testimonials/<?= $testimonial['image'] ?>"  alt=""></td>
                                <td><input type="checkbox" class="toggle-button" data-id="<?= $testimonial['id'] ?>"
                                           data-action="testimonial-status"
                                           data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                           data-off="Inactive" <?= $testimonial['status'] == 1 ? 'checked' : '' ?> ></td>
                                <td class="action-bars">
                                    <a href="edit_testimonials.php?action=edit-testimonial&data=<?= base64_encode($testimonial['id']) ?>"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button data-url-id="<?= ($testimonial['id']) ?>" type="button" data-action="testimonial-delete"
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
he