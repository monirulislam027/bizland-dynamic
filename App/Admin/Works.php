<?php


namespace App\Admin;


use App\Config\Config;

class Works extends Config
{

    public function add_work_menu($name, $status, $auth_id)
    {
        $slug = $this->slug($name);
        return $this->connect->query("Insert Into `works_menu` (`name` , `slug` , `status` , `create_by`) VALUES ('$name' , '$slug' , '$status' , '$auth_id')");
    }

    public function all_work_menu()
    {
        return $this->connect->query("Select * From `works_menu` order by `id` desc");
    }

    public function work_menu_status($status, $id)
    {
        return $this->connect->query("Update `works_menu` Set `status` = '$status' Where `id` = '$id' ");
    }

    public function work_menu_find($id)
    {
        return $this->connect->query("Select * From `works_menu` where `id` = '$id'");
    }

    public function work_menu_delete($id)
    {
        return $this->connect->query("Delete From `works_menu` where `id` = '$id'");
    }

    public function update_work_menu($name, $status, $auth_id, $id)
    {
        $slug = $this->slug($name);
        return $this->connect->query("Update `works_menu` Set `name` = '$name' , `slug` = '$slug'  , `status` = '$status' , `create_by` = '$auth_id' where `id` = '$id'");
    }

    public function add_work_item($title , $menu_id , $status , $fileName , $auth_id )
    {
        return $this->connect->query("Insert Into `works_item` (`title` , `menu_id` , `status` , `image` , `create_by`) VALUES ( '$title' , '$menu_id' , '$status' , '$fileName' , '$auth_id')");
    }

    public function all_works_item(){

        $query = "SELECT `item`.`id` AS `id` ,  `title` , `name` , `image` , `item`.`status` AS `status` FROM `works_item` AS `item`  INNER JOIN `works_menu` AS `menu` ON `item`.`menu_id` = `menu`.`id`";
        return $this->connect->query($query);

    }

    public function work_item_status($status, $id)
    {
        return $this->connect->query("Update `works_item` Set `status` = '$status' Where `id` = '$id' ");
    }

    public function work_item_find($id)
    {
        return $this->connect->query("Select * From `works_item` where `id` = '$id'");
    }

    public function work_item_delete($id)
    {
        return $this->connect->query("Delete From `works_item` where `id` = '$id'");
    }

}