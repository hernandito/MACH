<?php
//================================================================================
//		-= Your Local Weather =- US only sorry!
//	Please go to he following web site and select your state 
//  http://w1.weather.gov/xml/current_obs/ and then you closest city. 
//	Click on  the XML link and copy the last 4 letters (something like KNYC for 
//  New York City) and enter those it the variable below.
//================================================================================
	$showweather = "yes";
	$myweather = "KNYC";

// Default page to open on the large frame... Please note that Google and other
// sites do not permit opening their page within a frame.
//================================================================================
	//$mydefaulturl = "http://forum.xbmc.org";
	$mydefaulturl = "rss.php";
//================================================================================
//		-= Hard Drive Size Display
//	In order for this to work, the hard drives need to be either local, or they 
//  need to be mounted via the network. I only have experience with this on
//	my web server which runs on Ubuntu Server. Please enter mount points below.
//	
//================================================================================
	$showharddrives = "yes";
	$myharddrivesize1 = "/data";
//	In order to get the array size, you MUST map something in your Apache or NGINX docker 
//	to the array. Place that mapping above. I mapped /mnt/user/media to /data in my Docker.
	
	$myharddrivedesc1 = "array: ";

	$myharddrivesize2 = "/config";
	$myharddrivedesc2 = "cache: ";
//	The above is assuming you have your appdata folder in yuor cache drive.	
	
//================================================================================
//		-= RSS Feed Page =-
//	This is one of the principal components of this package. It allow you to view 
//  most of your system activities in one page. In addition, from your NZB providers,
//  will show you the latest HD Movie releases. When loaded, this page refreshes every
//  30 minutes to update the latest releases. myharddrivesize1
//	
//	
//================================================================================	
	$enablerss = "yes";   	//toggles the display of the menu to see this page.
		// No real need to change the URL unless you 
		// need to host this page on a different server. 
		// This will disable some really awesome SB, CP and XBMC functions
				$rssURL = "rss.php";
//================================================================================
//		Configure your Sab, Sickbeard, CP, Headphones, etc
//			Edit the links below - if a link is left blank, the menu
//			item will not show up; but will impact really other cool features.
//		If you see an internal IP option, these will be used in operations that the server will 
//		execute inside your network and then present it externally. This is done to speed up
//		certain operations.
//
//================================================================================================
// Your SabNZBD URL and Full API Key. 
	$mySabURL = "http://server.com:88"; 			// no trailing BACKSLASH!
	$mySabAPI = "4a05";
	
	
		//========================================================================================
		// This link below shows up in a small frame off the main menu. I have installed the 	
		// Sab Knockstrap Skin available at: https://github.com/aforty/sabnzbd-knockstrap		
		// In your SabNZBD > Config > General, set this skin as your Secondary Web Interface. 	
		// To enable it please make sure your link below ends in "/m" without the quotes.		
				$mySabURLMobile = "http://server.com:88/m"; 									
		//========================================================================================
		
// Your Maraschino URL. - Make sure to include Port
	$myMaraURL = "http://server.com:7000"; 	

// Your HTPC Manager URL. 
	$myHTPCMan = "http://192.168.0.201:9991"; 		
	
	
// Your Sickbeard URL. - Make sure to include Port
	$mySickbeardURL = "http://192.168.0.201:8081/sick";				// Please include http:// and don't include anything after the port.
	$mySickbeardURLinternal = "http://192.168.0.201:8081/sick";		// Please include http:// and don't include anything after the port.
	$mySickbeardAPI = "9b";  // This is SickRage
	//$mySickbeardAPI = "e5f";   // This is Sickbeard mr.Orange
//================================================================================
//		-= Couchpotato Section  =-
//================================================================================
// Your Couchpotato URL. - Make sure to include Port
	$myCouchpotatoURL = "https://server.com/couch"; 			// Please include http:// and don't include anything after the port.
	$myCouchpotatoURLinternal = "http://192.168.0.201:5000/couch"; 	// Please include http:// and don't include anything after the port.
	$myCouchpotatoAPI = "fbf";
