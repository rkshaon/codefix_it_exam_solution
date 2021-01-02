<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $data['main_content'] = "exam";
        $data['main_content'] = $this->load->view('exam', $data, TRUE);
        $this->load->view('master', $data);
    }



    public function shop()
    {
        $data['products'] = $this->Common->get_data('product');
        $data['customer'] = $this->Common->get_data('customer');
        $data['main_content'] = $this->load->view('shop', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function store_shop(){
        $storeUpdate = array(
            'customer_id' =>$this->input->post('customer_id') ,
            'product_id' => $this->input->post('product_id'),
        );
        if($this->input->post('type')=='1'){
            for ($i=0; $i < $this->input->post('quantity'); $i++) {
                $this->Common->set_data('customersalesproduct',$storeUpdate);
            }
        }
        else{
            for ($i=0; $i < $this->input->post('quantity'); $i++) {
                $this->Common->set_data('customerpurchasedproduct',$storeUpdate);
            }
        }
        redirect('shop','refresh');
    }

    public function dashboard(){
      $data['main_content'] = "dashboard";
      $data['purchase_total'] = $this->Common->get_purchase_total();
      // $data['purchase'] = $this->Common->get_purchase_history();
      $data['purchase'] = $this->Common->get_purchase_history_month_wise();
      $data['sale_total'] = $this->Common->get_sale_total();
      // $data['sale'] = $this->Common->get_sale_history();
      $data['sale'] = $this->Common->get_sale_history_month_wise();
      // echo "<pre>";
      // print_r($data);
      // echo "<pre>";
      $data['main_content'] = $this->load->view('dashboard', $data, TRUE);
      $this->load->view('master', $data);
    }

    public function customer_info(){
      if (isset($_POST['customer_id'])) {
        $data['customer_purchase_history'] = $this->Common->get_customer_purchase_history($_POST['customer_id']);
        $data['customer_sale_history'] = $this->Common->get_customer_sale_history($_POST['customer_id']);
        $data['customer_info'] = $this->merge_customer_history($data['customer_purchase_history'], $data['customer_sale_history']);
      }
      $data['main_content'] = "customer";
      $data['customer'] = $this->Common->get_data('customer');
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      $data['main_content'] = $this->load->view('customer_info', $data, TRUE);
      $this->load->view('master', $data);
    }

    public function sale_report(){
      $data['main_content'] = "customer";
      $data['sale_report'] = $this->Common->get_sale_history();
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      $data['main_content'] = $this->load->view('sale_report', $data, TRUE);
      $this->load->view('master', $data);
    }

    public function merge_customer_history($purchase, $sale){
      $data = array();
      foreach ($purchase as $key) {
				$temp['customer_name'] = $key->customer;
        $temp['product_name'] = $key->product;
        $temp['transection_type'] = 'Purchase';
        $temp['product_price'] = $key->price;
        // $temp['date'] = $key->created_at;
        $temp['date'] = date("d-m-Y",strtotime($key->created_at));
				array_push($data, $temp);
			}
      foreach ($sale as $key) {
				$temp['customer_name'] = $key->customer;
        $temp['product_name'] = $key->product;
        $temp['transection_type'] = 'Sale';
        $temp['product_price'] = $key->price;
        // $temp['date'] = $key->created_at;
        $temp['date'] = date("d-m-Y",strtotime($key->created_at));
				array_push($data, $temp);
			}
      // strtotime($data["date"]);
      return $data;
    }
}
