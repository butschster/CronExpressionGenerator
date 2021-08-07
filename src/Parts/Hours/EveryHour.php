<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Hours;

use Butschster\CronExpression\Parts\Every;

class EveryHour extends Every
{
    use HourIndex;
}
