<?php

defined('COT_CODE') or die('Wrong URL');

$db_premium_count = $db_x . "premium_count";

function getCounts($area) {
    global $usr, $db_premium_count, $db;
    //$days = date("j");
    $days = 30;
    return $db->query(" SELECT * FROM `{$db_premium_count}` WHERE area='{$area}' && user_id={$usr["id"]} && date >= UNIX_TIMESTAMP(DATE_SUB(CURRENT_DATE, INTERVAL {$days} DAY)) ");
}

function getDownloads() {
    global $usr;
    $count = (int) $usr["premium"]["downloads"] - getCounts("market")->rowCount();
    if ($count <= 0) {
        $count = 0;
    }
    return $count;
}
