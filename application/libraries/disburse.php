<?php
class Disburse {

    function __construct() {
      $this->CI =& get_instance();
      $this->CI->config->load('vars');
    }

    public function request($bank_code, $account_number, $amount, $remark){

        $post = [
            'bank_code' => $bank_code,
            'account_number' => $account_number,
            'amount'   => $amount,
            'remark'   => $remark,
        ];

        $ch = curl_init($this->CI->config->item('api_url'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // true or false
        curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
        curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/x-www-form-urlencoded',
          'Authorization: Basic '.base64_encode($this->CI->config->item('api_key').':'))
        );

        $resp = curl_exec($ch);
        $decode = json_decode($resp);
        // close the connection, release resources used
        curl_close($ch);

        return $decode;
    }

    public function check($transaction_id){

        $ch = curl_init($this->CI->config->item('api_url').'/'.$transaction_id);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/x-www-form-urlencoded',
          'Authorization: Basic '.base64_encode($this->CI->config->item('api_key').':'))
        );

        $resp = curl_exec($ch);
        $decode = json_decode($resp);
        // close the connection, release resources used
        curl_close($ch);

        return $decode;
    }
}
