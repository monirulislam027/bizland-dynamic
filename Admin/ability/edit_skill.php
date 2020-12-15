<?php

use App\Admin\Ability;

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

$ability = new Ability();

if (isset($_GET['action']) && $_GET['action'] == 'edit-skill' && isset($_GET['data'])){

    $id = (int)base64_decode($_GET['data']);

    $skill = $ability->skill_find($id);
    if (!$skill->num_rows > 0){
        sleep(1);
        header("location:javascript://history.go(-1)");
    }

    $skill = $skill->fetch_assoc();

}else{
    sleep(1);
    header("location:javascript://history.go(-1)");
}


?>

<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Update Skill</h2>
                    <a href="add_skill.php" class="btn btn-primary ">Manage Skills</a>
                </div>
            </div>
            <div class="card-body">

                <form role="form" id="text-form" data-action-url='skill-update' method="post">

                    <input type="hidden" name="data" value="<?= $_GET['data'] ?>">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= $skill['name'] ?>" placeholder="Name of skill">
                    </div>

                    <div class="form-group">
                        <label for="percentage">Percentage</label>
                        <input type="number" min="1" max="100" class="form-control" id="percentage" name="percentage"
                               value="<?= $skill['percentage'] ?>" placeholder="Percentage">
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4">Status</label>

                        <div class="col-md-8">

                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" value="1" id="active" <?= $skill['status'] == 1? 'checked': '' ?> name="status" >
                                    <label for="active"> Active</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="inactive" <?= $skill['status'] == 0 ? 'checked': '' ?> value="0" name="status">
                                    <label for="inactive"> Inactive </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>

                </form>

            </div>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
