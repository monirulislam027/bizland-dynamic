<?php


namespace App\Admin;


use App\Config\Config;

class Team extends Config
{

    public function index()
    {
        return $this->connect->query("Select * From `team`");
    }

    public function create($name, $role, $status, $facebook, $twitter, $linkedIn, $instagram, $filename, $auth_id)
    {
        return $this->connect->query("Insert Into `team` (`name` , `role` , `status` , `facebook` , `twitter` ,  `linkedIn` , `instagram` , `image` , `create_by`) VALUES ('$name' , '$role' , '$status' ,'$facebook' , '$twitter' , '$linkedIn' , '$instagram' , '$filename' , '$auth_id')");
    }

    public function edit()
    {

    }

    public function update($name, $role, $status, $facebook, $twitter, $linkedIn, $instagram, $fileName, $auth_id , $id)
    {
        return $this->connect->query("Update `team` Set `name` = '$name' , `role` = '$role' , `status` = '$status' , `facebook` = '$facebook' , `twitter` = '$twitter' ,  `linkedIn` = '$linkedIn' , `instagram` = '$instagram' , `image` = '$fileName' , `create_by` = '$auth_id' where `id` = '$id' ");
    }

    public function delete($id)
    {
        return $this->connect->query("Delete From `team` where `id` = '$id'");
    }

    public function find($id)
    {
        return $this->connect->query("Select * From `team` where `id` = '$id'");
    }

    public function status_update($status , $id){
        return $this->connect->query("Update `team` Set `status` = '$status' Where `id` = '$id' ");
    }

}