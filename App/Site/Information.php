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
            $information[$info['name']] = $info['value'];
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

    public function about_us_subtitle()
    {
        return $this->information()['about_us_subtitle'];
    }

    public function about_us_description_title()
    {
        return $this->information()['about_us_description_title'];
    }

    public function about_us_description()
    {
        return $this->information()['about_us_description'];
    }

    public function about_us_image()
    {
        return $this->information()['about_us_image'];
    }

    public function contact_address()
    {
        return $this->information()['contact_address'];
    }

    public function contact_email()
    {
        return $this->information()['contact_email'];
    }

    public function contact_no()
    {
        return $this->information()['contact_no'];
    }

    public function facebook()
    {
        return $this->information()['facebook'];
    }

    public function twitter()
    {
        return $this->information()['twitter'];
    }

    public function instagram()
    {
        return $this->information()['instagram'];
    }

    public function linkedIn()
    {
        return $this->information()['linkedIn'];
    }

    public function skype()
    {
        return $this->information()['skype'];
    }

}