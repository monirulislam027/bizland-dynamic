<?php

use App\Admin\Messages;

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

$message_obj = new Messages();

$messages = $message_obj->messages();


?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Messages </h2>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable">
                        <thead>
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $sr = 1;
                        while ($message = $messages->fetch_assoc()) {
                            ?>

                            <tr id="remove-row-<?= $message['id'] ?>">
                                <td><?= $sr ?></td>
                                <td><?= $message['name'] ?> </td>
                                <td> <?= $message['email'] ?></td>
                                <td><?= $message['subject'] ?></td>
                                <td><?= $message['message'] ?></td>
                                <td class="action-bars">
                                    
                                    <button data-url-id="<?= ($message['id']) ?>" type="button"
                                            data-action="message-delete"
                                            class="btn btn-danger btn-sm remove_item"><i class="fa fa-trash-alt"></i>
                                    </button>

                                </td>

                            </tr>

                            <?php $sr++;
                        } ?>


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