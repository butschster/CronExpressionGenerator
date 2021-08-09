<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Days;

use Butschster\CronExpression\Parts\Days\SpecificDays;
use Butschster\CronExpression\Tests\TestCase;

class SpecificDaysTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * 2,4,6,8,10,12 * *', new SpecificDays(2, 4, 6, 8, 10, 12));
    }
}
