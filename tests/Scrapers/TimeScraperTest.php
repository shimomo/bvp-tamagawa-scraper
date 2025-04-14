<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Tests\Scrapers;

use BVP\TamagawaScraper\Scrapers\TimeScraper;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TimeScraperTest extends TestCase
{
    /**
     * @var \BVP\TamagawaScraper\Scrapers\TimeScraper
     */
    protected TimeScraper $scraper;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->scraper = new TimeScraper();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(TimeScraperDataProvider::class, 'scrapeProvider')]
    public function testScrape(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->scraper->scrape(...$arguments));
    }

    /**
     * @return void
     */
    public function testScrapeWithRaceCode1AndDate20240108(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\TimeScraper::scrape() - " .
            "The specified key '.com-rname' is not found in the content of the URL: " .
            "'https://boatrace-tamagawa.com/modules/yosou/oriten.php?day=20240108&race=1&jo=05'."
        );

        $this->scraper->scrape(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\BaseScraper::__call() - " .
            "Call to undefined method 'BVP\TamagawaScraper\Scrapers\BaseScraper::invalid()'."
        );

        $this->scraper->invalid(1, '2024-01-08');
    }
}
