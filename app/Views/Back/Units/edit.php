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
        </div>
        <div class="card-body">
            <?php echo form_open(route_to('units.update', $unit->id), hidden: ['_method' => 'PUT']); ?>


            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" value="<?php echo old('name', $unit->name);  ?>" id="name" name="name" aria-describedby="nameHelp" placeholder="Nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Telefone</label>
                    <input type="tel" class="form-control" value="<?php echo old('phone', $unit->phone);  ?>" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Telefone">
                </div>
                <div class="form-group col-md-4">
                    <label for="coordinator">Coordenador</label>
                    <input type="text" class="form-control" value="<?php echo old('coordinator', $unit->coordinator);  ?>" id="coordinator" name="coordinator" aria-describedby="coordinatorHelp" placeholder="Coordenador">
                </div>

                <div class="form-group col-md-4">
                    <label for="coordinator">Start Time</label>
                    <input type="text" class="form-control" value="<?php echo old('coordinator', $unit->coordinator);  ?>" id="coordinator" name="coordinator" aria-describedby="coordinatorHelp" placeholder="Coordenador">
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<?php echo $this->endSection();    ?>
<!-- ############/.container-fluid############################ -->


<!-- Sezione del js -->
<?php echo $this->section('js');    ?>



<?php echo $this->endSection();    ?>