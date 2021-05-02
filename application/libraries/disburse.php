<?php
class Disburse {

    function __construct() {
      //
    }

    public function request($bank_code, $account_number, $amount, $remark){

        $this->CI = &get_instance();
        $post = [
            'bank_code' => $bank_code,
            'account_number' => $account_number,
            'amount'   => $amount,
            'remark'   => $remark,
        ];

        $ch = curl_init('https://nextar.flip.id/disburse');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // true or false
        curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
        curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/x-www-form-urlencoded',
          'Authorization: Basic '.base64_encode('HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41:'))
        );

        $resp = curl_exec($ch);
        $decode = json_decode($resp);
        // close the connection, release resources used
        curl_close($ch);

        return $decode;
    }

    public function check($transaction_id){

        $this->CI = &get_instance();

        $ch = curl_init('https://nextar.flip.id/disburse/'.$transaction_id);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/x-www-form-urlencoded',
          'Authorization: Basic '.base64_encode('HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41:'))
        );

        $resp = curl_exec($ch);
        $decode = json_decode($resp);
        // close the connection, release resources used
        curl_close($ch);

        return $decode;
    }
}
