<?php


namespace App\Admin;


use App\Config\Config;

class FAQ extends Config
{

    public function index()
    {
        return $this->connect->query("Select * From `faqs`");
    }

    public function create($question, $answer, $status, $auth_id)
    {
        return $this->connect->query("Insert Into `faqs`(`question` , `answer` ,  `status` , `create_by`) VALUES ('$question' , '$answer' , '$status' , '$auth_id')");
    }

    public function update($question, $answer, $status, $auth_id, $id)
    {
        return $this->connect->query("Update `faqs` Set `question` = '$question' , `answer` = '$answer' ,  `status` = '$status' , `create_by` = '$auth_id' where `id` = '$id'");
    }

    public function delete($id)
    {
        return $this->connect->query("Delete From `faqs` where `id` = '$id'");
    }

    public function find($id)
    {
        return $this->connect->query("Select * From `faqs` where `id` = '$id'");
    }

    public function status($status, $id)
    {
        return $this->connect->query("Update `faqs` Set `status` = '$status' where `id` = '$id'");
    }

}