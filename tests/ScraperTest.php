<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Tests;

use BVP\TamagawaScraper\Scraper;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ScraperTest extends TestCase
{
    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'scrapeForecastsProvider')]
    public function testScrapeForecasts(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::scrapeForecasts(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'scrapeTimesProvider')]
    public function testScrapeTimes(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::scrapeTimes(...$arguments));
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

        Scraper::scrapeComments(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenKeyNotFoundInForecasts(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\ForecastScraper::scrape() - " .
            "The specified key '.z_comment' is not found in the content of the URL: " .
            "'https://boatrace-tamagawa.com/modules/yosou/syussou.php?day=20240108&race=1&jo=05'."
        );

        Scraper::scrapeForecasts(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenKeyNotFoundInTimes(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\TimeScraper::scrape() - " .
            "The specified key '.com-rname' is not found in the content of the URL: " .
            "'https://boatrace-tamagawa.com/modules/yosou/oriten.php?day=20240108&race=1&jo=05'."
        );

        Scraper::scrapeTimes(1, '2024-01-08');
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\ScraperCore::__call() - " .
            "Call to undefined method 'BVP\TamagawaScraper\ScraperCore::ghost()'."
        );

        Scraper::ghost(1, '2024-01-08');
    }
}
