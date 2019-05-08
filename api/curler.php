<?php

function make_curl($search_param, $url){
    // search_params are 'league_name' and 'year'
    
    // default header shit
    $headers = array("Accept: application/json", "Content-Type: application/json");
    
    //step1
    $cSession = curl_init($url);
    
    //echo $search_param["league_name"];
    //echo json_encode($search_param);

    //step2
    //curl_setopt($cSession,CURLOPT_URL, $url."?league_name=".$search_param["league_name"]."&year=".$search_param["year"]);
    curl_setopt($cSession,CURLOPT_POSTFIELDS, json_encode($search_param));
    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cSession,CURLOPT_HEADER, false);
    curl_setopt($cSession,CURLOPT_HTTPHEADER, $headers);
    
    //step3
    $jsonData = curl_exec($cSession);
    $err = curl_error($cSession);
    
    //step4
    curl_close($cSession);
    //echo ($jsonData);
    
    //step5
    return ($jsonData);
}
?>