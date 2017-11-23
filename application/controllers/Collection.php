<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {

	public $table = "collection";

	public function index()
	{
		$this->load->view('collection');
	}


	public function load_data(){
		$collections = $this->main_model->get_all_items('collection');
		$content = '';
		foreach ($collections as $collection) {
			if($collection->has_discount){
					$discount = "<b class='text-success'>Yes</b>";
			}else{
					$discount = "<b class='text-danger'>No</b>";
			}
			$content .= '<tr><td>'.$collection->id.'</td><td>'.$collection->name.'</td><td>'.$discount.'</td></tr>';
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
