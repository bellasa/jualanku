<div class="container-fluid position-absolute" id="search-bar">
    <form>
        <div class="input-group col-12 mt-4">
            <input class="form-control rounded-lg" id="search-input" type="search" placeholder="Cari . . .">
        </div>
    </form>
</div>

<div id="carousel-home" class="container-fluid no-gutters shadow-lg p-0">
    <div id="homeCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url();?>asset/img/baju1.jpg" class="d-block w-100 img-slider">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url();?>asset/img/senter.jpg" class="d-block w-100 img-slider">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url();?>asset/img/terong.jpg" class="d-block w-100 img-slider">
            </div>
        </div>
        <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- status -->
<div class="container-fluid position-absolute px-3" id="status">
    <div class="card custom-box col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
        <div class="row">
            <div class="col-md-4 d-none d-md-block text-center align-items-center">
                <img src="<?= base_url();?>asset/img/logo-name.png" style="width: 150px;" class="mt-3">
            </div>
            <div class="col-md-8 col-12 align-items-center">
                <div class="card-body">
                    <h5 class="font-weight-bold ml-n3 ">Toko Freedy Fred</h5>
                    <div class="row mb-3 h5">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-gray"></i>
                    </div>
                    <div class="row d-block ml">
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Pandjaitan No.5, Bandung, Jawa Barat
                    </div>
                    <div class="row d-block ml">
                        <i class="fas fa-star-half-alt"></i>
                        Total review 9 | <a class="text-gr">Lihat Ulasan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- card -->
