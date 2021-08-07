<?php

declare(strict_types=1);

namespace Butschster\CronExpression;

use Cron\CronExpression;

interface PartValueInterface
{
    public function updateExpression(CronExpression $expression): void;
}
