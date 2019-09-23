<?php

namespace App\Services\Control;

/**
 * Class ExtractFromDateControl
 * @package App\Services\Control
 */
class ExtractFromDateControl
{
    /**
     * @var \DateTime
     */
   private $dateControl;

    /**
     * ExtractFromDateControl constructor.
     *
     * @param string $option
     *
     * @throws \Exception
     */
   public function __construct($option = "now")
   {
       $this->dateControl = new \DateTime($option);
   }

    /**
     * @return string
     */
   public function getPathByYearAndMonth()
   {
       $year  = $this->dateControl->format('Y');
       $month = $this->dateControl->format('m');

       return  '/'.$year.'/'.$month;
   }

   public function setToday()
   {
       $this->dateControl = new \DateTime("now");
   }

    /**
     * @param string $format
     *
     * @return string
     */
   public function getTimeOnFormat($format = "Y-m-d")
   {
       return $this->dateControl->format($format);
   }

    /**
     * @param string $format
     *
     * @return string
     */
   public function getCurrentYear($format = "Y")
   {
       return $this->dateControl->format($format);
   }

    /**
     * @param \DateTime $time1
     * @param \DateTime $time2
     *
     * @return float|int
     */
   public function getDaysBetween(\DateTime $time1, \DateTime $time2 = null)
   {
       $interval = $this->dateControl->diff($time1);

       if ($time2) {
           $interval = $time1->diff($time2);
       }

       return $interval->days;
   }

   public function getHoursBetween(\DateTime $time1, \DateTime $time2 = null)
   {
       $interval = $this->dateControl->diff($time1);

       if ($time2) {
           $interval = $time1->diff($time2);
       }

       return ($interval->days * 24) + $interval->h;
   }

    /**
     * @param \DateTime      $time1
     * @param \DateTime|null $time2
     *
     * @return float|int
     */
    public function getMinutesBetween(\DateTime $time1, \DateTime $time2 = null)
    {
        if (!$time2) {
            $time2 = $this->dateControl;
        }

        $diff       = $time1->diff($time2);
        $diff_hours = $diff->days * 24 * 60;
        $diff_hours += $diff->h * 60;

        return ($diff_hours/60);
    }

    /**
     * @param        $date
     * @param string $format
     *
     * @return string
     * @throws \Exception
     */
    public function getDateOnFormat($date, $format="Y-m-d")
    {
        $newDate = new \DateTime(($date));

        return $newDate->format($format);
    }

    /**
     * @param \DateTime|null $date
     *
     * @return string
     */
   public function getHour(\DateTime $date=null)
   {
       if (!$date) {
           return $this->dateControl->format('H:m:i');
       }
   }

    /**
     * @param $monthsInFuture
     *
     * @return array
     */
   public function getHowManyMonthsInTheFuture($monthsInFuture)
   {
       $monthYear = [];
       for ($i = 0; $i<=$monthsInFuture ; $i++)
       {
           $monthYear[] = [
               "month" => date("m", strtotime("+$i month")),
               "year"  => date("Y", strtotime("+$i month"))
           ];
       }

       return $monthYear;
   }

    /**
     * @param      $month
     * @param null $languague
     *
     * @return mixed
     */
   public function getNameMonth($month, $languague = null)
   {
       $monthName = date('F', mktime(0,0,0, $month));

       return $this->getMonthName($monthName, $languague);
   }

    /**
     * @param      $month
     * @param null $language
     *
     * @return mixed
     */
   public function getMonthName($month, $language = null)
   {
       $ptbr = [
           "January"   => "Janeiro",
           "February"  => "Fevereiro",
           "March"     => "Março",
           "April"     => "Abril",
           "May"       => "Maio",
           "June"      => "Junho",
           "July"      => "Julho",
           "August"    => "Agosto",
           "September" => "Setembro",
           "October"   => "Outubro",
           "November"  => "Novembro",
           "December"  => "Dezembro"
       ];

       if ($language==="ptbr") {
           return $ptbr[$month];
       }

       return $month;
   }

    /**
     * @return string
     */
   public function getCurrentDay()
   {
       return $this->dateControl->format("d");
   }

    /**
     * @return string
     */
    public function getCurrentMonth()
    {
        return $this->dateControl->format("m");
    }

    /**
     * @param $date
     *
     * @return string
     * @throws \Exception
     */
    public function fixDate($date)
    {
        $newDate = new \DateTime($date);

        return $newDate->format('Y-m-d');
    }

    /**
     * @param $date
     *
     * @return string
     * @throws \Exception
     */
     public function getDateTime($date)
     {
          return new \DateTime($date);
     }
    /**
     * @return string
     */
    public function getToday()
    {
        return $this->dateControl->format("Y-m-d");
    }

    /**
     * @return string
     */
    public function getNowWithSeconds()
    {
        $now = \DateTime::createFromFormat('U.u', microtime(true));

        $hourMinute   = $now->format("H:i:s");
        $milliseconds = round($now->format("u"));

        return $hourMinute.".".$milliseconds;

    }

    /**
     * @return string
     */
    public function getTodayWithTime()
    {
        return $this->dateControl->format("Y-m-d H:i:s");
    }

    /**
     * @param        $month
     * @param        $year
     * @param string $day
     *
     * @return false|string
     */
   public function getNameWeekDayFrom($month, $year, $day="01")
   {
       return date('D', strtotime("$year-$month-$day"));
   }

   public function getFutureDateByHour($add)
   {
       $interval = "PT".$add."H";
       if (($add / 24) >= 1) {
           $interval = "P".($add/24)."D";
       }

       return $this->dateControl->add(new \DateInterval($interval))->format("Y-m-d H:i:s");
   }
   
   public function nextDayWeek($date) {
        $timestamp = strtotime($date);
        $dia = date('N', $timestamp);
        if ($dia >= 6) {
          $timestamp_final = $timestamp + ((8 - $dia) * 3600 * 24);
        } else {
            $timestamp_final = $timestamp;
        }
        return $timestamp_final;
    }

   public function isLateGetTomorrow($date){
        $dateReceveid = new \DateTime($date);
        $today = new \DateTime("now");
        
        if($today > $dateReceveid){
            $tomorrow = $today->modify('+1 weekdays'); 

            return $tomorrow->format('Y-m-d');          
        }
        return $date;
   }





   public function getDatePlusDays( $date, $days)
   {
       $dateReceveid = new \DateTime($date);

       $interval = "P".($days)."D";
       
       return $dateReceveid->add(new \DateInterval($interval))->format("Y-m-d H:i:s");
   }

    public function getAgoDateByHour($ago)
    {
        $interval = "PT".$ago."H";
        if (($ago / 24) >= 1) {
            $interval = "P".($ago/24)."D";
        }
        return $this->dateControl->sub(new \DateInterval($interval))->format("Y-m-d H:i:s");
    }
}
