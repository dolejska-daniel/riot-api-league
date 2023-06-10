<?php

/**
 * Copyright (C) 2016-2023  Daniel Dolejška
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

use RiotAPI\Tests\RiotAPITestCase;
use RiotAPI\Base\Definitions\Region;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\LeagueAPI\Objects;


class MatchEndpointTest extends RiotAPITestCase
{
    /** @var LeagueAPI */
    private $leagueApi;

	public function setUp(): void
	{
		$this->leagueApi = new LeagueAPI([
			LeagueAPI::SET_KEY             => RiotAPITestCase::getApiKey(),
			LeagueAPI::SET_REGION          => Region::EUROPE_EAST,
			LeagueAPI::SET_USE_DUMMY_DATA  => true,
			LeagueAPI::SET_CACHE_RATELIMIT => true,
		]);

		$this->assertInstanceOf(LeagueAPI::class, $this->leagueApi);
	}

	public function testGetMatch()
	{
        $this->markTestIncomplete('No DummyData for this call yet.');

		$match_id = 1730730260;
		//  Get library processed results
		/** @var Objects\MatchDto $result */
		$result = @$this->leagueApi->getMatch((string)$match_id);

		$this->assertEquals($match_id, $result->gameId);
	}
}
