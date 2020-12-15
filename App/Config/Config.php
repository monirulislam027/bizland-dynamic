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
    public $adminBaseUrl = 'http://bizland-dynamic.test/admin/';

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

    public function response_message($type ,$message)
    {
        $message_t = '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">';
        $message_t .= $message;
        $message_t .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $message_t .= ' <span aria-hidden="true">&times;</span>';
        $message_t .= '</button>';
        $message_t .= ' </div>';

        return $message_t;

    }

    public function field_error_message($field){
        return $field.' field is required!';
    }

}