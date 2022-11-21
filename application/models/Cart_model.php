<?php
class Cart_model extends CI_Model{
 
    function check_cookie($key){
        $hasil = $this->db->get_where('tb_cookie', array('cookie_key'=>$key));
        return $hasil->result_array();
    }
    function insert_cookie($key){
        $this->db->set('cookie_key', $key);
        $this->db->insert('tb_cookie');
    }
    function get_all_produk($user_id){
        $hasil=$this->db->get_where('tb_produk',array('produk_user_id'=>$user_id));
        return $hasil->result_array();
    }
    function get_produk_promo($user_id){
        $hasil=$this->db->get_where('tb_produk',array('produk_diskon >'=>0, 'produk_user_id'=>$user_id));
        return $hasil->result_array();
    }
    function get_produk($produk_id){
        $hasil=$this->db->get_where('tb_produk', array('produk_id >'=>$produk_id));
        return $hasil->result_array();
    }
    function get_produk_row($produk_id){
        $hasil=$this->db->get_where('tb_produk', array('produk_id >'=>$produk_id));
        return $hasil->row();
    }
    function get_produk_img_one($produk_id){
        $hasil=$this->db->get_where('tb_produk_img', array('img_produk_id'=>$produk_id));
        return $hasil->row();
    }
    function get_produk_img_all($produk_id){
        $hasil=$this->db->get_where('tb_produk_img', array('img_produk_id'=>$produk_id));
        return $hasil->result_array();
    }
    function get_produk_img_count($produk_id){
        $hasil=$this->db->get_where('tb_produk_img', array('img_produk_id'=>$produk_id));
        return $hasil->num_rows();
    }
    function get_where_variant($variant_id){
        $hasil=$this->db->get_where('tb_produk_variant',array('variant_produk_id'=>$variant_id));
        return $hasil->result_array();
    }
    function get_cart($cookie_id){
        $hasil=$this->db->get_where('tb_cart', array('cart_cookie_id'=>$cookie_id));
        return $hasil->result_array();
    }
    function get_cart_by_id($cart_id){
        $hasil=$this->db->get_where('tb_cart', array('cart_id'=>$cart_id));
        return $hasil->result_array();
    }
    function get_cookie_id($key){
        $hasil = $this->db->get_where('tb_cookie', array('cookie_key'=>$key));
        return $hasil->row();
    }
    function cart_row1($produk_id){
        $this->db->select('cart_id, cart_produk_qty, produk_nama, produk_harga, produk_diskon, produk_stock');    
        $this->db->from('tb_cart');
        $this->db->join('tb_produk', 'cart_produk_id = produk_id');
        $this->db->where('cart_produk_id', $produk_id);
        $hasil = $this->db->get();
        return $hasil->row();
    }
    function cart_row2($produk_id){
        $this->db->select('cart_id, cart_produk_qty, produk_nama, produk_variant_nama, produk_harga, produk_diskon, produk_stock, variant');    
        $this->db->from('tb_cart');
        $this->db->join('tb_produk', 'cart_produk_id = produk_id');
        $this->db->join('tb_produk_variant', 'cart_produk_variant_id = variant_id');
        $this->db->where('cart_produk_id', $produk_id);
        $hasil = $this->db->get();
        return $hasil->row();
    }
    function cart_by_id($cart_id){
        $this->db->select('cart_id, cart_produk_qty, produk_nama, produk_harga, produk_diskon');    
        $this->db->from('tb_cart');
        $this->db->join('tb_produk', 'cart_produk_id = produk_id');
        $this->db->where('cart_id', $cart_id);
        $hasil = $this->db->get();
        return $hasil->row();
    }
}
