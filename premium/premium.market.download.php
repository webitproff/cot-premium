<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=marketorders.download
 * [END_COT_EXT]
 */
if ($item["item_premium"] == 1) {
    if (getCounts("market")->rowCount() <= ($usr["premium"]["downloads"] - 1)) {
        $time = time();
        if ($db->query(" SELECT * FROM `{$db_premium_count}` WHERE area='market' && code='{$prd}'  && user_id={$usr["id"]} && date >= UNIX_TIMESTAMP(DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY)) ")->rowCount() == 0) {
            $db->insert($db_premium_count, array(
                "area" => "market",
                "user_id" => $usr["id"],
                "date" => $time,
                "code" => $prd
            ));
        }
    } else {
        cot_redirect($_SERVER["HTTP_REFERER"]);
        exit;
    }
}