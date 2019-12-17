<?php
$strAccessToken = "HP2KOww1JGbJeyQ3TPD0vbN6mCnDO6E9pxRdT84sU5i3bdZ9PY/kfCPgwAJ9MVJDJVEXjNjQ8glyuFOdqO6jYLdXwwSbxrwZ7WGY53hupTlkmb/x3o7CA0tY/Dmao4p7reGyI4SKCkAcoVNrzDtJxwdB04t89/1O/w1cDnyilFU=";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "hvXNnVPmVFx8tQdrhLSjGBLa9t4lF2qbI55XNkHWvPE";
$arrPostData['messages'][0]['type'] = "แจ้งเตือนมีการบันทึกข้อมูล Case_id : wd722";
//$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
?>