<?php

namespace App\Interfaces\Create;

use App\Interfaces\ExtractData\ExtractDataStepInterface;
use App\Services\Control\ExtractFromDateControl;

/**
 * Class CalendarToHTML
 * @package App\Interfaces\Create
 */
class CalendarToHTML implements ExtractDataStepInterface
{
    /**
     * @var ExtractFromDateControl
     */
    private $date;

    /**
     * CalendarToHTML constructor.
     *
     * @param ExtractFromDateControl $dateControl
     */
    public function __construct(ExtractFromDateControl $dateControl)
    {
        $this->date = $dateControl;
    }

    /**
     * @param $data
     * @param $subAction
     * @param $options
     * @param $actions
     *
     * @return mixed|string
     * @throws \Exception
     */
    public function extract($data, $subAction, $options, $actions)
    {
        $keyToken = $actions["email_actions_token_key"];
        $token    = $data[$keyToken];
        $email_id = $subAction["email_action_id"];

        $date_until = $subAction["email_sub_action_date_until"];
        $link       = "http://localhost:8080/api/";
        $link       .= "delivery-date-control?token=$token&email_id=$email_id&";
        $months     = $this->date->getHowManyMonthsInTheFuture($date_until);

        $html = '<table border="0" cellspacing="1" cellpadding="1">
                    <tbody>';

        $count = 0;
        foreach ($months as $month)
        {
            if ($count === 0) {
                $html.='<tr>';
            }
            $count++;
            $html .= '<td>';
            $mes  = $this->date->getNameMonth($month["month"]);
            $html .= $this->startTable($mes, $month["year"]);
            $html .= $this->fillTable($month["month"], $month["year"], $link);
            $html .= '</tbody></table>';
            $html .= '</td>';

            if ($count === 3) {
                $html  .= '</tr>';
                $count = 0;
            }
        }

        $html .= '</tbody></table>';

        return $html;
    }

    /**
     * @param $month
     * @param $year
     *
     * @return string
     */
    private function startTable($month, $year)
    {
        return '<table border="1" cellspacing="0" cellpadding="0" style="border-color:#999;height:160px;margin-left:20px;text-align:center;margin-bottom:20px;color:#666;font-size:13px;">
                    <tbody>
                        <tr>
                            <td colspan="7" style="padding:.75pt .75pt .75pt .75pt">
                                <p class="MsoNormal" align="center" style="text-align:center">
                                    <b><span style="font-family:&quot;Arial&quot;,sans-serif">'.$month.' '.$year.'<u></u><u></u></span></b>
                                </p>
                            </td>
                        </tr>
        ';
    }

    /**
     * @param $weekDays
     * @param $html
     */
    private function tableHeader($weekDays, &$html)
    {
        foreach($weekDays as $dayWeek)
        {
            $html.= '<td style="padding:.75pt .75pt .75pt .75pt">
                        <p class="MsoNormal" align="center" style="text-align:center">
                            <b><span style="font-family:&quot;Arial&quot;,sans-serif">'.$dayWeek.'</span></b>
                        </p>
                     </td>';
        }
    }

    /**
     * @param $data
     * @param $lastDay
     * @param $month
     * @param $year
     * @param $weekDays
     */
    private function getDaysList(&$data, $lastDay, $month, $year, $weekDays)
    {
        for ($i = 1; $i <= $lastDay;$i++)
        {
            $nameDay = $this->date->getNameWeekDayFrom($month, $year, $i);
            if ($i===1)
            {
                foreach ($weekDays as $key => $dayWeek)
                {
                    if ($nameDay === $dayWeek)
                    {
                        break;
                    }
                    $data[$dayWeek] = $dayWeek;
                }
            }
            $data[$i] = $nameDay;
        }
    }

    /**
     * @param      $month
     * @param      $year
     * @param null $link
     *
     * @return string
     * @throws \Exception
     */
    private function fillTable($month, $year, $link = null)
    {
        $lastDay  = date('t', strtotime("$year-$month-01"));
        $weekDays = ["Sun", "Mon", "Tus", "Wed", "Thu", "Fri", "Sat"];
        $html     = '<tr>';

        $this->tableHeader($weekDays, $html);

        $data  = [];
        $this->getDaysList($data, $lastDay, $month, $year, $weekDays);

        $count     = 0;
        $countLine = 0;

        foreach ($data as $key=>$day)
        {
            if ($count === 0) {
                $countLine++;
                $html.='<tr>';
            }
            $value = "&nbsp;";

            if (is_int($key)) {
                $value = $key;
            }

            if (!empty($value) &&
                $dateToLink = $this->isToAddLink($key, $month, $year)) {

                $dayDate  = $key < 10 ? "0$key" : $key;
                $linkFull = $link."date=".$year."-".$month."-".$dayDate;
                $value    = "<a href='$linkFull' target='_blank'>".$value."</a>";
            }

            $html.='<td style="padding:.75pt .75pt .75pt .75pt;color:eee">
                        <p class="MsoNormal">
                            <span style="color:black;font-family:&quot;Arial&quot;,sans-serif">      
                                '.$value.'
                            </span>
                        </p>
                    </td>';
            $count++;

            if ($count === 7) {
                $html.='</tr>';
                $count = 0;
            }
        }

        if($countLine < 6) {
            $html .= '<tr style="border:0px;"><td style="border:0px;">&nbsp;</td></tr>';
        }

        return $html;
    }

    /**
     * @param $day
     * @param $month
     * @param $year
     *
     * @return bool
     * @throws \Exception
     */
    private function isToAddLink($day, $month, $year)
    {
        $dayCurrent     = $this->date->getToday();
        $dateToValidate = "$year-$month-$day";

        if (strtotime($dateToValidate) >= strtotime($dayCurrent))
        {
            return true;
        }

        return false;
    }
}
