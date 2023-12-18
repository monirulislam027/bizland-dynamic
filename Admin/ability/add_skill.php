<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

?>

<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Skills</h2>
                    <a href="skills.php" class="btn btn-primary ">Mange Skill</a>
                </div>
            </div>
            <div class="card-body">

                <form role="form" id="text-form" data-action-url='skill-add' method="post">


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="" placeholder="Name of skill">
                    </div>

                    <div class="form-group">
                        <label for="percentage">Percentage</label>
                        <input type="number" min="1" max="100" class="form-control" id="percentage" name="percentage"
                               value="" placeholder="Percentage">
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
