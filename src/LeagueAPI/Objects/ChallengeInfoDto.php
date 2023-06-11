<?php

namespace RiotAPI\LeagueAPI\Objects;

class ChallengeInfoDto extends ApiObject
{
    public int $challengeId;
    public float $percentile;
    public ?int $position = null;
    public ?int $playersInLevel = null;
    public string $level;
    public float $value;
    public ?int $achievedTime = null;
}