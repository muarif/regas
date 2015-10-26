<?php echo $this->session->flashdata('msgSuccess')?>
<h2 class="formHeader">Daftar Penyedia Barang / Jasa Terdaftar</h2>
<div class="tableWrapper" style="margin-bottom: 20px">
	<table class="tableData">
		<thead>
			<tr>
				<td><a href="?<?php echo $this->utility->generateLink('sort','desc')?>&sort=<?php echo ($sort['peserta_name'] == 'asc') ? 'desc' : 'asc'; ?>&by=peserta_name">Peserta<i class="fa fa-sort-<?php echo ($sort['peserta_name'] == 'asc') ? 'desc' : 'asc'; ?>"></i></a></td>
				<td><a href="?<?php echo $this->utility->generateLink('sort','desc')?>&sort=<?php echo ($sort['point'] == 'asc') ? 'desc' : 'asc'; ?>&by=point">Nilai<i class="fa fa-sort-<?php echo ($sort['point'] == 'asc') ? 'desc' : 'asc'; ?>"></i></a></td>
				<td colspan="2">Action</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		if(count($list)){
			foreach($list as $row => $value){
			?>
				<tr>
					<td><?php echo $value['peserta_name'];?></td>
					<td><?php echo (isset($value['point']))?$value['point']:'-';?></td>
					<td class="actionBlock">
							<a href="<?php echo site_url('assessment/form_assessment/'.$id.'/'.$value['id_vendor'])?>"><i class="fa fa-check-square-o"></i>&nbsp;Penilaian</a>
						</td>
				</tr>
			<?php 
			}
		}else{?>
			<tr>
				<td colspan="11" class="noData">Data tidak ada</td>
			</tr>
		<?php }
		?>
		</tbody>
	</table>
	<div class="pageNumber">
		<?php echo $pagination ?>
	</div>
</div>
