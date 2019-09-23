<?php

namespace App\Services\Control;

/**
 * Interface ObjectControlInterface
 * @package App\Services\Control
 */
interface ObjectControlInterface
{
    /**
     * @param        $className
     * @param string $path
     *
     * @return mixed
     */
    public function loadClass($className,
                              $path = "App\Models\\");

    /**
     * @param string $className
     * @param string $path
     *
     * @return mixed
     */
    public function loadRepository($className = "Save",
                                   $path = "App\Repositories\Superclass\\");
}
