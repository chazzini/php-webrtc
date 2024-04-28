<?php
namespace Framework;

class Error
{
    public static function error($code, $message)
    {
        http_response_code($code);
        loadView('error', ['message' => $message]);
    }
    public static function notfound($message = "Page not found")
    {
        self::error(404, $message);
    }
    public static function serverError($message = "PSomething went wrong please contact the adminstrator")
    {
        self::error(502, $message);
    }
}