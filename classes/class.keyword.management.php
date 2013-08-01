<?php 
/*
 * cretaes admin menu, submenu
 * handle csv uploding with separte csv uploader
 * 
 * */
class JfKeywordManagement{
	
	//initialize
	static function init(){
		add_action('admin_menu', array(get_class(), 'admin_menu'));
		add_action('init', array(get_class(), 'form_submission_handler'));
	}
	
	//creating menu and submenu pages
	static function admin_menu(){
		add_menu_page('tf keyword management', 'KeyWords', 'manage_options', 'keyword_manager', array(get_class(), 'menu_page_keyword_management'));
		add_submenu_page('keyword_manager', ucwords('new or edit a keyword'), 'Add New', 'manage_options', 'addnew_keyword', array(get_class(), 'submenu_add_or_edit_keyword'));
		add_submenu_page('keyword_manager', ucwords('import keywords'), 'Import', 'manage_options', 'import_keyword', array(get_class(), 'submenu_import_keywords'));
		add_submenu_page('keyword_manager', ucwords('export keywords'), 'Export', 'manage_options', 'export_keyword', array(get_class(), 'submenu_export_keywords'));
	}
	
	
	
	//menu page for keyword management
	static function menu_page_keyword_management(){
		include self::abspath_for_script('includes/menu-submenu/menupage-keyword-management.php');
	}
		
	//submenu to get add or edit screen
	static function submenu_add_or_edit_keyword(){
		include self::abspath_for_script('includes/menu-submenu/submenu-add-edit-keyword.php');
	}
	
	//import keywords
	static function submenu_import_keywords(){
		include self::abspath_for_script('includes/menu-submenu/submenu-import-keywords.php');
	}

	//export keywrods
	static function submenu_export_keywords(){
		include self::abspath_for_script('includes/menu-submenu/submenu-keywords-export.php');
	}
	
	//function to include script
	static function abspath_for_script($script = ''){
		return JFKEYWORDMANAGEMENT_DIR . $script;
	}
	
	
	
	//form submission handler
	static function form_submission_handler(){
		if($_POST['page'] == 'addnew_keyword'){
			$url = admin_url('admin.php?page=addnew_keyword');
			$info = array();
		}
	}
	
	//do a redirect
	static function do_redirect($url){
		if(!function_exists('wp_redirect')){
			include ABSPATH . '/wp-includes/pluggable.php';
		}		
		wp_redirect($url);
		die();
	}
	
	
	//get db instance
	static function get_db_instance(){
		if(!class_exists('JfKeywordDb')){
			include self::abspath_for_script('classes/class.db.php');
		}		
		return new JfKeywordDb();
	}
	
	//get list table instance
	static function get_list_table(){
		if(!class_exists('JfKeywordListTable')){
			include self::abspath_for_script('classes/class.list-table.php');
		}
		
		return new JfKeywordListTable();
	}
		
}