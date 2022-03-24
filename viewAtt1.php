<?php
	$title = "View Attedance";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');
?>
    
    <div style="padding:15px;">
		<div style="margin-top: 15px;">
			<h3 style="text-align: center">Welcome</h3>
		</div>
		<div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 15px;">
			<div class="col-md-3 text-center" style="padding:15px;">	
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="thumbnail">
				<img src="img/student2.gif" class="card-img-top" alt="..." style="height: 300px"	>
				<div style="margin-top: 15px; margin-bottom: 15px;">
					<a href="viewAtt2a.php" class="btn btn-primary">Class wise</a>
				</div>
				</div>
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="thumbnail">
				<img src="img/tenor.gif" class="card-img-top" alt="..." style="height: 300px">
				<div style="margin-top: 15px; margin-bottom: 15px;">
					<a href="viewAtt2s.php" class="btn btn-primary">Single Student</a>
				</div>
				</div>
			</div>
            <div class="col-md-3 text-center" style="padding:15px;">
			</div>
		</div>
	</div>

<?php
	include ('MasterPage/footer.php');
?>