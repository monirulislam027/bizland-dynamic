<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

use App\Admin\Works;

$works = new Works();

if (isset($_GET['action']) && $_GET['action'] == 'edit-work-menu' && isset($_GET['data'])) {

    $id = (int)base64_decode($_GET['data']);

    $work = $works->work_menu_find($id);

    if (!$work->num_rows > 0) {
        sleep(1);
        header("location:javascript://history.go(-1)");
    }

    $work = $work->fetch_assoc();

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

                        <div><h3>Update Works Menu</h3></div>
                        <div>
                            <a href="works_menu.php" class="btn btn-primary ">Manage Works Menu</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form id="text-form" data-action-url='work_menu-update'>

                        <input type="hidden" name="data" value="<?= $_GET['data'] ?>">
                        <div class="form-group row">
                            <label for="work-menu-name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="work-menu-name"
                                       placeholder="Menu item name" value="<?= $work['name'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Status</label>

                            <div class="col-md-10">

                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" value="1" id="active" name="status" checked="">
                                        <label for="active"> Active</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="inactive" value="0" name="status">
                                        <label for="inactive"> Inactive </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>


<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/footer.php';
?>