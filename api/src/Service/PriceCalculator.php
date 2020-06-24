<?php

namespace App\Service;

class PriceCalculator
{
    /**
     * @TODO make it customizable
     */
    private int $initialCharge = 1;
    private $rate = 0.5;
    private array $extraCharges = [
        [
            "startTime" => "20:00:00",
            "endTime" => "06:00:00",
            "charge" => 0.5,
        ],
        [
            "startTime" => "16:00:00",
            "endTime" => "19:00:00",
            "charge" => 1,
        ],
    ];

    /**
     * Calculate
     *
     * @param integer  $distance          the distance.
     * @param string   $startTime         the start time.
     * @param integer  $dist$durationance the duration.
     *
     * @return intger the price value
     */
    public function calculate(int $distance, \DateTime $startTime, int $duration): int
    {
        $charge = $this->initialCharge + ($this->rate * $distance * 5);

        $endTime = clone $startTime;
        $endTime->add(new \DateInterval('PT'. $duration . 'S'));

        // @TODO explode extra charges in services
        foreach ($this->extraCharges as $extraCharge) {
            $extraChargeStartTime = new \DateTime($endTime->format('Y-m-d') . $extraCharge['startTime']);
            $extraChargeEndTime = new \DateTime($endTime->format('Y-m-d') . $extraCharge['endTime']);

            if ($endTime > $extraChargeStartTime && $endTime < $extraChargeEndTime) {
                // @TODO extra charge by duration ?
                $charge += $extraCharge['charge'];
            }
        }

        return $charge;
    }
}
