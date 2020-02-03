<?php echo form_open('product/save_edit') ?>
<?php echo form_hidden('item_id',$product['id_item']) ?>
<table>
	<tr>
		<td>NAME</td>
		<td><?php echo form_input('item_name',$product['item_name'],array('placeholder'=>'Name')) ?></td>
	</tr>
	<tr>
		<td>NOTE</td>
		<td><?php echo form_textarea('item_note',$product['note'],array('placeholder'=>'Note')) ?></td>
	</tr>		
	<tr>
		<td>PRICE</td>
		<td><?php echo form_input('item_price',$product['price'],array('placeholder'=>'Price')) ?></td>
	</tr>
	<tr>
		<td>STOCK</td>
		<td><?php echo form_input('item_stock',$product['stock'],array('placeholder'=>'Stock')) ?></td>
	</tr>
	<tr>
		<td>UNIT</td>
		<td><?php echo form_input('item_unit',$product['unit'],array('placeholder'=>'Unit Name')) ?></td>
	</tr>
	<tr>
		<td colspan="2"> <hr><?php echo form_submit('submit', 'Update Item!'); ?> <?php echo anchor('product','Back') ?></td>
	</tr>
</table>
<?php echo form_close(); ?>