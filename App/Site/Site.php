<?php


namespace App\Site;


use App\Config\Config;

class Site extends Config
{
    public function featured_service(){
        return $this->connect->query("Select * From `services` where `status` = 1 and `featured` = 1");
    }

    public function skills(){
        return $this->connect->query("Select * From `skills` where `status` = 1 order by `id` desc");
    }

    public function counters(){
        return $this->connect->query("Select * From `counters` where `status` = 1");
    }

    public function logos(){
        return $this->connect->query("Select * From `client_logos` where `status` = 1");
    }
}