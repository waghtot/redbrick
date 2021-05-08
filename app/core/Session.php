<?php

class Session
{
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    public function kill($key){
        if(isset($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
        }
    }
}