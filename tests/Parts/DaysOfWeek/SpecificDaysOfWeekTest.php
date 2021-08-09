<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\DaysOfWeek;

use Butschster\CronExpression\Parts\DaysOfWeek\SpecificDaysOfWeek;
use Butschster\CronExpression\Tests\TestCase;

class SpecificDaysOfWeekTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * * 2,4,6', new SpecificDaysOfWeek(2, 4, 6));
    }
}