//	Movie Profile ID's
//	You can find these by going to the Sidebar, and click on CP tab. Click "Profile" button.
	$myCouchpotato720ID = "8c142f751c46426dbfdeffcd73353205";	// The profile ID for 720p resolution. 
	$myCouchpotato1080ID = "f54d0e94a7d940c69c333f39193436fa";	// The profile ID for 1080p resolution. 
//================================================================================	

// Your Headphones URL. - Make sure to include Port
	$myHeadphonesURL = "http://server.com:8091/home"; 	

// Your Subsonic URL. - Make sure to include Port
	$mySubsonicURL = "http://server.com:4040"; 	

// Your RU Torrent URL. 
	$myRutorrentURL = "https://server.com/rutorrent/"; 	

// Your Plex Server URL. 
	// Note that this link will not be available 
	// outside of your network unless you open the port
	$myPlexURL = "http://192.168.0.201:32400/web/index.html#!/dashboard"; 	

	
// 
	$myNZBGetURL = "http://user:pasword@192.168.0.201:6789/";




//================================================================================
//		-= MySQL Server For RSS Feed Storage =-	
//  IMPORTANT... also manually update the file parsealldeeds.php to include the
//  MySQL Server IP number
	
$MysqlRSSServer = "192.168.0.201";
$MysqlRSSUser = "root";
$MysqlRSSPassword = "abc";

	
//================================================================================
//		-= Your XBMC HTPC Machines =-
//	Please Note that IP addresses need to be accessible from within 
//  the network of your Web Host server. These IP's do NOT need to
//	be available outside of your network. Web server will execute
//	all queries within network, and present the info to the outside.
//================================================================================
//	This first XBMC Machine will be the Main one used to get library items. 
//  The others are used only for "Reboot" and "Shutdown" commands.
//================================================================================
	$xbmcIP1 = "192.168.0.103";			// Can be an internal IP address or a domain name (if you use/have one) - do NOT include the http portion of url.
	$xbmcdesc1 = "Bedroom";					// Friendly name to identify the HTPC
	$xbmcport1 = "80";					// Port that XBMC uses.
	$xbmcusername1 = "xbmc";				// Username
	$xbmcpassword1 = "xbmc";			// Password. can be left blank if not using password; note a blank PW is dangerous if port is open on your router.
	$xbmcIP1internal = "192.168.0.103";		// Internal IP address of your XBMC machine. Used for internal server calls.
	$isportopen1 = "yes";					// Is this port open on your router and machine available outside your network. 
		
	$xbmcIP2 = "192.168.0.101";
	$xbmcdesc2 = "Living Room";
	$xbmcport2 = "80";
	$xbmcusername2 = "xbmc";	
	$xbmcpassword2 = "";	
	$xbmcIP2internal = "192.168.0.101";	

//================================================================================
//		IMPOIRTANT - The below is what is used to get all the XBMC recent stuff - Abive is superseded

$xbmcprefix = "xbmc:xbmc@192.168.0.103:80";   	
//$xbmcprefix = "xbmc:xbmc@192.168.0.102:80";   			//Living room
//$xbmcprefix = "xbmc:xbmc@192.168.0.201:8080";  		// This does not work kodi-headless


// Number of recent movies to show on Home page when using large browser window. (bigger displays than 1920x1280)
$numberrecentmvies = 32;

//Are we on an iPad? this is used to render various elements accordingly.
$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");

//================================================================================
	
	$xbmcIP3 = "";
	$xbmcdesc3 = "";
	$xbmcport3 = "";
	$xbmcusername3 = "xbmc";	
	$xbmcpassword3 = "";	
		
	$xbmcIP4 = "";
	$xbmcdesc4 = "";
	$xbmcport4 = "";
	$xbmcusername4 = "xbmc";	
	$xbmcpassword4 = "";	
		
	$xbmcIP5 = "";
	$xbmcdesc5 = "";
	$xbmcport5 = "";
	$xbmcusername5 = "xbmc";	
	$xbmcpassword5 = "";	
		



