<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\DaysOfWeek;

use Butschster\CronExpression\Parts\Every;

class EveryDaysOfWeek extends Every
{
    use DaysOfWeekIndex;
}
