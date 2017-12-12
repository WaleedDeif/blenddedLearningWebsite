<?php
function download_link($folder,$file_name,$download_title,$not_files_domain = FALSE){
	$first_sha = sha1(md5(sha1($folder.$file_name.$download_title)));
    $download_link = $GLOBALS['files_domain'];
    $download_link .= "?n=".$file_name;
    $download_link .= "&f=".$folder;
    $download_link .= "&s=".$first_sha;
    if($not_files_domain !== FALSE){
    	$download_link .= "&usr=".$not_files_domain;
    }
    $download_link .= "&ct=".md5(sha1(sha1($first_sha)));
    $download_link .= "&t=".$download_title;
    $download_link .= "&sypr=".sha1($download_title);
    return $download_link;
}
?>