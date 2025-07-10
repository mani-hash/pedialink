<?php

namespace Library\Framework\Session;

/**
 * Session manager Handler
 * 
 * Handles server side sessions of the web application.
 */
class SessionManager
{
    /**
     * @var bool
     */
    protected bool $started = false;

    /**
     * Start a server side session
     * @return void
     */
    public function start()
    {
        if ($this->started) {
            return;
        }

        session_start([
            'cookie_lifetime' => 86400,
            'cookie_httponly' => true,
            'use_strict_mode' => true,
        ]);

        $this->started = true;
    }

    /**
     * Retrieve session value
     * @param string $key Session key
     * @param mixed $default Default value to return if session key is not found
     * @return mixed Returns session value
     */
    public function get(string $key, $default = null)
    {
        $this->start();
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Set session value for a particular key
     * @param string $key Session key
     * @param mixed $value Session value
     * @return void
     */
    public function set(string $key, $value)
    {
        $this->start();
        $_SESSION[$key] = $value;
    }

    /**
     * Remove session entry
     * @param string $key Session key
     * @return void
     */
    public function remove(string $key)
    {
        $this->start();
        unset($_SESSION[$key]);
    }

    /**
     * Regenerate the session id while retaining session information
     * @param bool $status Bool value to regenerate or not regenerate session. Default is true
     * @return void
     */
    public function regenerate(bool $status = true)
    {
        $this->start();
        session_regenerate_id($status);
    }

    /**
     * Destroy current server side session
     * @return void
     */
    public function destroy()
    {
        if (!$this->started) {
            return;
        }

        $_SESSION = [];
        session_unset();
        session_destroy();
        $this->started = false;
    }
}