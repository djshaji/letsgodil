<?php

function util_get_url_as_json ($url) {
    // From fucking SO
    // Could I be any more [meme hackerman]!
    //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);

    return json_decode ($result, true );
}

function util_message_box ($message) {
    print ("
        <script>alert (\"". $message . "\")</script>
    ");
}

?>