<?php

namespace App\Charts;

use Nette\Utils\DateTime;
use Illuminate\Support\Facades\DB;
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

        $year = DB::table('service_requests')
            ->selectRaw('YEAR(created_at) as year')
            ->orderBy('year', 'desc')
            ->first()
            ->year;

        $requestsPerMonth = DB::table('service_requests')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();

        $months = [];
        $requests = [];

        foreach ($requestsPerMonth as $item) {
            $months[] = DateTime::createFromFormat('!m', $item->month)->format('F');
            $requests[] = $item->count;
        }

        return $this->chart->barChart()
            ->setTitle('Sales')
            ->setSubtitle('Monthly Sales Report')
            ->addData($year, $requests)
            ->setXAxis($months);
    }
}
