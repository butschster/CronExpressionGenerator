<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Months;

use Butschster\CronExpression\Parts\Between;

class BetweenMonths extends Between
{
    use MonthIndex;
}
