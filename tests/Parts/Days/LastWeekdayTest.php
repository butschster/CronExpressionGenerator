<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Days;

use Butschster\CronExpression\Parts\Days\LastWeekday;
use Butschster\CronExpression\Tests\TestCase;

class LastWeekdayTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * LW * *', new LastWeekday());
    }
}
