<?php

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

use App\Admin\Works;
$works = new Works();

if (isset($_GET['action']) && $_GET['action'] == 'edit-work-item' && isset($_GET['data'])) {

    $id = (int)base64_decode($_GET['data']);

    $item = $works->work_item_find($id);
    if (!$item->num_rows > 0){
        sleep(1);
        header("location:javascript://history.go(-1)");
    }
    $item = $item->fetch_assoc();
    $works_menus = $works->all_work_menu();

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

                    <div><h3>Edit Work Item</h3></div>
                    <div>
                        <a href="works_items.php" class="btn btn-primary ">Manage Work Items</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form id="image-form" data-action-url='work-item-update' enctype="multipart/form-data">

                    <input type="hidden" value="<?= $_GET['data'] ?>" name="data">

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="<?= $item['title'] ?>" id="title"
                                   placeholder="Work item title">
                            <div class="invalid-feedback">Please enter a title</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu_id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="menu_id" id="menu_id" class='form-control'>

                                <option value="">Select</option>

                                <?php
                                while ($menu = $works_menus->fetch_assoc()) { ?>

                                    <option value="<?= $menu['id'] ?>" <?= $menu['id'] == $item['menu_id'] ? 'Selected':''   ?>><?= $menu['name'] ?></option>

                                <?php  } ?>


                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10 d-flex justify-content-between">
                            <div class="">
                                <input type="file" class="form-control-file " style="outline: none"
                                       onchange="imagePreview(this , '.image-preview')" name="image" id="image">
                            </div>

                            <img src="<?= $works->baseUrl.'uploads/works/'. $item['image'] ?>"" alt="image" class="image-preview" />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10 mt-2">

                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" value="1" id="active" name="status" <?= $item['status'] == 1 ? 'checked':'' ?>>
                                    <label for="active"> Active</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="inactive" value="0" name="status" <?= $item['status'] == 0 ? 'checked':'' ?>>
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


<?php require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php'; ?>

