<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Tests;

use BVP\TamagawaScraper\ScraperCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ScraperCoreTest extends TestCase
{
    /**
     * @var \BVP\TamagawaScraper\ScraperCore
     */
    protected ScraperCore $scraper;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->scraper = new ScraperCore();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperCoreDataProvider::class, 'scrapeForecastsProvider')]
    public function testScrapeForecasts(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->scraper->scrapeForecasts(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperCoreDataProvider::class, 'scrapeTimesProvider')]
    public function testScrapeTimes(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->scraper->scrapeTimes(...$arguments));
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenMethodIsNotImplementedInComments(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\CommentScraper::scrape() - " .
            "The 'scrape' feature is currently not implemented."
        );

        $this->scraper->scrapeComments(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testScrapeForecastsWithRaceCode1AndDate20240108(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\ForecastScraper::scrape() - " .
            "The specified key '.z_comment' is not found in the content of the URL: " .
            "'https://boatrace-tamagawa.com/modules/yosou/syussou.php?day=20240108&race=1&jo=05'."
        );

        $this->scraper->scrapeForecasts(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testScrapeTimesWithRaceCode1AndDate20240108(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\TimeScraper::scrape() - " .
            "The specified key '.com-rname' is not found in the content of the URL: " .
            "'https://boatrace-tamagawa.com/modules/yosou/oriten.php?day=20240108&race=1&jo=05'."
        );

        $this->scraper->scrapeTimes(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testInvalidWithRaceCode1AndDate20240108(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\ScraperCore::__call() - " .
            "Call to undefined method 'BVP\TamagawaScraper\ScraperCore::invalid()'."
        );

        $this->scraper->invalid(1, '2024-01-08');
    }
}
