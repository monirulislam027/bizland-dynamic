<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

use App\Admin\Team;

$team = new Team();

$team_members = $team->index();

?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">

                    <div><h3>Manage Team</h3></div>
                    <div>
                        <a href="team_member_add.php" class="btn btn-primary ">Add New</a>
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
                                <th>Role</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sr = 1;
                            while ($member = $team_members->fetch_assoc()) {
                                ?>
                                <tr id="remove-row-<?= $member['id'] ?>">
                                    <td><?= $sr ?></td>
                                    <td><?= $member['name'] ?></td>
                                    <td><?= $member['role'] ?></td>

                                    <td><img class="image-preview" src="<?= $team->baseUrl?>uploads/team/<?= $member['image'] ?>"  alt="<?= $member['name']?>"></td>
                                    <td><input type="checkbox" class="toggle-button" data-id="<?= $member['id'] ?>"
                                               data-action="team-member-status"
                                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                               data-off="Inactive" <?= $member['status'] == 1 ? 'checked' : '' ?> ></td>
                                    <td class="action-bars">


                                        <a href="team_member_edit.php?action=edit-team-member&data=<?= base64_encode($member['id']) ?>"
                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <button data-url-id="<?= $member['id'] ?>" type="button" data-action="team-member-delete"
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

