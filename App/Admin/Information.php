<?php


namespace App\Admin;


use App\Config\Config;

class Information extends Config
{

    public function information()
    {
        $information = [];
        $obj = $this->connect->query("SELECT * FROM `information`");

        while ($info = $obj->fetch_assoc()) {
            $information[$info['name']] = ['value' => $info['value'], 'id' => $info['id']];

        }

        return $information;
    }

    public function hero_title()
    {
        return $this->information()['hero_title'];
    }

    public function hero_sub_title()
    {
        return $this->information()['hero_sub_title'];
    }

    public function hero_link1_text()
    {
        return $this->information()['hero_link1_text'];
    }

    public function hero_link1_url()
    {
        return $this->information()['hero_link1_url'];
    }

    public function hero_link2_text()
    {
        return $this->information()['hero_link2_text'];
    }

    public function hero_link2_url()
    {
        return $this->information()['hero_link2_url'];
    }

    public function info_update( $name , $value ){
        return $this->connect->query("UPDATE `information` SET `value` = '$value' WHERE `name` = '$name'");
    }

}