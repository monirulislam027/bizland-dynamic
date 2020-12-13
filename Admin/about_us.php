<?php

use App\Admin\Information;

require_once 'component/header.php';

$information = new Information();

?>


<div class="row">
    <div class=" offset-md-2 col-md-8 justify-content-between">
        <div class="row">
            <div class="col-md-12">

                <div id="response-message" class=""></div>

            </div>
        </div>
        <div class="card-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> About Us</h3>
                </div>

                <form role="form" id="image-form" data-action-url = 'about_us_update' method="post">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="title">About Us Sub Title</label>
                            <input type="text" class="form-control" id="title" name="about_us_subtitle"
                                   value="<?= $information->about_us_subtitle()['value'] ?>" placeholder="About Us Title">
                        </div>

                        <div class="form-group">
                            <label for="title">Description Title</label>
                            <input type="text" class="form-control" id="title" name="about_us_description_title"
                                   value="<?= $information->about_us_description_title()['value'] ?>" placeholder="Description Title">
                        </div>

                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea name="about_us_description" id="sub_title" class="form-control" cols="30"
                                      rows="3" placeholder="Description"><?= $information->about_us_description()['value'] ?></textarea>
                        </div>


                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="image">Image</label>
                                <input type="file" onchange="imagePreview(this , '.image-preview img')" name="image" class="form-control-file" id="image" >
                            </div>
                            <div class="col-md-6">
                                <div class="image-preview float-right" id="image-preview">
                                    <img src="<?= $information->baseUrl ?>uploads/information/<?= $information->about_us_image()['value'] ?>" alt="" class="w-100">
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="about-us-form-btn">Save</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
</div>


<?php require_once 'component/footer.php'; ?>
