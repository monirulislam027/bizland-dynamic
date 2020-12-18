<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

use App\Admin\FAQ;

$faqs = new FAQ();

$questions = $faqs->index();

?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">

                    <div><h3>Manage Question's</h3></div>
                    <div>
                        <a href="add_faqs.php" class="btn btn-primary ">Add New</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">

                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sr = 1;
                            while ($question = $questions->fetch_assoc()) {
                                ?>
                                <tr id="remove-row-<?= $question['id'] ?>">
                                    <td><?= $sr ?></td>
                                    <td><?= $question['question'] ?></td>
                                    <td><?= $question['answer'] ?></td>
                                    <td><input type="checkbox" class="toggle-button" data-id="<?= $question['id'] ?>"
                                               data-action="faq-status"
                                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                               data-off="Inactive" <?= $question['status'] == 1 ? 'checked' : '' ?> ></td>
                                    <td class="action-bars">
                                        <a href="edit_faqs.php?action=edit-faq&data=<?= base64_encode($question['id']) ?>"
                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <button data-url-id="<?= $question['id'] ?>" type="button" data-action="faq-delete"
                                                class="btn btn-danger btn-sm remove_item"><i class="fa fa-trash-alt"></i></button>

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
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';
?>

