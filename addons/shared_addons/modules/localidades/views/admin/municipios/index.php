<table class="table table-striped" cellspacing="0">
				<thead>
					<tr>
                        <th >Estado</th>
						<th >Municipio</th>
                        <th width="20%">Codigo</th>
						<th width="20%">Actualizado</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
                
                
                <tbody>
				<?php foreach ($items as $item):?>
					<tr>
                        <td><?php echo $item->estado ?></td>
						<td><?php echo $item->municipio ?></td>
                        <td><?php echo $item->cCodigo?></td>
						<td><?php echo $item->dtModificacion ?></td>                        
						<td class="actions">
						<?php echo anchor('admin/localidades/municipios/edit/'.$item->iIdMunicipio, lang('buttons:edit'), 'class="button edit"') ?>
					
				        <?php echo anchor('admin/localidades/municipios/delete/'.$item->iIdMunicipio, lang('buttons:delete'), 'class="confirm button delete"') ?>
						
						
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
</table>