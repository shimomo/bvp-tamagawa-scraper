<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper;

/**
 * @author shimomo
 */
interface ScraperInterface extends ScraperContractInterface
{
    /**
     * @param  \BVP\TamagawaScraper\ScraperCoreInterface
     * @return \BVP\TamagawaScraper\ScraperInterface
     */
    public static function getInstance(?ScraperCoreInterface $scraperCore = null): ScraperInterface;

    /**
     * @param  \BVP\TamagawaScraper\ScraperCoreInterface
     * @return \BVP\TamagawaScraper\ScraperInterface
     */
    public static function createInstance(?ScraperCoreInterface $scraperCore = null): ScraperInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
