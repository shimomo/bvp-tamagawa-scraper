<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Scrapers;

use BVP\ScraperCore\Normalizer;
use BVP\ScraperCore\Scraper;
use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @author shimomo
 */
class TimeScraper extends BaseScraper implements TimeScraperInterface
{
    /**
     * @param  string|int                           $raceCode
     * @param  \Carbon\CarbonInterface|string|null  $date
     * @return array
     *
     * @throws \RuntimeException
     */
    public function scrape(string|int $raceCode, CarbonInterface|string|null $date = null): array
    {
        $date = Carbon::parse($date ?? 'today')->format('Ymd');
        $crawlerUrl = sprintf($this->baseUrl, 'oriten', $date, $raceCode);
        $crawler = Scraper::getInstance()->request('GET', $crawlerUrl);
        $times = Scraper::filterByKeys($crawler, [
            '.com-rname',
            '.col6',
            '.col7',
            '.col8',
            '.col9',
        ]);

        foreach ($times as $key => $value) {
            if (empty($value)) {
                throw new \RuntimeException(
                    __METHOD__ . "() - The specified key '{$key}' is not found " .
                    "in the content of the URL: '{$crawlerUrl}'."
                );
            }
        }

        $response = [];
        foreach (range(1, 6) as $boatNumber) {
            $racerName = $times['.com-rname'][$boatNumber - 1] ?? '';
            $racerName = Normalizer::normalize($racerName, ['shouldRemoveAllSpaces' => true]);
            $racerExhibitionTime = Normalizer::normalize($times['.col6'][$boatNumber] ?? 0.0);
            $racerLapTime = Normalizer::normalize($times['.col7'][$boatNumber] ?? 0.0);
            $racerTurnTime = Normalizer::normalize($times['.col8'][$boatNumber] ?? 0.0);
            $racerStraightTime = Normalizer::normalize($times['.col9'][$boatNumber] ?? 0.0);

            $response['boat_number_' . $boatNumber . '_racer_name'] = $racerName;
            $response['boat_number_' . $boatNumber . '_racer_exhibition_time'] = $racerExhibitionTime;
            $response['boat_number_' . $boatNumber . '_racer_lap_time'] = $racerLapTime;
            $response['boat_number_' . $boatNumber . '_racer_turn_time'] = $racerTurnTime;
            $response['boat_number_' . $boatNumber . '_racer_straight_time'] = $racerStraightTime;
        }

        return $response;
    }
}
