<?php

namespace App\Services\Control;


/**
 * Class ObjectControl
 *
 * @package App\Services\Control
 */
class ObjectControl implements ObjectControlInterface
{
    /**
     * @param string $className
     * @param string $path
     *
     * @return mixed
     */
    public function loadClass($className,
                              $path = "App\Models\\")
    {
        if (empty($className)) {
            throw new \InvalidArgumentException("Classname must be set");
        }

        return app()->make($path.$className);
    }

    /**
     * @param string $className
     * @param string $path
     *
     * @return mixed
     */
    public function loadRepository($className = "Save",
                                   $path = "App\Repositories\Superclass\\")
    {
        return $this->loadClass($className."Repository", $path);
    }
}
