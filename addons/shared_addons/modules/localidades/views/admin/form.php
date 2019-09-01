<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
   <div class="form-group">
        <label>Estado</label>
        <?=form_dropdown('iIdEstado',array(''=>'[ Seleccionar ]')+$estados,$iIdEstado,'class="form-control" id="ddlEstado"')?>
    </div>
    <div class="form-group">
        <label>Municipio</label>
        <?=form_dropdown('iIdMunicipio',$municipios,$localidad->iIdMunicipio,'class="form-control" id="ddlMunicipio"')?>
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <?=form_input('cNombre',$localidad->cNombre,'class="form-control"')?>
        
    </div>
    
    
    <div class="form-buttons"> 
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>
<?php echo form_close();?>