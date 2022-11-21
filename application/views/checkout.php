<div class="p-2">
    <div class="card shadow">
        <div class="card-header">
            Total belanjaan
        </div>
        <div class="p-2 mt-2 mr-2">
            <ul>
                <?php
            $count = count($selectedCart);
            $total = 0;
            for($x = 0; $x < $count; $x++){
                $sc = $selectedCart[$x];
                $produk = $this->Cart_model->cart_by_id($sc);
                isset($produk->produk_id) ? $pid2=$produk->produk_id : 'Null';

                echo '<li class="h6">'.$produk->produk_nama.'</li>';

                if(isset($produk->produk_diskon)){
                    $hrg = $produk->produk_harga - $produk->produk_diskon;
                    $hrga = $hrg*$produk->cart_produk_qty;
                } else {
                    $hrga = $produk->produk_harga*$produk->cart_produk_qty;
                }
                $total = $total+$hrga;
            }
                ?>
            </ul>
            <div class="float-right h5 font-weight-bold">Rp.
                <?= number_format($total);?>
            </div>
        </div>
    </div>
    <div class="card shadow mt-2">
        <div class="card-header">
            Data Diri
        </div>
        <div class="p-2 m-2">
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. WA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <?php
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
                        $curl_provinsi = json_decode($response,true);
                        }
                    ?>
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="provinsi_penerima" id='provinsi_penerima'>
                            <?php
                            if($curl_provinsi['rajaongkir']['status']['code'] == 200){
                                foreach ($curl_provinsi['rajaongkir']['results'] as $cp){
                                    echo "<option value='$cp[province_id]'>$cp[province] </option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="kabupaten_penerima" id="kabupaten_penerima">
                            
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-2">
        <div class="card-header">
            Opsi Pengiriman
        </div>
        <div class="p-2 m-2">
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jasa Expedisi</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="jasa_ekspedisi" name="jasa_ekspedisi">
                            <?php 
                            $eks = ['jne' => 'JNE', 'pos' => 'POS', 'tiki' => 'TIKI'];
                            foreach($eks as $key => $value){
                                echo "<option value='$key'>$value</option>";
                            }
                            ?>
                            
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-2">
        <div class="card-header">
            Catatan untuk Penjual
        </div>
        <div class="p-2 m-2">
            <form>
                <div class="form-group row">
                    <div class="col-12">
                        <textarea class="form-control">

                        </textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-2">
        <div class="card-header">
            Total Pembayaran
        </div>
        <div class="p-2 m-2">
            <div class=" pt-2 row">
                <div class="col-sm-4">Total belanjaan</div>
                <div class="col-sm-4 h6 offset-sm-4">
                    Rp. 100,0000
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">Ongkir</div>
                <div class="col-sm-4 h6 offset-sm-4">
                    Rp. 27,000
                </div>
            </div>
            <hr>
            <div class="pb-2 row">
                <div class="col-sm-4 font-weight-bold">Total</div>
                <div class="col-sm-4 h5 offset-sm-4 font-weight-bold">
                    Rp. 127,000
                </div>
            </div>
           <button class="btn btn-block btn-primary-gr">Buat Pesanan</button>
        </div>
    </div>
</div>
</div>
<script>
    document.getElementById('provinsi_penerima').addEventListener('change',function(){
        
        fetch("<?= base_url('home/get_kabupaten/') ?>"+this.value,{
            method: 'GET',
        })
        .then((response) => response.text())
        .then((data) => {
            document.getElementById('kabupaten_penerima').innerHTML = data
        })
    })
</script>