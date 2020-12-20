<?php


namespace App\Admin;


use App\Config\Config;

class Messages extends Config
{
    public function messages()
    {
        return $this->connect->query("Select * From `messages`");
    }

    public function find($id){

        return $this->connect->query("Select * From `messages` where `id` = '$id'");
    }

    public function delete($id){
        return $this->connect->query("Delete From `messages` where `id` = '$id'");
    }
}