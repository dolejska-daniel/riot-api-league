<?php /** @noinspection PhpInternalEntityUsedInspection */

/**
 * Copyright (C) 2016-2024  Daniel Dolejška
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

namespace RiotAPI\LeagueAPI;

use ReflectionException;
use RiotAPI\Base\BaseAPI;
use RiotAPI\Base\Definitions\IRegion;
use RiotAPI\Base\Definitions\Region;
use RiotAPI\LeagueAPI\Objects;
use RiotAPI\LeagueAPI\Objects\StaticData;
use RiotAPI\LeagueAPI\Objects\ProviderRegistrationParameters;
use RiotAPI\LeagueAPI\Objects\TournamentCodeParameters;
use RiotAPI\LeagueAPI\Objects\TournamentCodeUpdateParameters;
use RiotAPI\LeagueAPI\Objects\TournamentRegistrationParameters;
use RiotAPI\Base\Exceptions\GeneralException;
use RiotAPI\Base\Exceptions\RequestException;
use RiotAPI\Base\Exceptions\RequestParameterException;
use RiotAPI\Base\Exceptions\ServerException;
use RiotAPI\Base\Exceptions\ServerLimitException;
use RiotAPI\Base\Exceptions\SettingsException;

/**
 *   Class LeagueAPI.
 *
 * @package RiotAPI\LeagueAPI
 */
class LeagueAPI extends BaseAPI
{
	/**
	 * Settings constants.
	 */
	const
		SET_TOURNAMENT_KEY           = 'SET_TOURNAMENT_KEY',           /** API key used when working with tournaments **/
		SET_INTERIM                  = 'SET_INTERIM',                  /** Used to set whether or not is your application in Interim mode (Tournament STUB endpoints) **/
		SET_DD_CACHE_PROVIDER_PARAMS = 'SET_DD_CACHE_PROVIDER_PARAMS', /** Specifies parameters passed to DataDragonAPI CacheProvider class when initializing **/
		SET_DATADRAGON_INIT          = 'SET_DATADRAGON_INIT',          /** Specifies whether or not should DataDragonAPI be initialized by this library **/
		SET_DATADRAGON_PARAMS        = 'SET_DATADRAGON_PARAMS',        /** Specifies parameters passed to DataDragonAPI when initialized **/
		SET_STATICDATA_LINKING       = 'SET_STATICDATA_LINKING',
		SET_STATICDATA_LOCALE        = 'SET_STATICDATA_LOCALE',
		SET_STATICDATA_VERSION       = 'SET_STATICDATA_VERSION';

	/**
	 * Pick type constants.
	 */
	const
		PICK_BLIND            = 'BLIND_PICK',
		PICK_DRAFT            = 'DRAFT_MODE',
		PICK_RANDOM           = 'ALL_RANDOM',
		PICK_DRAFT_TOURNAMENT = 'TOURNAMENT_DRAFT';

	/**
	 * Map constants.
	 */
	const
		MAP_SUMMONERS_RIFT   = 'SUMMONERS_RIFT',
		MAP_TWISTED_TREELINE = 'TWISTED_TREELINE',
		MAP_HOWLING_ABYSS    = 'HOWLING_ABYSS';

	/**
	 * Spectator type constants.
	 */
	const
		SPECTATOR_NONE       = 'NONE',
		SPECTATOR_LOBBY_ONLY = 'LOBBYONLY',
		SPECTATOR_ALL        = 'ALL';

	const
		MATCH_ALLOWED_TYPES = [
			"ranked",
			"normal",
			"tourney",
			"tutorial",
		];

	const
		CHALLENGES_ALLOWED_LEVELS = [
			"MASTER",
			"GRANDMASTER",
			"CHALLENGER",
		];

	/**
	 * Constants required for tournament API calls.
	 */
	const
		TOURNAMENT_ALLOWED_PICK_TYPES = [
			self::PICK_BLIND,
			self::PICK_DRAFT,
			self::PICK_RANDOM,
			self::PICK_DRAFT_TOURNAMENT,
		],
		TOURNAMENT_ALLOWED_MAPS = [
			self::MAP_SUMMONERS_RIFT,
			self::MAP_TWISTED_TREELINE,
			self::MAP_HOWLING_ABYSS,
		],
		TOURNAMENT_ALLOWED_SPECTATOR_TYPES = [
			self::SPECTATOR_NONE,
			self::SPECTATOR_LOBBY_ONLY,
			self::SPECTATOR_ALL,
		],
		TOURNAMENT_ALLOWED_REGIONS = [
			Region::BRASIL,
			Region::EUROPE_EAST,
			Region::EUROPE_WEST,
			Region::JAPAN,
			Region::LAMERICA_SOUTH,
			Region::LAMERICA_NORTH,
			Region::NORTH_AMERICA,
			Region::OCEANIA,
			Region::RUSSIA,
			Region::TURKEY,
		];

	const
		//  List of required setting keys
		SETTINGS_REQUIRED = [],
		//  List of allowed setting keys
		SETTINGS_ALLOWED = [
			self::SET_TOURNAMENT_KEY,
			self::SET_INTERIM,
			self::SET_DD_CACHE_PROVIDER_PARAMS,
			self::SET_DATADRAGON_INIT,
			self::SET_DATADRAGON_PARAMS,
			self::SET_STATICDATA_LINKING,
			self::SET_STATICDATA_LOCALE,
			self::SET_STATICDATA_VERSION,
		],
		SETTINGS_INIT_ONLY = [
			self::SET_DATADRAGON_INIT,
			self::SET_DATADRAGON_PARAMS,
			self::SET_DD_CACHE_PROVIDER_PARAMS,
		];

	/**
	 *   Available resource list.
	 *
	 * @var array $resources
	 */
	protected array $resources = [
		self::RESOURCE_CHAMPION,
		self::RESOURCE_CHAMPIONMASTERY,
		self::RESOURCE_CHALLENGES,
		self::RESOURCE_CLASH,
		self::RESOURCE_LEAGUE,
		self::RESOURCE_LEAGUE_EXP,
		self::RESOURCE_STATICDATA,
		self::RESOURCE_STATUS,
		self::RESOURCE_MATCH,
		self::RESOURCE_SPECTATOR,
		self::RESOURCE_SUMMONER,
		self::RESOURCE_TOURNAMENT,
		self::RESOURCE_TOURNAMENT_STUB,
	];

	public function _setupCacheCalls(): void
    {
		if ($this->isSettingSet($this::SET_CACHE_CALLS_LENGTH) == false)
		{
			//  Value is not set, setting default values
			$this->setSetting($this::SET_CACHE_CALLS_LENGTH, [
				self::RESOURCE_CHAMPION         => 60 * 10,
                self::RESOURCE_CHAMPIONMASTERY  => 60 * 60,
				self::RESOURCE_CHALLENGES       => 60 * 10,
				self::RESOURCE_CLASH            => 60,
				self::RESOURCE_LEAGUE           => 60 * 10,
				self::RESOURCE_MATCH            => 60,
				self::RESOURCE_SPECTATOR        => 60,
				self::RESOURCE_STATICDATA       => 60 * 60 * 24,
				self::RESOURCE_STATUS           => 60,
				self::RESOURCE_SUMMONER         => 60 * 60,
				self::RESOURCE_TOURNAMENT       => 60,
				self::RESOURCE_TOURNAMENT_STUB  => 60,
			]);
		}
		else
		{
			parent::_setupCacheCalls();
		}
	}
	
