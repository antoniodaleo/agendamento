<?php echo $this->extend('Back/Layout/main');   ?>

<!-- Sezione del Titolo -->
<?php echo $this->section('title');    ?>
<?php echo $title; ?>
<?php echo $this->endSection();    ?>

<!-- Sezione del Style -->
<?php echo $this->section('css');    ?>
<!-- Custom styles for this page -->
<link href="<?php echo base_url('back/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<?php echo $this->endSection();    ?>


<!-- #############Sezione del Contenuto####################### -->
<?php echo $this->section('content');    ?>

<!-- Begin Page Content -->
<div class="container-fluid">
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title ;  ?></h6>
            <a href="<?php echo route_to('services.new') ?>" class="btn btn-success btn-sm float-right" >Novo</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php echo $services; ?>

            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection();    ?>
<!-- ############/.container-fluid############################ -->



<!-- Sezione del js -->
<?php echo $this->section('js');    ?>

<!-- Page level plugins -->
<script src="<?php echo base_url('back/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('back/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('back/'); ?>js/demo/datatables-demo.js"></script>

<?php echo $this->endSection();    ?>