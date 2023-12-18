<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

?>

<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Add Logo</h2>
                    <a href="client_logo.php" class="btn btn-primary ">Mange Logo</a>
                </div>
            </div>
            <div class="card-body">

                <form role="form" id="image-form" data-action-url='logo-add' method="post">


                    <div class="form-group row">

                        <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" onchange="imagePreview(this , '.image-preview img')" name="image"
                                   class="form-control-file" id="image">
                        </div>
                        <div class="col-md-6">
                            <div class="image-preview float-right" id="image-preview">
                                <img src="https://via.placeholder.com/150x100.png" alt="" class="w-100">
                            </div>
                        </div>

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


                    <button type="submit" class="btn btn-primary">Save</button>

                </form>

            </div>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/footer.php';

?>
