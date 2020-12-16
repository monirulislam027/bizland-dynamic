<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php' ;

use App\Admin\Works;

$works = new Works();

$works_menus = $works->all_work_menu();

?>


    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">

                        <div> <h3>Add New Work</h3> </div>
                        <div>
                            <a href="works_items.php" class="btn btn-primary ">Manage Works</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <form id="image-form" data-action-url ='add-work-item' enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="Work item title">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="menu_id" id="menu_id" class='form-control'>

                                    <option value="">Select</option>

                                    <?php
                                    while ($row3 = $works_menus->fetch_assoc()) {
                                        echo ' <option value="' . $row3['id'] . '">' . $row3['name'] . '</option>';
                                    }

                                    ?>


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

                                <img src="https://via.placeholder.com/100" alt="image" class="image-preview">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 mt-2">

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
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>


                </div>
            </div>



        </div>
    </div>



<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';
?>