<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'admin/component/header.php';

use App\Config\Information;

$infos = new Information();

?>

<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">

                <h2>Contact Informations</h2>

            </div>
            <div class="card-body">

                <form role="form" id="image-form" data-action-url='logo-add' method="post">


                    <div class="form-group row">
                        <label class="col-md-3" for="contact_address">Address</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update" id="contact_address" data-info-id="<?= $infos->contact_address()['id'] ?>"
                                   value="<?= $infos->contact_address()['value'] ?>" placeholder="Contact Address" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="contact_email">Email</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update " id="contact_email" data-info-id="<?= $infos->contact_email()['id'] ?>"
                                    value="<?= $infos->contact_email()['value'] ?>" placeholder="Contact Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="contact_no">Phone Number</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update" id="contact_no" data-info-id="<?= $infos->contact_no()['id'] ?>"
                                    value="<?= $infos->contact_no()['value'] ?>" placeholder="Contact Phone Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="facebook">Facebook</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update " id="facebook" data-info-id="<?= $infos->facebook()['id'] ?>"
                                    value="<?= $infos->facebook()['value'] ?>" placeholder="Facebook">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="twitter">Twitter</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update " id="twitter" data-info-id="<?= $infos->twitter()['id'] ?>"
                                    value="<?= $infos->twitter()['value'] ?>" placeholder="Twitter">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="instagram">Instagram</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update " id="instagram" data-info-id="<?= $infos->instagram()['id'] ?>"
                                    value="<?= $infos->instagram()['value'] ?>" placeholder="Instagram">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="linkedIn">LinkedIn</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update " id="linkedIn" data-info-id="<?= $infos->linkedIn()['id'] ?>"
                                    value="<?= $infos->linkedIn()['value'] ?>" placeholder="LinkedIN">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="skype">Skype</label>
                        <div class="col-md-9">
                            <input type="text" required  class="form-control info-data-update " id="skype" data-info-id="<?= $infos->skype()['id'] ?>"
                                    value="<?= $infos->skype()['value'] ?>" placeholder="Skype">
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
