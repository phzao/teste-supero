<?php

namespace App\Models\Interfaces;

/**
 * Interface AttachmentInterface
 * @package App\Models\Interfaces
 */
interface AttachmentInterface
{
    /**
     * @return array
     */
    public function getImportantDetailsFromFile(): array;
    
    /**
     * @return string
     */
    public function getPathDefinitions(): string;
    
    /**
     * @param array $arr
     *
     * @return mixed
     */
    public function setFileDetailsFromSystem(array $arr);
    
    /**
     * @return string
     */
    public function getPathFile(): string;
    
    
    public function fixNameBySystem();
}
