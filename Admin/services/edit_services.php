<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

use App\Admin\Services;

$services = new Services();

if (isset($_GET['action']) && $_GET['action'] == 'edit-service' && isset($_GET['data'])) {

    $id = (int)base64_decode($_GET['data']);

    $service  = $services->service_find($id);
    if (!$service->num_rows > 0) {
        sleep(1);
        header("location:javascript://history.go(-1)");
    }

    $service = $service->fetch_assoc();

} else {
    sleep(1);
    header("location:javascript://history.go(-1)");
}
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

                <form role="form" id="text-form" data-action-url='service-update' method="post">

                    <input type="hidden" name="data" value="<?= $_GET['data'] ?>">
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text"  required class="form-control" id="icon" name="icon"
                               value="<?= $service['icon']?>" placeholder="Icon">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"  required class="form-control" id="title" name="title"
                               value="<?= $service['title']?>" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" class="form-control" placeholder="Description" cols="30" rows="10"><?= $service['desc']?></textarea>
                    </div>


                    <div class="form-group row">

                        <label class="col-md-4">Status</label>

                        <div class="col-md-8">

                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" value="1" id="active" name="status" <?= $service['status'] == 1 ? 'checked': '' ?>>
                                    <label for="active"> Active</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="inactive" value="0" name="status" <?= $service['status'] == 0 ? 'checked': '' ?>>
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
                                    <input type="radio" value="1" id="enable" name="featured"  <?= $service['featured'] == 1 ? 'checked': '' ?>>
                                    <label for="enable"> Enable</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="disable" value="0" name="featured" <?= $service['featured'] == 0 ? 'checked': '' ?>>
                                    <label for="disable"> Disable </label>
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
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/footer.php';

?>
