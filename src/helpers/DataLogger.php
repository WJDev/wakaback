<?php
namespace WJDev\Wakaback\Helpers;

/**
 *
 * @todo create new userlog function for user data
 * @todo make constructor accept $timeframe as an array
 */
use WJDev\WakaBack\DB;

/**
 * Class DataLogger
 * @package WakaBack
 */
class DataLogger
{
    private $data = [];
    private $timeframe = [];
    /**
     * @param array $data
     * @param array $timeframe
     */
    public function __construct(array $data, array $timeframe)
    {
        $this->data = $data;
        $this->timeframe = $timeframe;
    }
    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    /**
     * @return array
     */
    public function getTimeframe()
    {
        return $this->timeframe;
    }
    /**
     * @param array $timeframe
     */
    public function setTimeframe(array $timeframe)
    {
        $this->timeframe = $timeframe;
    }
    /**
     * @return bool
     */
    public function log()
    {
        if ($this->timeframe['dailystats']) {
            if (! empty($this->data['languages'])) {
                DB::insertLangs($this->data['languages'], $this->timeframe['end']);
            }
            if (! empty($this->data['projects'])) {
                DB::insertProjects($this->data['projects'], $this->timeframe['end']);
            }
            if (! empty($this->data['grand_total'])) {
                DB::insertTotals($this->data['grand_total'], $this->timeframe['end']);
            }
        } else //only user data has been returned
        {
            DB::insertUser($this->data);
        }
        return true;
    }
}
