<?php echo $this->extend('Back/Layout/main');   ?>

<!-- Sezione del Titolo -->
<?php echo $this->section('title');    ?>
<?php echo $title; ?>
<?php echo $this->endSection();    ?>

<!-- Sezione del Style -->
<?php echo $this->section('css');    ?>



<?php echo $this->endSection();    ?>


<!-- #############Sezione del Contenuto####################### -->
<?php echo $this->section('content');    ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title;  ?></h6>
            <a href="<?php echo route_to('services.new') ?>" class="btn btn-success btn-sm float-right" >Nova</a>
        </div>
        <div class="card-body">
            <?php echo form_open(route_to('services.create')); ?>

            <?php echo $this->include('Back/Services/_form'); ?>
           

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<?php echo $this->endSection();    ?>
<!-- ############/.container-fluid############################ -->


<!-- Sezione del js -->
<?php echo $this->section('js');    ?>

<script src="<?php  echo base_url('back/mask/jquery.mask.min.js') ?>"></script>
<script src="<?php  echo base_url('back/mask/app.js') ?>"></script>



<?php echo $this->endSection();    ?>