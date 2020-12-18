<?php


namespace App\Site;


use App\Config\Config;

class Site extends Config
{
    public function featured_service()
    {
        return $this->connect->query("Select * From `services` where `status` = 1 and `featured` = 1");
    }

    public function skills()
    {
        return $this->connect->query("Select * From `skills` where `status` = 1 order by `id` desc");
    }

    public function counters()
    {
        return $this->connect->query("Select * From `counters` where `status` = 1");
    }

    public function logos()
    {
        return $this->connect->query("Select * From `client_logos` where `status` = 1");
    }

    public function services()
    {
        return $this->connect->query("Select * From `services` where `status` = 1 limit 6");
    }

    public function testimonials()
    {
        return $this->connect->query("Select * From `testimonials` where `status` = 1 limit 6");
    }

    public function work_menu()
    {
        return $this->connect->query("Select * From `works_menu` where `status` = 1 ");
    }

    public function work_item()
    {
        $query = "SELECT `item`.`id` AS `id` ,  `title` , `slug` , `name` , `image` , `slug` , `item`.`status` AS `status` FROM `works_item` AS `item`  INNER JOIN `works_menu` AS `menu` ON `item`.`menu_id` = `menu`.`id` where  `item`.`status` = 1";
        return $this->connect->query($query);
    }

    public function team()
    {
        return $this->connect->query("Select * From `team` where `status` = 1 ");
    }

    public function faqs()
    {
        return $this->connect->query("Select * From `faqs` where `status` = 1");
    }


}