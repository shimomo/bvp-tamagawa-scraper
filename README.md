# BVP Tamagawa Scraper

[![Build Status](https://github.com/shimomo/bvp-tamagawa-scraper/workflows/Tests/badge.svg)](https://github.com/shimomo/bvp-tamagawa-scraper/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/shimomo/bvp-tamagawa-scraper/graph/badge.svg?token=E29OLT9UK5)](https://codecov.io/gh/shimomo/bvp-tamagawa-scraper)
[![PHP Version Require](https://poser.pugx.org/bvp/tamagawa-scraper/require/php)](https://packagist.org/packages/bvp/tamagawa-scraper)
[![Latest Stable Version](https://poser.pugx.org/bvp/tamagawa-scraper/v/stable)](https://packagist.org/packages/bvp/tamagawa-scraper)
[![Latest Unstable Version](https://poser.pugx.org/bvp/tamagawa-scraper/v/unstable)](https://packagist.org/packages/bvp/tamagawa-scraper#4.x-dev)
[![License](https://poser.pugx.org/bvp/tamagawa-scraper/license)](https://packagist.org/packages/bvp/tamagawa-scraper)

## Installation
```bash
composer require bvp/tamagawa-scraper
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\TamagawaScraper\Scraper;

print_r(Scraper::scrapeForecasts(12));
print_r(Scraper::scrapeForecasts(12, '2025-04-13'));

print_r(Scraper::scrapeTimes(12));
print_r(Scraper::scrapeTimes(12, '2025-04-13'));
```

## License
The BVP Tamagawa Scraper package is open source software licensed under the [MIT license](LICENSE).
