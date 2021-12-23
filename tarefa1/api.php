<?php
    function consumirAPI(){
        $url = "https://apiintranet.kryptonbpo.com.br/test-dev/exercise-1";
        $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            $response = curl_exec($ch);
                curl_close($ch);
        $file = fopen('api.json','w');
        fwrite($file, $response);
        fclose($file);

    }
?>
