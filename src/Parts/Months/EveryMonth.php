<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Months;

use Butschster\CronExpression\Parts\Every;

class EveryMonth extends Every
{
    use MonthIndex;
}
