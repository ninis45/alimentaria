<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
    <div class="form-group">
        <label>Nombre</label>
        <?=form_input('cNombre',$programa->cNombre,'class="form-control"')?>
        
    </div>
    
    <div class="form-buttons"> 
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>
<?php echo form_close();?>