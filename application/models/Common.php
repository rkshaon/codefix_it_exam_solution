<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Model {

    public function set_data($table,$data){
        $this->db->trans_start();
        $this->db->insert($table, $data);
        $returnValue = $this->db->insert_id();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        else
        {
            return $returnValue;
        }
    }

    public function get_data($table){
      $query= $this->db->get($table);
      if ( $this->db->affected_rows() > 0 ) {
        return $query;
      } else {
        return FALSE;
      }
    }

    public function get_purchase_total(){
      $this->db->select_sum("price");
      $this->db->from('customerpurchasedproduct');
      $this->db->join('product', 'product.id = customerpurchasedproduct.product_id');
      return $this->db->get()->row();
    }

    public function get_purchase_history_month_wise() {
      $sql = 'select year(created_at) as year, month(created_at) as month, sum(price) as total_amount from customerpurchasedproduct, product where product.id = customerpurchasedproduct.product_id group by year(created_at), month(created_at)';
      $query = $this->db->query($sql);
      return $query->result();
    }
    public function get_purchase_history(){
      $this->db->select("*");
      $this->db->from('customerpurchasedproduct');
      $this->db->join('product', 'product.id = customerpurchasedproduct.product_id');
      return $this->db->get()->result();
    }

    public function get_sale_total(){
      $this->db->select_sum("price");
      $this->db->from('customersalesproduct');
      $this->db->join('product', 'product.id = customersalesproduct.product_id');
      return $this->db->get()->row();
    }

    public function get_sale_history_month_wise() {
      $sql = 'select year(created_at) as year, month(created_at) as month, sum(price) as total_amount from customersalesproduct, product where product.id = customersalesproduct.product_id group by year(created_at), month(created_at)';
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function get_sale_history(){
      $this->db->select('customer.name as `customer`, product.name as `product`, product.price, customersalesproduct.created_at');
      $this->db->from('customersalesproduct');
      $this->db->join('product', 'product.id = customersalesproduct.product_id');
      $this->db->join('customer', 'customersalesproduct.customer_id = customer.id');
      return $this->db->get()->result();
    }

    public function get_customer_purchase_history($id){
      $this->db->select('customer.name as `customer`, product.name as `product`, product.price, customerpurchasedproduct.created_at');
      $this->db->from('customerpurchasedproduct');
      $this->db->join('product', 'customerpurchasedproduct.product_id = product.id');
      $this->db->join('customer', 'customerpurchasedproduct.customer_id = customer.id');
      $this->db->where('customer.id', $id);
      return $this->db->get()->result();
    }

    public function get_customer_sale_history($id){
      $this->db->select('customer.name as `customer`, product.name as `product`, product.price, customersalesproduct.created_at');
      $this->db->from('customersalesproduct');
      $this->db->join('product', 'customersalesproduct.product_id = product.id');
      $this->db->join('customer', 'customersalesproduct.customer_id = customer.id');
      $this->db->where('customer.id', $id);
      return $this->db->get()->result();
    }
}
