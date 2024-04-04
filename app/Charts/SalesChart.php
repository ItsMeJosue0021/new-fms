<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class SalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Sales')
            ->setSubtitle('Monthly Sales Report')
            ->addData('Year 2024', [6, 9, 3, 4, 10, 8, 6, 9, 3, 4, 13, 8])
            // ->addData('Year 2023', [7, 3, 16, 2, 6, 4, 7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'August', 'September', 'October', 'November', 'December']);
    }
}