	/**
	 * @internal
	 *
	 *   Returns dummy response filename based on current settings.
	 *
	 * @return string
	 */
	public function _getDummyDataFileName(): string
	{
		$method = $this->used_method;
		$endp = str_replace([ '/', '.' ], [ '-', '' ], substr($this->endpoint, 1));
		$quer = str_replace([ '&', '%26', '=', '%3D' ], [ '_', '_', '-', '-' ], http_build_query($this->query_data));
		$data = !empty($this->post_data) ? '_' . md5(http_build_query($this->query_data)) : '';
		if (strlen($quer))
			$quer = "_" . $quer;

		return __DIR__ . "/../../tests/DummyData/{$method}_$endp$quer$data.json";
	}


	/**
	 * ==================================================================dd=
	 *     Champion Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#champion-v3
	 * ==================================================================dd=
	 **/
	const RESOURCE_CHAMPION = '1237:champion';
	const RESOURCE_CHAMPION_VERSION = 'v3';


	/**
	 *   Retrieve current champion rotations.
	 *
	 * @cli-name get-rotations
	 * @cli-namespace champion
	 *
	 * @return Objects\ChampionInfo|null
	 *
	 * @throws GeneralException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws SettingsException
	 */
	public function getChampionRotations(): ?Objects\ChampionInfo
	{
		$resultPromise = $this->setEndpoint("/lol/platform/" . self::RESOURCE_CHAMPION_VERSION . "/champion-rotations")
			->setResource(self::RESOURCE_CHAMPION, "/champion-rotations")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\ChampionInfo($result, $this);
		});
	}

	/**
	 * ==================================================================dd=
	 *     Champion Mastery Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#champion-mastery-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_CHAMPIONMASTERY = '1418:champion-mastery';
	const RESOURCE_CHAMPIONMASTERY_VERSION = 'v4';

	/**
	 *   Get a champion mastery by player id and champion id. Response code 204 means
	 * there were no masteries found for given player id or player id and champion id
	 * combination. (RPC)
	 *
	 * @cli-name get-mastery
	 * @cli-namespace champion-mastery
	 *
	 * @param string $encrypted_puuid
	 * @param int $champion_id
	 *
	 * @return Objects\ChampionMasteryDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getChampionMastery
	 */
	public function getChampionMastery( string $encrypted_puuid, int $champion_id ): ?Objects\ChampionMasteryDto
	{
		$resultPromise = $this->setEndpoint("/lol/champion-mastery/" . self::RESOURCE_CHAMPIONMASTERY_VERSION . "/champion-masteries/by-puuid/$encrypted_puuid/by-champion/$champion_id")
			->setResource(self::RESOURCE_CHAMPIONMASTERY, "/champion-masteries/by-puuid/%s/by-champion/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\ChampionMasteryDto($result, $this);
		});
	}

	/**
	 *   Get all champion mastery entries sorted by number of champion points descending
	 * (RPC)
	 *
	 * @cli-name get-masteries
	 * @cli-namespace champion-mastery
	 *
	 * @param string $encrypted_puuid
	 *
	 * @return Objects\ChampionMasteryDto[]|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getAllChampionMasteries
	 */
	public function getChampionMasteries( string $encrypted_puuid ): ?array
	{
		$resultPromise = $this->setEndpoint("/lol/champion-mastery/" . self::RESOURCE_CHAMPIONMASTERY_VERSION . "/champion-masteries/by-puuid/$encrypted_puuid")
			->setResource(self::RESOURCE_CHAMPIONMASTERY, "/champion-masteries/by-puuid/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			foreach ($result as $ident => $championMasteryDtoData)
				$r[$ident] = new Objects\ChampionMasteryDto($championMasteryDtoData, $this);

			return $r ?? [];
		});
	}

	/**
	 *   Get a player's total champion mastery score, which is sum of individual champion
	 * mastery levels (RPC)
	 *
	 * @cli-name get-mastery-score
	 * @cli-namespace champion-mastery
	 *
	 * @param string $encrypted_puuid
	 *
	 * @return int|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getChampionMasteryScore
	 */
	public function getChampionMasteryScore( string $encrypted_puuid ): ?int
	{
		$resultPromise = $this->setEndpoint("/lol/champion-mastery/" . self::RESOURCE_CHAMPIONMASTERY_VERSION . "/scores/by-puuid/$encrypted_puuid")
			->setResource(self::RESOURCE_CHAMPIONMASTERY, "/scores/by-puuid/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(int $result) {
			return $result;
		});
	}


    /**
     * ==================================================================dd=
     *     Challenges Endpoint Methods
     *     @link https://developer.riotgames.com/apis#lol-challenges-v1
     * ==================================================================dd=
     **/
    const RESOURCE_CHALLENGES = '1539:challenges';
    const RESOURCE_CHALLENGES_VERSION = 'v1';

    /**
     *   List of all basic challenge configuration information (includes all translations for names and descriptions).
     *
     * @cli-name get-all-challenge-configs
     * @cli-namespace challenges
     *
     * @return Objects\ChallengeConfigInfoDto[]|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getAllChallengeConfigs
     */
    public function getAllChallengeConfigs(): ?array
    {
        $resultPromise = $this->setEndpoint("/lol/challenges/" . self::RESOURCE_CHALLENGES_VERSION . "/challenges/config")
            ->setResource(self::RESOURCE_CHALLENGES, "/challenges/config")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            foreach ($result as $challengeCigInfoDtoData)
                $r[] = new Objects\ChallengeConfigInfoDto($challengeCigInfoDtoData, $this);

            return $r ?? [];
        });
    }

    /**
     *   Map of level to percentile of players who have achieved it - keys:
     * ChallengeId -> Season -> Level -> percentile of players who achieved it.
     *
     * @cli-name get-all-challenge-percentiles
     * @cli-namespace challenges
     *
     * @return array|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getAllChallengePercentiles
     */
    public function getAllChallengePercentiles(): ?array
    {
        $resultPromise = $this->setEndpoint("/lol/challenges/" . self::RESOURCE_CHALLENGES_VERSION . "/challenges/percentiles")
            ->setResource(self::RESOURCE_CHALLENGES, "/challenges/percentiles")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return $result;
        });
    }

    /**
     *   Get challenge configuration (REST).
     *
     * @cli-name get-challenge-config-by-id
     * @cli-namespace challenges
     *
     * @param int $challenge_id
     *
     * @return Objects\ChallengeConfigInfoDto|null
     *
     * @throws GeneralException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws SettingsException
     * @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getChallengeConfigs
     */
    public function getChallengeConfigById(int $challenge_id): ?Objects\ChallengeConfigInfoDto
    {
        $resultPromise = $this->setEndpoint("/lol/challenges/" . self::RESOURCE_CHALLENGES_VERSION . "/challenges/$challenge_id/config")
            ->setResource(self::RESOURCE_CHALLENGES, "/challenges/%d/config")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\ChallengeConfigInfoDto($result, $this);
        });
    }

    /**
     *   Return top players for each level. Level must be MASTER, GRANDMASTER or CHALLENGER.
     *
     * @cli-name get-challenge-leaderboards
     * @cli-namespace challenges
     *
     * @return Objects\ApexPlayerInfoDto[]|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getChallengeLeaderboards
     */
    public function getChallengeLeaderboards(int $challenge_id, string $level): ?array
    {
        if (!in_array($level, self::CHALLENGES_ALLOWED_LEVELS))
            throw new RequestParameterException('Value of level is invalid. Allowed values: ' . implode(', ', self::CHALLENGES_ALLOWED_LEVELS));

        $resultPromise = $this->setEndpoint("/lol/challenges/" . self::RESOURCE_CHALLENGES_VERSION . "/challenges/$challenge_id/leaderboards/by-level/$level")
            ->setResource(self::RESOURCE_CHALLENGES, "/challenges/%d/leaderboards/by-level/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            foreach ($result as $apexPlayerInfoDtoData)
                $r[] = new Objects\ApexPlayerInfoDto($apexPlayerInfoDtoData, $this);

            return $r ?? [];
        });
    }

    /**
     *   Map of level to percentile of players who have achieved it.
     *
     * @cli-name get-challenge-percentiles
     * @cli-namespace challenges
     *
     * @param int $challenge_id
     *
     * @return array|null
     *
     * @throws GeneralException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws SettingsException
     *
     * @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getChallengePercentiles
     */
    public function getChallengePercentiles(int $challenge_id): ?array
    {
        $resultPromise = $this->setEndpoint("/lol/challenges/" . self::RESOURCE_CHALLENGES_VERSION . "/challenges/$challenge_id/percentiles")
            ->setResource(self::RESOURCE_CHALLENGES, "/challenges/%d/percentiles")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return $result;
        });
    }

    /**
     *   Returns player information with list of all progressed challenges (REST).
     *
     * @cli-name get-challenge-config-by-id
     * @cli-namespace challenges
     *
     * @param string $puuid
     *
     * @return Objects\PlayerInfoDto|null
     *
     * @throws GeneralException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws SettingsException
     *
     * @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getPlayerData
     */
    public function getPlayerData(string $puuid): ?Objects\PlayerInfoDto
    {
        $resultPromise = $this->setEndpoint("/lol/challenges/" . self::RESOURCE_CHALLENGES_VERSION . "/player-data/$puuid")
            ->setResource(self::RESOURCE_CHALLENGES, "/player-data/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\PlayerInfoDto($result, $this);
        });
    }


    /**
     * ==================================================================dd=
     *     Clash Endpoint Methods
     *     @link https://developer.riotgames.com/apis#clash-v1
     * ==================================================================dd=
     **/
    const RESOURCE_CLASH = '1497:clash';
    const RESOURCE_CLASH_VERSION = 'v1';

    /**
     *   Get players by PUUID.
     *
     * @cli-name get-players-by-puuid
     * @cli-namespace clash
     *
     * @param string $encrypted_puuid
     *
     * @return Objects\PlayerDto[]|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#clash-v1/GET_getPlayersByPUUID
     */
    public function getTournamentPlayersByPUUID(string $encrypted_puuid): ?array
    {
        $resultPromise = $this->setEndpoint("/lol/clash/" . self::RESOURCE_CLASH_VERSION . "/players/by-puuid/$encrypted_puuid")
            ->setResource(self::RESOURCE_CLASH, "/players/by-puuid/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            foreach ($result as $playerDtoData)
                $r[] = new Objects\PlayerDto($playerDtoData, $this);

            return $r ?? [];
        });
    }

    /**
     *   Get players by summoner ID.
     *
     * @cli-name get-players-by-summoner
     * @cli-namespace clash
     *
     * @param string $summoner_id
     *
     * @return Objects\PlayerDto[]|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#clash-v1/GET_getPlayersBySummoner
     */
    public function getTournamentPlayersBySummoner(string $summoner_id): ?array
    {
        $resultPromise = $this->setEndpoint("/lol/clash/" . self::RESOURCE_CLASH_VERSION . "/players/by-summoner/$summoner_id")
            ->setResource(self::RESOURCE_CLASH, "/players/by-summoner/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            foreach ($result as $playerDtoData)
                $r[] = new Objects\PlayerDto($playerDtoData, $this);

            return $r ?? [];
        });
    }

    /**
     *   Get team by ID.
     *
     * @cli-name get-team-by-id
     * @cli-namespace clash
     *
     * @param string $team_id
     *
     * @return Objects\ClashTeamDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#clash-v1/GET_getTeamById
     */
    public function getTournamentTeamById(string $team_id): ?Objects\ClashTeamDto
    {
        $resultPromise = $this->setEndpoint("/lol/clash/" . self::RESOURCE_CLASH_VERSION . "/teams/$team_id")
            ->setResource(self::RESOURCE_CLASH, "/teams/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\ClashTeamDto($result, $this);
        });
    }

    /**
     *   Get all active or upcoming tournaments.
     *
     * @cli-name get-tournaments
     * @cli-namespace clash
     *
     * @return Objects\TournamentDto[]|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#clash-v1/GET_getTournaments
     */
    public function getTournaments(): ?array
    {
        $resultPromise = $this->setEndpoint("/lol/clash/" . self::RESOURCE_CLASH_VERSION . "/tournaments")
            ->setResource(self::RESOURCE_CLASH, "/tournaments")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            foreach ($result as $tournamentDtoData)
                $r[] = new Objects\TournamentDto($tournamentDtoData, $this);

            return $r ?? [];
        });
    }

    /**
     *   Get tournament by team ID.
     *
     * @cli-name get-tournament-by-team
     * @cli-namespace clash
     *
     * @param string $team_id
     *
     * @return Objects\TournamentDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#clash-v1/GET_getTournamentByTeam
     */
    public function getTournamentByTeam(string $team_id): ?array
    {
        $resultPromise = $this->setEndpoint("/lol/clash/" . self::RESOURCE_CLASH_VERSION . "/tournaments/by-team/$team_id")
            ->setResource(self::RESOURCE_CLASH, "/tournaments/by-team/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\TournamentDto($result, $this);
        });
    }

    /**
     *   Get tournament by ID.
     *
     * @cli-name get-tournament-by-id
     * @cli-namespace clash
     *
     * @param int $tournament_id
     *
     * @return Objects\TournamentDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#clash-v1/GET_getTournamentById
     */
    public function getTournamentById(int $tournament_id): ?Objects\TournamentDto
    {
        $resultPromise = $this->setEndpoint("/lol/clash/" . self::RESOURCE_CLASH_VERSION . "/tournaments/$tournament_id")
            ->setResource(self::RESOURCE_CLASH, "/tournaments/%d")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\TournamentDto($result, $this);
        });
    }


	/**
	 * ==================================================================dd=
	 *     Spectator Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#spectator-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_SPECTATOR = '1419:spectator';
	const RESOURCE_SPECTATOR_VERSION = 'v4';

	/**
	 *   Get current game information for the given summoner ID.
	 *
	 * @cli-name get-current-game-info
	 * @cli-namespace spectator
	 *
	 * @param string $encrypted_summoner_id
	 *
	 * @return Objects\CurrentGameInfo|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 * @throws ReflectionException
	 *
	 * @link https://developer.riotgames.com/apis#spectator-v4/GET_getCurrentGameInfoBySummoner
	 */
	public function getCurrentGameInfoBySummoner(string $encrypted_summoner_id): ?Objects\CurrentGameInfo
	{
		$resultPromise = $this->setEndpoint("/lol/spectator/" . self::RESOURCE_SPECTATOR_VERSION . "/active-games/by-summoner/$encrypted_summoner_id")
			->setResource(self::RESOURCE_SPECTATOR, "/active-games/by-summoner/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\CurrentGameInfo($result, $this);
		});
	}

	/**
	 *   Get list of featured games.
	 *
	 * @cli-name get-featured-games
	 * @cli-namespace spectator
	 *
	 * @return Objects\FeaturedGames|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 * @throws ReflectionException
	 * @throws ReflectionException
	 *
	 * @link https://developer.riotgames.com/apis#spectator-v4/GET_getFeaturedGames
	 */
	public function getFeaturedGames(): ?Objects\FeaturedGames
	{
		$resultPromise = $this->setEndpoint("/lol/spectator/" . self::RESOURCE_SPECTATOR_VERSION . "/featured-games")
			->setResource(self::RESOURCE_SPECTATOR, "/featured-games")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\FeaturedGames($result, $this);
		});
	}


	/**
	 * ==================================================================dd=
	 *     League Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#league-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_LEAGUE = '1424:league';
	const RESOURCE_LEAGUE_VERSION = 'v4';

	/**
	 *   Get league by its UUID.
	 *
	 * @cli-name get-by-id
	 * @cli-namespace league
	 *
	 * @param string $league_id
	 *
	 * @return Objects\LeagueListDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueById
	 */
	public function getLeagueById( string $league_id ): ?Objects\LeagueListDto
	{
		$resultPromise = $this->setEndpoint("/lol/league/" . self::RESOURCE_LEAGUE_VERSION . "/leagues/$league_id")
			->setResource(self::RESOURCE_LEAGUE, "/leagues/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\LeagueListDto($result, $this);
		});
	}

	/**
	 *   Get league entries in all queues for a given summoner ID.
	 *
	 * @cli-name get-league-entries-for-summoner
	 * @cli-namespace league
	 *
	 * @param string $encrypted_summoner_id
	 *
	 * @return Objects\LeagueEntryDto[]|null
	 *
	 * @throws GeneralException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws SettingsException
	 *
	 * @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntriesForSummoner
	 */
	public function getLeagueEntriesForSummoner( string $encrypted_summoner_id ): ?array
	{
		$resultPromise = $this->setEndpoint("/lol/league/" . self::RESOURCE_LEAGUE_VERSION . "/entries/by-summoner/$encrypted_summoner_id")
			->setResource(self::RESOURCE_LEAGUE, "/entries/by-summoner/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			foreach ($result as $leagueEntryDtoData)
				$r[] = new Objects\LeagueEntryDto($leagueEntryDtoData, $this);

			return $r ?? [];
		});
	}

	/**
	 *   Get all the league entries.
	 *
	 * @cli-name get-league-entries
	 * @cli-namespace league
	 *
	 * @param string $queue
	 * @param string $tier
	 * @param string $division
	 * @param int $page
	 *
	 * @return Objects\LeagueEntryDto[]|null
	 *
	 * @throws GeneralException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws SettingsException
	 * @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntries
	 */
	public function getLeagueEntries( string $queue, string $tier, string $division, int $page = 1 ): ?array
	{
		$resultPromise = $this->setEndpoint("/lol/league/" . self::RESOURCE_LEAGUE_VERSION . "/entries/$queue/$tier/$division")
			->setResource(self::RESOURCE_LEAGUE, "/entries/%s/%s/%s")
			->addQuery('page', $page)
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			foreach ($result as $leagueEntryDtoData)
				$r[] = new Objects\LeagueEntryDto($leagueEntryDtoData, $this);

			return $r ?? [];
		});
	}

	/**
	 *   Get challenger tier leagues.
	 *
	 * @cli-name get-league-challenger
	 * @cli-namespace league
	 *
	 * @param string $game_queue_type
	 *
	 * @return Objects\LeagueListDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#league-v4/GET_getChallengerLeague
	 */
	public function getLeagueChallenger( string $game_queue_type ): ?Objects\LeagueListDto
	{
		$resultPromise = $this->setEndpoint("/lol/league/" . self::RESOURCE_LEAGUE_VERSION . "/challengerleagues/by-queue/$game_queue_type")
			->setResource(self::RESOURCE_LEAGUE, "/challengerleagues/by-queue/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\LeagueListDto($result, $this);
		});
	}

	/**
	 *   Get grandmaster tier leagues.
	 *
	 * @cli-name get-league-grandmaster
	 * @cli-namespace league
	 *
	 * @param string $game_queue_type
	 *
	 * @return Objects\LeagueListDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#league-v4/GET_getMasterLeague
	 */
	public function getLeagueGrandmaster( string $game_queue_type ): ?Objects\LeagueListDto
	{
		$resultPromise = $this->setEndpoint("/lol/league/" . self::RESOURCE_LEAGUE_VERSION . "/grandmasterleagues/by-queue/$game_queue_type")
			->setResource(self::RESOURCE_LEAGUE, "/grandmasterleagues/by-queue/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\LeagueListDto($result, $this);
		});
	}

	/**
	 *   Get master tier leagues.
	 *
	 * @cli-name get-league-master
	 * @cli-namespace league
	 *
	 * @param string $game_queue_type
	 *
	 * @return Objects\LeagueListDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#league-v4/GET_getMasterLeague
	 */
	public function getLeagueMaster( string $game_queue_type ): ?Objects\LeagueListDto
	{
		$resultPromise = $this->setEndpoint("/lol/league/" . self::RESOURCE_LEAGUE_VERSION . "/masterleagues/by-queue/$game_queue_type")
			->setResource(self::RESOURCE_LEAGUE, "/masterleagues/by-queue/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\LeagueListDto($result, $this);
		});
	}


	/**
	 * ==================================================================dd=
	 *     League Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#league-exp-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_LEAGUE_EXP = '1474:league-exp';
	const RESOURCE_LEAGUE_EXP_VERSION = 'v4';

	/**
	 *   Get all the league entries.
	 *
	 * @cli-name get-league-entries
	 * @cli-namespace league-exp
	 *
	 * @param string $queue
	 * @param string $tier
	 * @param string $division
	 * @param int $page
	 *
	 * @return Objects\LeagueEntryDto[]|null
	 *
	 * @throws GeneralException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws SettingsException
	 *
	 * @link https://developer.riotgames.com/apis#league-exp-v4/GET_getLeagueEntries
	 */
	public function getLeagueEntriesExp( string $queue, string $tier, string $division, int $page = 1 ): ?array
	{
		$resultPromise = $this->setEndpoint("/lol/league-exp/" . self::RESOURCE_LEAGUE_EXP_VERSION . "/entries/$queue/$tier/$division")
			->setResource(self::RESOURCE_LEAGUE_EXP, "/entries/%s/%s/%s")
			->addQuery('page', $page)
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			foreach ($result as $leagueEntryDtoData)
				$r[] = new Objects\LeagueEntryDto($leagueEntryDtoData, $this);

			return $r ?? [];
		});
	}


	/**
	 * ==================================================================dd=
	 *     Static Data Endpoint Methods
	 * ==================================================================dd=
	 **/
	const RESOURCE_STATICDATA = '1351:lol-static-data';

	/**
	 * @param $method
	 * @param mixed ...$arguments
	 * @return bool|mixed
	 *
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 *
	 * @noinspection PhpUndefinedNamespaceInspection
	 * @noinspection PhpUndefinedClassInspection
	 */
	protected function _makeStaticCall($method, ...$arguments): mixed
	{
		try
		{
			// Fetch StaticData from JSON files
			$result = call_user_func_array($method, $arguments);
			$this->result_data = $result;
			$this->result_data_raw = null;
			$this->result_headers = [];
			$this->result_code = 200;

			if (!$result)
			{
				$this->result_code = 599;
				throw new ServerException("StaticData failed to be loaded.");
			}
		}
		catch (DataDragonExceptions\SettingsException $ex)
		{
			throw new SettingsException("DataDragon API was not initialized properly! StaticData endpoints cannot be used. {$ex->getMessage()}");
		}
		catch (DataDragonExceptions\ArgumentException $ex)
		{
			throw new RequestException($ex->getMessage(), $ex->getCode());
		}

		return $result;
	}

	/**
	 *   Retrieves champion list.
	 *
	 * @cli-name get-champions
	 * @cli-namespace static-data
	 *
	 * @param bool $data_by_key
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticChampionListDto
	 *
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 * @throws ReflectionException
	 */
	public function getStaticChampions( bool $data_by_key = false, string $locale = 'en_US', string $version = null ): StaticData\StaticChampionListDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticChampions", $locale, $version, $data_by_key);
		return new StaticData\StaticChampionListDto($result, $this);
	}

	/**
	 *   Retrieves a champion by its numeric key.
	 *
	 * @cli-name get-champion
	 * @cli-namespace static-data
	 *
	 * @param int $champion_id
	 * @param bool $extended
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticChampionDto
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticChampion( int $champion_id, bool $extended = false, string $locale = 'en_US', string $version = null ): StaticData\StaticChampionDto
	{
		if ($champion_id == -1)
			return new StaticData\StaticChampionDto(["id" => -1, "name" => "None"], $this);

		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticChampionByKey", $champion_id, $locale, $version);
		if ($extended && $result)
		{
			$champion_id = $result['id'];
			$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticChampionDetails", $champion_id, $locale, $version);
			$result = $result['data'][$champion_id];
			$this->result_data = $result;
		}

		return new StaticData\StaticChampionDto($result, $this);
	}

	/**
	 *   Retrieves item list.
	 *
	 * @cli-name get-items
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticItemListDto
	 * @throws ReflectionException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 * @throws ReflectionException
	 */
	public function getStaticItems( string $locale = 'en_US', string $version = null ): StaticData\StaticItemListDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticItems", $locale, $version);

		// Create missing data
		array_walk($result['data'], function (&$d, $k) {
			$d['id'] = $k;
		});
		$this->result_data = $result;

		return new StaticData\StaticItemListDto($result, $this);
	}

	/**
	 *   Retrieves item by its unique ID.
	 *
	 * @cli-name get-item
	 * @cli-namespace static-data
	 *
	 * @param int $item_id
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticItemDto
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticItem( int $item_id, string $locale = 'en_US', string $version = null ): StaticData\StaticItemDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticItem", $item_id, $locale, $version);

		// Create missing data
		$result['id'] = $item_id;
		$this->result_data = $result;

		return new StaticData\StaticItemDto($result, $this);
	}

	/**
	 *   Retrieve language strings data.
	 *
	 * @cli-name get-language-strings
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticLanguageStringsDto
	 * @throws ReflectionException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 * @throws ReflectionException
	 */
	public function getStaticLanguageStrings( string $locale = 'en_US', string $version = null ): StaticData\StaticLanguageStringsDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticLanguageStrings", $locale, $version);
		return new StaticData\StaticLanguageStringsDto($result, $this);
	}

	/**
	 *   Retrieve supported languages data.
	 *
	 * @cli-name get-languages
	 * @cli-namespace static-data
	 *
	 * @return array
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticLanguages(): array
	{
		return $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticLanguages");
	}

	/**
	 *   Retrieve map data.
	 *
	 * @cli-name get-maps
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticMapDataDto
	 * @throws ReflectionException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 * @throws ReflectionException
	 */
	public function getStaticMaps( string $locale = 'en_US', string $version = null ): StaticData\StaticMapDataDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticMaps", $locale, $version);
		return new StaticData\StaticMapDataDto($result, $this);
	}

	/**
	 *   Retrieves mastery list.
	 *
	 * @cli-name get-masteries
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticMasteryListDto
	 * @throws ReflectionException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticMasteries( string $locale = 'en_US', string $version = null ): StaticData\StaticMasteryListDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticMasteries", $locale, $version);
		return new StaticData\StaticMasteryListDto($result, $this);
	}

	/**
	 *   Retrieves mastery by its unique ID.
	 *
	 * @cli-name get-mastery
	 * @cli-namespace static-data
	 *
	 * @param int $mastery_id
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticMasteryDto
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticMastery( int $mastery_id, string $locale = 'en_US', string $version = null ): StaticData\StaticMasteryDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticMastery", $mastery_id, $locale, $version);
		return new StaticData\StaticMasteryDto($result, $this);
	}

	/**
	 *   Retrieve profile icon list.
	 *
	 * @cli-name get-profile-icons
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticProfileIconDataDto
	 * @throws ReflectionException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticProfileIcons( string $locale = 'en_US', string $version = null ): StaticData\StaticProfileIconDataDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticProfileIcons", $locale, $version);
		return new StaticData\StaticProfileIconDataDto($result, $this);
	}

	/**
	 *   Retrieve realm data. (Region versions)
	 *
	 * @cli-name get-realm
	 * @cli-namespace static-data
	 *
	 * @return StaticData\StaticRealmDto
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
    public function getStaticRealm(): StaticData\StaticRealmDto
    {
	    $result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticRealms", $this->getSetting($this::SET_REGION));
	    return new StaticData\StaticRealmDto($result, $this);
    }

	/**
	 *   Retrieve reforged rune path.
	 *
	 * @cli-name get-reforged-rune-paths
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticReforgedRunePathList
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException|ReflectionException
	 */
    public function getStaticReforgedRunePaths( string $locale = 'en_US', string $version = null ): StaticData\StaticReforgedRunePathList
    {
	    $result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticReforgedRunes", $locale, $version);

	    // Create missing data
	    $r = [];
	    foreach ($result as $path)
		    $r[$path['id']] = $path;
	    $result = [ 'paths' => $r ];
	    $this->result_data = $result;

	    return new StaticData\StaticReforgedRunePathList($result, $this);
    }

	/**
	 *   Retrieve reforged rune path.
	 *
	 * @cli-name get-reforged-runes
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticReforgedRuneList
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 * @throws ReflectionException
	 */
    public function getStaticReforgedRunes( string $locale = 'en_US', string $version = null ): StaticData\StaticReforgedRuneList
    {
	    $result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticReforgedRunes", $locale, $version);

	    // Create missing data
	    $r = [];
	    foreach ($result as $path)
	    {
		    foreach ($path['slots'] as $slot)
		    {
			    foreach ($slot['runes'] as $item)
			    {
				    $r[$item['id']] = $item;
			    }
		    }
	    }
	    $result = [ 'runes' => $r ];
	    $this->result_data = $result;

	    return new StaticData\StaticReforgedRuneList($result, $this);
    }

	/**
	 *   Retrieves rune list.
	 *
	 * @cli-name get-runes
	 * @cli-namespace static-data
	 *
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticRuneListDto
	 * @throws ReflectionException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 * @throws ReflectionException
	 */
	public function getStaticRunes( string $locale = 'en_US', string $version = null ): StaticData\StaticRuneListDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticRunes", $locale, $version);
		return new StaticData\StaticRuneListDto($result, $this);
	}

	/**
	 *   Retrieves rune by its unique ID.
	 *
	 * @cli-name get-rune
	 * @cli-namespace static-data
	 *
	 * @param int $rune_id
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticRuneDto
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticRune( int $rune_id, string $locale = 'en_US', string $version = null ): StaticData\StaticRuneDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticRune", $rune_id, $locale, $version);
		return new StaticData\StaticRuneDto($result, $this);
	}

	/**
	 *   Retrieves summoner spell list.
	 *
	 * @cli-name get-summoner-spells
	 * @cli-namespace static-data
	 *
	 * @param bool $data_by_key
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticSummonerSpellListDto
	 * @throws ReflectionException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticSummonerSpells( bool $data_by_key = false, string $locale = 'en_US', string $version = null ): StaticData\StaticSummonerSpellListDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticSummonerSpells", $locale, $version, $data_by_key);
		return new StaticData\StaticSummonerSpellListDto($result, $this);
	}

	/**
	 *   Retrieves summoner spell by its unique numeric key.
	 *
	 * @cli-name get-summoner-spell
	 * @cli-namespace static-data
	 *
	 * @param int $summoner_spell_id
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticSummonerSpellDto
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticSummonerSpell( int $summoner_spell_id, string $locale = 'en_US', string $version = null ): StaticData\StaticSummonerSpellDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticSummonerSpellById", $summoner_spell_id, $locale, $version);
		return new StaticData\StaticSummonerSpellDto($result, $this);
	}

	/**
	 *   Retrieves summoner spell by its unique string identifier.
	 *
	 * @cli-name get-summoner-spell-by-key
	 * @cli-namespace static-data
	 *
	 * @param string $summoner_spell_key
	 * @param string $locale
	 * @param string|null $version
	 *
	 * @return StaticData\StaticSummonerSpellDto
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticSummonerSpellByKey( string $summoner_spell_key, string $locale = 'en_US', string $version = null ): StaticData\StaticSummonerSpellDto
	{
		$result = $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticSummonerSpell", $summoner_spell_key, $locale, $version);
		return new StaticData\StaticSummonerSpellDto($result, $this);
	}

	/**
	 *   Retrieve version data.
	 *
	 * @cli-name get-versions
	 * @cli-namespace static-data
	 *
	 * @return array
	 * @throws RequestException
	 * @throws ServerException
	 * @throws SettingsException
	 */
	public function getStaticVersions(): array
	{
		return $this->_makeStaticCall("RiotAPI\\DataDragonAPI\\DataDragonAPI::getStaticVersions");
	}


	/**
	 * ==================================================================dd=
	 *     Status Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#lol-status-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_STATUS = '1514:lol-status';
	const RESOURCE_STATUS_VERSION = 'v4';

	/**
	 *   Get status data - shard list.
	 *
	 * @cli-name get
	 * @cli-namespace status
	 *
	 * @param string|null $override_region
	 *
	 * @return Objects\PlatformDataDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#lol-status-v4/GET_getPlatformData
	 */
	public function getPlatformData( string $override_region = null ): ?Objects\PlatformDataDto
	{
		if ($override_region)
			$this->setTemporaryRegion($override_region);

		$resultPromise = $this->setEndpoint("/lol/status/" . self::RESOURCE_STATUS_VERSION . "/platform-data")
			->setResource(self::RESOURCE_STATICDATA, "/platform-data")
			->makeCall();

		if ($override_region)
			$this->unsetTemporaryRegion();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\PlatformDataDto($result, $this);
		});
	}


	/**
	 * ==================================================================dd=
	 *     Match Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#match-v5
	 * ==================================================================dd=
	 **/
	const RESOURCE_MATCH = '1530:match';
	const RESOURCE_MATCH_VERSION = 'v5';

	/**
	 *   Retrieve match IDs by a PUUID.
	 *
	 * @cli-name get-ids-by-puuid
	 * @cli-namespace match
	 *
	 * @param string      $puuid
	 * @param int|null    $queue Filter the list of match ids by a specific queue id. This filter is mutually inclusive of the type filter meaning any match ids returned must match both the queue and type filters.
	 * @param string|null $type  Filter the list of match ids by the type of match. This filter is mutually inclusive of the queue filter meaning any match ids returned must match both the queue and type filters.
	 * @param int|null    $start Start index.
	 * @param int|null    $count Valid values: 0 to 100. Number of match ids to return.
	 * @param int|null    $startTime Epoch timestamp in seconds. The matchlist started storing timestamps on June 16th, 2021. Any matches played before June 16th, 2021 won't be included in the results if the startTime filter is set.
	 * @param int|null    $endTime Epoch timestamp in seconds.
	 *
	 * @return string[]|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#match-v5/GET_getMatchIdsByPUUID
	 */
	public function getMatchIdsByPUUID(string $puuid, int $queue = null, string $type = null, int $start = null, int $count = null, int $startTime = null, int $endTime = null): ?array
	{
		if ($type && !in_array($type, self::MATCH_ALLOWED_TYPES))
			throw new RequestParameterException('Value of match type (type) is invalid. Allowed values: ' . implode(', ', self::MATCH_ALLOWED_TYPES));

		if ($start && $start < 0)
			throw new RequestParameterException('Start index (start) must be greater than or equal to 0.');

		if ($count && ($count < 0 || $count > 100))
			throw new RequestParameterException('Count of results (count) must be between 0 and 100.');

		$continent_region = $this->platforms->getCorrespondingContinentRegion($this->getSetting(self::SET_REGION));

		$resultPromise = $this->setEndpoint("/lol/match/" . self::RESOURCE_MATCH_VERSION . "/matches/by-puuid/$puuid/ids")
			->setResource(self::RESOURCE_MATCH, "/matches/by-puuid/%s/ids")
			->addQuery("queue", $queue)
			->addQuery("type", $type)
			->addQuery("start", $start)
			->addQuery("count", $count)
			->addQuery("startTime", $startTime)
			->addQuery("endTime", $endTime)
			->makeCall($continent_region);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return $result ?? [];
		});
	}

	/**
	 *   Retrieve match by match ID.
	 *
	 * @cli-name get
	 * @cli-namespace match
	 *
	 * @param string $match_id
	 *
	 * @return Objects\MatchDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#match-v5/GET_getMatch
	 */
	public function getMatch(string $match_id): ?Objects\MatchDto
	{
		$continent_region = $this->platforms->getCorrespondingContinentRegion($this->getSetting(self::SET_REGION));

		$resultPromise = $this->setEndpoint("/lol/match/" . self::RESOURCE_MATCH_VERSION . "/matches/$match_id")
			->setResource(self::RESOURCE_MATCH, "/matches/%s")
			->makeCall($continent_region);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\MatchDto($result, $this);
		});
	}

	/**
	 *   Retrieve match timeline by match ID.
	 *
	 * @cli-name get-timeline
	 * @cli-namespace match
	 *
	 * @param string $match_id
	 *
	 * @return Objects\MatchTimelineDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 * @throws ReflectionException
	 *
	 * @link https://developer.riotgames.com/apis#match-v5/GET_getTimeline
	 */
	public function getTimeline(string $match_id): ?Objects\MatchTimelineDto
	{
		$continent_region = $this->platforms->getCorrespondingContinentRegion($this->getSetting(self::SET_REGION));

		$resultPromise = $this->setEndpoint("/lol/match/" . self::RESOURCE_MATCH_VERSION . "/matches/$match_id/timeline")
			->setResource(self::RESOURCE_MATCH, "/matches/%s/timeline")
			->makeCall($continent_region);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\MatchTimelineDto($result, $this);
		});
	}


	/**
	 * ==================================================================dd=
	 *     Summoner Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#summoner-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_SUMMONER = '1416:summoner';
	const RESOURCE_SUMMONER_VERSION = 'v4';

	/**
	 *   Get single summoner object for a given summoner ID.
	 *
	 * @cli-name get
	 * @cli-namespace summoner
	 *
	 * @param string $encrypted_summoner_id
	 *
	 * @return Objects\SummonerDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#summoner-v4/GET_getBySummonerId
	 */
	public function getSummoner( string $encrypted_summoner_id ): ?Objects\SummonerDto
	{
		$resultPromise = $this->setEndpoint("/lol/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/$encrypted_summoner_id")
			->setResource(self::RESOURCE_SUMMONER, "/summoners/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\SummonerDto($result, $this);
		});
	}

	/**
	 *   Get summoner for a given summoner name.
	 *
	 * @cli-name get-by-name
	 * @cli-namespace summoner
	 *
	 * @param string $summoner_name
	 *
	 * @return Objects\SummonerDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#summoner-v4/GET_getBySummonerName
	 */
	public function getSummonerByName( string $summoner_name ): ?Objects\SummonerDto
	{
		if (trim($summoner_name) === '') {
			throw new RequestParameterException('Provided summoner name must not be empty');
		}

		$resultPromise = $this->setEndpoint("/lol/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/by-name/$summoner_name")
			->setResource(self::RESOURCE_SUMMONER, "/summoners/by-name/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\SummonerDto($result, $this);
		});
	}

	/**
	 *   Get single summoner object for a given summoner's account ID.
	 *
	 * @cli-name get-by-account-id
	 * @cli-namespace summoner
	 *
	 * @param string $encrypted_account_id
	 *
	 * @return Objects\SummonerDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#summoner-v4/GET_getByAccountId
	 */
	public function getSummonerByAccountId( string $encrypted_account_id ): ?Objects\SummonerDto
	{
		$resultPromise = $this->setEndpoint("/lol/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/by-account/$encrypted_account_id")
			->setResource(self::RESOURCE_SUMMONER, "/summoners/by-account/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\SummonerDto($result, $this);
		});
	}

	/**
	 *   Get single summoner object for a given summoner's PUUID.
	 *
	 * @cli-name get-by-puuid
	 * @cli-namespace summoner
	 *
	 * @param string $encrypted_puuid
	 *
	 * @return Objects\SummonerDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#summoner-v4/GET_getByPUUID
	 */
	public function getSummonerByPUUID( string $encrypted_puuid ): ?Objects\SummonerDto
	{
		$resultPromise = $this->setEndpoint("/lol/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/by-puuid/$encrypted_puuid")
			->setResource(self::RESOURCE_SUMMONER, "/summoners/by-puuid/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\SummonerDto($result, $this);
		});
	}


	/**
	 * ==================================================================dd=
	 *     Tournament Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#tournament-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_TOURNAMENT = '1436:tournament';
	const RESOURCE_TOURNAMENT_VERSION = 'v4';

	/**
	 *   Creates set of tournament codes for given tournament.
	 *
	 * @cli-name create-codes
	 * @cli-namespace tournament
	 *
	 * @param int $tournament_id
	 * @param int $count
	 * @param TournamentCodeParameters $parameters
	 *
	 * @return array
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws RequestParameterException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-v4/POST_createTournamentCode
	 */
	public function createTournamentCodes( int $tournament_id, int $count, TournamentCodeParameters $parameters ): array
	{
		if ($this->getSetting(self::SET_INTERIM, false))
			return $this->createTournamentCodes_STUB($tournament_id, $count, $parameters);

		if ($parameters->teamSize <= 0)
			throw new RequestParameterException('Team size (teamSize) must be greater than or equal to 1.');

		if ($parameters->teamSize >= 6)
			throw new RequestParameterException('Team size (teamSize) must be less than or equal to 5.');

		if (in_array($parameters->pickType, self::TOURNAMENT_ALLOWED_PICK_TYPES, true) == false)
			throw new RequestParameterException('Value of pick type (pickType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_PICK_TYPES));

		if (in_array($parameters->mapType, self::TOURNAMENT_ALLOWED_MAPS, true) == false)
			throw new RequestParameterException('Value of map type (mapType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_MAPS));

		if (in_array($parameters->spectatorType, self::TOURNAMENT_ALLOWED_SPECTATOR_TYPES, true) == false)
			throw new RequestParameterException('Value of spectator type (spectatorType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_SPECTATOR_TYPES));

		$parameter_array = get_object_vars($parameters);
		if (empty($parameters->allowedSummonerIds))
		{
			unset($parameter_array['allowedSummonerIds']);
		}
		else
		{
			if ($parameters->teamSize * 2 > count($parameters->allowedSummonerIds))
				throw new RequestParameterException('Not enough players to fill teams (more participants required). If you wish to allow anyone do not fill "allowedSummonerIds" field.');
		}
		$data = json_encode($parameter_array);

		$resultPromise = $this->setEndpoint("/lol/tournament/" . self::RESOURCE_TOURNAMENT_VERSION . "/codes")
			->setResource(self::RESOURCE_TOURNAMENT, "/codes")
			->addQuery('tournamentId', $tournament_id)
			->addQuery('count', $count)
			->setData($data)
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS, self::METHOD_POST);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return $result;
		});
	}

	/**
	 *   Updates tournament code's settings.
	 *
	 * @cli-name edit-code
	 * @cli-namespace tournament
	 *
	 * @param string $tournament_code
	 * @param Objects\TournamentCodeUpdateParameters $parameters
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws RequestParameterException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-v4/PUT_updateCode
	 */
	public function editTournamentCode( string $tournament_code, TournamentCodeUpdateParameters $parameters )
	{
		if ($this->getSetting(self::SET_INTERIM, false))
			throw new RequestException('This endpoint is not available in interim mode.');

		if (in_array($parameters->pickType, self::TOURNAMENT_ALLOWED_PICK_TYPES, true) == false)
			throw new RequestParameterException('Value of pick type (pickType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_PICK_TYPES));

		if (in_array($parameters->mapType, self::TOURNAMENT_ALLOWED_MAPS, true) == false)
			throw new RequestParameterException('Value of map type (mapType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_MAPS));

		if (in_array($parameters->spectatorType, self::TOURNAMENT_ALLOWED_SPECTATOR_TYPES, true) == false)
			throw new RequestParameterException('Value of spectator type (spectatorType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_SPECTATOR_TYPES));

		$data = json_encode($parameters);

		$resultPromise = $this->setEndpoint("/lol/tournament/" . self::RESOURCE_TOURNAMENT_VERSION . "/codes/$tournament_code")
			->setResource(self::RESOURCE_TOURNAMENT, "/codes/%s")
			->setData($data)
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS, self::METHOD_PUT);

		$this->resolveOrEnqueuePromise($resultPromise);
	}

	/**
	 *   Retrieves tournament code settings for given tournament code.
	 *
	 * @cli-name get-code-data
	 * @cli-namespace tournament
	 *
	 * @param string $tournament_code
	 *
	 * @return Objects\TournamentCodeDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-v4/GET_getTournamentCode
	 */
	public function getTournamentCodeData( string $tournament_code ): ?Objects\TournamentCodeDto
	{
		if ($this->getSetting(self::SET_INTERIM, false))
			throw new RequestException('This endpoint is not available in interim mode.');

		$resultPromise = $this->setEndpoint("/lol/tournament/" . self::RESOURCE_TOURNAMENT_VERSION . "/codes/$tournament_code")
			->setResource(self::RESOURCE_TOURNAMENT, "/codes/%s")
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\TournamentCodeDto($result, $this);
		});
	}

	/**
	 *   Creates a tournament provider and returns its ID.
	 *
	 * @cli-name create-provider
	 * @cli-namespace tournament
	 *
	 * @param ProviderRegistrationParameters $parameters
	 *
	 * @return int
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws RequestParameterException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-v4/POST_registerProviderData
	 */
	public function createTournamentProvider( ProviderRegistrationParameters $parameters ): int
	{
		if ($this->getSetting(self::SET_INTERIM, false))
			return $this->createTournamentProvider_STUB($parameters);

		if (empty($parameters->url))
			throw new RequestParameterException('Callback URL (url) may not be empty.');

		if (in_array(strtolower($parameters->region), self::TOURNAMENT_ALLOWED_REGIONS, true) == false)
			throw new RequestParameterException('Value of region (region) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_REGIONS));

		$parameters->region = strtoupper($parameters->region);

		$data = json_encode($parameters, JSON_UNESCAPED_SLASHES);

		$resultPromise = $this->setEndpoint("/lol/tournament/" . self::RESOURCE_TOURNAMENT_VERSION . "/providers")
			->setResource(self::RESOURCE_TOURNAMENT, "/providers")
			->setData($data)
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS, self::METHOD_POST);

		return $this->resolveOrEnqueuePromise($resultPromise, function(int $result) {
			return $result;
		});
	}

	/**
	 *   Creates a tournament and returns its ID.
	 *
	 * @cli-name create-tournament
	 * @cli-namespace tournament
	 *
	 * @param TournamentRegistrationParameters $parameters
	 *
	 * @return int
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws RequestParameterException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-v4/POST_registerTournament
	 */
	public function createTournament( TournamentRegistrationParameters $parameters ): int
	{
		if ($this->getSetting(self::SET_INTERIM, false))
			return $this->createTournament_STUB($parameters);

		if (empty($parameters->name))
			throw new RequestParameterException('Tournament name (name) may not be empty.');

		if ($parameters->providerId <= 0)
			throw new RequestParameterException('ProviderID (providerId) must be greater than or equal to 1.');

		$data = json_encode($parameters, JSON_UNESCAPED_SLASHES);

		$resultPromise = $this->setEndpoint("/lol/tournament/" . self::RESOURCE_TOURNAMENT_VERSION . "/tournaments")
			->setResource(self::RESOURCE_TOURNAMENT, "/tournaments")
			->setData($data)
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS, self::METHOD_POST);

		return $this->resolveOrEnqueuePromise($resultPromise, function(int $result) {
			return $result;
		});
	}

	/**
	 *   Gets a list of lobby events by tournament code.
	 *
	 * @cli-name get-lobby-events
	 * @cli-namespace tournament
	 *
	 * @param string $tournament_code
	 *
	 * @return Objects\LobbyEventDtoWrapper
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-v4/GET_getLobbyEventsByCode
	 */
	public function getTournamentLobbyEvents( string $tournament_code ): Objects\LobbyEventDtoWrapper
	{
		if ($this->getSetting(self::SET_INTERIM, false))
			return $this->getTournamentLobbyEvents_STUB($tournament_code);

		$resultPromise = $this->setEndpoint("/lol/tournament/" . self::RESOURCE_TOURNAMENT_VERSION . "/lobby-events/by-code/$tournament_code")
			->setResource(self::RESOURCE_TOURNAMENT, "/lobby-events/by-code/%s")
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\LobbyEventDtoWrapper($result, $this);
		});
	}


	/**
	 * ==================================================================dd=
	 *     Tournament Stub Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#tournament-stub-v4
	 * ==================================================================dd=
	 **/
	const RESOURCE_TOURNAMENT_STUB = '1435:tournament-stub';
	const RESOURCE_TOURNAMENT_STUB_VERSION = 'v4';

	/**
	 *   Create a mock tournament code for the given tournament.
	 *
	 * @param int $tournament_id
	 * @param int $count
	 * @param TournamentCodeParameters $parameters
	 *
	 * @return array|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws RequestParameterException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-stub-v4/POST_createTournamentCode
	 *
	 * @internal
	 */
	public function createTournamentCodes_STUB( int $tournament_id, int $count, TournamentCodeParameters $parameters ): ?array
	{
		if ($parameters->teamSize <= 0)
			throw new RequestParameterException('Team size (teamSize) must be greater than or equal to 1.');

		if ($parameters->teamSize >= 6)
			throw new RequestParameterException('Team size (teamSize) must be less than or equal to 5.');

		if (in_array($parameters->pickType, self::TOURNAMENT_ALLOWED_PICK_TYPES, true) == false)
			throw new RequestParameterException('Value of pick type (pickType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_PICK_TYPES));

		if (in_array($parameters->mapType, self::TOURNAMENT_ALLOWED_MAPS, true) == false)
			throw new RequestParameterException('Value of map type (mapType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_MAPS));

		if (in_array($parameters->spectatorType, self::TOURNAMENT_ALLOWED_SPECTATOR_TYPES, true) == false)
			throw new RequestParameterException('Value of spectator type (spectatorType) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_SPECTATOR_TYPES));

		$parameter_array = get_object_vars($parameters);
		if (empty($parameters->allowedSummonerIds))
		{
			unset($parameter_array['allowedSummonerIds']);
		}
		else
		{
			if ($parameters->teamSize * 2 > count($parameters->allowedSummonerIds))
				throw new RequestParameterException('Not enough players to fill teams (more participants required). If you wish to allow anyone do not fill "allowedSummonerIds" field.');
		}
		$data = json_encode($parameter_array);

		$resultPromise = $this->setEndpoint("/lol/tournament-stub/" . self::RESOURCE_TOURNAMENT_STUB_VERSION . "/codes")
			->setResource(self::RESOURCE_TOURNAMENT, "/codes")
			->addQuery('tournamentId', $tournament_id)
			->addQuery('count', $count)
			->setData($data)
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS, self::METHOD_POST);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return $result;
		});
	}

	/**
	 *   Creates a mock tournament provider and returns its ID.
	 *
	 * @param ProviderRegistrationParameters $parameters
	 *
	 * @return int|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws RequestParameterException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-stub-v4/POST_registerProviderData
	 *
	 * @internal
	 */
	public function createTournamentProvider_STUB( ProviderRegistrationParameters $parameters ): ?int
	{
		if (empty($parameters->url))
			throw new RequestParameterException('Callback URL (url) may not be empty.');

		if (in_array(strtolower($parameters->region), self::TOURNAMENT_ALLOWED_REGIONS, true) == false)
			throw new RequestParameterException('Value of region (region) is invalid. Allowed values: ' . implode(', ', self::TOURNAMENT_ALLOWED_REGIONS));

		$parameters->region = strtoupper($parameters->region);

		$data = json_encode($parameters, JSON_UNESCAPED_SLASHES);

		$resultPromise = $this->setEndpoint("/lol/tournament-stub/" . self::RESOURCE_TOURNAMENT_STUB_VERSION . "/providers")
			->setResource(self::RESOURCE_TOURNAMENT_STUB, "/providers")
			->setData($data)
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS, self::METHOD_POST);

		return $this->resolveOrEnqueuePromise($resultPromise, function(int $result) {
			return $result;
		});
	}

	/**
	 *   Creates a mock tournament and returns its ID.
	 *
	 * @param TournamentRegistrationParameters $parameters
	 *
	 * @return int|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws RequestParameterException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-stub-v4/POST_registerTournament
	 *
	 * @internal
	 */
	public function createTournament_STUB( TournamentRegistrationParameters $parameters ): ?int
	{
		if (empty($parameters->name))
			throw new RequestParameterException('Tournament name (name) may not be empty.');

		if ($parameters->providerId <= 0)
			throw new RequestParameterException('ProviderID (providerId) must be greater than or equal to 1.');

		$data = json_encode($parameters, JSON_UNESCAPED_SLASHES);

		$resultPromise = $this->setEndpoint("/lol/tournament-stub/" . self::RESOURCE_TOURNAMENT_STUB_VERSION . "/tournaments")
			->setResource(self::RESOURCE_TOURNAMENT_STUB, "/tournaments")
			->setData($data)
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS, self::METHOD_POST);

		return $this->resolveOrEnqueuePromise($resultPromise, function(int $result) {
			return $result;
		});
	}

	/**
	 *   Gets a mock list of lobby events by tournament code.
	 *
	 * @param string $tournament_code
	 *
	 * @return Objects\LobbyEventDtoWrapper|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tournament-stub-v4/GET_getLobbyEventsByCode
	 *
	 * @internal
	 */
	public function getTournamentLobbyEvents_STUB( string $tournament_code ): ?Objects\LobbyEventDtoWrapper
	{
		$resultPromise = $this->setEndpoint("/lol/tournament-stub/" . self::RESOURCE_TOURNAMENT_STUB_VERSION . "/lobby-events/by-code/$tournament_code")
			->setResource(self::RESOURCE_TOURNAMENT_STUB, "/lobby-events/by-code/%s")
			->useKey(self::SET_TOURNAMENT_KEY)
			->makeCall(IRegion::AMERICAS);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\LobbyEventDtoWrapper($result, $this);
		});
	}


	/**
	 * ==================================================================dd=
	 *     Fake Endpoint for testing purposes
	 * ==================================================================dd=
	 **/

	/**
	 * @internal
	 *
	 * @param             $specs
	 * @param string|null $region
	 * @param string|null $method
	 *
	 * @return mixed
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 */
	public function makeTestEndpointCall( $specs, string $region = null, string $method = null ): mixed
	{
		$resultPromise = $this->setEndpoint("/lol/test-endpoint/v0/$specs")
			->setResource("v0", "/lol/test-endpoint/v0/%s")
			->makeCall($region ?: null, $method ?: self::METHOD_GET);

		return $this->resolveOrEnqueuePromise($resultPromise, function($result) {
			return $result;
		});
	}
}
