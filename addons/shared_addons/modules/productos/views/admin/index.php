<table class="table table-striped" cellspacing="0">
				<thead>
					<tr>
						<th >Nombre</th>
						<th width="20%">Precio</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
                
                
                <tbody>
				<?php foreach ($items as $item):?>
					<tr>
						<td><?php echo $item->cNombre ?></td>
						<td><?php echo $item->dPrecioCompra ?></td>
						<td class="actions">
						<?php echo anchor('admin/productos/edit/'.$item->iIdProducto, lang('buttons:edit'), 'class="button edit"') ?>
					
				        <?php echo anchor('admin/productos/delete/'.$item->iIdProducto, lang('buttons:delete'), 'class="confirm button delete"') ?>
						
						
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
</table>