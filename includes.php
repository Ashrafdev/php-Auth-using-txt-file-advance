<?php

class Login
{
    public $username;
    public $password;
    public $u;
    public $p;
    public $data;

    public function __construct()
    {
        $this->username = @htmlentities(strtolower($_POST['username']));
        $this->password = @htmlentities(strtolower($_POST['password']));
    }

    public function login()
    {
        if ($this->verify()) {
            $_SESSION['username'] = $this->username;
            $_SESSION['password'] = $this->password;
            $_SESSION['is_auth'] = true;

            header("Location: private.php");
            die();
        } else {
            echo '<b>Invalid Username Or Password!</b><br>';
            echo '<b>Redirect To login Page</b>';
            header("refresh:1; url=login.php");
            die;
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['is_auth']);

        header("Location: login.php");
        die();
    }

    public function verify()
    {
        $d = file_get_contents("users.txt");
        $data = explode("\n", $d);

        foreach ($data as $row => $data) {

            $row_user = explode('|', $data);
            $this->u = @(strtolower($row_user[0]));
            $this->p = @trim(strtolower($row_user[1]), "\r");

            if ($this->u == $this->username && $this->p == $this->password) {
                return true;
            }
        }
        return false;
    }
}

