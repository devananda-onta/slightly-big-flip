<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaction_model extends CI_Model {

	// Table name in database
	var $table = 'transaction';

    public function save_transaction(array $transaction)
    {
        return $this->db->insert('transaction', $transaction);
    }


    public function update_transaction(array $transaction)
    {
        return $this->db->replace('transaction', $transaction);
    }
}
