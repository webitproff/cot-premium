<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=global
 * [END_COT_EXT]
 */
defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('premium', 'plug');
require_once cot_incfile('payments', 'module');
if ($cot_plugins_active["notify"]) {
    require_once cot_incfile('notify', 'plug');
}
if ($premiums = cot_payments_getallpays('premium', 'paid')) {
    foreach ($premiums as $premium) {
        if (cot_payments_userservice($premium["pay_area"] . "." . $premium["pay_code"], $usr['id'], $premium["pay_time"], 'set')) {
            cot_payments_updatestatus($premium['pay_id'], 'done');

            if ($cot_plugins_active["notify"]) {
                $admins = $db->query(" SELECT * FROM `{$db_users}` WHERE user_maingrp=5 ")->fetchAll();
                foreach ($admins as $admin) {
                    notify_send("premium", "Buy", "/premium", "Премиум доступ", "Пользователь {$usr['name']} купил премиум пакет '{$packs[$p]["name"]}'", $admin["user_id"], $usr['id']);
                }
            }
        }
    }
}
$prem = array();
if ($packets = json_decode($cfg["plugin"]["premium"]["set"], 1))
    foreach ($packets as $pack) {
        if ($time = cot_payments_userservice("premium." . $pack["id"], $usr['id'], null, 'get')) {
            $prem[$time] = $pack;
            $prem[$time]["date"] = date("d.m.Y", $time);
            $prem[$time]["time"] = $time;
        }
    }

if (!empty($prem))
    $key = max(array_keys($prem));

$usr["premium"] = $prem[$key];
