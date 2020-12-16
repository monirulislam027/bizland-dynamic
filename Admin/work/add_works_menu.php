<?php require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php' ?>


<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">

                    <div> <h3>Add New Menu</h3> </div>
                    <div>
                        <a href="works_menu.php" class="btn btn-primary ">Manage Work Menu</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form id="text-form" data-action-url = 'work_menu-add'>
                    <div class="form-group row">
                        <label for="work-menu-name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="work-menu-name" placeholder="Menu item name">
                            <div class="invalid-feedback">Please enter a name</div>
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