<?php


namespace App\Config;


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

    public function info_update($name, $value)
    {
        return $this->connect->query("UPDATE `information` SET `value` = '$value' WHERE `name` = '$name'");
    }

    public function find($id)
    {
        return $this->connect->query("Select * From `information` where `id` = '$id'");
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

    public function google_map()
    {
        return $this->information()['google_map'];
    }

    public function map_link()
    {

        return $this->information()['map_link'];
    }

    public function contact_form()
    {

        return $this->information()['contact_form'];
    }

    public function social_links()
    {

        return $this->information()['social_links'];
    }

    public function service_title()
    {
        return $this->information()['service_title'];
    }

    public function service_subtitle()
    {
        return $this->information()['service_subtitle'];
    }

    public function about_title()
    {
        return $this->information()['about_title'];
    }

    public function about_subtitle()
    {
        return $this->information()['about_subtitle'];
    }

    public function portfolio_title()
    {
        return $this->information()['portfolio_title'];
    }

    public function portfolio_subtitle()
    {
        return $this->information()['portfolio_subtitle'];
    }

    public function team_title()
    {
        return $this->information()['team_title'];
    }

    public function team_subtitle()
    {
        return $this->information()['team_subtitle'];
    }

    public function faq_title()
    {
        return $this->information()['faq_title'];
    }

    public function faq_subtitle()
    {
        return $this->information()['faq_subtitle'];
    }

    public function contact_title()
    {
        return $this->information()['contact_title'];
    }

    public function contact_subtitle()
    {
        return $this->information()['contact_subtitle'];
    }

    public function about()
    {
        return $this->information()['about'];
    }

    public function featured_service()
    {
        return $this->information()['featured_service'];
    }

    public function skill()
    {
        return $this->information()['skill'];
    }
    public function count()
    {
        return $this->information()['count'];
    }

    public function client()
    {
        return $this->information()['client'];
    }

    public function testimonial()
    {
        return $this->information()['testimonial'];
    }

    public function service()
    {
        return $this->information()['service'];
    }

    public function portfolio()
    {
        return $this->information()['portfolio'];
    }

    public function team()
    {
        return $this->information()['team'];
    }

    public function faq()
    {
        return $this->information()['faq'];
    }

    public function contact()
    {
        return $this->information()['contact'];
    }

    public function site_title(){
        return $this->information()['site_title'];
    }

    public function footer_menu(){
        return $this->information()['footer_menu'];
    }

}