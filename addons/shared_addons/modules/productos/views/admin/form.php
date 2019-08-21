<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
    <div class="form-group">
        <label>Nombre</label>
        <?=form_input('nombre',$producto->nombre,'class="form-control"')?>
        
    </div>
    <div class="form-group">
        <label>Precio compra</label>
        <?=form_input('precio',$producto->precio,'class="form-control"')?>
        
    </div>
    <div class="form-group">
        <label>Peso</label>
        <?=form_input('peso',$producto->peso,'class="form-control"')?>
        
    </div>
    <?php if(!empty($producto->created_on)){?>
    <hr />
    Ultima actualizacion: <?=$producto->created_on?>
    <?php }?>
    <div class="form-buttons"> 
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>
<?php echo form_close();?>