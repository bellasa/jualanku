<nav class="navbar navbar-expand-lg navbar-dark bg-light shadow-xl fixed-bottom">
    <div class="container mt-2">
        <?php 
            $pg = $this->uri->segment('2');
        ?>
        <div class="col-4 text-center">
            <a class="text-nav-gr <?php if($pg=='cart'){ echo 'active';};?>" href="<?= base_url();?>home/cart"><i
                    class="h5 m-0 p-0 fas fa-shopping-cart"></i></a><span
                class="badge badge-danger nav-badge">9</span><br>
            <small>Keranjang</small>
        </div>
        <div class="col-4 text-center">
            <a class="text-nav-gr <?php if($pg=='index'){ echo 'active';} elseif($pg==''){ echo 'active';};?>"
                href="<?= base_url();?>home/index"><i class="h5 m-0 p-0 fas fa-shopping-bag"></i></a><br>
            <small>Belanja</small>
        </div>
        <div class="col-4 text-center">
            <a class="text-nav-gr <?php if($pg=='account'){ echo 'active';};?>" href="<?= base_url();?>home/account"><i
                    class="h5  m-0 p-0 fas fa-user"></i></a>
            <br>
            <small>Akun</small>
        </div>
    </div>
</nav>