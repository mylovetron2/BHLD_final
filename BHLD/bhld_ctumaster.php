<?php
namespace PHPMaker2020\projectBHLD;
?>
<?php if ($bhld_ctu->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_bhld_ctumaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($bhld_ctu->mact->Visible) { // mact ?>
		<tr id="r_mact">
			<td class="<?php echo $bhld_ctu->TableLeftColumnClass ?>"><?php echo $bhld_ctu->mact->caption() ?></td>
			<td <?php echo $bhld_ctu->mact->cellAttributes() ?>>
<span id="el_bhld_ctu_mact">
<span<?php echo $bhld_ctu->mact->viewAttributes() ?>><?php echo $bhld_ctu->mact->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_ctu->ngct->Visible) { // ngct ?>
		<tr id="r_ngct">
			<td class="<?php echo $bhld_ctu->TableLeftColumnClass ?>"><?php echo $bhld_ctu->ngct->caption() ?></td>
			<td <?php echo $bhld_ctu->ngct->cellAttributes() ?>>
<span id="el_bhld_ctu_ngct">
<span<?php echo $bhld_ctu->ngct->viewAttributes() ?>><?php echo $bhld_ctu->ngct->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_ctu->mapb->Visible) { // mapb ?>
		<tr id="r_mapb">
			<td class="<?php echo $bhld_ctu->TableLeftColumnClass ?>"><?php echo $bhld_ctu->mapb->caption() ?></td>
			<td <?php echo $bhld_ctu->mapb->cellAttributes() ?>>
<span id="el_bhld_ctu_mapb">
<span<?php echo $bhld_ctu->mapb->viewAttributes() ?>><?php echo $bhld_ctu->mapb->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_ctu->manv->Visible) { // manv ?>
		<tr id="r_manv">
			<td class="<?php echo $bhld_ctu->TableLeftColumnClass ?>"><?php echo $bhld_ctu->manv->caption() ?></td>
			<td <?php echo $bhld_ctu->manv->cellAttributes() ?>>
<span id="el_bhld_ctu_manv">
<span<?php echo $bhld_ctu->manv->viewAttributes() ?>><?php echo $bhld_ctu->manv->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_ctu->ghichu->Visible) { // ghichu ?>
		<tr id="r_ghichu">
			<td class="<?php echo $bhld_ctu->TableLeftColumnClass ?>"><?php echo $bhld_ctu->ghichu->caption() ?></td>
			<td <?php echo $bhld_ctu->ghichu->cellAttributes() ?>>
<span id="el_bhld_ctu_ghichu">
<span<?php echo $bhld_ctu->ghichu->viewAttributes() ?>><?php echo $bhld_ctu->ghichu->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_ctu->madm->Visible) { // madm ?>
		<tr id="r_madm">
			<td class="<?php echo $bhld_ctu->TableLeftColumnClass ?>"><?php echo $bhld_ctu->madm->caption() ?></td>
			<td <?php echo $bhld_ctu->madm->cellAttributes() ?>>
<span id="el_bhld_ctu_madm">
<span<?php echo $bhld_ctu->madm->viewAttributes() ?>><?php echo $bhld_ctu->madm->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>