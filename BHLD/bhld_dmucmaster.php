<?php
namespace PHPMaker2020\projectBHLD;
?>
<?php if ($bhld_dmuc->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_bhld_dmucmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($bhld_dmuc->madm->Visible) { // madm ?>
		<tr id="r_madm">
			<td class="<?php echo $bhld_dmuc->TableLeftColumnClass ?>"><?php echo $bhld_dmuc->madm->caption() ?></td>
			<td <?php echo $bhld_dmuc->madm->cellAttributes() ?>>
<span id="el_bhld_dmuc_madm">
<span<?php echo $bhld_dmuc->madm->viewAttributes() ?>><?php echo $bhld_dmuc->madm->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($bhld_dmuc->mota->Visible) { // mota ?>
		<tr id="r_mota">
			<td class="<?php echo $bhld_dmuc->TableLeftColumnClass ?>"><?php echo $bhld_dmuc->mota->caption() ?></td>
			<td <?php echo $bhld_dmuc->mota->cellAttributes() ?>>
<span id="el_bhld_dmuc_mota">
<span<?php echo $bhld_dmuc->mota->viewAttributes() ?>><?php echo $bhld_dmuc->mota->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>