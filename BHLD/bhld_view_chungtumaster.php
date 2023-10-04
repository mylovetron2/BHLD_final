<?php
namespace PHPMaker2020\projectBHLD;
?>
<?php if ($bhld_view_chungtu->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_bhld_view_chungtumaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($bhld_view_chungtu->mact->Visible) { // mact ?>
		<tr id="r_mact">
			<td class="<?php echo $bhld_view_chungtu->TableLeftColumnClass ?>"><?php echo $bhld_view_chungtu->mact->caption() ?></td>
			<td <?php echo $bhld_view_chungtu->mact->cellAttributes() ?>>
<span id="el_bhld_view_chungtu_mact">
<span<?php echo $bhld_view_chungtu->mact->viewAttributes() ?>><?php echo $bhld_view_chungtu->mact->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_view_chungtu->manv->Visible) { // manv ?>
		<tr id="r_manv">
			<td class="<?php echo $bhld_view_chungtu->TableLeftColumnClass ?>"><?php echo $bhld_view_chungtu->manv->caption() ?></td>
			<td <?php echo $bhld_view_chungtu->manv->cellAttributes() ?>>
<span id="el_bhld_view_chungtu_manv">
<span<?php echo $bhld_view_chungtu->manv->viewAttributes() ?>><?php echo $bhld_view_chungtu->manv->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_view_chungtu->ngct->Visible) { // ngct ?>
		<tr id="r_ngct">
			<td class="<?php echo $bhld_view_chungtu->TableLeftColumnClass ?>"><?php echo $bhld_view_chungtu->ngct->caption() ?></td>
			<td <?php echo $bhld_view_chungtu->ngct->cellAttributes() ?>>
<span id="el_bhld_view_chungtu_ngct">
<span<?php echo $bhld_view_chungtu->ngct->viewAttributes() ?>><?php echo $bhld_view_chungtu->ngct->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_view_chungtu->mapb->Visible) { // mapb ?>
		<tr id="r_mapb">
			<td class="<?php echo $bhld_view_chungtu->TableLeftColumnClass ?>"><?php echo $bhld_view_chungtu->mapb->caption() ?></td>
			<td <?php echo $bhld_view_chungtu->mapb->cellAttributes() ?>>
<span id="el_bhld_view_chungtu_mapb">
<span<?php echo $bhld_view_chungtu->mapb->viewAttributes() ?>><?php echo $bhld_view_chungtu->mapb->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_view_chungtu->ghichu->Visible) { // ghichu ?>
		<tr id="r_ghichu">
			<td class="<?php echo $bhld_view_chungtu->TableLeftColumnClass ?>"><?php echo $bhld_view_chungtu->ghichu->caption() ?></td>
			<td <?php echo $bhld_view_chungtu->ghichu->cellAttributes() ?>>
<span id="el_bhld_view_chungtu_ghichu">
<span<?php echo $bhld_view_chungtu->ghichu->viewAttributes() ?>><?php echo $bhld_view_chungtu->ghichu->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_view_chungtu->madm->Visible) { // madm ?>
		<tr id="r_madm">
			<td class="<?php echo $bhld_view_chungtu->TableLeftColumnClass ?>"><?php echo $bhld_view_chungtu->madm->caption() ?></td>
			<td <?php echo $bhld_view_chungtu->madm->cellAttributes() ?>>
<span id="el_bhld_view_chungtu_madm">
<span<?php echo $bhld_view_chungtu->madm->viewAttributes() ?>><?php echo $bhld_view_chungtu->madm->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>