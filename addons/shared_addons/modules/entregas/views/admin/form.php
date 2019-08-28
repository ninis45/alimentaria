<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
    <div class="form-group">
        <label>Nombre</label>
        <?=form_dropdown('iIdProducto',$productos,$entrega->iIdProducto,'class="form-control"')?>
        
    </div>
    <div class="row">
        <div class="col-md-6 form-group">
            <label>Cantidad</label>
            <?=form_input('cantidad',$entrega->dCantidad,'class="form-control"')?>
            
        </div>
        <div class="col-md-6  form-group">
            <label>Entregado</label>
            <?=form_input('peso',$entrega->dCantidadEntregado,'class="form-control"')?>
            
        </div>
    </div>
    
    <?php if(!empty($producto->created_on)){?>
    <hr />
    Ultima actualizacion: <?=$producto->created_on?>
    <?php }?>
    <div class="form-buttons"> 
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>
<?php echo form_close();?>