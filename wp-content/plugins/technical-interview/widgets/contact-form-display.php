<style>
	.page-header {
		display: none;
	}
</style>
<form action="" id="contact-form" method="POST">
	<div class="contact-form-container">
		<h1>Contact Us</h1>
		<div class="messages top">
			<!-- Example success message -->
		</div>
		<div>
			<label for="name">Name</label>
			<br />
			<input type="text" id="name" name="name">
			<div class="messages name">
				<!-- Example error message -->
			</div>
		</div>
		<div>
			<label for="email">Email address</label>
			<br />
			<input type="email" id="email" name="email">
			<div class="messages email">
				<!-- Example error message -->
			</div>
		</div>
		<div>
			<label for="password">Password</label>
			<br />
			<input type="password" id="password" name="password">
			<div class="messages password"></div>
		</div>
		<div class="right-align">
			<button>Send enquiry <i class="fa fa-envelope-o"></i></button>
		</div>
		<div style="clear: both;"></div>
		<input type="hidden" id="ajaxUrl" value="<?php echo admin_url('admin-ajax.php'); ?>" />
	</div>
</form>
