<?php

namespace App\Models;

/**
 * Interface ModelInterface
 * @package App\Models
 */
interface ModelInterface 
{
    /**
     * @param null $id
     *
     * @return array
     */
    public function rules($id = null): array;

    /**
     * @return array
     */
    public function getFullDetails(): array;
}
