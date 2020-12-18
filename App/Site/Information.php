<?php


namespace App\Site;


use App\Config\Config;

class Information extends Config
{

    public function information()
    {

        $infos = $this->connect->query("Select * From `information`");

        $information = [];

        while ($info = $infos->fetch_assoc()) {
            $information[$info['name']] = ['value' => $info['value']];
        }

        return $information;
    }

    public function hero_title()
    {
        return $this->information()['hero_title']['value'];
    }

    public function hero_sub_title()
    {
        return $this->information()['hero_sub_title']['value'];
    }

    public function hero_link1_text()
    {
        return $this->information()['hero_link1_text']['value'];
    }

    public function hero_link1_url()
    {
        return $this->information()['hero_link1_url']['value'];
    }

    public function hero_link2_text()
    {
        return $this->information()['hero_link2_text']['value'];
    }

    public function hero_link2_url()
    {
        return $this->information()['hero_link2_url']['value'];
    }

}