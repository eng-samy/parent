<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public $table = "product";

	public function index()
	{
		$data['collections'] = $this->main_model->get_all_items('collection');
		$this->load->view('product',$data);
	}


	public function load_data(){
		$products = $this->main_model->get_products();
		$content = '';
		foreach ($products as $product) {
			$content .= '<tr><td>'.$product->id.'</td><td>'.$product->name.'</td><td>'.$product->price.'</td><td>'.$product->category.'</td><td>'.$product->subcategory.'</td><td>'.$product->collection_name.'</td><td>'.$product->tags.'</td></tr>';
		}
		$result = array('content' => $content, 'status' => 200);
		echo json_encode($result);
		exit();
	}

	public function insert_data(){
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		echo $this->_insert_data($data);
	}

	function _insert_data($data){
		if ($data['item_id'] == 0) {
			unset($data['item_id']);
			$this->db->insert($this->table, $data);
			$inserted_id = $this->db->insert_id();

			$result = array('inserted_id' => $inserted_id, 'status' => 200);
			echo json_encode($result);
			exit();
		}else{
			$id = $data['item_id'];
			unset($data['item_id']);
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
			$result = array('inserted_id' => $id, 'status' => 200);
			echo json_encode($result);
			exit();
		}
	}



}