//================================================================================
//		-= Configure the Top Menu Bar Items =-
//			Edit the links below
//================================================================================

// Enable First Image Menu Button with Sub-menus
		$enablemenu1 = "yes";  								// Do you want to use this first menu? Use "yes" or "no" in all lower-case
		$menu1image = "includes/images/minirtv.png";		// Image must be 19x19 pixels. Recommend using a .png file w/ transparency.
		$menu1link = "http://server.com";  					// Paste the url of the link you want

		$menu1sub1link = "http://server.com/browse?t=7020";	// The URL for the first sub-menu
		$menu1sub1desc = "eBook List";						// The Name for the first sub-menu - repeat as needed below.

		$menu1sub2link = "http://server.com/phpmyadmin/";
		$menu1sub2desc = "PhpMyAdmin";


		$menu1sub5link = "";								// If you want to not use the sub-menu, leave blank as shown on this line
		$menu1sub5desc = "Link 5";

		
// ====================================================================
//		Configure the Text Buttons on Top Menu
// ====================================================================	
	
// Hint: I use direct links to NZB Indexers where I am a member. If URL
// is left blank "", this menu will not show up.
		
		$menuURL2 = "http://nzbs.org/browse?t=2040";
		$menudesc2 = "NZBs.org";

		$menuURL3 = "https://dognzb.cr/browse/2040";
		$menudesc3 = "DOGnzb";
		
		$menuURL4 = "http://nzb.su/browse?t=2040";
		$menudesc4 = "NZB.su";		
		
		$menuURL5 = "https://omgwtfnzbs.org/browse?cat=16";
		$menudesc5 = "OMGWTFnzb";	
		
		$menuURL6 = "https://www.oznzb.com/movies";
		$menudesc6 = "OZnzb";
		
		$menuURL7 = "";
		$menudesc7 = "";
		
		$menuURL8 = "";
		$menudesc8 = "";
		
		$menuURL9 = "";
		$menudesc9 = "";
		
		$menuURL10 = "";
		$menudesc10 = "";
		
// ====================================================================
//		Configure the Text Button w/ Sub Menus on Top Menu
// ====================================================================	
	
// ===============================================
//		Configure the Top Menu Bar Items
//			Edit the links below
// ===============================================

// Enable First Text Submenu Group 
	$enablemenu11 = "yes";  									// Do you want to use this menu? Use "yes" or "no" in all lower-case
	$menu11desc = "Torrents";  									// The name at the top of the sub-menu

			$menu11sublink1 = "http://on.iptorrents.com/torrents/?l48=&q=&qf=";		// The URL for the first sub-menu
			$menu11subdesc1 = "IP Torrents";										// The Name for the first sub-menu - repeat as needed below.

			$menu11sublink2 = "https://publichd.se/index.php?page=torrents&search=&active=1&category=2%3B5";
			$menu11subdesc2 = "PublicHD";

			$menu11sublink3 = "http://www.warez-bb.org/index.php";
			$menu11subdesc3 = "WarezBB";

			$menu11sublink4 = "http://www.torrentleech.org/";	//
			$menu11subdesc4 = "TorrentLeech";

			$menu11sublink5 = "https://hd-space.org/index.php?page=torrents";	//  
			$menu11subdesc5 = "HD-Space";		 
			
			$menu11sublink6 = "https://waffles.fm/browse.php?type=&userid=&q=&c=41";	//   
			$menu11subdesc6 = "Waffle.FM";		
			
			$menu11sublink7 = "http://forum.cgpersia.com/";								// If you want to not use the sub-menu, leave blank as shown on this line
			$menu11subdesc7 = "CGPersia";		

			$menu11sublink8 = "http://cgpeers.com/";								
			$menu11subdesc8 = "CGPeers";	

			$menu11sublink9 = "http://51render.com/";								
			$menu11subdesc9 = "51render";	
			
			$menu11sublink10 = "http://thepiratebay.se";								
			$menu11subdesc10 = "PirateBay";			
			
			$menu11sublink11 = "";								
			$menu11subdesc11 = "";	
		
		
