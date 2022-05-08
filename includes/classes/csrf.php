<?php

class Token
{

    /**
     * name of tha value used to store data in session and store token in hidden input
     * 
     * @var string
     */
    private static $string;

    /**
     * Random string of 12 chars
     * 
     * @var string
     */
    private static $key;

    /**
     * Initialize the class
     */
    public static function init(string $string = '_token')
    {
        self::$string = $string;
        self::$key = bin2hex(openssl_random_pseudo_bytes(10));
    }

    /**
     * save csrf token in session and return value, use it in hidden input
     * 
     * @param string $string
     * @return string $key
     */
    public static function set()
	{
        (new self)->save(self::$string, self::$key);
        return (new self)->formalize(self::$string, self::$key);
    }
    
    /**
     * compare posted token to saved session token
     * 
     * @param string $string
     * @return boolean
     */
    public static function verify()
    {
        if(isset($_POST[self::$string]) && !empty($_POST[self::$string])) {
            if (!isset($_SESSION[self::$string])) {
                return false;
            }
            $session = $_SESSION[self::$string];
            unset($_SESSION[self::$string]);
            return $_POST[self::$string] == $session;
        } else {
            throw new \Exception('No post token found');
        }
    }

    /**
     * create basic html input
     * 
     * @param string $name
     * @param string $value
     * @param string $type
     * @param mixed|null $class
     * @return string
     */
    private function formalize(string $name, string $value, string $type = 'hidden', $class = null)
    {
        return "<input type='$type' class='$class' name='$name' value='$value'>";
    }
    
    /**
     * save data in session
     *
     * @param  string $key
     * @param  mixed $value
     * @return void
     */
    private function save(string $key, $value = null)
    {
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
        $_SESSION[$key] = $value;
    }

}