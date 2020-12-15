<?php
session_start();

use App\Admin\Ability;
use App\Admin\Information;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';
header('content-type:application/json');

$info = new Information();

$ability = new Ability();

$data = ['error' => false, 'rdr' => false];

if (isset($_POST['action']) && $_POST['action'] == 'about_us') {

    $array = [
        'hero_title' => $_POST['hero_title'],
        'hero_sub_title' => $_POST['hero_sub_title'],
        'hero_link1_text' => $_POST['hero_link1_text'],
        'hero_link1_url' => $_POST['hero_link1_url'],
        'hero_link2_text' => $_POST['hero_link2_text'],
        'hero_link2_url' => $_POST['hero_link2_url']
    ];

    foreach ($array as $key => $value) {
        $info->info_update($key, $value);
    }

    $data['message'] = 'Updated Successfully!';

    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'about_us_update') {


    if (isset($_POST['about_us_subtitle']) && $_POST['about_us_subtitle'] != '' &&
        isset($_POST['about_us_description_title']) && $_POST['about_us_description_title'] != '' &&
        isset($_POST['about_us_description']) && $_POST['about_us_description'] != '') {

        if (!empty($_FILES['image']['name'])) {
            $old_image = $info->about_us_image()['value'];


            $image = $_FILES['image'];
            $imageName = explode('.', $image['name']);
            $imageExe = end($imageName);
            $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;;

            $imageUpdate = $info->info_update('about_us_image', $fileName);
            if ($imageUpdate) {
                if (file_exists('../../uploads/information/' . $old_image)) {
                    unlink('../../uploads/information/' . $old_image);
                }
                move_uploaded_file($image['tmp_name'], '../../uploads/information/' . $fileName);
            }

        }

        $array = [
            'about_us_subtitle' => $_POST['about_us_subtitle'],
            'about_us_description_title' => $_POST['about_us_description_title'],
            'about_us_description' => $_POST['about_us_description']
        ];

        foreach ($array as $key => $value) {
            $info->info_update($key, $value);
        }
        $data['message'] = 'Data updated successfully!';

    } else {

        $data['error'] = true;

        $about_us_subtitle = $_POST['about_us_subtitle'];
        $about_us_description_title = $_POST['about_us_description_title'];
        $about_us_description = $_POST['about_us_description'];
        $about_us_image = $_POST['about_us_image'];

        if ($about_us_subtitle == '') {
            $data['message'] = $info->response_message('danger', $info->field_error_message('subtitle'));
        } else if ($about_us_description_title == '') {
            $data['message'] = $info->response_message('danger', $info->field_error_message('description_title'));
        } else if ($about_us_description == '') {
            $data['message'] = $info->response_message('danger', $info->field_error_message('description'));
        } else if ($about_us_image == '') {
            $data['message'] = $info->response_message('danger', $info->field_error_message('image'));
        } else {
            $data['message'] = $info->response_message('danger', 'Something went wrong!');
        }

    }

    echo json_encode($data);


}


// skill section start
if (isset($_POST['action']) && $_POST['action'] == 'skill-add') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['percentage']) && $_POST['percentage'] != '') {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $name = $_POST['name'];
        $percentage = $_POST['percentage'];

        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $add_skill = $ability->skill_add($name, $percentage, $status, $auth_id);
        if ($add_skill) {
            $data['message'] = 'Skill Added Successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'skills.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Something Went Wrong !!';
        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $percentage = $_POST['percentage'];

        if ($name == '') {
            $data['message'] = $info->field_error_message('Name');
        } else if ($percentage == '') {
            $data['message'] = $info->field_error_message('Percentage');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'skill-status') {
    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $ability->skill_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'skill-delete') {

    $id = $_POST['id'];

    $skill = $ability->skill_find($id);

    if ($skill) {
        if ($ability->skill_delete($id)) {
            $data['message'] = 'Item deleted successfully!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Item delete failed!';
        }
    } else {
        $data['message'] = 'Item not found!';
    }
    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'skill-update') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['percentage']) && $_POST['percentage'] != '') {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $id = (int)base64_decode($_POST['data']);
        $name = $_POST['name'];
        $percentage = $_POST['percentage'];

        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $update_skill = $ability->skill_update($name, $percentage, $status ,  $auth_id , $id);
        if ($update_skill) {
            $data['message'] = 'Skill updated Successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'skills.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Something Went Wrong !!';
        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $percentage = $_POST['percentage'];

        if ($name == '') {
            $data['message'] = $info->field_error_message('Name');
        } else if ($percentage == '') {
            $data['message'] = $info->field_error_message('Percentage');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);


}

//skill section end

if (isset($_POST['action']) && $_POST['action'] == 'counter-add') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['number']) && $_POST['number'] != null && isset($_POST['icon']) && $_POST['icon'] != '' ) {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $name = $_POST['name'];
        $number = $_POST['number'];
        $icon = $_POST['icon'];

        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $add_counter = $ability->counter_add($name, $number, $icon , $status, $auth_id);
        if ($add_counter) {
            $data['message'] = 'Counter Added Successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'counter.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Something Went Wrong !!';
        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $number = $_POST['number'];
        $icon = $_POST['icon'];

        if ($name == '') {
            $data['message'] = $info->field_error_message('Name');
        } else if ($number == '') {
            $data['message'] = $info->field_error_message('Number');
        } else if ($icon == '') {
            $data['message'] = $info->field_error_message('Icon');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'counter-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $ability->counter_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'counter-update') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['number']) && $_POST['number'] != null && isset($_POST['icon']) && $_POST['icon'] != '' ) {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $id = (int)base64_decode($_POST['data']);

        $name = $_POST['name'];
        $number = $_POST['number'];
        $icon = $_POST['icon'];

        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $update_counter = $ability->counter_update($name, $number, $icon , $status, $auth_id , $id);
        if ($update_counter) {
            $data['message'] = 'Counter update Successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'counter.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Something Went Wrong !!';
        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $number = $_POST['number'];
        $icon = $_POST['icon'];

        if ($name == '') {
            $data['message'] = $info->field_error_message('Name');
        } else if ($number == '') {
            $data['message'] = $info->field_error_message('Number');
        } else if ($icon == '') {
            $data['message'] = $info->field_error_message('Icon');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'counter-delete') {

    $id = $_POST['id'];

    $counter  = $ability->counter_find($id);

    if ($counter) {
        if ($ability->counter_delete($id)) {
            $data['message'] = 'Item deleted successfully!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Item delete failed!';
        }
    } else {
        $data['message'] = 'Item not found!';
    }
    echo json_encode($data);

}