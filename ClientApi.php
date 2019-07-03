<?php
/**
 * Created by PhpStorm.
 * User: NFAL
 * Date: 9/06/2019
 * Time: 2:45 PM
 */

class ClientApi
{
    static $post_data = "";
    static $url = "";
    static $class_object = "";

      static function process_request(){
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL,ClientApi::$url);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode(ClientApi::$post_data));


  //     $postdata = array('theclass' => serialize(ClientApi::$class_object));
//       curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postdata) );         //http_build_query($postdata)

       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',));

       curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //    curl_setopt($curl, CURLOPT_USERPWD, $api_key);
       $result = curl_exec($curl);
       if ($result === false)
       {
           $info = curl_getinfo($curl);
           curl_close($curl);
           die('error occured during curl exec. Additioanl info: ' . var_export($info));
       }
       curl_close($curl);
       $result = json_decode($result);
       return $result;
    }


    //temp
    static function downloadReport()
    {

        $headers = array('Content-type: application/json',);
        $fp = fopen (dirname(__FILE__) . '/localfile.tmp', 'w+');//This is the file where we save the    information
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,ClientApi::$url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode(ClientApi::$post_data));
        $file = curl_exec($curl);
        if ($file === false)
        {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($curl);
        header('Content-type: ' . 'application/octet-stream');
        header('Content-Disposition: ' . 'attachment; filename=report.pdf');
        echo $file;
    }
}