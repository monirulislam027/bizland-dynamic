<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

?>

<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Add Counter</h2>
                    <a href="counter.php" class="btn btn-primary ">Mange Counters</a>
                </div>
            </div>
            <div class="card-body">

                <form role="form" id="text-form" data-action-url='counter-add' method="post">


                    <div class="form-group">
                        <label for="name">Text</label>
                        <input type="text"  required class="form-control" id="name" name="name"
                               value="" placeholder="Name of skill">
                    </div>

                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="number" required  min="1" class="form-control" id="number" name="number"
                               value="" placeholder="Percentage">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" required class="form-control" id="icon" name="icon"
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


                    <button type="submit" class="btn btn-primary">Add</button>

                </form>

            </div>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
