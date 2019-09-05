<table class="table table-striped" cellspacing="0">
				<thead>
					<tr>
                        <th >Programa</th>
                        <th >Estado</th>
						<th >Municipio</th>
                        <th width="20%">Localidad</th>
						<th width="20%">Actualizado</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
                
                
                <tbody>
				<?php foreach ($items as $item):?>
					<tr>
                        <td><?php echo $item->programa?></td>
                        <td><?php echo $item->estado ?></td>
						<td><?php echo $item->municipio ?></td>
                        <td><?php echo $item->localidad?></td>
						<td><?php echo $item->dtModificacion ?></td>                        
						<td class="actions">
						<?php echo anchor('admin/planeacion/edit/'.$item->iIdPlaneacionEntrega, lang('buttons:edit'), 'class="button edit"') ?>
					
				        <?php echo anchor('admin/planeacion/delete/'.$item->iIdPlaneacionEntrega, lang('buttons:delete'), 'class="confirm button delete"') ?>
						
						
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
</table>