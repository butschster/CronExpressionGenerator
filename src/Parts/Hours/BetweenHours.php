<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Hours;

use Butschster\CronExpression\Parts\Between;

class BetweenHours extends Between
{
    use HourIndex;
}
