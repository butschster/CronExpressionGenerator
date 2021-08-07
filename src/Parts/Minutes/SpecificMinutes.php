<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\Minutes;

use Butschster\CronExpression\Parts\Specific;

class SpecificMinutes extends Specific
{
    use MinuteIndex;
}
