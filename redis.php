<?php

// セッション開始
session_start();

if (!isset($_SESSION['session_id'])) {

	$_SESSION['session_id'] = session_id();
	var_dump($_SESSION);

} else {

	// Redisに登録されているsessionIDと重複しないことを確認（while文追加）
	// セッション新規発行 旧セッション削除
    session_regenerate_id(true);
    // セッション変数初期化
    $_SESSION = [];
    $_SESSION['session_id'] = session_id();
    var_dump($_SESSION);
}