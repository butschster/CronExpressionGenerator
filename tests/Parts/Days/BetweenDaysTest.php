<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Days;

use Butschster\CronExpression\Parts\Days\BetweenDays;
use Butschster\CronExpression\Tests\TestCase;

class BetweenDaysTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * 6-12 * *', new BetweenDays(6, 12));
    }
}
