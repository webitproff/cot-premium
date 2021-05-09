<?php
defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('market', 'module');
global $db_market, $cfg;

cot_extrafield_add($db_market, 'premium', 'checkbox', $R['input_checkbox'],'','','','', '','');