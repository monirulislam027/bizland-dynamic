<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php' ;

use App\Admin\FAQ;

$faqs = new FAQ();


if (isset($_GET['action']) && $_GET['action'] == 'edit-faq' && isset($_GET['data'])) {

    $id = (int)base64_decode($_GET['data']);

    $faq = $faqs->find($id);

    if (!$faq->num_rows > 0) {
        sleep(1);
        header("location:javascript://history.go(-1)");
    }

    $faq = $faq->fetch_assoc();

} else {
    sleep(1);
    header("location:javascript://history.go(-1)");
}

?>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">

                        <div> <h3>Add New Question</h3> </div>
                        <div>
                            <a href="faqs.php" class="btn btn-primary ">Manage Question</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <form id="text-form" data-action-url ='faq-update' >

                        <input type="hidden" name="data" value="<?= $_GET['data'] ?>">
                        <div class="form-group row">
                            <label for="question" class="col-sm-2 col-form-label">Question</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="question" id="question"
                                       placeholder="Question" value="<?= $faq['question']  ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="answer" class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                <textarea  name="answer" id="answer" cols="30" rows="10" class="form-control summernote"><?= $faq['answer'] ?></textarea>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 mt-2">

                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" value="1" id="active"  name="status" <?= $faq['status'] == 1? 'checked': '' ?> >
                                        <label for="active"> Active</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="inactive" value="0" name="status" <?= $faq['status'] == 0 ? 'checked': '' ?> >
                                        <label for="inactive"> Inactive </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>


                </div>
            </div>



        </div>
    </div>



<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';
?>