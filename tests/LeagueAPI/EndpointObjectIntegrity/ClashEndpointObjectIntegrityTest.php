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

namespace LeagueAPI\EndpointObjectIntegrity;

use RiotAPI\Base\Definitions\Region;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\LeagueAPI\Objects;
use RiotAPI\Tests\RiotAPITestCase;


class ClashEndpointObjectIntegrityTest extends RiotAPITestCase
{
    public function testInit()
    {
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY => RiotAPITestCase::getApiKey(),
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
            LeagueAPI::SET_USE_DUMMY_DATA => true,
            LeagueAPI::SET_SAVE_DUMMY_DATA => getenv('SAVE_DUMMY_DATA') ?? false,
        ]);

        $this->assertInstanceOf(LeagueAPI::class, $api);

        return $api;
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetTournaments(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var Objects\ChallengeConfigInfoDto[] $result */
        $result = $api->getTournaments();
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidityOfObjectList($result, $rawResult, Objects\TournamentDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetTournamentByTeam(LeagueAPI $api)
    {
        $this->markTestSkipped("No DummyData available for this endpoint yet.");

        //  Get library processed results
        /** @var Objects\ClashTeamDto $result */
        $result = $api->getTournamentByTeam("");
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidity($result, $rawResult, Objects\ClashTeamDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetTournamentById(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var Objects\TournamentDto $result */
        $result = $api->getTournamentById(27641);
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidity($result, $rawResult, Objects\TournamentDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetTournamentPlayersByPUUID(LeagueAPI $api)
    {
        $this->markTestSkipped("No DummyData available for this endpoint yet.");

        //  Get library processed results
        /** @var Objects\PlayerDto[] $result */
        $result = $api->getTournamentPlayersByPUUID("");
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidityOfObjectList($result, $rawResult, Objects\PlayerDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetTournamentPlayersBySummoner(LeagueAPI $api)
    {
        $this->markTestSkipped("No DummyData available for this endpoint yet.");

        //  Get library processed results
        /** @var Objects\PlayerDto[] $result */
        $result = $api->getTournamentPlayersBySummoner("LfgVCG8zj31owTI_L8s0TkHZCV4yDVJG_f_993LYz4sKdPzLqSERQn08FA");
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidityOfObjectList($result, $rawResult, Objects\PlayerDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetTournamentTeamById(LeagueAPI $api)
    {
        $this->markTestSkipped("No DummyData available for this endpoint yet.");

        //  Get library processed results
        /** @var Objects\PlayerDto[] $result */
        $result = $api->getTournamentTeamById("");
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidityOfObjectList($result, $rawResult, Objects\PlayerDto::class);
    }

}
