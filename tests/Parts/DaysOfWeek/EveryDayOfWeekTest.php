<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\DaysOfWeek;

use Butschster\CronExpression\Parts\DaysOfWeek\EveryDayOfWeek;
use Butschster\CronExpression\Tests\TestCase;

class EveryDayOfWeekTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * * */3', new EveryDayOfWeek(3));
    }

    public function testUpdatesExpressionWithoutArgs()
    {
        $this->assertExpressionPart('* * * * *', new EveryDayOfWeek());
    }
}
