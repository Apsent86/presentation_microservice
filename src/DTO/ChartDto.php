<?php

namespace App\DTO;

class ChartDto
{
    /**
     * @var string[]
     */
    public array $labels = [];

    /**
     * @var ChartDataSetDto[];
     */
    public array $datasets = [];

    /**
     * @param string[]          $labels
     * @param ChartDataSetDto[] $datasets
     */
    public function __construct(array $labels, array $datasets, string $label = '')
    {
        $this->labels   = $labels;
        $this->datasets = [new ChartDataSetDto($label, $datasets)];
    }
}
