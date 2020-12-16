<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

?>

<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Add Service</h2>
                    <a href="services.php" class="btn btn-primary ">Mange Services</a>
                </div>
            </div>
            <div class="card-body">

                <form role="form" id="text-form" data-action-url='service-add' method="post">

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text"  required class="form-control" id="icon" name="icon"
                               value="" placeholder="Icon">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"  required class="form-control" id="title" name="title"
                               value="" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" class="form-control" placeholder="Description" cols="30" rows="10"></textarea>
                    </div>


                    <div class="form-group row">

                        <label class="col-md-4">Status</label>

                        <div class="col-md-8">

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

                    <div class="form-group row">

                        <label class="col-md-4">Featured</label>

                        <div class="col-md-8">

                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" value="1" id="enable" name="featured" checked>
                                    <label for="enable"> Enable</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="disable" value="0" name="featured">
                                    <label for="disable"> Disable </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Add</button>

                </form>

            </div>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
