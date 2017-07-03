<?php

namespace WJDev\Wakaback\Helpers;

use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Psr7\Response;

/**
 * Class Waka
 * @package WakaBack
 */
class Waka
{
    /**
     * @param $timeframe
     * @return array
     */
    public static function getData(array $timeframe)
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
            $data = self::parseResponse($response);
        } catch (RequestException $e) {
            // no data for that timeframe
        }
        return $data;
    }

    private static function parseResponse(Response $response)
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
}
