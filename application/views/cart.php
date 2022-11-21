<div class="p-2">
    <div class="card shadow">
        <div class="card-header">
            Daftar Keranjang
        </div>
        <div class="p-2">
            <form name="form1" id="form1" method="POST" action="<?= base_url();?>home/checkout">
                <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                    value="<?php echo $this->security->get_csrf_hash();?>"> -->
                <?php
                $i=1;   
                foreach($cart_list as $c):
                $pid = $c['cart_produk_id'];
                if($c['cart_produk_variant_id']!=NULL){
                    $produk = $this->Cart_model->cart_row2($pid);
                } else {
                    $produk = $this->Cart_model->cart_row1($pid);                    
                }
                $cart_img = $this->Cart_model->get_produk_img_one($pid);
                if($produk->produk_diskon > 0){
                    $hrga = $produk->produk_harga-$produk->produk_diskon ;
                    $hrgDiskon = $hrga*$produk->cart_produk_qty;
                }else{
                    $hrg = $produk->produk_harga*$produk->cart_produk_qty;
                };

                ?>
                <div class="custom-control custom-checkbox py-2">
                    <input type="checkbox" class="custom-control-input" name="ckb[]" id="cart<?= $produk->cart_id;?>"
                        value="<?= $produk->cart_id;?>" 
                        onclick='chkcontrol(<?= $produk->cart_id;?>)';>
                    <label class="custom-control-label w-100" for="cart<?= $produk->cart_id;?>">
                        <div class="card shadow-sm p-2">
                            <div class="row">
                                <div class="col">
                                    <img src="<?= base_url();?>asset/img/<?= $cart_img->img_name;?>"
                                        style="width: 100%;height: auto;">
                                </div>
                                <div class="col-5">
                                    <h6 class="font-weight-bold">
                                        <?= $produk->produk_nama; ?>
                                    </h6>
                                    <p class="m-0">
                                        <?php 
                                        if(isset($produk->produk_variant_nama)){
                                            echo $produk->produk_variant_nama . ' : ' .$produk->variant;
                                        }
                                        ?>
                                    </p>
                                    <p>
                                        Jumlah :
                                        <?= $produk->cart_produk_qty;?>
                                    </p>
                                    <div style="width: 80%;">
                                        <button class="btn btn-link">edit</button>
                                    </div>
                                </div>
                                <div class="col-4 row">
                                    <div class="my-auto">
                                        <p class="discount m-0 text-muted">

                                            <?php
                                            if($produk->produk_diskon > 0){
                                                echo 'Rp. ';
                                                echo number_format($produk->produk_harga*$produk->cart_produk_qty);
                                            };
                                            ?>
                                        </p>
                                        <h6>
                                            Rp.
                                            <?php
                                                if($produk->produk_diskon > 0){
                                                    echo number_format($hrgDiskon);
                                                }else{
                                                    echo number_format($produk->produk_harga*$produk->cart_produk_qty);
                                                };
                                                ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <?php
                $i++;
                endforeach;
                ?>

                <hr>
                <div class="px-5 pb-4">
                    <!-- <div class="row justify-content-between">
                        <h5 class="font-weight-bold">Total</h5>
                        <span class="float-right h5 d-flex justify-content-between">
                            Rp. &nbsp;
                            <p id="cartTotal" class=" m-0 p-0"></p>
                        </span>
                    </div> -->
                    <div class="row pt-3">
                        <button type="submit" class="btn btn-primary-gr btn-block text-white">Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>