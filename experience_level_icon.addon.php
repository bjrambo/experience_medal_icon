<?php
    if(!defined("__XE__")) exit;

    /**
    * @file experience_level_icon.addon.php
    * @author CONORY (http://www.conory.com)
    * @brief 경험치 레벨 아이콘 표시 애드온
    **/
	
	if($called_position != 'before_display_content' || Context::get('act') == 'dispPageAdminContentModify' || Context::getResponseMethod() != 'HTML' || isCrawler() || !is_dir('./modules/experience'))
	{
		return;
	}

	require_once(_XE_PATH_ . 'addons/experience_level_icon/experience_level_icon.lib.php');
	
	$temp_output = preg_replace_callback('!<(div|span|a)([^\>]*)member_([0-9\-]+)([^\>]*)>(.*?)\<\/(div|span|a)\>!is', 'experienceLevelIconTrans', $output);
	if($temp_output)
	{
		$output = $temp_output;
	}
	unset($temp_output);