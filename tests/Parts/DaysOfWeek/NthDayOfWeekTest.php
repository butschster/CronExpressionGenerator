<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\DaysOfWeek;

use Butschster\CronExpression\Generator;
use Butschster\CronExpression\Parts\DaysOfWeek\NthDayOfWeek;
use Butschster\CronExpression\Tests\TestCase;

class NthDayOfWeekTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * * 1#1', new NthDayOfWeek());

        $this->assertExpressionPart('* * * * 5#3', new NthDayOfWeek(Generator::FRIDAY, 3));
    }
}
