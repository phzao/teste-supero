<?php

namespace App\Interfaces\ExtractData;

/**
 * Class ExtractTaxes
 * @package App\Interfaces\ExtractData
 */
class ExtractIndexBased implements ExtractDataAPIInterface
{
    /**
     * @var array
     */
    private $values;
    
    /**
     * MultiEditorasAPI constructor.
     */
    public function __construct()
    {
        $this->values = [];
    }
    
    /**
     * @param array $data
     * @param array $extractThis
     * @param array $returnedValue
     *
     * @return array
     */
    public function extract(array $data,
                            array $extractThis,
                            array $returnedValue = []): array
    {
        $values = [];
        
        if ($returnedValue) {
            $values = $returnedValue;
        }
        
        foreach ($data as $key=>$item)
        {
            $getValue = null;
            if (is_array($item)) {
                $getValue = $this->extract($item, $extractThis, $values);
            }
            
            if (!is_int($key) && in_array($key, $extractThis)) {
                $getValue = $data[$key];
            }

            if ($getValue) {
                $values[$key] = $getValue;
                if (is_array($getValue)) {
                    $values = $getValue;
                }
            }
        }
        
        return $values;
    }
}
