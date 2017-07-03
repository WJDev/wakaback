<?php
namespace WJDev\Wakaback;

/**
 * Class DB
 * @package WakaBack
 */
class DB
{

    /**
     * @var
     */
    private static $instance;

    /**
     * @return \PDO
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new \PDO(
                'mysql:dbname=' . Config::$db . ';host=' . Config::$dbhost,
                Config::$dbuser,
                Config::$dbpass
            );
        }
        return self::$instance;
    }

    /**
     * enforce singleton
     */
    private function __construct()
    {
    }
    /**
     * prevent cloning
     */
    private function __clone()
    {
    }

    /**
     * @param array $languages
     * @param $timeframe
     * @return bool
     */
    public static function insertLangs(array $languages, $timeframe)
    {
        $date = self::formatDate($timeframe);
        $stmt = static::getInstance()->prepare(
            "insert into daily_langs (logdate, language, percent) values (:logdate, :lang, :percent)"
        );
        $stmt->bindValue(':logdate', $date, \PDO::PARAM_STR);

        foreach ($languages as $k => $v) {
            $stmt->bindValue(':lang', $v['name'], \PDO::PARAM_STR);
            $stmt->bindValue(':percent', $v['percent'], \PDO::PARAM_STR);
            $stmt->execute();
        }
        return true;
    }
    /**
     * @param array $projects
     * @param $timeframe
     * @return bool
     */
    public static function insertProjects(array $projects, $timeframe)
    {
        $date = self::formatDate($timeframe);
        $stmt = static::getInstance()->prepare(
            "insert into projects (logdate, name, total_time_mins, total_time_hours) \
              values (:logdate, :project, :mins, :hours)"
        );
        $stmt->bindValue(':logdate', $date, \PDO::PARAM_STR);
        foreach ($projects as $k => $v) {
            $stmt->bindValue(':project', $v['name'], \PDO::PARAM_STR);
            $stmt->bindValue(':mins', $v['minutes'], \PDO::PARAM_INT);
            $stmt->bindValue(':hours', $v['hours'], \PDO::PARAM_INT);
            $stmt->execute();
        }
        return true;
    }
    /**
     * @param array $totals
     * @param $timeframe
     * @return bool
     */
    public static function insertTotals(array $totals, $timeframe)
    {
        $date = self::formatDate($timeframe);
        $stmt = static::getInstance()->prepare(
            "insert into daily_totals (logdate, total_mins, total_hours) values (:logdate, :mins, :hours)"
        );
        $stmt->bindValue(':logdate', $date, \PDO::PARAM_STR);
        $stmt->bindValue(':mins', $totals['minutes'], \PDO::PARAM_INT);
        $stmt->bindValue(':hours', $totals['hours'], \PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    /**
     * @param array $userdata
     * @return bool
     */
    public static function insertUser(array $userdata)
    {
        $stmt = static::getInstance()->prepare(
            "insert into users (email, wakaid, plan, public_name, timezone) values (:email, :wakaid, :plan, :public_name, :timezone)"
        );
        $stmt->bindValue(':email', $userdata['email'], \PDO::PARAM_STR);
        $stmt->bindValue(':wakaid', $userdata['id'], \PDO::PARAM_STR);
        $stmt->bindValue(':plan', $userdata['plan'], \PDO::PARAM_STR);
        $stmt->bindValue(':public_name', $userdata['public_name'], \PDO::PARAM_STR);
        $stmt->bindValue(':timezone', $userdata['timezone'], \PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    /**
     * @param $timestamp
     * @return string
     */
    private static function formatDate($timestamp)
    {
        $logdate = new \DateTime($timestamp);
        return $logdate->format('Y-m-d');
    }
}
