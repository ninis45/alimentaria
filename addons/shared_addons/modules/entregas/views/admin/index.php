
<?php if(empty($id_planeacion)):?>
<div class="row-fluid">
<?php foreach ($items as $item):?>
    <div class="col-md-4 well">
        <a href="<?=base_url('admin/entregas/'.$item->iIdPlaneacionEntrega)?>">
        <h4><?=$item->cNombre?></h4>
        <p class="text-muted"><?=$item->estado?></p>
        </a>
        
    </div>
<?php endforeach;?>
</div>
<?php else: ?>
   <table class="table table-striped" cellspacing="0">
				<thead>
					<tr>
						<th >Producto</th>
						<th width="20%">Cantidad</th>
                        <th width="20%">Entregada</th>
                        <th width="20%">Fecha</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
                
                
                <tbody>
				<?php foreach ($items as $item):?>
					<tr>
						<td><?php echo $item->cNombre ?></td>
						<td><?php echo $item->dCantidad?></td>
                        <td><?php echo $item->dCantidadEntregado?></td>
                        <td><?php echo $item->dtFechaCompromiso?></td>
						<td class="actions">
						<?php echo anchor('admin/productos/edit/'.$item->iIdProducto, lang('buttons:edit'), 'class="button edit"') ?>
					
				        <?php echo anchor('admin/productos/delete/'.$item->iIdProducto, lang('buttons:delete'), 'class="confirm button delete"') ?>
						
						
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
</table>
<?php endif; ?>