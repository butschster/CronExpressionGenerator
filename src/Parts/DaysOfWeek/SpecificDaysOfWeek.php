<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\DaysOfWeek;

use Butschster\CronExpression\Parts\Specific;

class SpecificDaysOfWeek extends Specific
{
    use DaysOfWeekIndex;
}
