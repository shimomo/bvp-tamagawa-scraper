<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Tests\Scrapers;

use BVP\TamagawaScraper\Scrapers\ForecastScraper;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ForecastScraperTest extends TestCase
{
    /**
     * @var \BVP\TamagawaScraper\Scrapers\ForecastScraper
     */
    protected ForecastScraper $scraper;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->scraper = new ForecastScraper();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ForecastScraperDataProvider::class, 'scrapeProvider')]
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
            "BVP\TamagawaScraper\Scrapers\ForecastScraper::scrapeYesterday() - " .
            "The specified key '.z_sinnyu' is not found in the content of the URL: " .
            "'https://boatrace-tamagawa.com/modules/yosou/syussou.php?day=20240108&race=1&jo=05'."
        );

        $this->scraper->scrape(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testInvalidWithRaceCode1AndDate20240108(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\BaseScraper::__call() - " .
            "Call to undefined method 'BVP\TamagawaScraper\Scrapers\BaseScraper::invalid()'."
        );

        $this->scraper->invalid(1, '2024-01-08');
    }
}
