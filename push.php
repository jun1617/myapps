&lt;?php
 
if(isset($_POST['app_id'])){
    $app_id = $_POST['app_id'];
    
function sendMessage($id){
    $content = array(
        "en" =&gt; 'PERINGATAN',
        );
    $headings = array(
        'en' =&gt; 'terjadi kebocoran gas di rumah anda"silahkan cek"'
    );
    $fields = array(
        'app_id' =&gt; $id,
        'included_segments' =&gt; array('All'),
        'data' =&gt; array("foo" =&gt; "bar"),
        'large_icon' =&gt;"ic_launcher_round.png",
        'contents' =&gt; $content,
        'headings' =&gt; $headings
        
    );
 
    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                               'Authorization: Basic NGQxM2VlMTMtZmQ4Ni00OTliLWIzYjMtZGU3ZmU3ZmRjNGM5'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
 
    $response = curl_exec($ch);
    curl_close($ch);
 
    return $response;
}
 
$response = sendMessage($app_id);
$return["allresponses"] = $response;
$return = json_encode( $return);
print("\n\nJSON received:\n");
print($return);
print("\n");
}
