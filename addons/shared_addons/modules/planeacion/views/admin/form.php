<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
    <div class="form-group">
        <label>Programa</label>
        <?=form_dropdown('iIdPrograma',array(''=>'[ Seleccionar ]')+$programas,$planeacion->iIdPrograma,'class="form-control" ')?>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <?=form_dropdown('iIdEstado',array(''=>'[ Seleccionar ]')+$estados,$planeacion->iIdEstado,'class="form-control" id="ddlEstado"')?>
    </div>
    <div class="form-group">
        <label>Municipio</label>
        <?=form_dropdown('iIdMunicipio',array(''=>'[ Seleccionar ]')+$municipios,$planeacion->iIdMunicipio,'class="form-control" id="ddlMunicipio"')?>
    </div>
    <div class="form-group">
        <label>Localidades</label>
         <?=form_dropdown('iIdLocalidad',array(''=>'[ Seleccionar ]')+$localidades,$planeacion->iIdLocalidad,'class="form-control" id="ddlLocalidad"')?>
        
    </div>
    
    <div class="form-buttons"> 
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>
<?php echo form_close();?>