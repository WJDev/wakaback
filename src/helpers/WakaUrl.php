<?php

namespace WJDev\WakaBack\Helpers;

use WJDev\WakaBack\Config;

/**
 * Class WakaUrl
 * @package WakaBack
 */
class WakaUrl
{
    private $wakaDailyUrl = 'https://wakatime.com/api/v1/summary/daily/';
    private $wakaUserUrl = 'https://wakatime.com/api/v1/users/current/';
    private $start;
    private $end;
    public $endpoint;
    public $params = [];
    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @param bool $dailystats
     */
    public function __construct(\DateTime $start, \DateTime $end, $dailystats)
    {
        $this->start = $start->getTimestamp();
        $this->end = $end->getTimestamp();
        $this->build($dailystats);
    }
    /**
     * @param bool $dailystats
     */
    public function build($dailystats)
    {
        $this->endpoint = $this->wakaDailyUrl;
        if ($dailystats) {
            $this->endpoint = $this->wakaDailyUrl;
            $this->params['query'] = ['start' => $this->start, 'end' => $this->end, 'api_key' => Config::$apikey];
        } else {
            $this->endpoint = $this->wakaUserUrl;
            $this->params['query'] = ['api_key' => Config::$apikey];
        }
    }
}
