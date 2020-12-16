<?php

use App\Admin\Client;

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

$client = new Client();

if (isset($_GET['action']) && $_GET['action'] == 'edit-testimonial' && isset($_GET['data'])) {

    $id = (int)base64_decode($_GET['data']);

    $testimonial = $client->testimonial_find($id);
    if (!$testimonial->num_rows > 0) {
        sleep(1);
        header("location:javascript://history.go(-1)");
    }

    $testimonial = $testimonial->fetch_assoc();

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
                    <h2>Add Testimonial</h2>
                    <a href="testimonials.php" class="btn btn-primary ">Mange Testimonials</a>
                </div>
            </div>
            <div class="card-body">

                <form role="form" id="image-form" data-action-url='testimonial-update' method="post">

                    <input type="hidden" name="data" value="<?= $_GET['data'] ?>">
                    <div class="form-group">
                        <label for="name">Client Name</label>
                        <input type="text" required class="form-control" id="name" name="name"
                               value="<?= $testimonial['name'] ?>" placeholder=" Client Name">
                    </div>

                    <div class="form-group">
                        <label for="post">Client Post</label>
                        <input type="text" required class="form-control" id="post" name="post"
                               value="<?= $testimonial['post'] ?>" placeholder="Client Post">
                    </div>

                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="review" class="form-control" placeholder="Review text" cols="30"
                                  rows="10"><?= $testimonial['review'] ?></textarea>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" onchange="imagePreview(this , '.image-preview img')" name="image"
                                   class="form-control-file" id="image">
                        </div>
                        <div class="col-md-6">
                            <div class="image-preview float-right" id="image-preview">
                                <img src="<?= $client->baseUrl?>uploads/testimonials/<?= $testimonial['image'] ?>" alt="" class="w-100">
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4">Status</label>

                        <div class="col-md-8">

                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" value="1"  id="active" name="status" <?= $testimonial['status'] == 1 ? 'checked':'' ?>>
                                    <label for="active"> Active</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="inactive" value="0" name="status" <?= $testimonial['status'] == 0 ? 'checked':'' ?>>
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
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
