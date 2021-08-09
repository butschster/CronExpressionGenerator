<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Days;

use Butschster\CronExpression\Parts\Days\EveryDay;
use Butschster\CronExpression\Tests\TestCase;

class EveryDayTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * */3 * *', new EveryDay(3));
    }

    public function testUpdatesExpressionWithoutArgs()
    {
        $this->assertExpressionPart('* * * * *', new EveryDay());
    }
}
