<?php echo $this->session->flashdata('msgSuccess')?>
<?php echo $this->data_process->generate_progress('k3',$id_data)?>
<div>
	<table class="tableData">
		
		<tr>
			<td>
				Lampiran Sertifikat CSMS : <?php echo (isset($get_csms['csms_file'])) ? '<a href="'.base_url('lampiran/csms_file/').$get_csms['csms_file'].'">Lampiran</a>': '-';?>
			</td>
		</tr>
		<tr>
			<td>
				Lampiran HSE Plan : <?php echo (isset($get_hse['hse_file'])) ? '<a href="'.base_url('lampiran/hse_file/'.$get_hse['hse_file']).'">Lampiran</a>': '-';?>
			</td>
		</tr>
	</table>
	<form method="POST" enctype="multipart/form-data">
		
		<div class="panel-group">
			<table class="scoreTable">
				<thead>
					<tr>
						<td>
						</td>
						<td>
							A
						</td>
						<td>
							B
						</td>
						<td>
							C
						</td>
						<td>
							D
						</td>
						<td>
							Subtotal
						</td>
						<td>
							Faktor
						</td>
						<td>
							Total
						</td>
					</tr>
				</thead>
				<tbody>
			<?php 
			$total = 0;
			foreach($evaluasi as $key_ms => $value_ms){ 
				
				if(count($value_ms)>1){ ?>

					<tr class="doubleBorder">
						<td><b>Bagian <?php echo $key_ms;?> - <?php echo $ms_quest[$key_ms]?></b></td>
						<td colspan="7"></td>
					</tr>
					<?php 
					$subtotal = 0;
					$total_data = count($value_ms);
					foreach($value_ms as $key_ev => $val_ev){ ?>
					
					<tr class="evalQuest">
						<td class="textQuestLv1"><?php echo $evaluasi_list[$key_ev]['name'];?></td>
						<?php echo $this->utility->generate_checked_k3($key_ev,$evaluasi_list,$value_k3[$key_ev]); ?>
					</tr>
					<?php 
					
					foreach($val_ev as $key_quest => $val_quest){
						?>
						<tr class="borderQuest">
							<td class="textQuestLv2">
							<?php foreach($val_quest as $key_answer => $val_answer){
								 ?>
									<?php echo $val_answer['value'];?>
									<p><i>Jawaban : <?php 

										//if(isset($data_k3[$key_answer]['value'])) { echo $data_k3[$key_answer]['value'];}else{echo '-';} 

										switch ($val_answer['type']) {
												default:
												case 'text':
													if(isset($data_k3[$val_answer['id']]['value'])){
														if($data_k3[$val_answer['id']]['value']!=''){
															echo $data_k3[$val_answer['id']]['value'];
														}else{
															echo '-';
														}
													}else{
														echo '-';
													}
													
													break;
												case 'checkbox':
												
													$checkbox = explode('|', $val_answer['label']);

													foreach($checkbox as $key => $row){

														if(isset($data_k3[$val_answer['id']]['value'])){
															if($data_k3[$val_answer['id']]['value']==''){
																echo '<label><i class="fa fa-square-o"></i>'. $row.'</label>';
															}else{
																if($key == $data_k3[$val_answer['id']]['value']){
																	echo '<label><i class="fa fa-check-square-o"></i>'. $row.'</label>';
																}else{
																	echo '<label><i class="fa fa-square-o"></i>'. $row.'</label>';
																}
															}
															
														}else{
															echo '<label><i class="fa fa-square-o"></i>'. $row.'</label>';
														}
													}
													break;
												case 'file':
													if(isset($data_k3[$val_answer['id']]['value'])){
														if($data_k3[$val_answer['id']]['value']!=''){
															echo '<p><a href="'.base_url('lampiran/'.$field_quest[$val_answer['id']]['label'].'/'.$data_k3[$val_answer['id']]['value']).'" target="_blank">Lampiran</a></p>';
														}else{
															echo '-';
														}
													}else{
														echo '-';
													}
												break;
											}

									?></i></p>

							<?php 	
							}?>
							</td>
							<?php echo $this->utility->generate_checked_k3($key_ev,$evaluasi_list,$value_k3[$key_ev],TRUE); ?>
						</tr>

						<?php 
						
					} 

					$subtotal += $value_k3[$key_ev];

					}?>
					<tr class="subTotalQuest">
						<td colspan="5">
							Subtotal
						</td>
						<td>
							<?php echo $subtotal;?>
						</td>
						<td>
							X <?php echo ($total_data==1) ? 1 :'1/'.$total_data;?>
						</td>
						<td>
							<?php 
								$total_sub = round($subtotal / $total_data,2);
								$total +=$total_sub;
								echo $total_sub;
							?>
						</td>
					</tr>
				<?php }else{ 

					$subtotal = 0;
					$total_data = count($value_ms);
					foreach($value_ms as $key_ev => $val_ev){ ?>
					<tr class="doubleBorder">
						<td class="radioQuest"><b>Bagian <?php echo $key_ms;?> - <?php echo $ms_quest[$key_ms]?></b></td>
						<?php echo $this->utility->generate_checked_k3($key_ev,$evaluasi_list,$value_k3[$key_ev]); ?>
					</tr>

					<?php 
					
					foreach($val_ev as $key_quest => $val_quest){ ?>
						<tr class="borderQuest">
							<td class="textQuestLv2">
							<?php foreach($val_quest as $key_answer => $val_answer){
							?>
							
								<?php echo $val_answer['value'];?>
								<p><i>Jawaban : <?php 
								// if(isset($data_k3[$key_answer]['value'])) { echo $data_k3[$key_answer]['value'];}else{echo '-';} 
								switch ($val_answer['type']) {
												default:
												case 'text':
													if(isset($data_k3[$val_answer['id']]['value'])){
														if($data_k3[$val_answer['id']]['value']!=''){
															echo $data_k3[$val_answer['id']]['value'];
														}else{
															echo '-';
														}
													}else{
														echo '-';
													}
													
													break;
												case 'checkbox':
												
													$checkbox = explode('|', $val_answer['label']);

													foreach($checkbox as $key => $row){

														if(isset($data_k3[$val_answer['id']]['value'])){
															if($data_k3[$val_answer['id']]['value']==''){
																echo '<label><i class="fa fa-square-o"></i>'. $row.'</label>';
															}else{
																if($key == $data_k3[$val_answer['id']]['value']){
																	echo '<label><i class="fa fa-check-square-o"></i>'. $row.'</label>';
																}else{
																	echo '<label><i class="fa fa-square-o"></i>'. $row.'</label>';
																}
															}
															
														}else{
															echo '<label><i class="fa fa-square-o"></i>'. $row.'</label>';
														}
													}
													break;
												case 'file':
													if(isset($data_k3[$val_answer['id']]['value'])){
														if($data_k3[$val_answer['id']]['value']!=''){
															echo '<p><a href="'.base_url('lampiran/'.$field_quest[$val_answer['id']]['label'].'/'.$data_k3[$val_answer['id']]['value']).'" target="_blank">Lampiran</a></p>';
														}else{
															echo '-';
														}
													}else{
														echo '-';
													}
												break;
											}
								?></i></p>
								
								
							
							<?php 	
								} ?>
							</td>
							<?php echo $this->utility->generate_checked_k3($key_ev,$evaluasi_list,$value_k3[$key_ev],TRUE); ?>
						</tr>
					<?php 

						}
						// echo $subtotal;  
						$subtotal += $value_k3[$key_ev];
					}
					?>
					<tr class="subTotalQuest">
						<td colspan="5">
							Subtotal
						</td>
						<td>
							<?php echo $subtotal;?>
						</td>
						<td>
							X <?php echo ($total_data==1) ? 1 :'1/'.$total_data;?>
						</td>
						<td>
							<?php 
								$total_sub = round($subtotal / $total_data,2);
								$total += $total_sub;
								echo $total_sub;
							?>
						</td>
					</tr>
					<?php
				}
				
			} ?>
					<tr class="totalAllQuest">
						<td colspan="5"><p>Nilai numerik di samping ini adalah rating pemberatan yang dihitung di atas. Totalnya mewakili angka keseluruhan untuk kontraktor.</p></td>
						<td colspan="2"><b>Total</b></td>
						<td><b><?php echo $total;?></b></td>
					</tr>
				</tbody>
            </table>

		</div>
		<div class="clearfix" style="text-align: right">
			<label class="nephritisAtt">
				<input type="radio" name="status" value="1" <?php echo $this->data_process->set_yes_no(1,$score_k3['data_status']);?>>&nbsp;<i class="fa fa-check"></i>&nbsp;OK
			</label>
			<label class="pomegranateAtt">
				<input type="radio" name="status" value="0" <?php echo $this->data_process->set_yes_no(0,$score_k3['data_status']);?>>&nbsp;<i class="fa fa-times"></i>&nbsp;Not OK
			</label>
		</div>
		<div class="buttonRegBox clearfix">
			<input type="submit" value="Simpan" class="btnBlue" name="simpan">
		</div>
	</form>
</div>