<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\DaysOfWeek;

use Butschster\CronExpression\Generator;
use Butschster\CronExpression\Parts\DaysOfWeek\BetweenDayOfWeek;
use Butschster\CronExpression\Tests\TestCase;

class BetweenDayOfWeekTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * * 1-6', new BetweenDayOfWeek(Generator::MONDAY, Generator::SATURDAY));
    }
}
