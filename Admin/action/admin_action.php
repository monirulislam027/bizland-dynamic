<?php

use App\Admin\Ability;
use App\Admin\Client;
use App\Admin\FAQ;
use App\Admin\Services;
use App\Admin\Team;
use App\Admin\Works;
use App\Config\Information;
use App\Admin\Messages;

session_start();


require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'vendor/autoload.php';
header('content-type:application/json');

$info = new Information();
$ability = new Ability();
$client = new Client();
$services = new Services();
$works = new  Works();
$team = new Team();
$faqs = new  FAQ();
$message = new Messages();


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

        $update_skill = $ability->skill_update($name, $percentage, $status, $auth_id, $id);
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

// counter add
if (isset($_POST['action']) && $_POST['action'] == 'counter-add') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['number']) && $_POST['number'] != null && isset($_POST['icon']) && $_POST['icon'] != '') {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $name = $_POST['name'];
        $number = $_POST['number'];
        $icon = $_POST['icon'];

        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $add_counter = $ability->counter_add($name, $number, $icon, $status, $auth_id);
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

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['number']) && $_POST['number'] != null && isset($_POST['icon']) && $_POST['icon'] != '') {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $id = (int)base64_decode($_POST['data']);

        $name = $_POST['name'];
        $number = $_POST['number'];
        $icon = $_POST['icon'];

        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $update_counter = $ability->counter_update($name, $number, $icon, $status, $auth_id, $id);
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

    $counter = $ability->counter_find($id);

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

//counter end

if (isset($_POST['action']) && $_POST['action'] == 'logo-add') {

    if ($_FILES['image']['name']) {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $image = $_FILES['image'];
        $auth_id = base64_decode($_SESSION['auth_user_id']);


        $image = $_FILES['image'];
        $imageName = explode('.', $image['name']);
        $imageExe = end($imageName);
        $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;;

        $logo_add = $client->add_client_log($fileName, $status, $auth_id);

        if ($logo_add) {
            move_uploaded_file($image['tmp_name'], '../../uploads/logo/' . $fileName);
            $data['message'] = 'Image Added Successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'client_logo.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Image added failed! Try again!';
        }


    } else {

        $data['error'] = true;

        $image = $_FILES['image']['name'];

        if (empty($image)) {
            $data['message'] = "Please select a image";
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'logo-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $client->logo_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'logo-delete') {

    $id = $_POST['id'];

    $logo = $client->logo_find($id);

    if ($logo->num_rows > 0) {

        $logo_row = $logo->fetch_assoc();
        if ($client->logo_delete($id)) {


            if (file_exists('../../uploads/logo/' . $logo_row['image'])) {
                unlink('../../uploads/logo/' . $logo_row['image']);
            }

            $data['message'] = 'Item deleted successfully!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Item delete failed!';
        }
    } else {
        $data['error'] = true;
        $data['message'] = 'Item not found!';
    }
    echo json_encode($data);

}

//testimonial start

if (isset($_POST['action']) && $_POST['action'] == 'testimonial-add') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['post']) && $_POST['post'] != '' && isset($_POST['review']) && $_POST['review'] != '' && $_FILES['image']['name']) {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $name = $_POST['name'];
        $post = $_POST['post'];
        $review = $_POST['review'];

        $image = $_FILES['image'];
        $auth_id = base64_decode($_SESSION['auth_user_id']);


        $image = $_FILES['image'];
        $imageName = explode('.', $image['name']);
        $imageExe = end($imageName);
        $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;;

        $testimonial_add = $client->testimonial_add($name, $post, $review, $status, $fileName, $auth_id);

        if ($testimonial_add) {
            move_uploaded_file($image['tmp_name'], '../../uploads/testimonials/' . $fileName);
            $data['message'] = 'Testimonial added successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'testimonials.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Testimonial added failed! Try again!';
        }


    } else {

        $data['error'] = true;

        $image = $_FILES['image']['name'];
        $name = $_POST['name'];
        $post = $_POST['post'];
        $review = $_POST['review'];

        if ($name == '') {
            $data['message'] = $client->field_error_message(' name');
        } else if ($post == '') {
            $data['message'] = $client->field_error_message(' post');
        } else if ($review == '') {
            $data['message'] = $client->field_error_message(' review');
        } else if (empty($image)) {
            $data['message'] = "Please select a image";
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'testimonial-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $client->testimonial_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'testimonial-delete') {

    $id = $_POST['id'];

    $testimonial = $client->testimonial_find($id);

    if ($testimonial) {

        $testimonial = $testimonial->fetch_assoc();

        if (file_exists('../../uploads/testimonials/' . $testimonial['image'])) {
            unlink('../../uploads/testimonials/' . $testimonial['image']);
        }

        if ($client->testimonial_delete($id)) {
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

if (isset($_POST['action']) && $_POST['action'] == 'testimonial-update') {

    if (isset($_POST['name']) && isset($_POST['data']) && $_POST['name'] != '' && isset($_POST['post']) && $_POST['post'] != '' && isset($_POST['review']) && $_POST['review'] != '') {


        $id = (int)base64_decode($_POST['data']);

        $testimonial = $client->testimonial_find($id);
        if ($testimonial->num_rows > 0) {

            $testimonial = $testimonial->fetch_assoc();

            $status = isset($_POST['status']) ? $_POST['status'] : 0;
            $name = $_POST['name'];
            $post = $_POST['post'];
            $review = $_POST['review'];


            $auth_id = base64_decode($_SESSION['auth_user_id']);

            if ($_FILES['image']['name']) {
                $image = $_FILES['image'];
                $imageName = explode('.', $image['name']);
                $imageExe = end($imageName);
                $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;
                if (file_exists('../../uploads/testimonials/' . $testimonial['image'])) {
                    unlink('../../uploads/testimonials/' . $testimonial['image']);
                }
                move_uploaded_file($image['tmp_name'], '../../uploads/testimonials/' . $fileName);
            } else {
                $fileName = $testimonial['image'];
            }


            $testimonial_update = $client->testimonial_update($name, $post, $review, $status, $fileName, $auth_id, $id);

            if ($testimonial_update) {

                $data['message'] = 'Testimonial updated successfully!';
                $data['rdr'] = true;
                $data['rdr_url'] = 'testimonials.php';
            } else {
                $data['error'] = true;
                $data['message'] = 'Testimonial update failed! Try again!';
            }
        } else {
            $data['error'] = true;
            $data['message'] = 'Item not found!';
        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $post = $_POST['post'];
        $review = $_POST['review'];

        if ($name == '') {
            $data['message'] = $client->field_error_message(' name');
        } else if ($post == '') {
            $data['message'] = $client->field_error_message(' post');
        } else if ($review == '') {
            $data['message'] = $client->field_error_message(' review');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

//services add
if (isset($_POST['action']) && $_POST['action'] == 'service-add') {

    if (isset($_POST['icon']) && $_POST['icon'] != '' && isset($_POST['title']) && $_POST['title'] != '' && isset($_POST['desc']) && $_POST['desc'] != '') {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $featured = isset($_POST['featured']) ? $_POST['featured'] : 0;

        $icon = $_POST['icon'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $service_add = $services->service_add($icon, $title, $desc, $status, $featured, $auth_id);

        if ($service_add) {
            $data['message'] = 'Service added successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'services.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Service added failed! Try again!';
        }


    } else {

        $data['error'] = true;

        $icon = $_POST['icon'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];

        if ($icon == '') {
            $data['message'] = $client->field_error_message(' icon');
        } else if ($title == '') {
            $data['message'] = $client->field_error_message(' title');
        } else if ($desc == '') {
            $data['message'] = $client->field_error_message(' desc');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'service-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $services->service_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'service-featured-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $services->service_featured_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'service-update') {

    if (isset($_POST['icon']) && $_POST['icon'] != '' && isset($_POST['title']) && $_POST['title'] != '' && isset($_POST['desc']) && $_POST['desc'] != '') {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $featured = isset($_POST['featured']) ? $_POST['featured'] : 0;

        $id = (int)base64_decode($_POST['data']);

        $icon = $_POST['icon'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $service_update = $services->service_update($icon, $title, $desc, $status, $featured, $auth_id, $id);

        if ($service_update) {
            $data['message'] = 'Service updated successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'services.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Service update failed! Try again!';
        }


    } else {

        $data['error'] = true;

        $icon = $_POST['icon'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];

        if ($icon == '') {
            $data['message'] = $client->field_error_message(' icon');
        } else if ($title == '') {
            $data['message'] = $client->field_error_message(' title');
        } else if ($desc == '') {
            $data['message'] = $client->field_error_message(' desc');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'service-delete') {

    $id = $_POST['id'];

    $service = $services->service_find($id);

    if ($service->num_rows > 0) {

        if ($services->service_delete($id)) {
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

//work menus start

if (isset($_POST['action']) && $_POST['action'] == 'work_menu-add') {

    if (isset($_POST['name']) && $_POST['name'] != '') {

        $name = $_POST['name'];
        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $menu_add = $works->add_work_menu($name, $status, $auth_id);

        if ($menu_add) {

            $data['message'] = 'Item added successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'works_menu.php';

        } else {

            $data['error'] = true;
            $data['message'] = 'Item add failed!';
        }

    } else {

        $data['error'] = true;

        $name = $_POST['name'];

        if ($name == '') {
            $data['message'] = $client->field_error_message(' Work menu item');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'works-menu-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $works->work_menu_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'work-menu-delete') {

    $id = $_POST['id'];

    $work_menu = $works->work_menu_find($id);

    if ($work_menu->num_rows > 0) {

        if ($works->work_menu_delete($id)) {
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

if (isset($_POST['action']) && $_POST['action'] == 'work_menu-update') {

    if (isset($_POST['name']) && $_POST['name'] != '' && $_POST['data'] != '') {

        $id = (int)base64_decode($_POST['data']);

        $name = $_POST['name'];
        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $menu_update = $works->update_work_menu($name, $status, $auth_id, $id);

        if ($menu_update) {

            $data['message'] = 'Item updated successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'works_menu.php';

        } else {

            $data['error'] = true;
            $data['message'] = 'Item update failed!';
        }

    } else {

        $data['error'] = true;

        $name = $_POST['name'];

        if ($name == '') {
            $data['message'] = $client->field_error_message(' Work menu item');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);
}

// work item

if (isset($_POST['action']) && $_POST['action'] == 'add-work-item') {

    if (isset($_POST['title']) && $_POST['title'] != '' && isset($_POST['menu_id']) && $_POST['menu_id'] != '' && $_FILES['image']['name']) {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        $title = $_POST['title'];
        $menu_id = $_POST['menu_id'];

        $image = $_FILES['image'];
        $auth_id = base64_decode($_SESSION['auth_user_id']);


        $image = $_FILES['image'];
        $imageName = explode('.', $image['name']);
        $imageExe = end($imageName);
        $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;;

        $work_item_add = $works->add_work_item($title, $menu_id, $status, $fileName, $auth_id);

        if ($work_item_add) {
            move_uploaded_file($image['tmp_name'], '../../uploads/works/' . $fileName);
            $data['message'] = 'Works item added successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'works_items.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Works item added failed! Try again!';
        }


    } else {

        $data['error'] = true;

        $image = $_FILES['image']['name'];
        $title = $_POST['title'];
        $menu_id = $_POST['menu_id'];


        if ($title == '') {
            $data['message'] = $client->field_error_message(' title');
        } else if ($menu_id == '') {
            $data['message'] = $client->field_error_message(' Category');
        } else if (empty($image)) {
            $data['message'] = "Please select a image";
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'work-item-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $works->work_item_status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'work-item-delete') {

    $id = (int)$_POST['id'];

    $work_item = $works->work_item_find($id);

    if ($work_item->num_rows > 0) {

        $item = $work_item->fetch_assoc();

        if ($works->work_item_delete($id)) {
            file_exists('../../uploads/works/' . $item['image']) ? unlink('../../uploads/works/' . $item['image']) : false;
            $data['message'] = 'Item deleted successfully!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Item delete failed!';
        }
    } else {
        $data['error'] = true;
        $data['message'] = 'Item not found!';
    }
    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'work-item-update') {


    if (isset($_POST['title']) && $_POST['title'] != '' && isset($_POST['menu_id']) && $_POST['menu_id'] != '') {


        $id = (int)base64_decode($_POST['data']);

        $item = $works->work_item_find($id);
        if ($item->num_rows > 0) {

            $title = $_POST['title'];
            $menu_id = $_POST['menu_id'];
            $status = isset($_POST['status']) ? $_POST['status'] : 0;
            $auth_id = (int)base64_decode($_SESSION['auth_user_id']);

            $item = $item->fetch_assoc();

            if ($_FILES['image']['name']) {

                $image = $_FILES['image'];
                $imageName = explode('.', $image['name']);
                $imageExe = end($imageName);
                $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;
                file_exists('../../uploads/works/' . $item['image']) ? unlink('../../uploads/works/' . $item['image']) : false;
                move_uploaded_file($image['tmp_name'], '../../uploads/works/' . $fileName);
            } else {
                $fileName = $item['image'];
            }

            $work_item_update = $works->work_item_update($title, $menu_id, $status, $fileName, $auth_id, $id);

            if ($work_item_update) {

                $data['message'] = 'Works item updated successfully!';
                $data['rdr'] = true;
                $data['rdr_url'] = 'works_items.php';
            } else {
                $data['error'] = true;
                $data['message'] = 'Works item update failed! Try again!';
            }
        } else {
            $data['error'] = true;
            $data['message'] = "Item not found!";
        }


    } else {

        $data['error'] = true;

        $title = $_POST['title'];
        $menu_id = $_POST['menu_id'];


        if ($title == '') {
            $data['message'] = $client->field_error_message(' title');
        } else if ($menu_id == '') {
            $data['message'] = $client->field_error_message('Category');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);


}

// work item

if (isset($_POST['action']) && $_POST['action'] == 'team-member-add') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['role']) && $_POST['role'] != '' &&
        $_FILES['image']['name'] != '') {

        $name = $_POST['name'];
        $role = $_POST['role'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $linkedIn = $_POST['linkedIn'];
        $instagram = $_POST['instagram'];
        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $image = $_FILES['image'];
        $imageName = explode('.', $image['name']);
        $imageExe = end($imageName);
        $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;

        $team_member_add = $team->create($name, $role, $status, $facebook, $twitter, $linkedIn, $instagram, $fileName, $auth_id);

        if ($team_member_add) {
            move_uploaded_file($image['tmp_name'], '../../uploads/team/' . $fileName);
            $data['message'] = 'Team member added successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'team_member.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Team member added failed! Try again!';
        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $role = $_POST['role'];
        $image = $_FILES['image'];

        if ($name == '') {
            $data['message'] = $client->field_error_message('name');
        } else if ($role == '') {
            $data['message'] = $client->field_error_message('role');
        } else if ($image['name'] == '') {
            $data['message'] = "Please select a image";
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'team-member-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $team->status_update($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'team-member-delete') {

    $id = (int)$_POST['id'];

    $member = $team->find($id);

    if ($member->num_rows > 0) {

        $member = $member->fetch_assoc();

        if ($team->delete($id)) {
            file_exists('../../uploads/team/' . $member['image']) ? unlink('../../uploads/team/' . $member['image']) : false;
            $data['message'] = 'Team member deleted successfully!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Team member delete failed!';
        }
    } else {
        $data['error'] = true;
        $data['message'] = 'Team member not found!';
    }
    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'team-member-update') {

    if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['role']) && $_POST['role'] != '' &&
        isset($_POST['data']) && $_POST['data'] != '') {

        $name = $_POST['name'];
        $role = $_POST['role'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $linkedIn = $_POST['linkedIn'];
        $instagram = $_POST['instagram'];
        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $auth_id = base64_decode($_SESSION['auth_user_id']);
        $id = (int)base64_decode($_POST['data']);
        $member = $team->find($id);
        if ($member->num_rows > 0) {

            $member = $member->fetch_assoc();

            if ($_FILES['image']['name'] != '') {

                $image = $_FILES['image'];
                $imageName = explode('.', $image['name']);
                $imageExe = end($imageName);
                $fileName = uniqid() . rand(111111, 999999) . '.' . $imageExe;
                file_exists('../../uploads/team/' . $member['image']) ? unlink('../../uploads/team/' . $member['image']) : false;
                move_uploaded_file($image['tmp_name'], '../../uploads/team/' . $fileName);

            } else {
                $fileName = $member['image'];
            }


            $team_member_update = $team->update($name, $role, $status, $facebook, $twitter, $linkedIn, $instagram, $fileName, $auth_id, $id);

            if ($team_member_update) {

                $data['message'] = 'Team member updated successfully!';
                $data['rdr'] = true;
                $data['rdr_url'] = 'team_member.php';
            } else {
                $data['error'] = true;
                $data['message'] = 'Failed! Try again!';
            }
        } else {

            $data['error'] = true;
            $data['message'] = 'Data not found!';

        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $role = $_POST['role'];
        $image = $_FILES['image'];

        if ($name == '') {
            $data['message'] = $client->field_error_message('name');
        } else if ($role == '') {
            $data['message'] = $client->field_error_message('role');
        } else if ($image['name'] == '') {
            $data['message'] = "Please select a image";
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);

}


if (isset($_POST['action']) && $_POST['action'] == 'faq-add') {

    if (isset($_POST['question']) && $_POST['question'] && isset($_POST['answer']) && $_POST['answer']) {

        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $auth_id = base64_decode($_SESSION['auth_user_id']);

        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $question_add = $faqs->create($question, $answer, $status, $auth_id);
        if ($question_add) {
            $data['message'] = 'Question added successfully!';
            $data['rdr'] = true;
            $data['rdr_url'] = 'faqs.php';
        } else {
            $data['error'] = true;
            $data['message'] = 'Failed! Try again!';
        }

    } else {

        $data['error'] = true;

        $question = $_POST['question'];
        $answer = $_POST['answer'];

        if ($question == '') {
            $data['message'] = $client->field_error_message('question');
        } else if ($answer == '') {
            $data['message'] = $client->field_error_message('answer');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'faq-status') {

    $status = $_POST['status'];
    $id = $_POST['id'];

    $update_status = $faqs->status($status, $id);
    if ($update_status) {
        $data['message'] = 'Status updated successfully!';
    } else {
        $data['error'] = true;
        $data['message'] = 'Something went wrong! Try again!';
    }

    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'faq-delete') {

    $id = (int)$_POST['id'];

    $question = $faqs->find($id);

    if ($question->num_rows > 0) {

        $question = $question->fetch_assoc();

        if ($faqs->delete($id)) {
            $data['message'] = 'Question deleted successfully!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Failed! Try Again';
        }
    } else {
        $data['error'] = true;
        $data['message'] = 'Team member not found!';
    }
    echo json_encode($data);

}

if (isset($_POST['action']) && $_POST['action'] == 'faq-update') {

    if (isset($_POST['question']) && $_POST['question'] != '' && isset($_POST['answer']) && $_POST['answer'] != '' &&
        isset($_POST['data']) && $_POST['data'] != '') {

        $id = base64_decode($_POST['data']);

        $question = $faqs->find($id);
        if ($question->num_rows > 0) {

            $status = isset($_POST['status']) ? $_POST['status'] : 0;
            $auth_id = base64_decode($_SESSION['auth_user_id']);

            $question = $_POST['question'];
            $answer = $_POST['answer'];

            $question_update = $faqs->update($question, $answer, $status, $auth_id, $id);
            if ($question_update) {
                $data['message'] = 'Question updated successfully!';
                $data['rdr'] = true;
                $data['rdr_url'] = 'faqs.php';
            } else {
                $data['error'] = true;
                $data['message'] = 'Failed! Try again!';
            }

        } else {
            $data['error'] = true;
            $data['message'] = 'Item Not found!';
        }

    } else {

        $data['error'] = true;

        $question = $_POST['question'];
        $answer = $_POST['answer'];

        if ($question == '') {
            $data['message'] = $client->field_error_message('question');
        } else if ($answer == '') {
            $data['message'] = $client->field_error_message('answer');
        } else {
            $data['message'] = 'Something went wrong!';
        }

    }

    echo json_encode($data);
}


if (isset($_POST['action']) && $_POST['action'] == 'info-data-update') {

    if (isset($_POST['id']) && $_POST['id'] != '' && isset($_POST['value']) && $_POST['value'] != '') {

        $id = $_POST['id'];
        $value = $_POST['value'];

        $info_find = $info->find($id);
        if ($info_find->num_rows > 0) {
            $info_find = $info_find->fetch_assoc();

            $info_update = $info->info_update($info_find['name'], $value);
            if ($info_update) {
                $data['message'] = 'Success!';
            } else {
                $data['error'] = true;
                $data['message'] = 'Failed! Try again';
            }

        } else {
            $data['error'] = true;
            $data['message'] = 'Failed! Try again';
        }
    } else {
        $data['error'] = true;
        $data['message'] = 'Error!';
    }


}

if (isset($_POST['action']) && $_POST['action'] == 'info-data-toggle') {

    $value = $_POST['status'];
    $id = $_POST['id'];

    $info_find = $info->find($id);
    if ($info_find->num_rows > 0) {
        $info_find = $info_find->fetch_assoc();

        $info_update = $info->info_update($info_find['name'], $value);
        if ($info_update) {
            $data['message'] = 'Success!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Failed! Try again';
        }

    } else {
        $data['error'] = true;
        $data['message'] = 'Failed! Try again';
    }

    echo json_encode($data);

}


if (isset($_POST['action']) && $_POST['action'] == 'message-delete') {

    $id = (int)$_POST['id'];

    $message_array = $message->find($id);

    if ($message_array->num_rows > 0) {

        if ($message->delete($id)) {
            $data['message'] = 'Message deleted successfully!';
        } else {
            $data['error'] = true;
            $data['message'] = 'Failed! Try Again';
        }
    } else {
        $data['error'] = true;
        $data['message'] = 'Data not found!';
    }
    echo json_encode($data);

}
