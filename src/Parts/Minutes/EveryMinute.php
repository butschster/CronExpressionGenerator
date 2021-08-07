<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Minutes;

use Butschster\CronExpression\Parts\Every;

class EveryMinute extends Every
{
    use MinuteIndex;
}
