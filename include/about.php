<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
if (!isset($_SESSION["mikhmon"])) {
	header("Location:../admin.php?id=login");
}
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3><i class="fa fa-info-circle"></i> About</h3>
			</div>
			<div class="card-body">
				<h3>Mikrotik Hotspot Manager</h3>
				<p>
					This application is dedicated to hotspot entrepreneurs wherever you are.
					Hopefully more success.
				</p>
				<p>
				<ul>
					<li>
						Author : Arash Hatami
					</li>
					<li>
						Licence : <a href="https://github.com/hatamiarash7/Mikrotik_API/blob/master/LICENSE">GPLv3</a>
					</li>
					<li>
						API Class : <a href="https://github.com/BenMenking/routeros-api">routeros-api</a>
					</li>
					<li>
						Main Repo : <a href="https://github.com/laksa19/mikhmonv3">mikhmonv3</a>
					</li>
					<li>
						Website : <a href="https://arash-hatami.ir">arash-hatami.ir</a>
					</li>
				</ul>
				<p>
					Thank you for all who have supported the development of this application.
				</p>
				<div>
					<i>Copyright &copy; <i> <? echo date('Y') ?> Arash Hatami </i></i>
				</div>
			</div>
		</div>
	</div>
</div>
