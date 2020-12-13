<?php


namespace App\Admin;


use App\Config\Config;

class Ability extends Config
{

    public function all_skills()
    {
        return $this->connect->query("SELECT * FROM `skills` ORDER BY `id` DESC ");
    }

//     add skill from form
    public function skill_add($name, $percentage, $status, $create_by)
    {
        return $this->connect->query("Insert into `skills` (`name` , `percentage` , `status` , `create_by`) values ('$name' , '$percentage' , '$status' , '$create_by')");
    }

    public function skill_status($status , $id){

        return $this->connect->query("Update `skills` Set `status` = '$status' Where `id` = '$id' ");

    }

}