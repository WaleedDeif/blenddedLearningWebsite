<link href="<?php echo $site_data; ?>css/topic.css" rel="stylesheet">
<?php
$topics = 7;
if(isset($GLOBALS['get_page_all'][1]) && !empty($GLOBALS['get_page_all'][1])){
	$req_open_topic = $GLOBALS['get_page_all'][1];
	$req_open_topic_number = str_replace("topic-", '', $req_open_topic);
	if(is_numeric($req_open_topic_number)){
		require("topics/t{$req_open_topic_number}.php");
	}else{goto NoTopic;}
}else{
	NoTopic:
	redir($GLOBALS['domain'],0);
}
?>