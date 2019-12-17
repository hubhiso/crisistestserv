<?php

function sendToLine($message){
        
		$strAccessToken = "HP2KOww1JGbJeyQ3TPD0vbN6mCnDO6E9pxRdT84sU5i3bdZ9PY/kfCPgwAJ9MVJDJVEXjNjQ8glyuFOdqO6jYLdXwwSbxrwZ7WGY53hupTlkmb/x3o7CA0tY/Dmao4p7reGyI4SKCkAcoVNrzDtJxwdB04t89/1O/w1cDnyilFU=";
		$arrHeader = array();
		$arrHeader[] = "Content-Type: application/json";
		$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
		

        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = 'HP2KOww1JGbJeyQ3TPD0vbN6mCnDO6E9pxRdT84sU5i3bdZ9PY/kfCPgwAJ9MVJDJVEXjNjQ8glyuFOdqO6jYLdXwwSbxrwZ7WGY53hupTlkmb/x3o7CA0tY/Dmao4p7reGyI4SKCkAcoVNrzDtJxwdB04t89/1O/w1cDnyilFU=';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'message='.$message);
        // follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		/*
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$line_token,
        ]);
		*/
		curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);
}

sendToLine('case id : wd722');

?>