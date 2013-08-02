<?php 
	
	$KeywordList = self::get_list_table();
	$message = $KeywordList->handle_bulk_action();

	$action = admin_url('admin.php?page='.$_REQUEST['page']);
	if($KeywordList->get_pagenum()){
		$action = add_query_arg(array('paged'=>$KeywordList->get_pagenum()), $action);
	}
	if(isset($_REQUEST['s']) && !empty($_REQUEST['s'])){
		$action = add_query_arg(array('s'=>$_REQUEST['s']), $action);
	}
		
?>

<div class="wrap">
	<h2>Keywords
		<a href="<?php echo admin_url('admin.php?page=addnew_keyword'); ?>" class="add-new-h2">Add New</a>
		<?php 
			if(isset($_REQUEST['s']) && !empty($_REQUEST['s'])){
				echo '<span class="subtitle">Search results for “'.$_REQUEST['s'].'”</span>';
			}
		?>
	</h2>
	
	<?php 
		if($message) echo '<div class="updated"><p>' . $message . '</p></div>';
	?>
	
	<form action="<?php echo $action; ?>" method="post">
		<?php
			$KeywordList->prepare_items();
			$KeywordList->search_box('Search', 'keyword');
			$KeywordList->display();
		?>
	</form>
	
</div>