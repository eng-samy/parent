<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {


	public function index()
	{
		echo "Forbidden Access";
	}

	public function v1()
	{	
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'POST'){

			echo json_encode(array('status' => 400,'message' => 'Bad request.'));

		}else{

		$orders = $this->main_model->get_all_items('order');
		$orders_arr = array();
		foreach ($orders as $order) {
			$order_data = array(
				'order_id' => $order->id,
				'email' => $order->email,
				'total_amount_net' => (string)$order->total_amount_net,
				'shipping_costs' => (string)$order->shipping_costs,
				'payment_method' => $order->payment_method,
				'discount_value' => (string)$order->discount_value
				);
			$items_arr = array();
			$items = $this->main_model->get_order_items($order->id);
			foreach ($items as $item) {
				$item_arr = array(
					'name' => $item->name,
					'qnt' => $item->qnt,
					'value' => $item->value,
					'category' => $item->category,
					'subcategory' => $item->subcategory,
					'tags' => explode(',', $item->tags),
					'collection_id' => $item->collection_id
					);
				array_push($items_arr, $item_arr);
			}
			$order_data['items'] = $items_arr;
			array_push($orders_arr, $order_data);
		}

		$return_arr = array(
			'endpoint_url' => "api/v1/orders.json",
			"method" => $_SERVER['REQUEST_METHOD'],
			"parameters" => $orders_arr
			);

		echo json_encode($return_arr,JSON_PRETTY_PRINT);
	}
}


	


}
