<?php

use App\Admin\Information;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';
header('content-type:application/json');

$info = new Information();


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
            $imageName = explode('.' , $image['name']);
            $imageExe = end($imageName);
            $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;;

            $imageUpdate = $info->info_update('about_us_image', $fileName);
            if ($imageUpdate) {
                if (file_exists( '../../uploads/information/'. $old_image)){
                    unlink('../../uploads/information/'. $old_image);
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