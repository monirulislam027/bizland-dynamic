<?php

use App\Config\Information;

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
                    <h3 class="card-title"> Hero</h3>
                </div>

                <form role="form" id="hero-form" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Hero Title</label>
                            <input type="text" class="form-control" id="title"name="hero_title" value="<?= $information->hero_title()['value'] ?>" placeholder="Hero Title">
                        </div>
                        <div class="form-group">
                            <label for="title">Hero Sub Title</label>
                            <textarea name="hero_sub_title" id="sub_title" class="form-control summernote" cols="30"  rows="3"><?= $information->hero_sub_title()['value'] ?></textarea>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="custom-content-below-tab pb-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="link-1-tab" data-toggle="pill"
                                           href="#link-1-content" role="tab"
                                           aria-controls="link-1-content" aria-selected="true">Link 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="link-2-tab" data-toggle="pill"
                                           href="#link-2-content" role="tab"
                                           aria-controls="link-2-content"
                                           aria-selected="false">Link 2</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3 px-3" id="custom-content-below-tabContent">

                                    <div class="tab-pane fade active show" id="link-1-content"
                                         role="tabpanel" aria-labelledby="link-1-tab">

                                        <div class="form-group">
                                            <label for="hero_link1_text">Text</label>
                                            <input type="text"  name="hero_link1_text" value="<?= $information->hero_link1_text()['value'] ?>" class="form-control" id="hero_link1_text"
                                                   placeholder="Link 1 text">
                                        </div>
                                        <div class="form-group">
                                            <label for="hero_link1_url">Url</label>
                                            <input type="text" class="form-control" id="hero_link1_url"
                                                   name="hero_link1_url" value="<?= $information->hero_link1_url()['value'] ?>" placeholder="Link 1 url">
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="link-2-content" role="tabpanel"
                                         aria-labelledby="link-2-tab">

                                        <div class="form-group">
                                            <label for="hero_link2_text">Text</label>
                                            <input type="text" name="hero_link2_text" class="form-control" id="hero_link2_text"
                                                   value="<?= $information->hero_link2_text()['value'] ?>" placeholder="Link 2 text">
                                        </div>
                                        <div class="form-group">
                                            <label for="hero_link2_url">Url</label>
                                            <input type="text" class="form-control" id="hero_link2_url"
                                                   value="<?= $information->hero_link2_url()['value'] ?>"  name="hero_link2_url" placeholder="Link 2 url">
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- /.card -->
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
