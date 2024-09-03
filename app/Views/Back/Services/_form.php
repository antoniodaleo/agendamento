<div class="row">
    <div class="form-group col-md-4">
        <label for="name">Nome</label>
        <input type="text" class="form-control" value="<?php echo old('name', $unit->name);  ?>" id="name" name="name" aria-describedby="nameHelp" placeholder="Nome">
        <?php echo show_error_input('name') ?>

    </div>
    <div class="form-group col-md-4">
        <label for="phone">Telefone</label>
        <input type="tel" class="form-control phone_with_ddd" value="<?php echo old('phone', $unit->phone);  ?>" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Telefone">
    </div>
    <div class="form-group col-md-4">
        <label for="coordinator">Coordenador</label>
        <input type="text" class="form-control" value="<?php echo old('coordinator', $unit->coordinator);  ?>" id="coordinator" name="coordinator" aria-describedby="coordinatorHelp" placeholder="Coordenador">
    </div>

    <div class="form-group col-md-4">
        <label for="starttime">Inicio expediente</label>
        <input type="time" class="form-control" value="<?php echo old('starttime', $unit->starttime);  ?>" id="starttime" name="starttime" aria-describedby="starttimeHelp" placeholder="Inicio expediente">
    </div>
    <div class="form-group col-md-4">
        <label for="endtime">Final expediente</label>
        <input type="time" class="form-control" value="<?php echo old('endtime', $unit->endtime);  ?>" id="endtime" name="endtime" aria-describedby="endtimeHelp" placeholder="Final expediente">
    </div>
    <div class="form-group col-md-4">
        <label for="endtime">Tempó de cada atendimento</label>

        <?php echo $timesInterval;  ?>

    </div>
    <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="<?php echo old('email', $unit->email);  ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
        <label for="address">Endereço</label>
        <input type="text" class="form-control" value="<?php echo old('address', $unit->address);  ?>" id="address" name="address" aria-describedby="addressHelp" placeholder="Endereço">
    </div>

    <div class="col-md-12 mb-3 mt-4">
        <div class="custom-control custom-checkbox">
            <?php echo form_hidden('active', '0');  ?>
            <input type="checkbox" name="active" value="1" <?php if ($unit->active): ?>checked<?php endif; ?> class="custom-control-input" id="active">
            <label class="custom-control-label" for="active">Registro ativo</label>
        </div>
    </div>


</div>


<button type="submit" class="btn btn-primary mt-4">Salvar</button>
<a href="<?php echo route_to('units') ?>" class="btn btn-secondary mt-4">Voltar</a>