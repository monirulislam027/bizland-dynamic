<?php

use App\Config\Information;

require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

$info = new Information();

?>

<div class="row justify-content-center">

    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h5>Customize</h5>
                </div>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">


                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Site Title</label>
                    <div class="col-sm-12">
                        <input type="text" required class="form-control info-data-update"
                               data-info-id="<?= $info->site_title()['id'] ?>"
                               value="<?= $info->site_title()['value'] ?>" placeholder="Contact Address">

                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Featured Service </label>
                    <div class="col-sm-8 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->featured_service()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->featured_service()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">About </label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->about()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->about()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Skill </label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->skill()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->skill()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Counter</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->count()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->count()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Client Logo</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->client()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->client()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Service</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->service()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->service()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Testimonial</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->testimonial()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->testimonial()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Portfolio</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->portfolio()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->portfolio()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Team</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->team()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->team()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">FAQ's</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->faq()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->faq()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contact Us</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->contact()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->contact()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Footer Menu</label>
                    <div class="col-sm-9 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->footer_menu()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->footer_menu()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>


            </div>
        </div>
    </div>

</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
