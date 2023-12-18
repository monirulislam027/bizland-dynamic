<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

use App\Config\Information;

$info = new Information();

?>

<div class="row justify-content-center">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">

                <h2>Contact Options</h2>

            </div>
            <div class="card-body">

                <form role="form" id="image-form" data-action-url='logo-add' method="post">


                    <div class="form-group row">
                        <label class="col-md-4" for="contact_address">Google Map Link</label>
                        <div class="col-md-8 text-right">
                            <input type="text" required class="form-control info-data-update" id="contact_address"
                                   data-info-id="<?= $info->map_link()['id'] ?>"
                                   value="<?= $info->map_link()['value'] ?>" placeholder="Contact Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6" for="contact_address">Google Map</label>
                        <div class="col-md-6 text-right">
                            <input type="checkbox" class="toggle-button" data-id="<?= $info->google_map()['id'] ?>"
                                   data-action="info-data-toggle"
                                   data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                   data-off="Inactive" <?= $info->google_map()['value'] == 1 ? 'checked' : '' ?> >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6" for="contact_address">Contact Form</label>
                        <div class="col-md-6 text-right">
                            <input type="checkbox" class="toggle-button" data-id="<?= $info->contact_form()['id'] ?>"
                                   data-action="info-data-toggle"
                                   data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                   data-off="Inactive" <?= $info->contact_form()['value'] == 1 ? 'checked' : '' ?> >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6" for="contact_address">Social Link</label>
                        <div class="col-md-6 text-right">
                            <input type="checkbox" class="toggle-button" data-id="<?= $info->social_links()['id'] ?>"
                                   data-action="info-data-toggle"
                                   data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                   data-off="Inactive" <?= $info->social_links()['value'] == 1 ? 'checked' : '' ?> >
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/footer.php';

?>
