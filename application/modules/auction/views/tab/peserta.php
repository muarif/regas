<div class="tab procView">
	<?php echo $this->utility->tabNav($tabNav,'peserta');?>
	
	<div class="tableWrapper" style="margin-bottom: 20px">
		<div class="tableHeader">
			<form action="<?php echo site_url('auction/tambah_peserta/'.$id)?>" method="POST">
				<div class="suggestionGroup">
					<div class="suggestion">
						<input type="input" placeholder="Cari Vendor" name="q" class="suggestionInput" id="vendor_name" >
						<input type="hidden" id="id_vendor" name="id_vendor"></div>
						<button type="submit" class="suggestionSubmit"><i class="fa fa-search"></i></button>
					</div>
					
				</div>
				<?php //echo $filter_list;?>
			</form>	
		<!-- </div>
	<form >
	<?php if($this->session->userdata('admin')['id_role']==6|7){ ?>
	<div class="btnTopGroup clearfix">Tambah Peserta : <input type="text" id="vendor_name">
	<input type="hidden" id="id_vendor" name="id_vendor"></div>
	<?php } ?>
	</form> -->
		<table class="tableData">
			<thead>
				<tr>
					<td><a href="?<?php echo $this->utility->generateLink('sort','desc')?>&sort=<?php echo ($sort['name'] == 'asc') ? 'desc' : 'asc'; ?>&by=name">Nama Peserta<i class="fa fa-sort-<?php echo ($sort['name'] == 'asc') ? 'desc' : 'asc'; ?>"></i></a></td>
					<?php if($this->session->userdata('admin')['id_role']==6|7){ ?><td colspan="2">Action</td><?php } ?>
				</tr>
			</thead>
			<tbody>
			<?php 
			if(count($list)){
				foreach($list as $row => $value){
				?>
					<tr>
						<td><?php echo $value['name'];?></td>
						<?php if($this->session->userdata('admin')['id_role']==6|7){ ?>
						<td class="actionBlock">
							<a href="<?php echo site_url('auction/hapus_peserta/'.$value['id'].'/'.$id)?>" class="delBtn"><i class="fa fa-trash"></i>&nbsp;Delete</a>
						</td>
						<?php } ?>
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

</div>