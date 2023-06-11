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


class ChallengeEndpointObjectIntegrityTest extends RiotAPITestCase
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
    public function testGetAllChallengeConfigs(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var Objects\ChallengeConfigInfoDto[] $result */
        $result = $api->getAllChallengeConfigs();
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidityOfObjectList($result, $rawResult, Objects\ChallengeConfigInfoDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetAllChallengePercentiles(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var array $result */
        $result = $api->getAllChallengePercentiles();
        //  Get raw result
        $rawResult = $api->getResult();

        $this->assertSame($rawResult, $result);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetChallengeConfigById(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var Objects\ChallengeConfigInfoDto $result */
        $result = $api->getChallengeConfigById(0);
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidity($result, $rawResult, Objects\ChallengeConfigInfoDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetChallengeLeaderboards(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var Objects\ApexPlayerInfoDto[] $result */
        $result = $api->getChallengeLeaderboards(0, "MASTER");
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidityOfObjectList($result, $rawResult, Objects\ApexPlayerInfoDto::class);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetChallengePercentiles(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var Objects\ApexPlayerInfoDto[] $result */
        $result = $api->getChallengePercentiles(0);
        //  Get raw result
        $rawResult = $api->getResult();

        $this->assertSame($rawResult, $result);
    }

    /**
     * @depends testInit
     *
     * @param LeagueAPI $api
     */
    public function testGetPlayerData(LeagueAPI $api)
    {
        //  Get library processed results
        /** @var Objects\PlayerInfoDto $result */
        $result = $api->getPlayerData("k7AeDGLnS4msGvV0NCq-RItjbjxRSIXucm1-ctO5SBbILxp81DjmBzbOZu1l1QS5iveDdDSPaJ6ffA");
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidity($result, $rawResult, Objects\PlayerInfoDto::class);
    }
}
