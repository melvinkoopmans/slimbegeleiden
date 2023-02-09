<?php

use Abraham\TwitterOAuth\TwitterOAuth;

# Define constants
define('TWEET_LIMIT', 1);
define('TWITTER_USERNAME', 'melvinkoopmans');
define('CONSUMER_KEY', 'LLv66LZpc2TCYiyST10PqpgPE');
define('CONSUMER_SECRET', 'NJYlMW8tOjIC9CnSZofM0hGj1R5XSAnQYL4OZgFIKNFtk8Rb9D');
define('ACCESS_TOKEN', '227249693-Jkg6rRlTaMe4dPE96wF8HbYu4SNEHavK10soHq9H');
define('ACCESS_TOKEN_SECRET', 'zaBFDw8jN0kJDM1lDaZg6rN4dXtSAjFgoPFJw9RNPItdu');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$content = $connection->get("statuses/user_timeline", array('screen_name' => $twitter_naam, 'count' => 1));

if (!empty($content->errors)) {
  return;
}

$latest_tweet = $content[0]->text;
$latest_tweet_date = $content[0]->created_at;

$regex = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $latest_tweet);
$regex = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $regex);
$regex = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $regex);
$regex = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $regex);

$date = date_create($latest_tweet_date);
$date = date_format($date, 'g:i A - d M Y');

$tweet = array();
$tweet['text'] = $regex;
$tweet['date'] = $date;


?>