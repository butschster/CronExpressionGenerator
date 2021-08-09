# The most powerful and extendable tool for Cron expression generation

Cron expression generator is a beautiful tool for PHP applications. Of course, the primary feature of this package is the ability to generate cron expressions.

[![Support me on Patreon](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Fshieldsio-patreon.vercel.app%2Fapi%3Fusername%3Dbutschster%26type%3Dpatrons&style=flat)](https://patreon.com/butschster)
[![Latest Version on Packagist](https://poser.pugx.org/butschster/cron-expression-generator/v/stable)](https://packagist.org/packages/butschster/cron-expression-generator)
[![GitHub Tests Action Status](https://github.com/butschster/CronExpressionGenerator/actions/workflows/run-tests.yml/badge.svg)](https://github.com/butschster/cron-expression-generator/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://github.com/butschster/CronExpressionGenerator/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/butschster/cron-expression-generator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/butschster/cron-expression-generator.svg?style=flat-square)](https://packagist.org/packages/butschster/cron-expression-generator)

![Cron expresssion](https://user-images.githubusercontent.com/773481/128696168-2021b8eb-7433-4dde-ba85-5848ef02bdfa.jpg)

## Features
- Cron expressions generator
- Pre built expressions
- Custom expressions
- Well documented
- Well tested
- Compatible with Laravel


### Requirements
- PHP 8.0 and above
- 
## Installation

You can install the package via composer:

```bash
composer require butschster/cron-expression-generator
```

That's it!

## Usage

### Creates a new generator
```php
use Butschster\CronExpression\Generator;
use Cron\CronExpression;

$generator = new Generator();
// or
$generator = new Generator(new CronExpression('* * * * *'));
// or
$generator = Generator::create();
// or
$generator = Generator::create(new CronExpression('* * * * *'));
```

### Gets expression object
```php
$expression = $generator->getExpression(); // \Cron\CronExpression
```

### Converts expression to a string
```php
echo $generator->toExpression(); // * * * * *

echo (string) $generator; // * * * * *

echo (string) $generator->getExpression(); // * * * * *

echo $generator->getExpression()->getExpression(); // * * * * *
```

### Sets specific cron expression
```php
echo $generator->cron('* */3 * * *'); // * */3 * * *

echo $generator->cron('* */3 * * *')->everyTwoMinutes(); // */2 */3 * * *
```

### Manipulate minutes
```php
// Every minute
echo $generator->everyMinute(); // * * * * *

// Every even minute
echo $generator->everyEvenMinute(); // */2 * * * *

// Every two minutes
echo $generator->everyTwoMinutes(); // */2 * * * *

// Every three minutes
echo $generator->everyThreeMinutes(); // */3 * * * *

// Every four minutes
echo $generator->everyFourMinutes(); // */4 * * * *

// Every five minutes
echo $generator->everyFiveMinutes(); // */5 * * * *

// Every ten minutes
echo $generator->everyTenMinutes(); // */10 * * * *

// Every fifteen minutes
echo $generator->everyFifteenMinutes(); // */15 * * * *

// Every 00 and 30 minutes
echo $generator->everyThirtyMinutes(); // 0,30 * * * *

// Every minute
echo $generator->set(new \Butschster\CronExpression\Parts\Minutes\EveryMinute()); // * * * * *
echo $generator->set(new \Butschster\CronExpression\Parts\Minutes\EveryMinute(2)); // * */2 * * *

// Specific minutes
echo $generator->set(new \Butschster\CronExpression\Parts\Minutes\SpecificMinutes(2, 3, 10)); // * 2,3,10 * * *

// Between minutes
echo $generator->set(new \Butschster\CronExpression\Parts\Minutes\BetweenMinutes(0, 30)); // * 0-30 * * *
```

### Manipulate hours
```php
// Every hour at 00 minutes
echo $generator->hourly(); // 0 * * * *

// Every hour at 15 minutes
echo $generator->hourlyAt(15); // 15 * * * *

// Every hour at 15, 30, 45 minutes
echo $generator->hourlyAt(15, 30, 45); // 15,30,45 * * * *

// Every two hours
echo $generator->everyTwoHours(); // 0 */2 * * *

// Every three hours
echo $generator->everyThreeHours(); // 0 */3 * * *

// Every four hours
echo $generator->everyFourHours(); // 0 */4 * * *

// Every six hours
echo $generator->everySixHours(); // 0 */6 * * *

// Every 1, 2, 3 hours
echo $generator->set(new \Butschster\CronExpression\Parts\Hours\SpecificHours(1, 2, 3)); // * 1,2,3 * * *

// Every three hours
echo $generator->set(new \Butschster\CronExpression\Parts\Hours\EveryHour()); // * * * * *
echo $generator->set(new \Butschster\CronExpression\Parts\Hours\EveryHour(3)); // * */3 * * *

// Between hours
echo $generator->set(new \Butschster\CronExpression\Parts\Hours\BetweenHours(0, 12)); // * 0-12 * * *
```

### Manipulate days
```php
// Every day at 00:00
echo $generator->daily(); // 0 0 * * *

// Every day at 01:00
echo $generator->daily(1); // 0 1 * * *

// Every day at 03:00, 15:00, 23:00
echo $generator->daily(3, 15, 23); // 0 3,15,23 * * *

// Every day at 13:00
echo $generator->dailyAt(13); // 0 13 * * *

// Every day at 13:25
echo $generator->dailyAt(13, 25); // 25 13 * * *

// Every day at 03:00, 15:00
echo $generator->twiceDaily(3, 15); // 0 3,15 * * *

// Every day at 03:05, 15:05
echo $generator->twiceDailyAt(3, 15, 5); // 5 3,15 * * *

// Every month on the last day at 00:00
echo $generator->lastDayOfMonth(); // 0 0 L * *

// Every month on the last day at 12:00
echo $generator->lastDayOfMonth(12); // 0 12 L * *

// Every month on the last day at 12:30
echo $generator->lastDayOfMonth(12, 30); // 30 12 L * *

// Every month on the last weekday at 00:00
echo $generator->lastWeekdayOfMonth(); // 0 0 LW * *

// Every month on the last weekday at 12:00
echo $generator->lastWeekdayOfMonth(12); // 0 12 LW * *

// Every month on the last weekday at 12:30
echo $generator->lastWeekdayOfMonth(12, 30); // 30 12 LW * *

// Every 1, 2, 3 days
echo $generator->set(new \Butschster\CronExpression\Parts\Days\SpecificDays(1, 2, 3)); // * * 1,2,3 * *

echo $generator->set(new \Butschster\CronExpression\Parts\Days\EveryDay()); // * * * * *

// Every three days
echo $generator->set(new \Butschster\CronExpression\Parts\Days\EveryDay(3)); // * * */3 * *

// Between days
echo $generator->set(new \Butschster\CronExpression\Parts\Days\BetweenDays(0, 12)); // * * 0-12 * *

// Last day of month
echo $generator->set(new \Butschster\CronExpression\Parts\Days\LastDayOfMonth()); // * * L * *
```

### Manipulate days of week

```php
// Every week on monday
echo $generator->weekly(); // 0 0 * * 0

// Every week on monday and thursday
echo $generator->weekly(Generator::MONDAY, Generator::THURSDAY); // 0 0 * * 1,4

// Every week on weekdays
echo $generator->daily()->weekdays(); // 0 0 * * 1-5

// Every week on weekends
echo $generator->daily()->weekends(); // 0 0 * * 6,0

// Every monday
echo $generator->daily()->mondays(); // 0 0 * * 1
// or
echo $generator->weeklyOnMonday();
// or
echo $generator->weeklyOnMonday(8, 6); // 6 8 * * 1

// Every tuesday
echo $generator->daily()->tuesdays(); // 0 0 * * 2
// or
echo $generator->weeklyOnTuesday();

// Every wednesday
echo $generator->daily()->wednesdays(); // 0 0 * * 3
// or
echo $generator->weeklyOnWednesday();

// Every thursday
echo $generator->daily()->thursdays(); // 0 0 * * 4
// or
echo $generator->weeklyOnThursday();

// Every friday
echo $generator->daily()->fridays(); // 0 0 * * 5
// or
echo $generator->weeklyOnFriday();

// Every saturday
echo $generator->daily()->saturdays(); // 0 0 * * 6
// or
echo $generator->weeklyOnSaturday();

// Every sunday
echo $generator->daily()->sundays(); // 0 0 * * 0
// or
echo $generator->weeklyOnSunday();

// Every monday
echo $generator->weeklyOn(Generator::MONDAY); // 0 0 * * 1

// Every monday at 8am 
echo $generator->weeklyOn(Generator::MONDAY, 8); // 0 8 * * 1

// Every monday at 08:06
echo $generator->weeklyOn(Generator::MONDAY, 8, 6); // 6 8 * * 1

// Every day of a week
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\EveryDayOfWeek()); // * * * * *

// Every two days of a week
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\EveryDayOfWeek(2)); // * * * * */2


// Every Monday,Wednesday, Friday
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\SpecificDaysOfWeek(Generator::MONDAY, Generator::WEDNESDAY, Generator::FRIDAY)); // * * * * 1,3,5

// Between days of a week
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\BetweenDayOfWeek(Generator::MONDAY, Generator::FRIDAY)); // * * * * 1-5

// Last monday of a week
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\LastDayOfWeek()); // * * * * 1L

// Last friday of a week
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\LastDayOfWeek(Generator::FRIDAY)); // * * * * 5L

// Every first monday of every month
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\NthDayOfWeek()); // * * * * 1#1

// Every third friday of every month
echo $generator->set(new \Butschster\CronExpression\Parts\DaysOfWeek\NthDayOfWeek(Generator::FRIDAY, 3)); // * * * * 5#3
```

### Manipulate months
```php
// Every month on 1-st day at 00:00
echo $generator->monthly(); // 0 0 1 * *

// Every month on 1-st day at 12:00
echo $generator->monthly(12); // 00 12 1 * *

// Every month on 1-st day at 12:30
echo $generator->monthly(12, 30); // 30 12 1 * *

// Every month on 15-st day at 12:00
echo $generator->monthlyOn(15, 12); // 0 12 15 * *

// Every month on 15-st day at 12:30
echo $generator->monthlyOn(15, 12, 30); // 30 12 15 * *

// Every month two times  on 15, 24 day at 00:00
echo $generator->twiceMonthly(15, 24); // 0 0 15,24 * *

// Every month two times  on 15, 24 day at 10:00
echo $generator->twiceMonthly(15, 24, 10); // 0 10 15,24 * *

// Every month two times  on 15, 24 day at 10:30
echo $generator->twiceMonthly(15, 24, 10, 30); // 30 10 15,24 * *

// Every month three times on 12, 24, 30 day at 10:345
echo $generator->dailyAt(10, 45)->daysOfMonth(12, 24, 30); // 45 10 12,24,30 * *

// Every quarter yyyy-01,03,06,09-01 00:00
echo $generator->quarterly(); // 0 0 1 1-12/3 *

// Every year yyyy-01-01 00:00
echo $generator->yearly(); // 0 0 1 1 *

// Every year yyyy-04-01 00:00
echo $generator->yearlyOn(Generator::APR); // 0 0 1 4 *

// Every year yyyy-04-05 00:00
echo $generator->yearlyOn(Generator::APR, 5); // 0 0 5 4 *

// Every year yyyy-04-05 08:00
echo $generator->yearlyOn(Generator::APR, 5, 8); // 0 8 5 4 *

// Every year yyyy-04-05 08:30
echo $generator->yearlyOn(Generator::APR, 5, 8, 30); // 30 8 5 4 *

// Every month
echo $generator->set(new \Butschster\CronExpression\Parts\Months\EveryMonth()); // * * * * *

// Every two months
echo $generator->set(new \Butschster\CronExpression\Parts\Months\EveryMonth(2)); // * * * */2 *

// Specific months: april and december
echo $generator->set(new \Butschster\CronExpression\Parts\Months\SpecificMonths(Generator::APR, Generator::DEC)); // * * * 4,12 *

// Between april and december
echo $generator->set(new \Butschster\CronExpression\Parts\Months\BetweenMonths(Generator::APR, Generator::DEC)); // * * * 4-12 *

// Quarterly
echo $generator->set(new \Butschster\CronExpression\Parts\Months\Quarterly()); // * * * 1-12/3 *
```

### Specific time
```php
$date = new DateTime('2021-02-05 12:34:26');

// Every year yyyy-02-05 12:34
echo $generator->on($date); // 34 12 5 2 *
// or
echo $generator->set(new \Butschster\CronExpression\Parts\DateTime($date)); // 34 12 5 2 *
```

### Custom expression

```php
use Butschster\CronExpression\Parts\Days\SpecificDays;
use Butschster\CronExpression\Parts\DaysOfWeek\SpecificDaysOfWeek;
use Butschster\CronExpression\Parts\Hours\EveryHour;
use Butschster\CronExpression\Parts\Minutes\EveryMinute;
use Butschster\CronExpression\Parts\Months\SpecificMonths;

// * */2 5,10,15,20,25,30 3,6,9,12 1,3,5,0

echo $generator
    ->yearly()
    ->months(Generator::MAR, Generator::JUN, Generator::SEP, Generator::DEC)
    ->daysOfMonth(5, 10, 15, 20, 25, 30)
    ->daysOfWeek(Generator::MONDAY, Generator::WEDNESDAY, Generator::FRIDAY, Generator::SUNDAY)
    ->everyTwoHours()
    ->everyMinute();

// or

echo $generator
    ->set(
        new SpecificMonths(Generator::MAR, Generator::JUN, Generator::SEP, Generator::DEC),
        new SpecificDays(5, 10, 15, 20, 25, 30),
        new SpecificDaysOfWeek(Generator::MONDAY, Generator::WEDNESDAY, Generator::FRIDAY, Generator::SUNDAY),
        new EveryHour(2),
        new EveryMinute()
    );
```

### Gets next run date
See: https://github.com/dragonmantank/cron-expression#usage

```php
echo $generator->monthlyOn(15, 12)->getExpression()->getNextRunDate(); // DateTime
```

## Using with laravel

```php
<?php

namespace App\Console;

use Butschster\CronExpression\Generator;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('emails:send Taylor --force')->cron(
            Generator::create()->daily()
        );
    }
}
```

## Create custom expressions
To create a custom expression class you need implement `Butschster\CronExpression\PartValueInterface`

#### Example 1
```php
use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

class Quarterly implements PartValueInterface
{
    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(CronExpression::MONTH, '1-12/3');
    }
}
```

Using
```php
echo \Butschster\CronExpression\Generator::create()->set(new Quarterly()); // * * * 1-12/3 *
```

#### Example 2

```php
use Butschster\CronExpression\Parts\Days\SpecificDays;
use Butschster\CronExpression\Parts\Hours\SpecificHours;
use Butschster\CronExpression\Parts\Minutes\SpecificMinutes;
use Butschster\CronExpression\Parts\Months\SpecificMonths;
use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;
use DateTimeInterface;

class DateTime implements PartValueInterface
{
    public function __construct(private DateTimeInterface $time)
    {
    }

    public function updateExpression(CronExpression $expression): void
    {
        $parts = [
            new SpecificMinutes((int)$this->time->format('i')),
            new SpecificHours((int)$this->time->format('G')),
            new SpecificDays((int)$this->time->format('j')),
            new SpecificMonths((int)$this->time->format('n'))
        ];

        foreach ($parts as $part) {
            $part->updateExpression($expression);
        }
    }
}
```

Using
```php
echo \Butschster\CronExpression\Generator::create()->set(new DateTime(new \DateTime('2021-02-05 12:34:26'))); // 34 12 5 2 *
```

## Testing

```bash
composer test
```

## Credits

- [butschster](https://github.com/butschster)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
