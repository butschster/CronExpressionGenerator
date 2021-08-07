<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Days;

use Butschster\CronExpression\Parts\Every;

class EveryDay extends Every
{
    use DayIndex;
}