////////////////////////////////////////
// Enable Text w/Image Submenu Group 
		$enablemenu12 = "yes";  									// Do you want to use this menu? Use "yes" or "no" in all lower-case
		$menu12desc = "Forums";  									// The name at the top of the sub-menu

		$menu12sublink1 = "http://www.newznabforums.com/";			// The URL for the first sub-menu
		$menu12image1 = "includes/images/nnforum.png";				// Ensure images are 140px wide by 50px high.

		$menu12sublink2 = "http://forums.sabnzbd.org/index.php";
		$menu12image2 = "includes/images/sabforum.png";

		$menu12sublink3 = "http://forum.xbmc.org/index.php";
		$menu12image3 = "includes/images/xbmc.png";

		$menu12sublink4 = "http://openelec.tv/forum/recent";
		$menu12image4 = "includes/images/openelec.png";

		$menu12sublink5 = "http://lime-technology.com/forum/index.php";		
		$menu12image5 = "includes/images/unraid.png";		

		$menu12sublink6 = "http://forums.maraschinoproject.com/index.php";								
		$menu12image6 = "includes/images/maraschino.png";	

		$menu12sublink7 = "";								
		$menu12image7 = "";	
		
		$menu12sublink8 = "";								
		$menu12image8 = "";	
		
		$menu12sublink9 = "";								
		$menu12image9 = "";	
		
		$menu12sublink10 = "";								
		$menu12image10 = "";	
		
////////////////////////////////////////		
// Enable Another Plain Text Submenu Group 
		$enablemenu13 = "yes";  									// Do you want to use this menu? Use "yes" or "no" in all lower-case
		$menu13desc = "Databases";  									// The name at the top of the sub-menu

		$menu13sublink1 = "";										// The URL for the first sub-menu
		$menu13subdesc1 = "";										// The Name for the first sub-menu - repeat as needed below.

		$menu13sublink2 = "http://www.themoviedb.org/";
		$menu13subdesc2 = "TheMovieDB";

		$menu13sublink3 = "http://thetvdb.com/";
		$menu13subdesc3 = "TheTVDB";

		$menu13sublink4 = "http://www.joblo.com/blu-rays-dvds/release-dates/?";
		$menu13subdesc4 = "DVD Releases";

		$menu13sublink5 = "http://www.movieweb.com/movies/2014";								
		$menu13subdesc5 = "2014 Movies";		

		$menu13sublink6 = "http://www.rottentomatoes.com/news/";								
		$menu13subdesc6 = "Rotten Tomatoes";	

		$menu13sublink7 = "http://www.zergnet.com/";								
		$menu13subdesc7 = "ZergNet";	
		
		$menu13sublink8 = "http://www.rlslog.net/category/movies/hdrip/";								
		$menu13subdesc8 = "RlsLog.net";	
		
		$menu13sublink9 = "http://www.scnsrc.me/category/films/bluray/";								
		$menu13subdesc9 = "ScnSrc.me";	
		
		$menu13sublink10 = "";								
		$menu13subdesc10 = "";	
		
////////////////////////////////////////	
// Enable Yet Another Plain Text Submenu Group 
		$enablemenu14 = "no";  									// Do you want to use this menu? Use "yes" or "no" in all lower-case
		$menu14desc = "Shortcuts";  									// The name at the top of the sub-menu

		$menu14sublink1 = "";										// The URL for the first sub-menu
		$menu14subdesc1 = "";										// The Name for the first sub-menu - repeat as needed below.

		$menu14sublink2 = "";
		$menu14subdesc2 = "";

		$menu14sublink3 = "";
		$menu14subdesc3 = "";

		$menu14sublink4 = "";
		$menu14subdesc4 = "";

		$menu14sublink5 = "";								
		$menu14subdesc5 = "";		

		$menu14sublink6 = "http://www.rottentomatoes.com/news/";								
		$menu14subdesc6 = "Rotten Tomatoes";	

		$menu14sublink7 = "";								
		$menu14subdesc7 = "";	
		
		$menu14sublink8 = "";								
		$menu14subdesc8 = "";	
		
		$menu14sublink9 = "";								
		$menu14subdesc9 = "";	
		
		$menu14sublink10 = "";								
		$menu14subdesc10 = "";	
