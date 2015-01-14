<?php

abstract class Controller
{
    public function __construct()
    {
        $this->className = str_replace('Controller', '', get_class($this));
    }

    /**
     * @param string $fileName
     * @param array $vars
     */
    protected function view($fileName, array $vars)
    {
        if (!file_exists($fileName)) {
            throw new Exception('The file does not exists.');
        }

        $vars;
        require_once "fileName.php";
    }
}
