<?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
    <div class="form-group">
        <label>Nombre</label>
        <?=form_dropdown('iIdProducto',$productos,$entrega->iIdProducto,'class="form-control"')?>
        
    </div>
    <div class="row">
        <div class="col-md-6">
             <div class="form-group">
                <label>Cantidad</label>
                <?=form_input('dCantidad',$entrega->dCantidad,'class="form-control" ')?>
            </div>
            <div class="form-group">
            <label>Fecha compromiso</label>
                <div class="input-group">
                    <?=form_input('dtFechaCompromiso',$entrega->dtFechaCompromiso,'class="form-control date-picker"')?>
                    <span class="input-group-addon"><i  class="icon icon-calendar"></i></span>
                </div>
            
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label>Entregado</label>
            <?=form_input('dCantidadEntregado',$entrega->dCantidadEntregado,'class="form-control"')?>
            </div>
            <div class="form-group">
            <label>Mes</label>
            <?=form_input('iMes',$entrega->iMes,'class="form-control"')?>
            </div>
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