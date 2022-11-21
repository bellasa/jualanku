
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url();?>asset/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url();?>asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url();?>asset/js/sb-admin-2.min.js"></script>
<script src="<?= base_url();?>asset/js/spinner.js"></script>
<script src="<?= base_url();?>asset/js/my.js"></script>

<?php 
if(isset($myscript)){
    echo $myscript;
}
?>


<!-- Page level plugins -->
<!-- <script src="//asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="//asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>


<script src="//asset/js/demo/datatables-demo.js"></script> -->
</body>

</html>