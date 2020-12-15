<?php

use App\Admin\Ability;

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

$ability = new Ability();

if (isset($_GET['action']) && $_GET['action'] == 'edit-counter' && isset($_GET['data'])){

    $id = (int)base64_decode($_GET['data']);

    $counter = $ability->counter_find($id);
    if (!$counter->num_rows > 0){
        sleep(1);
        header("location:javascript://history.go(-1)");
    }

    $counter = $counter->fetch_assoc();

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
                    <h2>Add Counter</h2>
                    <a href="counter.php" class="btn btn-primary ">Mange Counters</a>
                </div>
            </div>
            <div class="card-body">

                <form role="form" id="text-form" data-action-url='counter-update' method="post">

                    <input type="hidden" name="data" value="<?= $_GET['data'] ?>">
                    <div class="form-group">
                        <label for="name">Text</label>
                        <input type="text"  required class="form-control" id="name" name="name"
                               value="<?= $counter['name'] ?>" placeholder="Name of skill">
                    </div>

                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="number" required  min="1" class="form-control" id="number" name="number"
                               value="<?= $counter['number'] ?>" placeholder="Percentage">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" required class="form-control" id="icon" name="icon"
                               value="<?= $counter['icon'] ?>" placeholder="Percentage">
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4">Status</label>

                        <div class="col-md-8">

                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" value="1" id="active" <?= $counter['status'] == 1 ? 'checked': '' ?>  name="status" >
                                    <label for="active"> Active</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="inactive" <?= $counter['status'] == 0 ? 'checked': '' ?> value="0" name="status">
                                    <label for="inactive"> Inactive </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>
</div>



<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
