<h2>List of <?php echo $title; ?></h2>
<hr />
<?php echo anchor('product/add','NEW PRODUCT'); ?>
<br/>
<br>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>NOTE</th>
			<th>PRICE</th>
			<th>STOCK</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($product_list as $list) { ?>
		<tr>
			<td><?php echo $list->id_item ?></td>
			<td><?php echo $list->item_name ?></td>
			<td><?php echo $list->note ?></td>
			<td><?php echo $list->price ?></td>
			<td><?php echo $list->stock.' '.$list->unit ?></td>
			<td> <?php echo anchor('product/edit/'.$list->id_item,'Edit') ?> || <?php echo anchor('product/delete/'.$list->id_item,'Delete') ?></td>
		</tr>
		<?php	} 	?>	
	</tbody>
</table>
