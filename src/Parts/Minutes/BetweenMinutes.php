<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Minutes;

use Butschster\CronExpression\Parts\Between;

class BetweenMinutes extends Between
{
    use MinuteIndex;
}
