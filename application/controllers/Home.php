<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model');

        // $subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
        // $subdomain_name = $subdomain_arr[0];
        // $subquery = $this->db->get_where('tb_user', array('user_subdomain' => $subdomain_name));
        // $qry = $subquery->row();

        // if(empty($qry)){
        //     redirect('notfound');
        // };
        if(!isset($_COOKIE['key'])){
            $cookieString = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 16)), 0, 16);
            $checkCookie = $this->Cart_model->check_cookie($cookieString);
            $this->Cart_model->insert_cookie($cookieString);
            setcookie('key', $cookieString, time() + (60 * 60 * 24 *7), '/');
        }else{
            $myCookie = $_COOKIE['key'];
            $checkCookie = $this->Cart_model->check_cookie($myCookie);
            if(empty($checkCookie)){
                redirect('notfound');
            }else{
                setcookie('key', $myCookie, time() + (60 * 60 * 24 *7), '/');
            }
        }
        $getCookie = $this->Cart_model->get_cookie_id($_COOKIE['key']);
        $this->data['cookieData'] = $getCookie;
        $this->data['id'] = 1;
        $this->data['subdomainname'] = 'Freedy Fred';


    }
	public function index()
	{
        $data = $this->data;
        $user_id = $this->data['id'];
        $data['subdomain'] = $data['subdomainname'];

        $data['all_produk']=$this->Cart_model->get_all_produk($user_id);
        $data['promo_produk']=$this->Cart_model->get_produk_promo($user_id);
        
        
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar',);
        $this->load->view('home', $data);
        $this->load->view('template/footer');
    }
    public function cart()
    {
        $data = $this->data;
        $cookie = $this->data['cookieData']->cookie_id;
        $user_id = $this->data['id'];
        $data['subdomain'] = $data['subdomainname'];
        $cart_cookie = $this->Cart_model->get_cart($cookie);

        $data['cart_list'] = $this->Cart_model->get_cart($cookie);
        // $data['myscript'] = '
        //                         <script src="'.base_url().'asset/js/cart_total.js"></script>
        // ';

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('cart', $data);
        $this->load->view('template/footer', $data);
    }
    
    public function checkout(){
        $data = $this->data;
        $cookie = $this->data['cookieData']->cookie_id;
        $user_id = $this->data['id'];
        $data['subdomain'] = $data['subdomainname'];

        $data['selectedCart'] = $this->input->post('ckb');

        
        
        $this->load->view('template/header', $data);
        $this->load->view('checkout', $data);
        $this->load->view('template/footer');   
    }
    
    
    public function _cartEdit($cart_produk_id){


        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('cartEdit', $data);
        $this->load->view('template/footer');   
    }
    public function account()
    {
        $data = $this->data;
        $user_id = $this->data['id'];
        $data['subdomain'] = $data['subdomainname'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar',);
        $this->load->view('account', $data);
        $this->load->view('template/footer');
    
    }
    public function get_kabupaten($provinsi_id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: f349a060463361f960402adf47663fdc"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $curl_kabupaten = json_decode($response,true);

            if($curl_kabupaten['rajaongkir']['status']['code'] == 200){
                foreach($curl_kabupaten['rajaongkir']['results'] as $cb){
                    echo "<option value='$cb[city_id]'>$cb[city_name] </option>";
                }
            }
        }
    
    }
    public function get_ongkir()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$kab_pengirim."&destination=".$kab_penerima."&weight=".$berat."&courier=".$ekspedisi,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: f349a060463361f960402adf47663fdc"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
            
    }
}
