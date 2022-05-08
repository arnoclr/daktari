<?php

function uploadImageAndRetrieveUrl($file) {
    $client_id = "ee3ef9cca1d6857";
    
    $image = file_get_contents($file['tmp_name']); 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($image)));

    $reply = curl_exec($ch);
    curl_close($ch);

    $reply = json_decode($reply);
    return $reply->data->link;
}
