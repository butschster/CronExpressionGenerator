# Cron expression generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/butschster/cron-expression-generator.svg?style=flat-square)](https://packagist.org/packages/butschster/cron-expression-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/butschster/cron-expression-generator/run-tests?label=tests)](https://github.com/butschster/cron-expression-generator/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/butschster/cron-expression-generator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/butschster/cron-expression-generator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/butschster/cron-expression-generator.svg?style=flat-square)](https://packagist.org/packages/butschster/cron-expression-generator)

## Installation

You can install the package via composer:

```bash
composer require butschster/cron-expression-generator
```

## Usage

### Creates a new generator
```php
use Butschster\CronExpression\Generator;
use Butschster\CronExpression\Expression;

$generator = new Generator();
// or
$generator = new Generator(new Expression('* * * * *'));
// or
$generator = Generator::create();
// or
$generator = Generator::create(new Expression('* * * * *'));
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
echo $generator->minutes('*'); // * * * * *

// Every ten minutes
echo $generator->minutes('*/10'); // */10 * * * *

// Every hh:10, hh:11, ..., hh:30 minutes
echo $generator->minutes('10-30'); // 10-30 * * * *

// Hourly at hh:01
echo $generator->minutes(1); // 1 * * * *

// Hourly at hh:05, hh:10, hh:15
echo $generator->minutes(5, 10, 15, ...); // 5,10,15,... * * * *

echo $generator->minutes(61); // Throws an exception: Invalid CRON field value 61 at position 0
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

// Every 1, 2, 3 hours at 15 minutes
echo $generator->hourlyAt(15)->hours(1, 2, 3); // 15 */3 * * *

// Every three hours
echo $generator->hours('*/3'); // * */3 * * *

echo $generator->hours(25); // Throws an exception: Invalid CRON field value 25 at position 1
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

// Every month on the last day at 00:00
echo $generator->lastDayOfMonth(); // 0 0 31 * *

// Every month on the last day at 12:00
echo $generator->lastDayOfMonth(12); // 0 12 31 * *

// Every month on the last day at 12:30
echo $generator->lastDayOfMonth(12, 30); // 30 12 31 * *

// Every month on the last day at specific date
$date = new DateTime('2021-02-05');
echo $generator->lastDayOfMonth(12, 30, $date); // 30 12 28 * *

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
```

### Specific time
```php
$date = new DateTime('2021-02-05 12:34:26');

// Every year yyyy-02-05 12:34
echo $generator->on($date); // 34 12 5 2 *
```

### Custom expression
```php
// * */2 5,10,15,20,25,30 3,6,9,12 1,3,5,0
echo $generator
    ->yearly()
    ->months(Generator::MAR, Generator::JUN, Generator::SEP, Generator::DEC)
    ->daysOfMonth(5, 10, 15, 20, 25, 30)
    ->daysOfWeek(Generator::MONDAY, Generator::WEDNESDAY, Generator::FRIDAY, Generator::SUNDAY)
    ->everyTwoHours()
    ->everyMinute();
```

## Testing

```bash
composer test
```

## Credits

- [butschster](https://github.com/butschster)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
