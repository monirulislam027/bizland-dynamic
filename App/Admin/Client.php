<?php


namespace App\Admin;


use App\Config\Config;

class Client extends Config
{
//    all logo
    public function all_logo()
    {
        return $this->connect->query("Select * From `client_logos` order by `id` desc ");
    }

//    client logo add
    public function add_client_log($image, $status, $user)
    {
        return $this->connect->query("Insert Into `client_logos` (`image` , `status` , `create_by`) VALUES ('$image' , '$status' , '$user')");
    }


//    logo status
    public function logo_status($status, $id)
    {
        return $this->connect->query("Update `client_logos` Set `status` = '$status' Where `id` = '$id' ");
    }

//    logo find with id
    public function logo_find($id)
    {
        return $this->connect->query("Select * From `client_logos` where `id` = '$id'");
    }

//    logo delete
    public function logo_delete($id)
    {
        return $this->connect->query("Delete From `client_logos` where `id` = '$id'");
    }


}