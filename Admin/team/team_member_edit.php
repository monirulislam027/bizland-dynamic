<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php' ;

use App\Admin\Team;

$team = new Team();



if (isset($_GET['action']) && $_GET['action'] == 'edit-team-member' && isset($_GET['data'])) {

    $id = (int)base64_decode($_GET['data']);

    $member = $team->find($id);
    if (!$member->num_rows > 0) {
        sleep(1);
        header("location:javascript://history.go(-1)");
    }

    $member = $member->fetch_assoc();

} else {
    sleep(1);
    header("location:javascript://history.go(-1)");
}
?>


    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">

                        <div> <h3>Update Team Member</h3> </div>
                        <div>
                            <a href="team_member.php" class="btn btn-primary ">Manage Team</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <form id="image-form" data-action-url ='team-member-update' enctype="multipart/form-data">

                        <input type="hidden" name="data" value="<?= $_GET['data'] ?>">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Member Name" value="<?= $member['name'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class=" col-md-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="role" id="role"
                                       placeholder="Member Role" value="<?= $member['role'] ?>">

                            </div>
                        </div>

                        <hr>

                        <div class="row my-2">
                            <div class="col-md-2">
                                <label class="col-form-label">Social Links</label>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group my-1">
                                    <div class="input-group-prepend">
                                        <label for="facebook" class="col-form-label btn btn-primary"  >Facebook</label>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="url" id="facebook" name="facebook"  class="form-control" value="<?= $member['facebook'] ?>">
                                </div>

                                <div class="input-group my-1">
                                    <div class="input-group-prepend">
                                        <label for="twitter" class="col-form-label btn btn-warning">Twitter</label>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="url" id="twitter" name="twitter" class="form-control" value="<?= $member['twitter'] ?>" >
                                </div>

                                <div class="input-group my-1">
                                    <div class="input-group-prepend">
                                        <label for="linkedIn" class="col-form-label btn btn-success"  >LinkedIn</label>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="url" id="linkedIn" name="linkedIn" class="form-control" value="<?= $member['linkedIn'] ?>">
                                </div>

                                <div class="input-group my-1">
                                    <div class="input-group-prepend">
                                        <label class="col-form-label btn btn-danger" for="instagram" >Instagram</label>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="url" class="form-control" id="instagram" name="instagram" value="<?= $member['instagram'] ?>">
                                </div>

                            </div>
                        </div>

                        <hr>


                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10 d-flex justify-content-between">
                                <div class="">
                                    <input type="file" class="form-control-file " style="outline: none"
                                           onchange="imagePreview(this , '.image-preview')" name="image" id="image">
                                </div>

                                <img src="<?=$team->baseUrl ?>uploads/team/<?=$member['image']?>" alt="image" class="image-preview">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 mt-2">

                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" value="1" id="active"  name="status" <?=$member['status'] == 1 ? 'checked':'' ?> >
                                        <label for="active"> Active</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="inactive" value="0" name="status" <?=$member['status'] == 0 ? 'checked':'' ?> >
                                        <label for="inactive"> Inactive </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>


                </div>
            </div>



        </div>
    </div>



<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';
?>