<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function _construct() {

        header('Content-Type: text/html; charset=UTF-8');
    }

	public function index()
	{
		$data['products'] = $this->main_model->get_products();
		$this->load->view('make_order',$data);
	}

	public function show()
	{
		$data['orders'] = $this->main_model->get_all_items('order');
		$this->load->view('orders',$data);
	}



	public function addtocart(){
		$id = $this->input->post('id');
		$price = $this->input->post('price');
		$itemsNum = 0;

		$data = array(
			'id' => $id,
			'value' => $price,
			'qnt' => 1,
			);

		if(get_cookie('itemsNum')){ 
			$itemsNum = get_cookie('itemsNum');
		}

		if(get_cookie('orderData')){
			$orderData = unserialize(get_cookie('orderData'));
			$key = $this->main_model->searchForId($id,$orderData);

			if(!is_null($key)){

				$oldOrder = $orderData[$key];

				$oldOrder['qnt'] = $oldOrder['qnt'] + 1;

				$oldOrder['value'] = $oldOrder['value'] + $price;

				$orderData[$key] = $oldOrder;

			}else{
				array_push($orderData, $data);
			}

		}else{

			$orderData = array();
			
			array_push($orderData, $data);

		}

		$orderDataCookie = array(
			'name'   => 'orderData',
			'value'  => serialize($orderData),
			'expire' => time()+(86500*30)
			);

		set_cookie($orderDataCookie);

		$itemsNum++;

		$itemsNumCookie = array(
			'name'   => 'itemsNum',
			'value'  => $itemsNum,
			'expire' => time()+(86500*30)
			);

		set_cookie($itemsNumCookie);

		$result = array('qty' => $itemsNum, 'status' => 200);
		echo json_encode($result);
		exit();


	}

	public function checkout(){

		$email = $this->input->post('email');
		$payment_method = $this->input->post('payment_method');
		$orderData = unserialize(get_cookie('orderData'));
		$shipping_costs = 10;
		$total = 0; 
		$limit = 150;
		$is_postive = 0;
		$html = gzdecode(file_get_contents("https://developer.github.com/v3/#http-redirects"));
		$discount = substr_count($html,'status');

		foreach ($orderData as $item) {
			$total += $item['value'];
			$has_discount = $this->main_model->has_discount($item['id']);
			if($has_discount){
				$is_postive = 1;
			}
		}

		if($is_postive){
			if($discount > ($total * .25)){
				$discount = $limit;
			}
		}else{
			$discount = 0;
		}

		$order_data = array(
			'shipping_costs' => $shipping_costs,
			'total_amount_net' => $total + $shipping_costs - $discount,
			'payment_method' => $payment_method,
			'email' => $email,
			'discount_value' => $discount
		);

		if($this->db->insert('order', $order_data)){
			$order_id = $this->db->insert_id();
			$batch_arr = array();
			foreach ($orderData as $item) {
				$item_data = array(
					'order_id' => $order_id,
					'product_id' => $item['id'],
					'qnt' => $item['qnt'],
					'value' => $item['value'],
					);
				array_push($batch_arr, $item_data);
			}
			$this->db->insert_batch('item', $batch_arr); 

			$result = array('status' => 200);
			delete_cookie('orderData'); 
			delete_cookie('itemsNum'); 
		}else{

			$result = array('status' => 500);
		}

		echo json_encode($result);
		exit();
	}

	function check_cookie(){
		$orderData = unserialize(get_cookie('orderData'));
		print_r($orderData);
	}
}
