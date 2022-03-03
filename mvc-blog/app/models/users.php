<?php
require_once('db.php');
class user
{
    public $db_handle;
    function __construct()
    {
        $this->db_handle = new connectDatabase();
    }
    function adduser($name, $email, $phone, $password)
    {
        $sql = "insert into `users` (`name`, `email`, `phone`, `password`,`status`) VALUES (?,?,?,?,?)";
        $param_type = "sssssi";
        $param_array = array(
            $name,
            $email,
            $phone,
            $password,
            0
        );
        $result = $this->db_handle->insert($sql, $param_type, $param_array);
        return $result;
    }
    function deleteuser($username)
    {
        $sql = "Update `users` set status = ? where email = ? ";
        $param_type = "is";
        $param_array = array(
            0,
            $username
        );
        $this->db_handle->update($sql, $param_type, $param_array);
    }
    function updateuser($name, $phone, $username)
    {
        $sql = "Update `users` set name = ?, phone = ? where email = ? ";
        $param_type = "ssss";
        $param_array = array(
            $name,
            $phone,
            $username
        );
        $this->db_handle->update($sql, $param_type, $param_array);
    }
    function updateuserstatus($status, $username)
    {
        if ($status) {
            $sql = "Update `users` set status = true where email = ? ";
        } else {
            $sql = "Update `users` set status = false where email = ? ";
        }
        $param_type = "s";
        $param_array = array(
            $username
        );
        $this->db_handle->update($sql, $param_type, $param_array);
    }
    function getuserbyid($username)
    {
        $sql = "select * from `users` where id = ? ";
        $param_type = 'i';
        $param_array = array(
            $username
        );
        $result = $this->db_handle->runquery($sql, $param_type, $param_array);
        return $result;
    }
    function getuserbyemail($username)
    {
        $sql = "select * from `users` where email = ? ";
        $param_type = "s";
        $param_array = array(
            $username
        );
        $result = $this->db_handle->runquery($sql, $param_type, $param_array);
        return $result;
    }
    function getalluser()
    {
        $sql = "select * from `users`";
        $result = $this->db_handle->RunBaseQuery($sql);
        return $result;
    }
}