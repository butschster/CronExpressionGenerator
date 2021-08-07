<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\DaysOfWeek;

use Cron\CronExpression;

trait DaysOfWeekIndex
{
    public function index(): int
    {
        return CronExpression::WEEKDAY;
    }
}
