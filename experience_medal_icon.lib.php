<?php

/**
 * @brief 경험치 레벨 아이콘 변경
 */
function experienceLevelIconTrans($matches)
{	
	$member_srl = $matches[3];
	if($member_srl < 1) return $matches[0];
	$orig_text = preg_replace('/' . preg_quote($matches[5], '/') . '<\/' . $matches[6] . '>$/', '', $matches[0]);
	if(!isset($GLOBALS['_experienceLevelIcon'][$member_srl]))
	{

		if(!$GLOBALS['_experienceModel']) $GLOBALS['_experienceModel'] = getModel('experience');
		/** @var experienceModel $oExperienceModel */
		$oExperienceModel = &$GLOBALS['_experienceModel'];
		
		$medalData = $oExperienceModel->getMedalByMemberSrl($member_srl);
		$experienceConfig = $oExperienceModel->getConfig();
		if(!$medalData)
		{
			return $matches[0];
		}
		
		$GLOBALS['_experienceLevelIcon'][$member_srl] = "<img src=\"./modules/experience/medal/{$experienceConfig->medal_icon}/{$medalData->medal}.png\" alt=\"{$medalData->medal}\" title=\"{$medalData->medal}\" class=\"xe_experience_level_icon\" style=\"vertical-align:middle;margin-right:3px;\" />";
	}
	$text = $GLOBALS['_experienceLevelIcon'][$member_srl];

	return $orig_text . $text . $matches[5] . '</' . $matches[6] . '>';
}