//================================================================================
// Show a button link to a page that displays all movies in your XBMC collection
//	$enableallmovies = "yes";
// Superceded - this functionality is now added to sidebar
//================================================================================

//Number or Albums to Show in Recently Added Albums
//================================================================================
	$numrecentalbums = "6";		// Enables the Diplay of the Trakt 


//================================================================================
//				-= Trakt.tv Trending Movies and TV Shows =-
//	Shows a list of the trending Movies and TV shows. Good to see what others
//	are watching. You will need an account and an API Key from http://trakt.tv 
//
//	Trakt posters are big files and tend to be slow to download. Be patient with
//	this. 
//================================================================================
	$enableTrakTrending = "yes";		// Enables the Diplay of the Trakt 
										// trending Movies and TV Shows.
										
	$mytraktAPI = "31";	// Your Trakt API Key
	
	$TraktNumberOfMovies = "22";		//	The number of Movie posters to display
	$MovieIconSizetrakt = "76"; 		//	Height of the posters in pixels.
	
	$TraktNumberOfTVShows = "22";		//	The number of TV posters to display
	$TVIconSizetrakt = "76"; 			//	Height of the posters in pixels.	

//================================================================================
//		              		 -= Rotten Tomatoes =-
//================================================================================
//	We feature the ability to display the latest movies and DVD releases from 
//  Rotten Tomatoes. We also have the ability to interact with these lists and
//	your library. In order to use this, you need an account with Rotten Tomatoes
//	and get your own API Key. To get an account, please register at:
//	http://developer.rottentomatoes.com/member/register
//	And enter you API Key below.
//================================================================================
	$RottenTomatoesAPI = "7k";

	
//================================================================================
//		              	 -= Your NZB Providers =-
//================================================================================
//	I have attempted to properly parse the RSS feeds from some of the best known 
//  NZB providers. I am not a member at all of them, nor do I have any invites
//  to offer. PLEASE DON'T ASK. If you have other providers that are not included,
//  hopefully the generic Newznab provider will scrape all the correct information
//  for you. 
//
//	Members of some of these providers have provided me with the code to try to
//	extract the information for HD movie releases. If you are a member of a place
//	not listed here, chances are that the generic Newznab feed parser will get the
//	job done. If not feel free to ask for help from others.
//
//	==============================
//	FOR NZB.su and OMGWTFNzb Only
//	==============================
//	There are some feeds have we havn't been able to parse properly. NZB.su is one 
//	of them. We have been able to parse this one ONLY via the titles only. OMGWTFNzb
//	is one that does not include posters in their RSS feeds. So for these two
//	providers, we offer the ability to show their feed as a text only list. The
//	releases are properly linked; its only that you get no posters. If you have
//	either of these providers please follow these instruction to properly 
//	configure:
//
//	Go to the provider web site and obtian the url for the feed you would like to
//	use. this feed will inlcude the site API key along with the category you want.
//	Open this link on your browser and in the address that opens up, change the 
//	portion of the link that reads dl=1 to dl=0. Refresh browser to make sure it
//	still works. Your link should look something like:
//
//		https://api.nzb.su/rss?t=2040&dl=0&i=123456&r=your-api-key-here
//		https://rss.omgwtfnzbs.org/rss-download.php?catid=16&user=yourrusername&api=yourapi
//
//	Copy this link to your clipboard. If this web site is hosted and
//  accesible at http://mydomain.com, type the following into your web browser: 
//		http://mydomain.com/includes/required/feed2js/build.php
//	On the page that opens up, paste the URL for the RSS feed. Click on the 
//	"Generate Javascript" button. Copy the generated link code to your clipboard.
//	Open the file "settings.ini" and paste the generated code as follow:
//			Paste the OMGWTF code into Feed6 (near end of file)
//			Paste the NZB.su code into Feed6 (near end of file)
//	Leave all other items empty.
//
//	=========================
//	All Other NZB Providers
//	=========================
//	For all others simple enter information below. If you are using a provider not 
//	listed here, paste the URL for the rss below. For the unlisted provider, you
//	will have to create a graphic for the logo that is 90 degrees. Please see sample
//	of provided logos in folder /included/images/ and edit to your needs. If the 
//	URL you have for the provider includes a string like &num= followed by a 
//	number, change that number to be the number of posters you want to display. If it 
//	does have it, add that at the end of the url; like &num=20. Also make sure the
//	string &dl=0 and NOT &dl=1. The 0 takes you to the release web page, the 1 
//	downloads the NZB. This web site is geared for displaying the web page.
//
//==========================================================================================================
//
//			  				-= Predefined Newznab Providers =-
//
//==========================================================================================================
//	NZBs.org
//==========================================================================================================
	$enableNZBS = "yes";											// Enable this provider
	$NZBdotorgRSS = "http://nzbs.org/rss?t=2040&dl=0&i=20015&r=apinumberhere";
	$MovieIconSizenzb = "100"; 										// Height of the posters in pixels.
	$NZBdotorgLogoImage = "includes/images/logo_smallnzbs90.png";	// Provider Logo Image
	$NZBdotorgLandingPage = "http://nzbs.org/browse?t=2040";		// The landing page when you click on logo
