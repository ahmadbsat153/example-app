<?php

namespace App\Nova\Dashboards;
use App\Nova\Metrics\NewInvoices;
use App\Nova\Metrics\NewUsers;
use App\Nova\Cards\MyHtmlCard;

use Laravel\Nova\Cards\Help;
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
        return [new NewInvoices,new NewUsers
        // new MyHtmlCard
    ];
    }
}
