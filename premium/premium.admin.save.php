<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=admin.config.edit.first
  [END_COT_EXT]
  ==================== */

defined('COT_CODE') or die('Wrong URL');

if ($p == 'premium') {
    $items = cot_import("item", "P", "ARR");
    $_POST["set"] = json_encode($items);
}