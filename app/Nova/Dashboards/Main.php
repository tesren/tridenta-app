<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\LastUnits;
use App\Nova\Metrics\MyClients;
use App\Nova\Metrics\SoldUnits;
use App\Nova\Metrics\UnitsPerStatus;
use App\Nova\Metrics\LowestUnitPrice;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new UnitsPerStatus,
            new LowestUnitPrice,
            new SoldUnits,
            (new LastUnits)->width('1/2'),
            (new MyClients)->width('1/2'),
        ];
    }

    /**
     * Get the displayable name of the dashboard.
     *
     * @return string
     */
    public function name()
    {
        return __('Panel Principal');
    }
}