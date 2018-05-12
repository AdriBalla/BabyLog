<?php

function CallAPI($method, $url, $data = false){

    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    echo curl_error($curl);

    curl_close($curl);

    return $result;
}


$url = "babylog_nginx/api/bebes/4";

$data = array();
$data["nom"] = "toto";
$data["prenom"] = "tutu";
$data["date_naissance"] = "2018-07-05";
$data["sexe"] = "M";
$data["photo"] = null;

echo callAPI("DELETE",$url,$data);


?>