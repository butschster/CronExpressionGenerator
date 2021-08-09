<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\DaysOfWeek;

use Butschster\CronExpression\Generator;
use Butschster\CronExpression\Parts\DaysOfWeek\LastDayOfWeek;
use Butschster\CronExpression\Tests\TestCase;

class LastDayOfWeekTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * * 1L', new LastDayOfWeek());

        $this->assertExpressionPart('* * * * 5L', new LastDayOfWeek(Generator::FRIDAY));
    }
}
