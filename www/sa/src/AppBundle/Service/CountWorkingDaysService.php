<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 13.3.19
 * Time: 13.29
 */

namespace AppBundle\Service;


use AppBundle\ServiceException;

class CountWorkingDaysService
{

    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @param array $weekendDates
     * @return int
     * @throws ServiceException
     */
    public function countDays(\DateTime $start, \DateTime $end, array $weekendDates) : int
    {
        try {
            $dateInterval = new \DateInterval('P1D');
            $period = new \DatePeriod($start, $dateInterval, $end->add($dateInterval));
            $sum = 0;
            foreach ($period as $datetime) {
                if (!$this->isWeekend($datetime, $weekendDates)) {
                    $sum++;
                }
            }
            return $sum;
        } catch (\Exception $e) {
            throw new ServiceException($e);
        }
    }

    private function isWeekend(\DateTime $dateTime, array $weekends) : bool
    {
        if (in_array($dateTime, $weekends)){
            return true;
        }

        return $dateTime->format('N') >= 6;
    }

}