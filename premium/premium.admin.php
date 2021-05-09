<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=admin.config.edit.loop
  [END_COT_EXT]
  ==================== */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('page', 'module');
$adminhelp = $L['news_help'];



if ($p == 'premium' && $row['config_name'] == 'set') {
    $sskin = cot_tplfile('premium.admin', 'plug', true);
    $tt = new XTemplate($sskin);

    $jj = 0;
    if ($items = json_decode($row["config_value"], 1))
        foreach ($items as $item) {
            $tt->assign(array(
                "ROW_IDX" => $jj,
                "ROW_NAME" => $item["name"],
                "ROW_ID" => $item["id"],
                "ROW_DOWNLOADS" => $item["downloads"],
                "ROW_PRICE" => $item["price"],
            ));
            $jj++;
            $tt->parse('MAIN.ROW');
        }

    $tt->parse('MAIN');

    $t->assign(array(
        'ADMIN_CONFIG_ROW_CONFIG_MORE' => $tt->text('MAIN') . '<div id="helptext">' . $hint . '</div>'
    ));
}