//==========================================================================================================
//	DOGNzb
//==========================================================================================================
	$enableDog = "yes";											// Enable this provider
	$DogNzbRSS = "https://dognzb.cr/rss.cfm?r=apinumberhere=2040&dl=0&num=28";
	$MovieIconSizedog = "100";									// Height of the posters in pixels.	
	$DogNzbLogoImage = "includes/images/logo_small90.png";		// Provider Logo Image
	$DogNzbLandingPage = "https://dognzb.cr/browse/2040";		// The landing page when you click on logo
//==========================================================================================================
//	OZNzb OzNzbRSS
//==========================================================================================================	
	$enableOZ= "yes";											//Enable this provider
	$OzNzbRSS = "https://www.oznzb.com/rss?t=2040&dl=0&i=61034&r=apinumberhere&num=28";
	$MovieIconSizeoz = "80"; 									//	Height of the posters in pixels.	
	$OzNzbLogoImage = "includes/images/oznzb902.png";			// Provider Logo Image
	$OzNzbLandingPage = "https://www.oznzb.com/movies";		// The landing page when you click on logo
//==========================================================================================================
//	NzbTV
//==========================================================================================================	
	$enableNZBTV= "yes";									// Enable this provider
	$NzbTVRSS = "https://nzbtv.net/rss?t=2040&dl=0&i=15868&r=apinumberhere&num=21";
	$MovieIconSizeNzbtv = "80"; 							// Height of the posters in pixels.
	$NzbTVLogoImage = "includes/images/nzbtv902.png";		// Provider Logo Image
	$NzbTVLandingPage = "http://nzbtv.net/movies?t=2040";	// The landing page when you click on logo	
//==========================================================================================================
//	NZBNDX - Looks like site is DEAD
//==========================================================================================================	
	$enableNZBNDX = "yes";										// Enable this provider
	$NZBNDXRSS = "https://www.nzbndx.com/rss?t=2040&dl=0&i=53666&r=apinumberhere&num=28";
	$MovieIconSizeNZBNDX = "120"; 									// Height of the posters in pixels.
	$NZBNDXLogoImage = "includes/images/nzbndx90.png";	// Provider Logo Image
	$NZBNDXLandingPage = "https://www.nzbndx.com/movies?t=2040";						// The landing page when you click on logo	

