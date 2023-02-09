<?php

use Abraham\TwitterOAuth\TwitterOAuth;

# Define constants
define('TWEET_LIMIT', 1);
define('TWITTER_USERNAME', 'melvinkoopmans');
//define('CONSUMER_KEY', 'LLv66LZpc2TCYiyST10PqpgPE');
//define('CONSUMER_SECRET', 'NJYlMW8tOjIC9CnSZofM0hGj1R5XSAnQYL4OZgFIKNFtk8Rb9D');
define('CONSUMER_KEY', 'qpltpBIR4XQtl3ZZh3stOJVpz');
define('CONSUMER_SECRET', 'pKMxSDMcDkbW5e36ggbXEEE7n2VSRL54SjuEsY3mKMyHvakXzj');
//define('ACCESS_TOKEN', '227249693-Jkg6rRlTaMe4dPE96wF8HbYu4SNEHavK10soHq9H');
//define('ACCESS_TOKEN_SECRET', 'zaBFDw8jN0kJDM1lDaZg6rN4dXtSAjFgoPFJw9RNPItdu');
define('ACCESS_TOKEN', '227249693-ZrawLzxvXKlSZIY1z96O2lKslkZmh1gAeLBTvD6d');
define('ACCESS_TOKEN_SECRET', 'pez6Wm0dW3xKlOKOvBOZ10sazcXmzxye5lmgxQf6VMIrc');



$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$connection->setApiVersion('2');
$content = $connection->get("users/2751993467/tweets");

$latest_tweet = $content->data[0]->text;

$regex = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $latest_tweet);
$regex = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $regex);
$regex = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $regex);
$regex = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $regex);


$tweet = array();
$tweet['text'] = $regex;


?>
