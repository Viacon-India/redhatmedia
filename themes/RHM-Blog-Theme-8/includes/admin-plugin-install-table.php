<?php
ob_start();
if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class crally_Install_Plugin_Table extends WP_List_Table {
    
    function __construct(){
        global $status, $page;
        
        parent::__construct( array(
            'singular'  => 'history',     //singular name of the listed records
            'plural'    => 'history',    //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
        ) );        
    }
    
    function column_default($item, $column_name){

        switch($column_name){
            // case 'slug';            
            //     return $item[$column_name];
            case 'plugin':
                return $item[$column_name].'<br>
                <a href="'.home_url().'/wp-admin/themes.php?page=install-required-plugins&plugin='.$item[$column_name].'&install=install-plugin">
                    Install
                </a>';            
            case 'description';
                return  $item[$column_name];
            case 'status':
                return  $item[$column_name];
            default:
                return print_r($item,true);
        }
    }
    
    function column_slug($item){
        $actions = array(
            'edit'    => sprintf('<a href="?page=%s&action=%s&history=%s">Delete</a>',$_REQUEST['page'],'delete',$item['slug']),
        );
        return sprintf('%1$s',
            /*$1%s*/ $item['plugin'],
            /*$2%s*/ $item['slug'],
            /*$3%s*/ $this->row_actions($actions)
        );
    }
    
    //function column_cb($item){
        //return sprintf(
            //'<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ //$this->_args['singular'],  //Let's simply repurpose the table's singular label ("history")
            /*$2%s*/ //$item->ID                //The value of the checkbox should be the record's id
        //);
    //}
	
	function process_bulk_action() {       
        global $wpdb;
        if( 'export'===$this->current_action() ) {
            $ids=(array)$_REQUEST['history'];				
			if(empty($ids)){
				wp_redirect(admin_url('admin.php?page=im-purchase-history-list'));
				wp_die();
			}
			else{
				 $uploads = wp_upload_dir();
				if(!is_dir($uploads['basedir']."/crally"))
					mkdir($uploads['basedir']."/crally");
				$file_name="payment-".time().".csv";	
				
				$fp = fopen($uploads['basedir']."/crally/".$file_name, "w");
				$headings=array('User ID','User Name','Transaction ID','Plan','Amount','Date');
				
				fputcsv($fp, $headings, ',');
				 foreach ( $ids as $id ) {
				  $transaction = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}paypal_payment WHERE ID=".$id);
				  $user = new WP_User($transaction->user_id);
				  $plan_ids=explode(',',$transaction->plan_id);
				  foreach($plan_ids as $plan_id)
				  {
					$plan_name =get_the_title($plan_id).','; 
				  }
				  trim($plan_name,',');
				  
				  $temp=array($user->ID,$user->display_name,$transaction->txn_id,$plan_name,'$'.$transaction->amount,date('F j, Y',strtotime($transaction->payment_date)));
				  fputcsv($fp, $temp, ',');
				} 
				fclose($fp);
				wp_redirect(admin_url('admin.php?page=im-purchase-history-list&download_file='.$file_name));
				exit;
				
			}
        }
        
    }
    
    function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />', //Render a checkbox instead of text
            'plugin'     => 'Plugin',
            //'slug'     => 'Action',
            'description'    => 'Description',
			'status'    => 'Status',
        );
        return $columns;
    }
	/* public function search_box( $text, $input_id ) { ?>
		
		<p class="search-box">			 
			 <input type="text" name="start_date" id="transaction_start_date" placeholder="Start Date" value="<?php echo !empty($_GET['start_date'])?$_GET['start_date']:'';?>">
			 <input type="text" name="end_date" id="transaction_end_date" placeholder="End Date" value="<?php echo !empty($_GET['end_date'])?$_GET['end_date']:'';?>">
			 <input type="search" id="<?php echo $input_id ?>" placeholder="Search" name="s" value="<?php _admin_search_query(); ?>" style="float: none;" />
			  <?php submit_button( $text, 'button', false, false, array('id' => 'search-submit') ); ?>
		 </p>
	<?php } */
    
    function prepare_items() {
        global $wpdb;        
        $per_page = 12;        
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();        
        $this->_column_headers = array($columns, $hidden, $sortable);        
        $this->process_bulk_action();        
        $current_page = $this->get_pagenum();        
        $offset         = ( $current_page * $per_page ) - $per_page;

        $data = array( 
            "0" => array (
               "plugin" => 'contact form 7',
               "slug" => 'contact-form-7',
               "description" => '',	
               "status" => 'Activated'
            ),            
            "1" => array (
                "plugin" => 'Classic Editor',
                "slug" => 'classic-editor',
                "description" => 'vc',	
                "status" => 'Install'
            ),
        );
        
        $total_items =  count(($query));
        
        $this->items = $data;
    }
}


?>