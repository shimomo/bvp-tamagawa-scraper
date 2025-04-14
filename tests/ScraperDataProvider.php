<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Tests;

/**
 * @author shimomo
 */
final class ScraperDataProvider
{
    /**
     * @return array
     */
    public static function scrapeForecastsProvider(): array
    {
        return [
            [
                'arguments' => [1, '2024-01-03'],
                'expected' => [
                    'reporter_yesterday_comment_label' => '記者予想 前日コメント',
                    'reporter_yesterday_comment' => '開幕戦地元①相原利の逃げに懸ける。S奮起押し切るか。③青木蓮の25号機前回ターン系に好気配。握れる位置なら1M有利に行けそう。④佐藤航はそれを待つ形。',
                    'reporter_yesterday_course_label' => '記者予想 前日コース',
                    'reporter_yesterday_course' => '123/456',
                    'reporter_yesterday_focus_label' => '記者予想 前日フォーカス',
                    'reporter_yesterday_focus' => ['1=3', '1-4', '1=3-4', '1-4-3'],
                    'reporter_yesterday_focus_exacta_label' => '記者予想 前日フォーカス 2連単',
                    'reporter_yesterday_focus_exacta' => ['1=3', '1-4'],
                    'reporter_yesterday_focus_trifecta_label' => '記者予想 前日フォーカス 3連単',
                    'reporter_yesterday_focus_trifecta' => ['1=3-4', '1-4-3'],
                    'jlc_yesterday_course_label' => 'JLC予想 前日コース',
                    'jlc_yesterday_course' => '123456',
                    'jlc_yesterday_focus_label' => 'JLC予想 前日フォーカス',
                    'jlc_yesterday_focus' =>['1-3-2', '1-2-3', '1-3-4', '1-2-4', '1-4-3'],
                    'jlc_yesterday_focus_exacta_label' => 'JLC予想 前日フォーカス 2連単',
                    'jlc_yesterday_focus_exacta' =>[],
                    'jlc_yesterday_focus_trifecta_label' => 'JLC予想 前日フォーカス 3連単',
                    'jlc_yesterday_focus_trifecta' => ['1-3-2', '1-2-3', '1-3-4', '1-2-4', '1-4-3'],
                    'jlc_yesterday_reliability_label' => 'JLC予想 前日信頼度',
                    'jlc_yesterday_reliability' => '55%',
                ],
            ],
            [
                'arguments' => [10, '2024-01-03'],
                'expected' => [
                    'reporter_yesterday_comment_label' => '記者予想 前日コメント',
                    'reporter_yesterday_comment' => '③相原利のスタート力は侮れないが、①尾上雅も先に回れるぐらいには踏み込むとみる。ますはこの先マイ。相原を見て④塚田修がまくり差す。',
                    'reporter_yesterday_course_label' => '記者予想 前日コース',
                    'reporter_yesterday_course' => '123/456',
                    'reporter_yesterday_focus_label' => '記者予想 前日フォーカス',
                    'reporter_yesterday_focus' => ['1=3', '1-3=4', '1-3=2'],
                    'reporter_yesterday_focus_exacta_label' => '記者予想 前日フォーカス 2連単',
                    'reporter_yesterday_focus_exacta' => ['1=3'],
                    'reporter_yesterday_focus_trifecta_label' => '記者予想 前日フォーカス 3連単',
                    'reporter_yesterday_focus_trifecta' => ['1-3=4', '1-3=2'],
                    'jlc_yesterday_course_label' => 'JLC予想 前日コース',
                    'jlc_yesterday_course' => '126345',
                    'jlc_yesterday_focus_label' => 'JLC予想 前日フォーカス',
                    'jlc_yesterday_focus' =>['1-3-4', '1-4-3', '1-3-2', '1-4-2', '1-2-3'],
                    'jlc_yesterday_focus_exacta_label' => 'JLC予想 前日フォーカス 2連単',
                    'jlc_yesterday_focus_exacta' =>[],
                    'jlc_yesterday_focus_trifecta_label' => 'JLC予想 前日フォーカス 3連単',
                    'jlc_yesterday_focus_trifecta' => ['1-3-4', '1-4-3', '1-3-2', '1-4-2', '1-2-3'],
                    'jlc_yesterday_reliability_label' => 'JLC予想 前日信頼度',
                    'jlc_yesterday_reliability' => '80%',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function scrapeTimesProvider(): array
    {
        return [
            [
                'arguments' => [1, '2024-01-03'],
                'expected' => [
                    'boat_number_1_racer_name' => '相原利章',
                    'boat_number_1_racer_exhibition_time' => 6.70,
                    'boat_number_1_racer_lap_time' => 36.47,
                    'boat_number_1_racer_turn_time' => 6.07,
                    'boat_number_1_racer_straight_time' => 6.47,
                    'boat_number_2_racer_name' => '橋口真樹',
                    'boat_number_2_racer_exhibition_time' => 6.66,
                    'boat_number_2_racer_lap_time' => 36.97,
                    'boat_number_2_racer_turn_time' => 6.03,
                    'boat_number_2_racer_straight_time' => 6.68,
                    'boat_number_3_racer_name' => '青木蓮',
                    'boat_number_3_racer_exhibition_time' => 6.66,
                    'boat_number_3_racer_lap_time' => 36.70,
                    'boat_number_3_racer_turn_time' => 5.63,
                    'boat_number_3_racer_straight_time' => 6.93,
                    'boat_number_4_racer_name' => '佐藤航',
                    'boat_number_4_racer_exhibition_time' => 6.65,
                    'boat_number_4_racer_lap_time' => 36.44,
                    'boat_number_4_racer_turn_time' => 5.67,
                    'boat_number_4_racer_straight_time' => 6.87,
                    'boat_number_5_racer_name' => '田中勇輔',
                    'boat_number_5_racer_exhibition_time' => 6.68,
                    'boat_number_5_racer_lap_time' => 37.06,
                    'boat_number_5_racer_turn_time' => 5.57,
                    'boat_number_5_racer_straight_time' => 6.82,
                    'boat_number_6_racer_name' => '坂本一真',
                    'boat_number_6_racer_exhibition_time' => 6.72,
                    'boat_number_6_racer_lap_time' => 37.37,
                    'boat_number_6_racer_turn_time' => 5.93,
                    'boat_number_6_racer_straight_time' => 6.71,
                ],
            ],
            [
                'arguments' => [10, '2024-01-03'],
                'expected' => [
                    'boat_number_1_racer_name' => '尾上雅也',
                    'boat_number_1_racer_exhibition_time' => 6.74,
                    'boat_number_1_racer_lap_time' => 36.66,
                    'boat_number_1_racer_turn_time' => 5.81,
                    'boat_number_1_racer_straight_time' => 6.70,
                    'boat_number_2_racer_name' => '川上聡介',
                    'boat_number_2_racer_exhibition_time' => 6.66,
                    'boat_number_2_racer_lap_time' => 37.03,
                    'boat_number_2_racer_turn_time' => 6.09,
                    'boat_number_2_racer_straight_time' => 6.82,
                    'boat_number_3_racer_name' => '相原利章',
                    'boat_number_3_racer_exhibition_time' => 6.83,
                    'boat_number_3_racer_lap_time' => 37.27,
                    'boat_number_3_racer_turn_time' => 6.21,
                    'boat_number_3_racer_straight_time' => 6.71,
                    'boat_number_4_racer_name' => '塚田修二',
                    'boat_number_4_racer_exhibition_time' => 6.63,
                    'boat_number_4_racer_lap_time' => 37.08,
                    'boat_number_4_racer_turn_time' => 5.72,
                    'boat_number_4_racer_straight_time' => 6.80,
                    'boat_number_5_racer_name' => '小澤和也',
                    'boat_number_5_racer_exhibition_time' => 6.80,
                    'boat_number_5_racer_lap_time' => 37.23,
                    'boat_number_5_racer_turn_time' => 5.70,
                    'boat_number_5_racer_straight_time' => 6.95,
                    'boat_number_6_racer_name' => '倉田茂将',
                    'boat_number_6_racer_exhibition_time' => 6.81,
                    'boat_number_6_racer_lap_time' => 37.70,
                    'boat_number_6_racer_turn_time' => 5.59,
                    'boat_number_6_racer_straight_time' => 6.92,
                ],
            ],
        ];
    }
}
