<?php

namespace App\Service\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @TODO
 */
class PriceCalculatorTest extends TestCase
{
	public function getData()
	{
		$data[] = [
			'distance' => 2,
			'duration' => 600,
			'startTime' => new \DataTime(),
		);

		return $data;
	}
}
