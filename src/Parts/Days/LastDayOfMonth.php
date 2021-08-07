<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Days;

use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

class LastDayOfMonth implements PartValueInterface
{
    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(CronExpression::DAY, 'L');
    }
}
