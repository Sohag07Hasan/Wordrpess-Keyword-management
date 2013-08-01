<div class="wrap">
	<h2> Add New Keyword </h2>
	
	<?php 
		if($_REQUEST['message'] == 1){
			?>
			<div class="updated"><p> keyword Information saved </p></div>
			<?php 
		}
		
		if($_REQUEST['message'] == 2){
			echo '<div class="error"><p>This keyword is already existed. Please try with another keyword</p></div>';
		}
		
	?>
	
	<form action="<?php echo $action; ?>" method="post">
		<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>">
		<input type="hidden" name="add_new_keyword" value="Y" />
		
		<?php 
			if($_REQUEST['keyword_id'] > 0 && !empty($keyword)){
				echo '<input type="hidden" name="keyword_id" value="'.$keyword->ID.'" />';
			}
		?>
		
		<table class="form-table" >
			<tbody>
				<tr>
					<th scope="row"><label for="keyword_keyword">Keyword</label></th>
					<td><input id="keyword_keyword" size="40" type="text" name="keyword_keyword" value="<?php echo $keyword->keyword; ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="keyword_priority">Priority</label></th>
					<td><input size="40" type="text" name="keyword_priority" value="<?php echo $keyword->priority; ?>" id="keyword_priority" /></td>
				</tr>
			</tbody>
		</table>
		
		<p>
			<?php if($_REQUEST['keyword_id'] > 0) : ?>
				<input type="submit" value="Update keyword" class="button button-primary" />
			<?php else: ?>
				<input type="submit" value="Generate keyword" class="button button-primary" />
			<?php endif; ?>
		</p>
				
	</form>
	
</div>
