<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Days;

use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

class LastWeekday implements PartValueInterface
{
    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(CronExpression::DAY, 'LW');
    }
}
