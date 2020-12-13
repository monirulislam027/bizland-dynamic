<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/header.php';

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Skills</h2>
                    <a href="add_skill.php" class="btn btn-primary ">Add Skill</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'admin/component/footer.php';

?>
