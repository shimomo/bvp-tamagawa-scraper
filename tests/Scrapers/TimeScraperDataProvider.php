<?php

declare(strict_types=1);

namespace BVP\TamagawaScraper\Tests\Scrapers;

/**
 * @author shimomo
 */
final class TimeScraperDataProvider
{
    /**
     * @return array
     */
    public static function scrapeProvider(): array
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