//==========================================================================================================
//	NZBcat
//==========================================================================================================	
	$enableNZBcat = "Qyes";										// Enable this provider
	$NZBcatRSS = "https://nzb.cat/rss?t=2040&dl=0&i=1494&r=apinumberhere&num=21";
	$MovieIconSizeNZBcat = "120"; 									// Height of the posters in pixels.
	$NZBcatLogoImage = "includes/images/nzbcat90.png";				// Provider Logo Image
	$NZBcatLandingPage = "https://nzb.cat/movies?t=2040";			// The landing page when you click on logo		

//==========================================================================================================
//	NZBFinder.ws
//==========================================================================================================	
	$enableNZBfinder = "yes";										// Enable this provider
	$NZBfinderRSS = "https://nzbfinder.ws/rss?t=2040&dl=0&i=73543&r=apinumberhere&num=21";
	$MovieIconSizeNZBfinder = "135"; 									// Height of the posters in pixels.
	$NZBfinderLogoImage = "includes/images/nzbfinder.jpg";				// Provider Logo Image
	$NZBfinderLandingPage = "https://nzbfinder.ws/movies?t=2040";			// The landing page when you click on logo		
	
	

//==========================================================================================================
//	NZBGeek
//==========================================================================================================	
	$enableNZBNerds = "yes";										// Enable this provider
	$NZBNerdsRSS = "https://api.nzbgeek.info/rss?t=2040&num=50&r=apinumberhere";
	
	
	$MovieIconSizeNZBcat = "120"; 									// Height of the posters in pixels.
	$NZBnerdsLogoImage = "includes/images/nzbgeek90.png";				// Provider Logo Image
	$NZBnerdsLandingPage = "https://nzbgeek.info/geekseek.php?movielist=1&c=2040&browsecategory=2040";			// The landing page when you click on logo		

	
	
	
//==========================================================================================================
//			  						-= Combined Display =-
//	To avoid wasted space due to the use of many feeds, you can combine any 2 feeds into a single display
//	container. You can use both the Predefined Provider Feeds and/or the Generic feeds. Just if you use
//	one of them, make sure you disable in the other location so you don't get duplicate displays. On
//	example below, I will combine the OZNzb and NzbTV feeds. Notice how we disabled them above.
//
//	Please note that OZnzb's RSS feed does not include IMDB ID information. Because of this, we cannot link
//	to the IMDB site, nor are we able to search for TRAILERS. Below, if one of your dual sites is OZnzb,
//	please enter "yes" if it is, so we can disable trailker search and IMDB linking.
//==========================================================================================================		
	$enableDualFeed = "no";						// Enable use of combined display
	
	$CombinedRSS1isOZ = "Xyes";						// Is this OZnzb.com? Enter yes if it is.			
	$CombinedRSS1 = "https://www.oznzb.com/rss?t=2040&dl=0&i=61034&r=apinumberhere&num=18";
	$CombinedIconSize1 = "80";									// Height of the posters in pixels.	
	$CombinedLogoImage1 = "includes/images/oznzb902.png";	// Provider Logo Image
	$CombinedLandingPage1 = "https://www.oznzb.com/movies";	// The landing page when you click on logo	
	
	$CombinedRSS2isOZ = "no";						// Is this OZnzb.com? Enter yes if it is.	
	$CombinedRSS2 = "http://nzbtv.net/rss?t=2040&dl=0&i=15868&r=apinumberhere&num=18";
	$CombinedIconSize2 = "80";									// Height of the posters in pixels.	
	$CombinedLogoImage2 = "includes/images/nzbtv902.png";	// Provider Logo Image
	$CombinedLandingPage2 = "http://nzbtv.net/movies?t=2040";	// The landing page when you click on logo	
	
	
