<?php 

/**
 * curl 请求
 */
function curlRequest($url, $type='post', $data, $headers = [])
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_HEADER, false);    //表示需要response header
    // curl_setopt($ch, CURLOPT_NOBODY, FALSE);

    switch ($type) {
        case 'get':
            $url = $url . '?' . http_build_query($data);
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
            break;
        case 'post':
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'put':
            curl_setopt ($ch,  CURLOPT_CUSTOMREQUEST,  "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'delete':
            curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
        default:
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
    }

    curl_setopt($ch, CURLOPT_URL, $url);

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HEADER, $headers);
    } else {
        curl_setopt($ch, CURLOPT_HEADER, 0);
    }

    $result = curl_exec($ch);

    return $result;
}

$api = '';

$params = [
];

$result = curlRequest($api, 'get', $params);

echo $result;die();
