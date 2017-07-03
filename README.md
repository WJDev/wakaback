# [WakaBack](https://github.com/ElanMan/wakaback)

A command line utility to back up data from wakatime using it's API, created and maintained by [Ben Hall](http://twitter.com/elanman).


## Quick start

Either:

* [Download the latest release](https://github.com/ElanMan/wakaback/archive/master.zip).
* [Clone the repo](https://github.com/ElanMan/wakaback.git).


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
* Amend Base/Config.php credentials
* Create a MySQL database called 'waka'
* Import res/waka.sql with either PhpMyAdmin or mysql 'source' command
* run manually 'php cron.php' or install as a cron job (see sample res/crontab.txt)

## Author

**Ben Hall**

+ <http://twitter.com/elanman>
+ <http://github.com/elanman>

## Copyright and license

Copyright 2014 Ben Hall under [MIT](LICENSE).