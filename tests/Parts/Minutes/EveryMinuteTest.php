<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Minutes;

use Butschster\CronExpression\Parts\Minutes\EveryMinute;
use Butschster\CronExpression\Tests\TestCase;

class EveryMinuteTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('*/3 * * * *', new EveryMinute(3));
    }

    public function testUpdatesExpressionWithoutArgs()
    {
        $this->assertExpressionPart('* * * * *', new EveryMinute());
    }
}
