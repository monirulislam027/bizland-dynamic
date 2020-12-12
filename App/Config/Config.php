<?php


namespace App\Config;

use mysqli;

class Config
{
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $database = 'bizland';
    public $connect;

    public $baseUrl = 'http://bizland-dynamic.test/';

    public function __construct()
    {

        $this->connect = new mysqli($this->host, $this->username , $this->password , $this->database);
        if ($this->connect->connect_error){
            die($this->conn->connect_error);
        }
    }

    public function titleGenerate()
    {
        $page_name = basename($_SERVER['PHP_SELF'], '.php');
        $title = str_replace('-', ' ', $page_name);
        $title = str_replace('_', ' ', $title);

        return ucwords($title);
    }

    public function slug($text = '')
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    }

    public function error_message($field_name)
    {
        return "Please enter a " . $field_name;
    }

}