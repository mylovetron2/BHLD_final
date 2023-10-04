<?php
namespace PHPMaker2020\projectBHLD;
?>
<?php if ($bhld_view_nhanvien->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_bhld_view_nhanvienmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($bhld_view_nhanvien->mapb->Visible) { // mapb ?>
		<tr id="r_mapb">
			<td class="<?php echo $bhld_view_nhanvien->TableLeftColumnClass ?>"><?php echo $bhld_view_nhanvien->mapb->caption() ?></td>
			<td <?php echo $bhld_view_nhanvien->mapb->cellAttributes() ?>>
<span id="el_bhld_view_nhanvien_mapb">
<span<?php echo $bhld_view_nhanvien->mapb->viewAttributes() ?>><?php echo $bhld_view_nhanvien->mapb->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_view_nhanvien->manv->Visible) { // manv ?>
		<tr id="r_manv">
			<td class="<?php echo $bhld_view_nhanvien->TableLeftColumnClass ?>"><?php echo $bhld_view_nhanvien->manv->caption() ?></td>
			<td <?php echo $bhld_view_nhanvien->manv->cellAttributes() ?>>
<span id="el_bhld_view_nhanvien_manv">
<span<?php echo $bhld_view_nhanvien->manv->viewAttributes() ?>><?php echo $bhld_view_nhanvien->manv->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_view_nhanvien->tennhanvien->Visible) { // tennhanvien ?>
		<tr id="r_tennhanvien">
			<td class="<?php echo $bhld_view_nhanvien->TableLeftColumnClass ?>"><?php echo $bhld_view_nhanvien->tennhanvien->caption() ?></td>
			<td <?php echo $bhld_view_nhanvien->tennhanvien->cellAttributes() ?>>
<span id="el_bhld_view_nhanvien_tennhanvien">
<span<?php echo $bhld_view_nhanvien->tennhanvien->viewAttributes() ?>><?php echo $bhld_view_nhanvien->tennhanvien->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>