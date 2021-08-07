<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Minutes;

use Cron\CronExpression;

trait MinuteIndex
{
    public function index(): int
    {
        return CronExpression::MINUTE;
    }
}
