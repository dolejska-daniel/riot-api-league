<?php

namespace RiotAPI\LeagueAPI\Objects;

/**
 *   Class ClashTeamDto
 *
 * Used in:
 *   clash (v1)
 *     - @see LeagueAPI::getTeamById
 * @link https://developer.riotgames.com/apis#clash-v1/GET_getTeamById
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class ClashTeamDto extends ApiObject
{
    /**
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var string $id
     */
    public string $id;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var int $tournamentId
     */
    public int $tournamentId;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var string $name
     */
    public string $name;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var int $iconId
     */
    public int $iconId;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var int $tier
     */
    public int $tier;

    /**
     * Summoner ID of the team captain.
     *
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var string $captain
     */
    public string $captain;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var string $abbreviation
     */
    public string $abbreviation;

    /**
     * Team members.
     *
     * Available when received from:
     *   - @see LeagueAPI::getTeamById
     *
     * @var PlayerDto[] $players
     */
    public array $players;
}