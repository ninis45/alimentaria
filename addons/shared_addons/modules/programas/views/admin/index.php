<table class="table table-striped" cellspacing="0">
				<thead>
					<tr>
						<th >Nombre</th>
						<th width="20%">Actualizado</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
                
                
                <tbody>
				<?php foreach ($items as $item):?>
					<tr>
						<td><?php echo $item->cNombre ?></td>
						<td><?php echo $item->dtModificacion ?></td>
						<td class="actions">
						<?php echo anchor('admin/programas/edit/'.$item->iIdPrograma, lang('buttons:edit'), 'class="button edit"') ?>
					
				        <?php echo anchor('admin/programas/delete/'.$item->iIdPrograma, lang('buttons:delete'), 'class="confirm button delete"') ?>
						
						
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
</table>