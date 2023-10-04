<?php
namespace PHPMaker2020\projectBHLD;
?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master->Visible) { ?>
<div class="ew-master-div">
<table id="tbl__bhld_view_chungtu_danhan_theothang_mastermaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($_bhld_view_chungtu_danhan_theothang_master->ngnhan->Visible) { // ngnhan ?>
		<tr id="r_ngnhan">
			<td class="<?php echo $_bhld_view_chungtu_danhan_theothang_master->TableLeftColumnClass ?>"><?php echo $_bhld_view_chungtu_danhan_theothang_master->ngnhan->caption() ?></td>
			<td <?php echo $_bhld_view_chungtu_danhan_theothang_master->ngnhan->cellAttributes() ?>>
<span id="el__bhld_view_chungtu_danhan_theothang_master_ngnhan">
<span<?php echo $_bhld_view_chungtu_danhan_theothang_master->ngnhan->viewAttributes() ?>><?php echo $_bhld_view_chungtu_danhan_theothang_master->ngnhan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master->manv->Visible) { // manv ?>
		<tr id="r_manv">
			<td class="<?php echo $_bhld_view_chungtu_danhan_theothang_master->TableLeftColumnClass ?>"><?php echo $_bhld_view_chungtu_danhan_theothang_master->manv->caption() ?></td>
			<td <?php echo $_bhld_view_chungtu_danhan_theothang_master->manv->cellAttributes() ?>>
<span id="el__bhld_view_chungtu_danhan_theothang_master_manv">
<span<?php echo $_bhld_view_chungtu_danhan_theothang_master->manv->viewAttributes() ?>><?php echo $_bhld_view_chungtu_danhan_theothang_master->manv->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master->mapb->Visible) { // mapb ?>
		<tr id="r_mapb">
			<td class="<?php echo $_bhld_view_chungtu_danhan_theothang_master->TableLeftColumnClass ?>"><?php echo $_bhld_view_chungtu_danhan_theothang_master->mapb->caption() ?></td>
			<td <?php echo $_bhld_view_chungtu_danhan_theothang_master->mapb->cellAttributes() ?>>
<span id="el__bhld_view_chungtu_danhan_theothang_master_mapb">
<span<?php echo $_bhld_view_chungtu_danhan_theothang_master->mapb->viewAttributes() ?>><?php echo $_bhld_view_chungtu_danhan_theothang_master->mapb->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>