<?php

namespace WJDev\Wakaback\Helpers;

use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Psr7\Response;
use WJDev\Wakaback\Config;

/**
 * Class Waka
 * @package WakaBack
 */
class Waka
{
    private $dailyUrl = 'https://wakatime.com/api/v1/summary/daily/';
    private $userUrl = 'https://wakatime.com/api/v1/users/current/';
    private $start;
    private $end;
    private $client;
    public $endpoint;
    public $params = [];



    /**
     * @param $timeframe
     * @return array
     */
    public function getData(array $timeframe)
    {
        $data = [];
        //call the wakatime API through Guzzle and return some data
        $wakaurl = new WakaUrl(
            new \DateTime($timeframe['start'] . ' 00:00'),
            new \DateTime($timeframe['end'] .' 23:59'),
            $timeframe['dailystats']
        );
        $client = new Client();
        try {
            $response = $client->request('GET', $wakaurl->endpoint, $wakaurl->params);
            $data = $this->parseResponse($response);
        } catch (RequestException $e) {
            // no data for that timeframe
        }
        return $data;
    }

    private function parseResponse(Response $response)
    {
        $ret = false;
        if ($response->getBody()) {
            $data = json_decode($response->getBody(), true);
            //user data is 1d array, daily stats is 2d array
            //return either 1d or 2d array
            $ret = isset($data['data'][0]) ? $data['data'][0] : $data['data'];
        }
        return $ret;
    }

    private function buildUrl(\DateTime $start, \DateTime $end, $dailystats)
    {
        if ($dailystats) {
            $this->params['query'] = ['start' => $start, 'end' => $end, 'api_key' => Config::$apikey];
        } else {
            $this->params['query'] = ['api_key' => Config::$apikey];
        }
    }
}
