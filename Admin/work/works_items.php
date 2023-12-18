<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

use App\Admin\Works;

$works = new Works();

$items = $works->all_works_item();

?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">

                    <div><h3>Manage Works Item</h3></div>
                    <div>
                        <a href="add_works_item.php" class="btn btn-primary ">Add New</a>
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
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sr = 1;
                            while ($item = $items->fetch_assoc()) {
                                ?>
                                <tr id="remove-row-<?= $item['id'] ?>">
                                    <td><?= $sr ?></td>
                                    <td><?= $item['title'] ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><img class="image-preview" src="<?= $works->baseUrl?>uploads/works/<?= $item['image'] ?>"  alt="<?= $item['title']?>"></td>
                                    <td><input type="checkbox" class="toggle-button" data-id="<?= $item['id'] ?>"
                                               data-action="work-item-status"
                                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                               data-off="Inactive" <?= $item['status'] == 1 ? 'checked' : '' ?> ></td>
                                    <td class="action-bars">


                                        <a href="edit_works_item.php?action=edit-work-item&data=<?= base64_encode($item['id']) ?>"
                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <button data-url-id="<?= $item['id'] ?>" type="button" data-action="work-item-delete"
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
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/footer.php';
?>
