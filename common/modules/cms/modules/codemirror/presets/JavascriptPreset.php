<?php
use common\modules\cms\modules\codemirror\CodemirrorAsset;

return [
	'assets'=>[
		CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
		CodemirrorAsset::ADDON_CONTINUECOMMENT,
		CodemirrorAsset::ADDON_COMMENT,
		CodemirrorAsset::MODE_JAVASCRIPT,
	],
	'settings'=>[
		'lineNumbers'=> true,
		'matchBrackets'=>true,
		'continueComments' => "Enter",
		'extraKeys' => ["Ctrl-/"=> "toggleComment"],
	],
];