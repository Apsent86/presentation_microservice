<?php

namespace App\DTO;

class ChartDataDto
{
    public int $count;

    public string $time;

    /**
     * @param int       $count
     * @param \DateTime $time
     */
    public function __construct(int $count, \DateTime $time)
    {
        $this->count = $count;
        $this->time  = $time->format('y-m-d');
    }
}
