<?php

namespace RiotAPI\LeagueAPI\Objects;

class PlayerClientPreferencesDto extends ApiObject
{
    public string $bannerAccent;
    public string $title;
    /** @var int[] $challengeIds */
    public array $challengeIds;
    public string $crestBorder;
    public int $prestigeCrestBorderLevel;
}