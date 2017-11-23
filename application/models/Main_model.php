<?php 
class Main_model extends CI_Model {

	public function get_all_items($table){
		$this->db->order_by('id', 'desc');
		$results = $this->db->get($table);
		return $results->result();
	}

	public function get_by_id($field,$id,$table){
		$this->db->where($field, $id);
		$results = $this->db->get($table);
		return $results->result();
	}

	public function get_products(){
		$this->db->select('p.*,c.name as collection_name');
		$this->db->from('product as p');
		$this->db->join('collection as c', 'c.id = p.collection_id', 'left');
		$this->db->order_by('id', 'desc');
		$results = $this->db->get();
		return $results->result();
	}

	public function get_order_items($id){
		$this->db->select('i.*,p.*,c.id as collection_id');
		$this->db->from('item as i');
		$this->db->join('product as p', 'p.id = i.product_id', 'left');
		$this->db->join('collection as c', 'c.id = p.collection_id', 'left');
		$this->db->where('i.order_id', $id);
		$results = $this->db->get();
		return $results->result();
	}

	function searchForId($id, $array) {

		foreach ($array as $key => $val) {

			if ($val['id'] === $id) {
				return $key;
			}

		}

		return NULL;

	}

	function has_discount($id){
		$this->db->select('c.has_discount');
		$this->db->from('product as p');
		$this->db->join('collection as c', 'c.id = p.collection_id', 'left');
		$this->db->where('p.id', $id);
		$results = $this->db->get();
		return $results->row()->has_discount;

	}

}

?>