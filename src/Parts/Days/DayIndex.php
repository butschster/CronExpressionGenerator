<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Days;

use Cron\CronExpression;

trait DayIndex
{
    public function index(): int
    {
        return CronExpression::DAY;
    }
}
