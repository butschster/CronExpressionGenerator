<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Hours;

use Cron\CronExpression;

trait HourIndex
{
    public function index(): int
    {
        return CronExpression::HOUR;
    }
}
