<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Hours;

use Butschster\CronExpression\Parts\Hours\EveryHour;
use Butschster\CronExpression\Tests\TestCase;

class EveryHourTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* */3 * * *', new EveryHour(3));
    }

    public function testUpdatesExpressionWithoutArgs()
    {
        $this->assertExpressionPart('* * * * *', new EveryHour());
    }
}
