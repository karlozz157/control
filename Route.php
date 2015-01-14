<?php

class Route
{
    /**
     * @const string
     */
    const CONTROLLER_DIR = 'Controller';

    /**
     * @param string $controller
     * @param string $action
     * @return mixed
     */
    public static function dispatch($controller, $action)
    {
        $controller = self::getControllerInstance($controller);
        $action     = sprintf('%sAction', $action);

        if (!self::hasAction($controller, $action)) {
            throw new Exception("The $method method does not exist.");
        }

        return $controller->$action();
    }

    /**
     * @param string $controller
     * @return Controller
     */
    protected static function getControllerInstance($controller)
    {
        $fileName  = sprintf('./%s/%sController.php', self::CONTROLLER_DIR, ucfirst($controller));
        $className = sprintf('%sController', $controller);

        if (!file_exists($fileName)) {
            throw new Exception("The $controller controller does not exist.");
        }

        require_once $fileName;

        return new $className();
    }


    /**
     * @param Controller $controller
     * @param string $action
     * @return bool
     */
    protected static function hasAction(Controller $controller, $action)
    {
        return method_exists($controller, $action);
    }
}
