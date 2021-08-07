<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Months;

use Cron\CronExpression;

trait MonthIndex
{
    public function index(): int
    {
        return CronExpression::MONTH;
    }
}
