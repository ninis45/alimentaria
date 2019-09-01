<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
    <div class="form-group">
        <label>Estado</label>
        <?=form_dropdown('iIdEstado',$estados,$municipio->iIdEstado,'class="form-control"')?>
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <?=form_input('cNombre',$municipio->cNombre,'class="form-control"')?>
        
    </div>
    <div class="form-group">
        <label>Codigo</label>
        <?=form_input('cCodigo',$municipio->cCodigo,'class="form-control"')?>
        
    </div>
    
    <div class="form-buttons"> 
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>
<?php echo form_close();?>