//==========================================================================================================
//									TEXT ONLY PROVIDERs
//			  			-= OMGWTFNzb and Nzb.su Providers Only =-
//	Please read instructions above. There are 3 ways of configuring these. If you ONLY have one of the
//	providers, enable it individually below. If you have BOTH providers, you can either combine the two
//	of them unto a single display; or you can enable them individually so they appear each on their own
//	display. 
//
//==========================================================================================================	
	$enableOMG= "yes";											//Enable this provider
	$OMGRSS = "https://rss.omgwtfnzbs.org/rss-info.php?catid=16";

	$enableNzbsu= "yes";											//Enable this provider
	$NzbsuRSS = "https://api.nzb.su/rss?t=2040&dl=0&i=127565&r=apinumberhere";	
	
	$enablecombo = "no";		// THIS DOES NOT WORK enable both OMGWTFNzb and Nzb.su providers unto single display
	$enableOMGdisplay = "yes"; 	// Enable OMGWTFNzb on its own display
	$enableNZBdotsu = "no";		// Enable Nzb.su on its own display
//==========================================================================================================	



//==========================================================================================================
//									 TEXT ONLY RSS FEED
//			  					-= RlsLog and SceneSouce =-
//	These feeds are NOT NZB providers,; nor do you need accounts. These web sites simply announce scene 
//	releases for new HD movies. Helpful to see what should be appearing in your NZB providers soon.
//
//==========================================================================================================	
	$enableRlsLog = "Qyes";		// enable both Rls.log and SceneSource providers unto single display
//==========================================================================================================	

	

//==========================================================================================================
//
//			  			-= Generic Newznab Providers =-
//
//==========================================================================================================
//	Generic Provider 1
//==========================================================================================================		
	$enableGeneric1	= "no";									//Enable this provider -type "yes" to enable
	$GenericRSS1 = "http://website.com/rss?t=2040&dl=0&i=1&r=theapikey&num=31";
	$GenericIconSize1 = "80"; 								//	Height of the posters in pixels.			
	$GebnericLogoImage1 = "includes/images/logo90.png";
	$GenericLandingPage1 = "";								// The site's landing page when you click on the logo
//==========================================================================================================
//	Generic Provider 2
//==========================================================================================================		
	$enableGeneric2	= "no";									//Enable this provider
	$GenericRSS2 = "http://website.com/rss?t=2040&dl=0&i=1&r=theapikey&num=31";
	$GenericIconSize2 = "80"; 								//	Height of the posters in pixels.			
	$GebnericLogoImage2 = "includes/images/logo90.png";
	$GenericLandingPage2 = "";								// The site's landing page when you click on the logo
//==========================================================================================================
//	Generic Provider 3
//==========================================================================================================		
	$enableGeneric3	= "no";									//Enable this provider
	$GenericRSS3 = "http://website.com/rss?t=2040&dl=0&i=1&r=theapikey&num=31";
	$GenericIconSize3 = "80"; 								//	Height of the posters in pixels.			
	$GebnericLogoImage3 = "includes/images/logo90.png";
	$GenericLandingPage3 = "";								// The site's landing page when you click on the logo
//==========================================================================================================
//	Generic Provider 4
//==========================================================================================================		
	$enableGeneric4	= "no";									//Enable this provider
	$GenericRSS4 = "http://website.com/rss?t=2040&dl=0&i=1&r=theapikey&num=31";
	$GenericIconSize4 = "80"; 								//	Height of the posters in pixels.			
	$GebnericLogoImage4 = "includes/images/logo90.png";
	$GenericLandingPage4 = "";								// The site's landing page when you click on the logo
//==========================================================================================================
//	Generic Provider 5
//==========================================================================================================		
	$enableGeneric5	= "no";									//Enable this provider
	$GenericRSS5 = "http://website.com/rss?t=2040&dl=0&i=1&r=theapikey&num=31";
	$GenericIconSize5 = "80"; 								//	Height of the posters in pixels.			
	$GebnericLogoImage5 = "includes/images/logo90.png";
	$GenericLandingPage5 = "";								// The site's landing page when you click on the logo	
	

	
	
?>
