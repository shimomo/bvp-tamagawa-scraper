<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Tests\Scrapers;

use BVP\TamagawaScraper\Scrapers\CommentScraper;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class CommentScraperTest extends TestCase
{
    /**
     * @var \BVP\TamagawaScraper\Scrapers\CommentScraper
     */
    protected CommentScraper $scraper;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->scraper = new CommentScraper();
    }

    /**
     * @return void
     */
    public function testScrapeWithRaceCode1AndDate20240108(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\TamagawaScraper\Scrapers\CommentScraper::scrape() - " .
            "The 'scrape' feature is currently not implemented."
        );

        $this->scraper->scrape(1, '2024-01-08');
    }
}
