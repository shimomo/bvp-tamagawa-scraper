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
class ForecastScraper extends BaseScraper
{
    /**
     * @param  string|int                           $raceNumber
     * @param  \Carbon\CarbonInterface|string|null  $raceDate
     * @return array
     *
     * @throws \RuntimeException
     */
    public function scrape(string|int $raceNumber, CarbonInterface|string|null $raceDate = null): array
    {
        $raceDate = Carbon::parse($raceDate ?? 'today')->format('Ymd');
        $crawlerUrl = sprintf($this->baseUrl, 'syussou', $raceDate, $raceNumber);
        $crawler = Scraper::getInstance()->request('GET', $crawlerUrl);
        $forecasts = Scraper::filterByKeys($crawler, [
            '.z_comment',
            '.z_sinnyu',
            '.z_focus_2ren > .focus_list > li',
            '.z_focus_3ren > .focus_list > li',
            '.j_sinnyu',
            '.j_focus > .focus_list > li',
            '.j_reliability',
        ]);

        foreach ($forecasts as $key => $value) {
            if (empty($value)) {
                throw new \RuntimeException(
                    __METHOD__ . "() - The specified key '{$key}' is not found " .
                    "in the content of the URL: '{$crawlerUrl}'."
                );
            }
        }

        $reporterYesterdayCommentLabel = '記者予想 前日コメント';
        $reporterYesterdayCourseLabel = '記者予想 前日コース';
        $reporterYesterdayFocusExactaLabel = '記者予想 前日フォーカス 2連単';
        $reporterYesterdayFocusTrifectaLabel = '記者予想 前日フォーカス 3連単';
        $reporterYesterdayFocusLabel = '記者予想 前日フォーカス';

        $reporterYesterdayComment = Normalizer::normalize($forecasts['.z_comment'][0]);
        $reporterYesterdayCourse = Normalizer::normalize($forecasts['.z_sinnyu'][0]);
        $reporterYesterdayFocusExacta = Normalizer::normalize($forecasts['.z_focus_2ren > .focus_list > li']);
        $reporterYesterdayFocusTrifecta = Normalizer::normalize($forecasts['.z_focus_3ren > .focus_list > li']);
        $reporterYesterdayFocus = array_merge($reporterYesterdayFocusExacta, $reporterYesterdayFocusTrifecta);

        $jlcYesterdayCourseLabel = 'JLC予想 前日コース';
        $jlcYesterdayFocusLabel = 'JLC予想 前日フォーカス';
        $jlcYesterdayFocusExactaLabel = 'JLC予想 前日フォーカス 2連単';
        $jlcYesterdayFocusTrifectaLabel = 'JLC予想 前日フォーカス 3連単';
        $jlcYesterdayReliabilityLabel = 'JLC予想 前日信頼度';

        $jlcYesterdayCourse = Normalizer::normalize($forecasts['.j_sinnyu'][0]);
        $jlcYesterdayFocus = Normalizer::normalize($forecasts['.j_focus > .focus_list > li']);
        $jlcYesterdayReliability = Normalizer::normalize($forecasts['.j_reliability'][0]);

        $jlcYesterdayFocusExacta = array_values(array_filter($jlcYesterdayFocus, function ($focus) {
            return (substr_count($focus, '-') + substr_count($focus, '=')) === 1;
        }));

        $jlcYesterdayFocusTrifecta = array_values(array_filter($jlcYesterdayFocus, function ($focus) {
            return (substr_count($focus, '-') + substr_count($focus, '=')) === 2;
        }));

        return [
            'reporter_yesterday_comment_label' => $reporterYesterdayCommentLabel,
            'reporter_yesterday_comment' => $reporterYesterdayComment,
            'reporter_yesterday_course_label' => $reporterYesterdayCourseLabel,
            'reporter_yesterday_course' => $reporterYesterdayCourse,
            'reporter_yesterday_focus_label' => $reporterYesterdayFocusLabel,
            'reporter_yesterday_focus' => $reporterYesterdayFocus,
            'reporter_yesterday_focus_exacta_label' => $reporterYesterdayFocusExactaLabel,
            'reporter_yesterday_focus_exacta' => $reporterYesterdayFocusExacta,
            'reporter_yesterday_focus_trifecta_label' => $reporterYesterdayFocusTrifectaLabel,
            'reporter_yesterday_focus_trifecta' => $reporterYesterdayFocusTrifecta,
            'jlc_yesterday_course_label' => $jlcYesterdayCourseLabel,
            'jlc_yesterday_course' => $jlcYesterdayCourse,
            'jlc_yesterday_focus_label' => $jlcYesterdayFocusLabel,
            'jlc_yesterday_focus' => $jlcYesterdayFocus,
            'jlc_yesterday_focus_exacta_label' => $jlcYesterdayFocusExactaLabel,
            'jlc_yesterday_focus_exacta' => $jlcYesterdayFocusExacta,
            'jlc_yesterday_focus_trifecta_label' => $jlcYesterdayFocusTrifectaLabel,
            'jlc_yesterday_focus_trifecta' => $jlcYesterdayFocusTrifecta,
            'jlc_yesterday_reliability_label' => $jlcYesterdayReliabilityLabel,
            'jlc_yesterday_reliability' => $jlcYesterdayReliability,
        ];
    }
}
