<?php

class Migration extends CI_Controller {

	public function __construct() {
	        parent::__construct();
	        // load models for student info
					$this->load->model('transaction_model');
	        $this->load->dbforge();
	}

	public function index()
	{
    $fields = array(
        'id' => array(
                'type' => 'BIGINT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => FALSE
        ),
        'amount' => array(
                'type' => 'BIGINT',
                'constraint' => '10',
                'unsigned' => TRUE,
        ),
        'status' => array(
                'type' =>'VARCHAR',
                'constraint' => '20',
        ),
        'timestamp' => array(
                'type' => 'TIMESTAMP',
                'null' => TRUE,
        ),
        'bank_code' => array(
                'type' =>'VARCHAR',
                'constraint' => '20',
        ),
        'account_number' => array(
                'type' => 'BIGINT',
                'constraint' => '10',
                'unsigned' => TRUE,
        ),
        'beneficiary_name' => array(
                'type' =>'VARCHAR',
                'constraint' => '20',
        ),
        'remark' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
        ),
        'receipt' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
        ),
        'timestamp' => array(
                'type' => 'TIMESTAMP',
                'null' => TRUE,
        ),
        'fee' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
        ),
    );

    $add = $this->dbforge->add_field($fields);
    $key = $this->dbforge->add_key('id', TRUE);
    $create = $this->dbforge->create_table('transaction', TRUE);
    if($create){
      echo "success create database";
    }else{
      echo "failed create database or database already created";
    }
	}
}
