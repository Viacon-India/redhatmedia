<?php /****** Instruction ************/
add_action('admin_menu', 'instruction_create_top_level_menu');

function instruction_create_top_level_menu() {
    add_menu_page('Instruction', 'Instruction', 'edit_posts', 'instruction-admin-page');
    add_submenu_page('instruction-admin-page', 'instruction Admin Page', 'Admin Page', 'edit_posts', 'instruction-admin-page', 'instruction_admin_page');

}

function instruction_admin_page() { ?>
	
	<h1>Instructions</h1>
	<p>Follow the bellow instructions to add a blog.</p>

	<div class="our-html" style="border: 2px solid #000; padding:15px; margin-top:25px; width:95%;">

		<img src="<?php echo get_template_directory_uri(); ?>/images/instruction/Screenshot_1.png" alt="screenshot-1">

		<p>add the bellow html</p>	
	
		<img src="<?php echo get_template_directory_uri(); ?>/images/instruction/Screenshot_2.png" alt="screenshot-2">

		<h3>Code Sample</h3>
		<pre>
			&ltdiv class="c-buttons"&gt
				&lta class="c-button" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/divi.jpg" &gt Download Here &lt/a&gt			
				&lta class="c-button" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/divi.jpg" &gt Download Here &lt/a&gt
			&lt/div&gt
		</pre>

	</div>

	<div class="our-html" style="border: 2px solid #000; padding:15px; margin-top:25px; width:95%;">

		<img src="<?php echo get_template_directory_uri(); ?>/images/instruction/Screenshot_3.png" alt="screenshot-3">

		<p>add the bellow html</p>	
	
		<img src="<?php echo get_template_directory_uri(); ?>/images/instruction/Screenshot_4.png" alt="screenshot-4">

		<h3>Code Sample</h3>
        <pre> 

		&ltdiv class="c-tab" &gt
			&ltdiv class="c-title"&gtAdd your tab title &lt/div&gt
			&ltp&gt Add your tab Content here. &lt/p&gt
		&lt/div&gt

		</pre>

	</div>

	<div class="our-html" style="border: 2px solid #000; padding:15px; margin-top:25px; width:95%;">

		<img src="<?php echo get_template_directory_uri(); ?>/images/instruction/Screenshot_5.png" alt="screenshot-5">

		<p>Add the below html</p>

		<img src="<?php echo get_template_directory_uri(); ?>/images/instruction/Screenshot_6.png" alt="screenshot-6">

		<h3>Code Sample</h3>
        <pre> 

			&lth3 class="heading"&gt Put your title here. &lt/h3&gt

		</pre>

	</div>	

<?php 
}
?>