<?php
defined('COT_CODE') or die('Wrong URL');

global $db_market;

// Remove column from table
if ($db->fieldExists($db_market, "premium"))
{
	$db->query("ALTER TABLE `$db_market` DROP COLUMN `item_premium`");
}

?>