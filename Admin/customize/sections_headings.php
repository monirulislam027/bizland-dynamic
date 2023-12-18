<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

use App\Config\Information;

$info = new Information();

?>

<div class="row justify-content-center">

    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h5>About</h5>
                </div>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->about()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->about()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Title</label>
                    <div class="col-sm-12">
                        <input type="text" required class="form-control info-data-update"
                               data-info-id="<?= $info->about_title()['id'] ?>"
                               value="<?= $info->about_title()['value'] ?>" placeholder="Contact Address">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Sub Title</label>
                    <div class="col-sm-12">
                        <textarea class="form-control info-data-update"
                                  data-info-id="<?= $info->about_subtitle()['id'] ?>" cols="30"
                                  rows="4" placeholder=" Subtitle "><?= $info->about_subtitle()['value'] ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h5>Services</h5>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->service()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->service()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Title</label>
                    <div class="col-sm-12">
                        <input type="text" required class="form-control info-data-update" id="contact_address"
                               data-info-id="<?= $info->service_title()['id'] ?>"
                               value="<?= $info->service_title()['value'] ?>" placeholder="Contact Address">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Sub Title</label>
                    <div class="col-sm-12">
                        <textarea class="form-control info-data-update"
                                  data-info-id="<?= $info->service_subtitle()['id'] ?>" id="contact_address" cols="30"
                                  rows="4" placeholder=" Subtitle "><?= $info->service_subtitle()['value'] ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h5>Portfolio</h5>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->portfolio()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->portfolio()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Title</label>
                    <div class="col-sm-12">
                        <input type="text" required class="form-control info-data-update"
                               data-info-id="<?= $info->portfolio_title()['id'] ?>"
                               value="<?= $info->portfolio_title()['value'] ?>" placeholder="Contact Address">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Sub Title</label>
                    <div class="col-sm-12">
                        <textarea class="form-control info-data-update"
                                  data-info-id="<?= $info->portfolio_subtitle()['id'] ?>" cols="30"
                                  rows="4"
                                  placeholder=" Subtitle "><?= $info->portfolio_subtitle()['value'] ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h5>Team</h5>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->team()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->team()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>


                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Title</label>
                    <div class="col-sm-12">
                        <input type="text" required class="form-control info-data-update" id="contact_address"
                               data-info-id="<?= $info->team_title()['id'] ?>"
                               value="<?= $info->team_title()['value'] ?>" placeholder="Contact Address">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Sub Title</label>
                    <div class="col-sm-12">
                        <textarea class="form-control info-data-update"
                                  data-info-id="<?= $info->team_subtitle()['id'] ?>" id="contact_address" cols="30"
                                  rows="4" placeholder=" Subtitle "><?= $info->team_subtitle()['value'] ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h5>Contact Us</h5>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->contact()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->contact()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>


                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Title</label>
                    <div class="col-sm-12">
                        <input type="text" required class="form-control info-data-update" id="contact_address"
                               data-info-id="<?= $info->contact_title()['id'] ?>"
                               value="<?= $info->contact_title()['value'] ?>" placeholder="Contact Address">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Sub Title</label>
                    <div class="col-sm-12">
                        <textarea class="form-control info-data-update"
                                  data-info-id="<?= $info->contact_subtitle()['id'] ?>" id="contact_address" cols="30"
                                  rows="4" placeholder=" Subtitle "><?= $info->contact_subtitle()['value'] ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h5>FAQ's</h5>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 text-right">
                        <input type="checkbox" class="toggle-button btn-sm" data-id="<?= $info->faq()['id'] ?>"
                               data-action="info-data-toggle"
                               data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                               data-off="Disabled" <?= $info->faq()['value'] == 1 ? 'checked' : '' ?> >

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Title</label>
                    <div class="col-sm-12">
                        <input type="text" required class="form-control info-data-update" id="contact_address"
                               data-info-id="<?= $info->faq_title()['id'] ?>"
                               value="<?= $info->faq_title()['value'] ?>" placeholder="Contact Address">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label">Sub Title</label>
                    <div class="col-sm-12">
                        <textarea class="form-control info-data-update"
                                  data-info-id="<?= $info->faq_subtitle()['id'] ?>" id="contact_address" cols="30"
                                  rows="4" placeholder=" Subtitle "><?= $info->faq_subtitle()['value'] ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/footer.php';

?>
