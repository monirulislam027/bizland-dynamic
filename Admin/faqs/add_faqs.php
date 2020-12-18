<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php' ;

use App\Admin\Works;

$works = new Works();

$works_menus = $works->all_work_menu();

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

                    <form id="text-form" data-action-url ='faq-add' >

                        <div class="form-group row">
                            <label for="question" class="col-sm-2 col-form-label">Question</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="question" id="question"
                                       placeholder="Question">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="answer" class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                <textarea  name="answer" id="answer" cols="30" rows="10" class="form-control summernote"></textarea>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 mt-2">

                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" value="1" id="active" name="status" checked="">
                                        <label for="active"> Active</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="inactive" value="0" name="status">
                                        <label for="inactive"> Inactive </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>


                </div>
            </div>



        </div>
    </div>



<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';
?>