<div id="main" class="row no-gutters">
    <div class="card col-12 shadow rounded-0">

        <!-- promo -->
        <div class="card-body px-0" id="after-slider">
            <div class="card-header">
                <b>Promo</b>
                <small class="float-right">Lainnya</small>
            </div>
            <div class="scrolling-wrapper row flex-row flex-nowrap mt-2 pb-1 mx-1">

                <?php 
                $count = 1;
                foreach($promo_produk  as $p):
                $pid = $p['produk_id'];
                $imgmain = $this->Cart_model->get_produk_img_one($pid); 
                ?>
                <div class="col-lg-2 col-md-3 col-5 px-1">
                    <div class="card shadow-sm">
                        <img src="<?= base_url();?>asset/img/<?= $imgmain->img_name ;?>" class="card-img-top m-0 p-0"
                            style="width: 100%;height: 150px;object-fit: cover;">
                        <div class="card-img-overlay p-0 p-1">
                            <?php
                                if($p['produk_diskon']>0){ 
                                echo '<h5><span class="badge badge-danger">Promo</span></h5>';
                                }
                                ?>
                        </div>
                        <div class="card-body p-0 m-2">
                            <p class="my-0"><b><?= $p['produk_nama'] ;?></b></p>
                            <small class="text-gray-600 discount m-0">
                                <?php
                                if($p['produk_diskon']>0){ 
                                echo 'Rp. ';
                                echo number_format($p['produk_harga']);
                                }
                                ?>
                            </small>
                            <p class="mb-3">
                                <?php if($p['produk_diskon']>0){ 
                                    $harga = $p['produk_harga']-$p['produk_diskon'];
                                    echo 'Rp. ';
                                    echo number_format($harga);
                                }else{
                                    echo 'Rp. ';
                                    echo number_format($p['produk_harga']);
                                };?></p>
                            <button type="button" class="btn btn-primary-gr btn btn-block stretched-link"
                                data-toggle="modal" data-target="#produk<?= $count;?>">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal h-100 w-100" id="produk<?= $count;?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="p-2">
                                <button type="button" class="close  float-left" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- carousel -->
                                <div id="modalCarousel" class="carousel slide" data-interval="false">
                                    <div class="carousel-inner ">
                                        <?php
                                        $imgnum=$this->Cart_model->get_produk_img_count($pid);
                                        $imgcap=$this->Cart_model->get_produk_img_all($pid);
                                        $in=1;
                                        foreach($imgcap as $imgcap):
                                        ?>

                                            <div class="carousel-item  <?php if($in==1){ echo 'active';}; ?>">
                                                <img src="<?= base_url();?>asset/img/<?= $imgcap['img_name'];?>" class="d-block img-slider-modal w-100">
                                            </div>
                                            
                                        <?php
                                        $in++;
                                        endforeach;
                                        ?>


                                    </div>
                                    <?php if($imgnum>1){  ?>
                                    <a class="carousel-control-prev" href="#modalCarousel" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#modalCarousel" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <?php }; ?>
                                </div>
                                <!-- endcarousel -->

                                <!-- section 1 -->
                                <p class="h5 my-3"><b><?= $p['produk_nama']; ?></b></p>
                                <p class="text-gray discount m-0">
                                    <?php
                                    if($p['produk_diskon']>0){ 
                                        echo 'Rp. ';
                                        echo number_format($p['produk_harga']);
                                    }
                                    ?>
                                </p>
                                <h5 class="mb-3">
                                    <?php 
                                    if($p['produk_diskon']>0){ 
                                    $harga = $p['produk_harga']-$p['produk_diskon'];
                                        echo 'Rp. ';
                                        echo number_format($harga);
                                    }else{
                                        echo 'Rp. ';
                                        echo number_format($p['produk_harga']);
                                    };
                                    ?>
                                </h5>

                                <!--  variant 1 -->
                                <?php
                                $pid = $p['produk_id'];
                                $var = $this->Cart_model->get_where_variant($pid);
                                if(!empty($var)){?>
                                    <hr>
                                    <p class="font-weight-bold"><?= $p['produk_variant_nama'];?></p>
                                    <div class="radio-toolbar pl-2"> 
                                    <?php
                                    $i=1;
                                    foreach($var as $var):?>
                                    
                                    <div class="row">
                                        <input type="radio" id="<?= $i;?>id<?= $p['produk_id'];?>" name="var<?= $p['produk_id'];?>" value="<?= $var['variant'];?>">
                                        <label for="<?= $i;?>id<?= $p['produk_id'];?>" class="btn btn-block text-left"><?= $var['variant'];?></label>
                                    </div> 
                                
                                    <?php
                                    $i++; 
                                    endforeach;
                                    ?>
                                    </div>
                                    <?php
                                };?>
                                
                                <hr>
                                <!-- section 3 -->
                                <div class="row">
                                    <div class="col-4 font-weight-bold">
                                        Stok
                                    </div>
                                    <div class="col-8">
                                        <?= $p['produk_stock'];?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-weight-bold">
                                        Berat
                                    </div>
                                    <div class="col-8">
                                        <?= $p['produk_berat'];?> gram
                                    </div>
                                </div>
                                <!-- endsection 3 -->
                                <hr>

                                <p>
                                    <?= nl2br($p['produk_deskripsi']);?>
                                </p>

                            </div>
                            <div class="container no-gutters">
                                <form class="my-1">
                                    <input type="number" class="inputspin" value="1" min="1" max="<?= $p['produk_stock'];?>">
                                </form>
                                <div class="row pb-3 pt-1">
                                    <button class="btn btn-primary-gr btn-block m-0">Tambahkan Ke Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                $count++;        
                endforeach;?>
            </div>
        </div>

        <!-- Kategori -->
        <div class="card-body px-0">
            <div class="card-header">
                <b>Kategori</b>
            </div>
            <div class="container-fluid no-gutters px-2">

                <div class="card mt-1">
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col-2 text-center">
                                <i class="fas fa-tshirt text-gr"></i>
                            </div>
                            <div class="col-10 d-inline">
                                Pakaian <b class="text-bold float-right">></b>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-1">
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col-2 text-center">
                                <i class="fas fa-utensils text-gr"></i>
                            </div>
                            <div class="col-10 d-inline">
                                Makanan dan Minuman <b class="text-bold float-right">></b>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-1">
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col-2 text-center">
                                <i class="fas fa-mobile text-gr"></i>
                            </div>
                            <div class="col-10 d-inline">
                                Alat Elektronik <b class="text-bold float-right">></b>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-1">
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col-2 text-center">
                                <i class="fas fa-home text-gr"></i>
                            </div>
                            <div class="col-10 d-inline">
                                Perlengkapan Rumah <b class="text-bold float-right">></b>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-1">
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col-2 text-center">
                                <i class="fas fa-first-aid text-gr"></i>
                            </div>
                            <div class="col-10 d-inline">
                                Kesehatan <b class="text-bold float-right">></b>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <!-- voucher -->
        <div class="card-body px-0">
            <div class="card-header">
                <b>Voucher</b>
                <small class="float-right">Lainnya</small>
            </div>
            <div class="scrolling-wrapper row flex-row flex-nowrap mt-2 pb-1 mx-1">

                <div class="col-lg-1 col-md-3 col-5 px-1">
                    <div class="card shadow-sm bg-gr-yellow voucher">
                        <div class="voucher-body m-2 text-white">
                            <p class="h5"><b>Diskon</b></p>
                            <p class="h5"><b>10%</b>*</p>
                            <hr>
                            <small>Berlaku hingga <b>10 Desember</b></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-3 col-5 px-1">
                    <div class="card shadow-sm bg-gr-yellow voucher">
                        <div class="voucher-body m-2 text-white">
                            <p class="h5"><b>Potongan</b></p>
                            <p class="h5"><b>Rp. 10,000</b>*</p>
                            <hr>
                            <small>Berlaku hingga <b>10 Desember</b></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-3 col-5 px-1">
                    <div class="card shadow-sm bg-gr-yellow voucher">
                        <div class="voucher-body m-2 text-white">
                            <p class="h5"><b>Gratis</b></p>
                            <p class="h5"><b>Ongkir</b>*</p>
                            <hr>
                            <small>Berlaku hingga <b>10 Desember</b></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- all produk -->
        



    </div>
</div>




<div class="pt-4 mb-5"></div>
</div>