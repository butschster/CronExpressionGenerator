<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Months;

use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

class Quarterly implements PartValueInterface
{
    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(CronExpression::MONTH, '1-12/3');
    }
}
