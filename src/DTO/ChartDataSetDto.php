<?php

namespace App\DTO;

class ChartDataSetDto
{
    public string $label = '';

    public string $backgroundColor = 'rgb(255, 99, 132)';

    public string $borderColor = 'rgb(255, 99, 132)';

    public array $data = [];

    /**
     * @param string $label
     * @param array  $data
     */
    public function __construct(string $label, array $data)
    {
        $this->label = $label;
        $this->data  = $data;
    }
}
