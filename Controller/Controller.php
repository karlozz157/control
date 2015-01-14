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
    protected function view($fileName, array $vars = array())
    {
        $file = "./Views/Inflow/$fileName.php";

        if (!file_exists($file)) {
            throw new Exception('The file does not exists.');
        }

        $vars;

        require $file;
    }
}
