<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
    <div class="form-group">
        <label>Nombre</label>
        <?=form_input('cNombre',$estado->cNombre,'class="form-control"')?>
        
    </div>
    <div class="form-group">
        <label>Codigo</label>
        <?=form_input('cCodigo',$estado->cCodigo,'class="form-control"')?>
        
    </div>
    
    <div class="form-buttons"> 
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>
<?php echo form_close();?>