<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
	        parent::__construct();
	        // load models for student info
					$this->load->model('transaction_model');
	        $this->load->library('disburse');
					$this->load->config('vars');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function request()
	{
		$bank_code = $this->input->post('bank_code');
		$account_number = $this->input->post('account_number');
		$amount = $this->input->post('amount');
		$remark = $this->input->post('remark');
		$hit = $this->disburse->request($bank_code, $account_number, $amount, $remark);
		if($hit->id){
			$transaction = array(
					'id' => $hit->id,
					'amount' => $hit->amount,
					'status' => $hit->status,
					'timestamp' => $hit->timestamp,
					'bank_code' => $hit->bank_code,
					'account_number' => $hit->account_number,
					'beneficiary_name' => $hit->beneficiary_name,
					'remark' => $hit->remark,
					'receipt' => $hit->receipt,
					'time_served' => $hit->time_served,
					'fee' => $hit->fee
			);
			$insert = $this->transaction_model->save_transaction($transaction);

			echo json_encode($transaction);
		}
	}

	public function check()
	{
		$transaction_id = $this->input->post('transaction_id');
		$hit = $this->disburse->check($transaction_id);
		if($hit->id){
			$transaction = array(
					'id' => $hit->id,
					'amount' => $hit->amount,
					'status' => $hit->status,
					'timestamp' => $hit->timestamp,
					'bank_code' => $hit->bank_code,
					'account_number' => $hit->account_number,
					'beneficiary_name' => $hit->beneficiary_name,
					'remark' => $hit->remark,
					'receipt' => $hit->receipt,
					'time_served' => $hit->time_served,
					'fee' => $hit->fee
			);
			$update = $this->transaction_model->update_transaction($transaction);

			echo json_encode($transaction);
		}
	}
}
