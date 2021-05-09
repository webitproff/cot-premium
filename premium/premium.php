<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=standalone
  [END_COT_EXT]
  ==================== */

defined('COT_CODE') or die('Wrong URL');
$p = cot_import('pack', 'G', 'TXT');
$items = json_decode($cfg["plugin"]["premium"]["set"], 1);

if ($a == 'buy') {
    $packs = array();
    foreach ($items as $item) {
        $packs[$item["id"]] = $item;
    }

    if ($usr['id'] != 0 && $usr["maingrp"] != 5) {
        $summ = $packs[$p]["price"];
        $options['time'] = 1 * 30 * 24 * 60 * 60;
        $options['desc'] = "Покупка премиум доступа";
        $options['code'] = $packs[$p]["id"];
        $options['redirect'] = cot_url("premium");

        cot_payments_create_order('premium', $summ, $options);
    } elseif ($usr["maingrp"] == 5) {
        $options['time'] = 1 * 30 * 24 * 60 * 60;
        $options['code'] = $packs[$p]["id"];
        cot_payments_userservice("premium." . $options['code'], $usr['id'], $options['time'], 'set');

        if ($cot_plugins_active["notify"]) {
            $admins = $db->query(" SELECT * FROM `{$db_users}` WHERE user_maingrp=5 ")->fetchAll();
            foreach ($admins as $admin) {
                notify_send("premium", "Buy", "/premium", "Премиум доступ", "Пользователь {$usr['name']} купил премиум пакет '{$packs[$p]["name"]}'", $admin["user_id"], $usr['id']);
            }
        }

        cot_redirect(cot_url("premium"));
    }
}

$t = new XTemplate(cot_tplfile('premium', 'plug'));
cot_display_messages($t);


$t->assign(array(
    "PREMIUM_DOWNLOADS" => getCounts("market")->rowCount(),
));

$jj = 0;
foreach ($items as $item) {
    $t->assign(array(
        "PREMIUM_ROW_IDX" => $jj,
        "PREMIUM_ROW_NAME" => $item["name"],
        "PREMIUM_ROW_ID" => $item["id"],
        "PREMIUM_ROW_DOWNLOADS" => $item["downloads"],
        "PREMIUM_ROW_PRICE" => $item["price"],
    ));
    $jj++;
    $t->parse('MAIN.ROW');
}

if (!empty($id)) {
    $t->assign(cot_generate_usertags($id, 'PREMIUM_FORM_USER_'));
}