<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

use App\Admin\Works;

$works = new Works();

$work_menus = $works->all_work_menu();

?>

<div class="row justify-content-center">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">

                    <div><h3>Manage Works Menu</h3></div>
                    <div>
                        <a href="add_works_menu.php" class="btn btn-primary ">Add New Menu</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">

                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php
                        $sr = 1;
                        while ($menu = $work_menus->fetch_assoc()) {
                            ?>

                            <tr id="remove-row-<?= $menu['id'] ?>">
                                <td><?= $sr ?></td>
                                <td><?= $menu['name'] ?></td>
                                <td><?= $menu['slug'] ?></td>

                                <td><input type="checkbox" class="toggle-button" data-id="<?= $menu['id'] ?>"
                                           data-action="works-menu-status"
                                           data-onstyle="primary" data-offstyle="danger" data-toggle="toggle"
                                           data-on="Active"
                                           data-off="Inactive" <?= $menu['status'] == 1 ? 'checked' : '' ?> ></td>
                                <td class="action-bars">

                                    <a href="edit_work_menu.php?action=edit-work-menu&data=<?= base64_encode($menu['id']) ?>"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button data-url-id="<?= ($menu['id']) ?>" type="button" data-action="work-menu-delete"
                                            class="btn btn-danger btn-sm remove_item"><i class="fa fa-trash-alt"></i>
                                    </button>

                                </td>

                            </tr>


                            <?php $sr++;
                        } ?>


                        <tbody>

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
