# MACH
##Media Acquisition Control Hub


![apache-le](https://raw.githubusercontent.com/hernandito/MACH/master//includes/images/logo-m.png)


Requires and Apache or NGINX server. Just place contents inside your /www folder

This uses SabNZBD, Sickrage and Couchpotato. You need to edit the file config.php to 

You need to have a MySQL database Docker running. Please create TWO new databases in MySQL:

One should be named "rssfeeds" (without the quotes)
The second should be name "nytimes"

Note that you will need to know which user and password are erquired to access these two databases.

To automate getting the latest HD movie releases from the various indexer sites, you need to add the following cron job to your Apache/NGINX server or Docker. The latest HD movies will update every 30 minutes. The latest NY TImes Bestseller Books will be twice a week. Check the paths below so they correspond to the correct location.
```
0,30 * * * * php /config/www/portal/parseallfeeds.php
0 0 * * 1,4 php /config/www/portal/parseallnytimes2.php
```


**My wish list **
(but lack skills to implement):
* A system for creating additional modular features.
* Create additional RSS scrapers for other NZBIndexers. 
* Make the NZB scrfaper a more optional modular feature. If user rely more on torrent trackers, create a module for scraping torrent RSS feeds.
* Create Sonarr module as an option to Sickrage
* Create NZBGet module to use instead of SabNZBd.
* An easier way to configure user settings that do not involve config.php
* Better setup for the following features (currently require hard coding):
** IP Camera Setup
** Calibre Integration
** User's shortcuts.php and bookmarks.php
** Weather and Time