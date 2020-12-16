<?php


namespace App\Admin;


use App\Config\Config;

class Services extends Config
{
    public function service_add($icon, $title, $desc, $status, $featured, $auth_id)
    {
        return $this->connect->query("Insert into `services` ( `icon` , `title` , `desc` , `status` , `featured` , `create_by` ) VALUES ('$icon' , '$title' , '$desc' ,'$status' , '$featured' , '$auth_id')");

    }

    public function all_service()
    {
        return $this->connect->query("Select * From `services` order by `id` desc");
    }

    //    service status
    public function service_status($status, $id)
    {
        return $this->connect->query("Update `services` Set `status` = '$status' Where `id` = '$id' ");
    }

    //    service featured status
    public function service_featured_status($status, $id)
    {
        return $this->connect->query("Update `services` Set `featured` = '$status' Where `id` = '$id' ");
    }

//    service find
    public function service_find($id)
    {
        return $this->connect->query("Select * From `services` where  `id` = '$id'");
    }

    public function service_update($icon, $title, $desc, $status, $featured, $auth_id, $id)
    {
        return $this->connect->query("Update `services` Set `icon` = '$icon' , `title` = '$title' , `desc` = '$desc' , `status` = '$status' , `featured` = '$featured' , `create_by` = '$auth_id'  where `id` = '$id'");

    }

    public function service_delete($id)
    {
        return $this->connect->query("Delete From `services` where `id` = '$id'");
    }

}