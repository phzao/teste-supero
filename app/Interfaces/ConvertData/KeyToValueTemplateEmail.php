<?php

namespace App\Interfaces\ConvertData;

use App\Services\Control\ExtractFromDateControl;

/**
 * Class KeyToValueTemplateEmail
 * @package App\Interfaces\ConvertData
 */
class KeyToValueTemplateEmail implements ConvertDataTemplateInterface
{
    /**
     * @var ExtractFromDateControl
     */
    protected $time;

    /**
     * KeyToValueTemplateEmail constructor.
     *
     * @param ExtractFromDateControl $date
     */
    public function __construct(ExtractFromDateControl $date)
    {
        $this->time         = $date;
    }

    /**
     * @param        $data
     * @param array  $columns
     * @param string $columnWildCard
     * @param null   $options
     *
     * @return null|bool|mixed
     */
    public function convert($data,
                            $columns = [],
                            $columnWildCard = "",
                            $options = null)
    {
        if (!$data) {
            return true;
        }

        foreach ($columns as $value)
        {
            if (is_object($value)){
                continue;
            }

            $wildcard  = $options[$columnWildCard];

            foreach ($data as $key=>$content)
            {
                $find   = $wildcard.$key.$wildcard;
                $result = $this->replaceString($options[$value],
                                               $find,
                                               $content);

                if ($result) {
                    $options[$value] = $result;
                }

                $resultGreeting = $this->replaceGreeting($options[$value]);

                if ($resultGreeting) {
                    $options[$value] = $resultGreeting;
                }
            }
        }

        return $options;
    }

    /**
     * @param $content
     *
     * @return mixed
     */
    private function replaceGreeting($content)
    {
        if (strpos($content, "greeting_time") !== false)
        {
            $greeting = "";
            $now = $this->time->getHour();

            if ($now > 5 && $now < 12) {
                $greeting = "morning";
            }

            if ($now > 12 && $now < 18) {
                $greeting = "afternoon";
            }

            $replaced = str_replace("greeting_time",
                                    $greeting,
                                    $content);

            return $replaced;
        }
    }

    /**
     * @param $content
     * @param $stringToFind
     * @param $value
     *
     * @return bool|mixed
     */
    private function replaceString($content, $stringToFind, $value)
    {
        if (!is_string($content)) {
            return false;
        }
        if (strpos($content, "$stringToFind") !== false) {
            return str_replace("$stringToFind",
                                    $value,
                                    $content);
        }

        return false;
    }
}
