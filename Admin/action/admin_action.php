<?php

use App\Admin\Information;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';
header('content-type:application/json');

$info = new Information();


$data = ['error' => false, 'rdr' => false];

if(isset($_POST['action']) && $_POST['action'] == 'about_us'){


        $array = [
            'hero_title' => $_POST['hero_title'],
            'hero_sub_title' => $_POST['hero_sub_title'],
            'hero_link1_text' => $_POST['hero_link1_text'],
            'hero_link1_url' => $_POST['hero_link1_url'],
            'hero_link2_text' => $_POST['hero_link2_text'],
            'hero_link2_url' => $_POST['hero_link2_url']
        ];

        foreach ($array as $key => $value){
            $info->info_update($key , $value);
        }

        $data['message'] = 'Updated Successfully!';

        echo  json_encode($data);
}