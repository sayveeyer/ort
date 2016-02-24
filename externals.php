<?php
	include('template/header.php');
	include('template/hdr_externals.php');
	require("connect/db.php");
?>
	<div id="section">
 		Externals
		<hr>
		<h1>DHL LINK GMF Reporting Tool - Externals</h1>
		<p>
		</p>
			<h2>External Information </h2>
			<!--Top Divs-->
			<div class="ext-dashbrd_main">
				<!-- Top Left-->
				<div class="ext-dashbrd_whole">
					<div class="ext-dashbrd_hdr">
					User Information
					</div>
					<?php 
						$devinfo_sql = "SELECT name, role FROM data WHERE role = 'Developer' LIMIT 0, 10";

						$devinfo_result = mysqli_query($db, $devinfo_sql);

						$info_tbl_hdr = " ";
						$devinfo_tbl_bdy = " "; 
						$info_tbl_ftr = " ";

						$info_tbl_hdr .= "<table style='margin-top: 10px;'>
													<tr>
														<th>Name</th>
														<th style='width: 35%;'>Role</th>
													</th>
							";
							$info_tbl_ftr .= "</table>";

						while ($devinfo_row = mysqli_fetch_array($devinfo_result)) {
							$devinfo_name = $devinfo_row['name'];
							$devinfo_role = $devinfo_row['role'];

							$devinfo_tbl_bdy .= "<tr>
													<td>".$devinfo_name."</td>
													<td>".$devinfo_role."</td>
												</tr>";

						}
					?>
					<?php 
						$devinfo2_sql = "SELECT name, role FROM data WHERE role = 'Developer' LIMIT 10, 20";

						$devinfo2_result = mysqli_query($db, $devinfo2_sql);

						$devinfo2_tbl_bdy = " "; 

						while ($devinfo2_row = mysqli_fetch_array($devinfo2_result)) {
							$devinfo2_name = $devinfo2_row['name'];
							$devinfo2_role = $devinfo2_row['role'];

							$devinfo2_tbl_bdy .= "<tr>
													<td>".$devinfo2_name."</td>
													<td>".$devinfo2_role."</td>
												</tr>";

						}
					?>
					<?php 
						$analystinfo_sql = "SELECT name, role FROM data WHERE role = 'Analyst' LIMIT 0, 10";

						$analystinfo_result = mysqli_query($db, $analystinfo_sql);

						$analystinfo_tbl_bdy = " "; 

						while ($analystinfo_row = mysqli_fetch_array($analystinfo_result)) {
							$analystinfo_name = $analystinfo_row['name'];
							$analystinfo_role = $analystinfo_row['role'];

							$analystinfo_tbl_bdy .= "<tr>
													<td>".$analystinfo_name."</td>
													<td>".$analystinfo_role."</td>
												</tr>";

						}
					?>
					<div class="ext-dashbrd_staticbdy">
						<div class="ext-dashbrd_staticbdy-cols">
							<?php 
								echo $info_tbl_hdr;
								echo $devinfo_tbl_bdy;
								echo $info_tbl_ftr;
							?>
						</div>
						<div class="ext-dashbrd_staticbdy-cols">
							<?php 
								echo $info_tbl_hdr;
								echo $devinfo2_tbl_bdy;
								echo $info_tbl_ftr;
							?>
						</div>
						<div class="ext-dashbrd_staticbdy-cols">
							<?php 
								echo $info_tbl_hdr;
								echo $analystinfo_tbl_bdy;
								echo $info_tbl_ftr;
							?>
						</div>
					</div>
				</div>
				<!-- Top Right-->
				<div class="ext-dashbrd_whole">
					<div class="ext-dashbrd_hdr">
						Metrics/SLA Information
					</div>
					<div class="ext-dashbrd_staticbdy" style="font-size: 16px;">
						<?php 
							$metrics_sql = "SELECT * FROM msg_complexity";
							$metrics_result = mysqli_query($db, $metrics_sql);
							$metrics_tbl_hdr = " ";
							$metrics_tbl_bdy = " "; 
							$metrics_tbl_ftr = " ";

							$metrics_tbl_hdr .= "<table style='margin-top: 10px;'>
													<tr>
														<th>Complexity Type</th>
														<th style='width: 35%;'>Target Delivery Days</th>
														<th>Quoted Effort</th>
													</th>
							";
							$metrics_tbl_ftr .= "</table>";
							while($metrics_row = mysqli_fetch_array($metrics_result))
							{
								$complex_type = $metrics_row['type'];
								$complex_delv_days = $metrics_row['del_days'];
								$complex_q_effort = $metrics_row['quoted_effort'];

								$metrics_tbl_bdy .= "<tr>
														<td style='text-align: center;'>".$complex_type."</td>
														<td style='text-align: center;'>".$complex_delv_days."</td>
														<td style='text-align: center;'>".$complex_q_effort."</td>
													";
							}
						?>
						<?php 
							echo $metrics_tbl_hdr;
							echo $metrics_tbl_bdy;
							echo $metrics_tbl_ftr;
						?>
					</div>
				</div>
			</div>
			<!--Bottom Divs-->
			<div class="ext-dashbrd_main">
				<!-- Bottom Left-->
				<div class="ext-dashbrd_whole">
				<div class="ext-dashbrd_hdr">
					Add/Update User Information
				</div>
				<div class="ext-dashbrd_bdy">
				<form>
					<div class="ext-dashbrd_bdy-col1">
						Name: <br>
						Role:
					</div>
					<div class="ext-dashbrd_bdy-col2">
						<input type="text" value="" name="addnew_dev"><br>
						<select>
							<option value="Developer">Developer</option>
							<option value="Analyst">Analyst</option>
						</select><br>
						<div style="text-align: right;">
							<input type="submit" name="add" value="Add" />
						</div>
					</div>
				</form>
				</div>
				</div>
				<!-- Bottom Right-->
				<div class="ext-dashbrd_whole">
				<div class="ext-dashbrd_hdr">
					&nbsp;
				</div>
				<div class="ext-dashbrd_bdy">
					<div class="ext-dashbrd_bdy-col1">
					</div>

					<div class="ext-dashbrd_bdy-col2">
					</div>
				</div>
				</div>
			</div>
	</div>
<?php
	mysqli_close($db);
	include('template/footer.php');
?>