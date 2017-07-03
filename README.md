# [WakaBack](https://github.com/WJDev/wakaback)

A command line utility to back up data from wakatime using it's API, created and maintained by [Ben Hall](http://twitter.com/elanman).


## Quick start

Either:

* [Download the latest release](https://github.com/ElanMan/wakaback/archive/master.zip).
* [Clone the repo](https://github.com/WJDev/wakaback.git).


### What's included

Within the download you'll find the following directories and files:


    /
    ├── Base/
    │   ├── Helpers/
    │       ├── DataLogger.php
    │       ├── ParseResponse.php
    │       ├── WakaUrl.php
    │       ├── GetWakaData.php
    │   ├── Config.php
    │   ├── DB.php
    ├── res/
    │   ├── crontab.txt
    │   ├── waka.sql
    ├── .gitignore
    ├── cron.php
    ├── LICENSE
    ├── readme.md


## Installation

* cd into project root
* Run composer install
* Create a MySQL database called 'waka'
* Amend Config-Sample.php credentials and rename file to Config.php
* Import res/waka.sql with either PhpMyAdmin or mysql 'source' command
* run manually 'php cron.php' or install as a cron job (see sample res/crontab.txt)

## Organisation

**William James Development**

+ <https://twitter.com/WJamesDev>
+ <https://github.com/WJDev>

## Author

**Ben Hall**

+ <http://twitter.com/elanman>
+ <http://github.com/elanman>

## Copyright and license

Copyright 2017 Willam James Devlopment under [MIT](LICENSE).