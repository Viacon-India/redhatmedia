<?php
add_action('wp_ajax_adduser_process', 'ajaxAddUser');
add_action('wp_ajax_nopriv_adduser_process', 'ajaxAddUser');
function ajaxAddUser() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL, 'url' => ''];
    $name = strip_tags(trim($_POST['u_name']));
    $email = strip_tags(trim($_POST['u_email']));
    $password = strip_tags(trim($_POST['u_password']));
    //$role = strip_tags(trim($_POST['user_role']));

    $role_arr =$_POST['user_role'];    
    
    //$role = serialize($role_arr);

    if ($name == '') {
        $msg = 'Please enter firstname';
    } elseif (empty($email)) {
        $msg = 'Please enter an email address';
    } elseif (!is_email($email)) {
        $msg = 'Please enter a valid email address';
    } elseif (email_exists($email)) {
        $msg = 'Email already exists.Please try another';
    } elseif (empty($password)) {
        $msg = 'Please enter password';
    } elseif (strlen($password) < 6) {
        $msg = 'Password must be at least 6 characters';
    } elseif (empty($role_arr)) {
        $msg = 'Please choose any role';
    } else {

        $user_id = wp_create_user($email, $password, $email);
        
        $namearray = explode(" ",$name);
		
		if(count($namearray) > 1) {
			$last_name = array_pop($namearray);			
		}
		
        $first_name = implode (" ",$namearray);
        update_user_meta($user_id, 'first_name', $first_name);
        if(!empty($last_name)) {
            update_user_meta($user_id, 'last_name', $last_name);
        }

        $wp_user_object = new WP_User($user_id); 
        
        foreach($role_arr as $role) {
            $wp_user_object->add_role( $role );    
        }
        $wp_user_object->remove_role( 'subscriber' );

        if (!is_wp_error($user_id)) {

            /* global $redhatm;
			$user=get_user_by('email',$email);
            $subject= 'IMAPCK\'D Signup';
            if (!empty($redhatm['logo']['url'])) {
                $logo= '<img src="' . $redhatm['logo']['url'] . '" />';            }
            $message=file_get_contents(locate_template("template-parts/mail-format.php"));
            
			$message=str_replace(
                array(
                        '{{logo}}',
                        '{{display_name}}',
                        '{{content}}'
                ),
                array(
                        $logo,
                        $user->first_name.'&nbsp;'.$user->last_name,
                        'You have successfully registered.'
                ),
                $message
                );
             
                wp_mail($email,$subject,$message); */
				
                
            $msg = 'New User added successfully';
            $response_arr['flag'] = TRUE;
            //$response_arr['url'] = home_url('/');
        } else {
            $msg = 'Registration failed!!';
        }

               
        
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/********************** Signin**************************/
add_action('wp_ajax_signin_process', 'ajaxSignin');
add_action('wp_ajax_nopriv_signin_process', 'ajaxSignin');
function ajaxSignin() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL, 'url' => '', 'profile_url' => '', 'profile_satus' => ''];
    
    global $redhatm;
    $email = strip_tags(trim($_POST['login_email']));
    $password = strip_tags(trim($_POST['login_pass']));
    if (empty($email)) {
        $msg = 'Please enter an email address';
    } elseif (!is_email($email)) {
        $msg = 'Please enter a valid email address';
    } elseif (empty($password)) {
        $msg = 'Please enter password';
    } else {
        $creds = array();
	$creds['user_login'] = $email;
	$creds['user_password'] = $password;
	$creds['remember'] = true;
	$user_id = wp_signon( $creds, false );
	if ( is_wp_error($user_id) ) {
            $msg = $user_id->get_error_message();
        } else {            

			$msg = 'You have successfully logged in!!';
            $response_arr['flag'] = TRUE;
			$response_arr['profile_url'] = home_url().'/dashboard/';
            
        }
    }
	
	
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/******************************** Add Blog **********************************/
add_action('wp_ajax_add_blog_process', 'ajaxAddBlog');
add_action('wp_ajax_nopriv_add_blog_process', 'ajaxAddBlog');
function ajaxAddBlog() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];
    $user_id = strip_tags(trim($_POST['user_id']));

    // Blog details //
    $domain = esc_url(strip_tags(trim($_POST['domain'])));
    $sample_url = esc_url(strip_tags(trim($_POST['sample_url'])));
    $domain_authority = strip_tags(trim($_POST['domain_authority']));
    $domain_rating = strip_tags(trim($_POST['domain_rating']));
    $organic_traffic = strip_tags(trim($_POST['organic_traffic']));
    $spam_score = strip_tags(trim($_POST['spam_score']));
    $niche = strip_tags(trim($_POST['niche']));
    $link_type = strip_tags(trim($_POST['link_type']));
    $post_type = strip_tags(trim($_POST['post_type']));
    $more_info = strip_tags(trim($_POST['more_info']));

    // Blog type //
    $blog_type = strip_tags(trim($_POST['blog_type']));
    $community_email = strip_tags(trim($_POST['community_email']));
    $community_username = strip_tags(trim($_POST['community_username']));
    $community_password = strip_tags(trim($_POST['community_password']));
    $internal_email = strip_tags(trim($_POST['internal_email']));
    $external_email = strip_tags(trim($_POST['external_email']));
    $site_username = strip_tags(trim($_POST['site_username']));
    if($blog_type == 'community') {
        $internal_email = $site_username = '';
    }    
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($domain)) {
        $msg = 'Please enter domain name';
    } elseif(empty($sample_url)) {
        $msg = 'Please enter sample url';
    } elseif($domain_authority == '') {
		$msg = 'Please enter domain authority';
	} elseif($domain_rating == '') {
		$msg = 'Please enter domain rating';
	} elseif($organic_traffic == '') {
		$msg = 'Please enter organic traffic';
	} elseif($spam_score == '') {
		$msg = 'Please enter spam score';
	}elseif (empty($niche)) {
        $msg = 'Please enter niche';
    } elseif (empty($link_type)) {
        $msg = 'Please enter link type';		
    }
    
    elseif(empty($blog_type)) {
		$msg = 'Please enter blog type';
    }
    
    elseif($blog_type == 'community' && empty($community_email) ) {
		$msg = 'Please enter community email';
    } elseif($blog_type == 'community' && !is_email($community_email )) {
		$msg = 'Please enter a valid community email';
    } elseif($blog_type == 'community' && empty($community_username) ) {
		$msg = 'Please enter community username';
    } elseif($blog_type == 'community' && empty($community_password) ) {
		$msg = 'Please enter community password';
    }

    elseif($blog_type != 'community' && empty($internal_email) ) {
		$msg = 'Please enter internal email';
    } elseif($blog_type != 'community' && !is_email($internal_email )) {
		$msg = 'Please enter a valid internal email';
    } elseif($blog_type != 'community' && empty($external_email) ) {
		$msg = 'Please enter external email';
    } elseif($blog_type != 'community' && !is_email($external_email )) {
		$msg = 'Please enter a valid external email';
    } elseif($blog_type != 'community' && empty($site_username) ) {
		$msg = 'Please enter site username';
    } else {           
            
        global $wpdb;
        $result = $wpdb->insert( 
            'wp_customblog_list', array(
                "userid" => $user_id,
                "domain" => $domain ,
                "sample_url" => $sample_url ,
                "domain_authority" => $domain_authority, 
                "domain_rating" => $domain_rating, 
                "organic_traffic" => $organic_traffic, 
                "spam_score" => $spam_score,
                "niche" => $niche ,
                "link_type" => $link_type,
                "post_type" => $post_type, 
                "more_info" => $more_info, 
                "blog_type" => $blog_type, 
                "community_email" => $community_email,
                "community_username" => $community_username ,
                "community_password" => $community_password, 
                "internal_email" => $internal_email, 
                "external_email" => $external_email, 
                "site_username" => $site_username,
                "status" => 1
                
            )
        );

        if($result == 1) {
            $msg = 'Inserted.';
            $response_arr['flag'] = TRUE;   
        } else {
            $msg = 'Some error occours!! Please try later.';
        }		
             
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/******************************** Edit Blog **********************************/
add_action('wp_ajax_edit_blog_process', 'ajaxEditBlog');
add_action('wp_ajax_nopriv_edit_blog_process', 'ajaxEditBlog');
function ajaxEditBlog() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];
    
    $user_id = strip_tags(trim($_POST['user_id']));
    $blog_id = strip_tags(trim($_POST['blog_id']));

    // Blog details //   
    $domain = esc_url(strip_tags(trim($_POST['domain'])));
    $sample_url = esc_url(strip_tags(trim($_POST['sample_url'])));    
    $domain_authority = strip_tags(trim($_POST['domain_authority']));
    $domain_rating = strip_tags(trim($_POST['domain_rating']));
    $organic_traffic = strip_tags(trim($_POST['organic_traffic']));
    $spam_score = strip_tags(trim($_POST['spam_score']));
    $niche = strip_tags(trim($_POST['niche']));
    $link_type = strip_tags(trim($_POST['link_type']));
    $post_type = strip_tags(trim($_POST['post_type']));
    $more_info = strip_tags(trim($_POST['more_info']));

    // Blog type //
    $blog_type = strip_tags(trim($_POST['blog_type']));
    $community_email = strip_tags(trim($_POST['community_email']));
    $community_username = strip_tags(trim($_POST['community_username']));
    $community_password = strip_tags(trim($_POST['community_password']));
    $internal_email = strip_tags(trim($_POST['internal_email']));
    $external_email = strip_tags(trim($_POST['external_email']));
    $site_username = strip_tags(trim($_POST['site_username']));
    $status = strip_tags(trim($_POST['status']));    

    //print_r($blog_type);


    if($blog_type == 'Community') {
        $internal_email = $site_username = '';
    }    
    
    if (empty($user_id) || empty($blog_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($domain)) {
        $msg = 'Please enter domain';
    } elseif(empty($sample_url)) {
        $msg = 'Please enter sample url';
    } elseif($domain_authority == '') {
		$msg = 'Please enter domain authority';
	} elseif($domain_rating == '') {
		$msg = 'Please enter domain rating';
	} elseif($organic_traffic == '') {
		$msg = 'Please enter organic traffic';
	} elseif($spam_score == '') {
		$msg = 'Please enter spam score';
	}elseif (empty($niche)) {
        $msg = 'Please enter niche';
    } elseif (empty($link_type)) {
        $msg = 'Please enter link type';		
    } /* elseif (empty($more_info)) {
		$msg = 'Please enter more_info';
    } */
    
    elseif(empty($blog_type)) {
		$msg = 'Please enter blog type';
    }
    
    elseif($blog_type == 'Community' && empty($community_email) ) {
		$msg = 'Please enter Community email';
    } elseif($blog_type == 'Community' && !is_email($community_email )) {
		$msg = 'Please enter a valid Community email';
    } elseif($blog_type == 'Community' && empty($community_username) ) {
		$msg = 'Please enter community username';
    } elseif($blog_type == 'Community' && empty($community_password) ) {
		$msg = 'Please enter Community password';
    }

    elseif($blog_type != 'Community' && empty($internal_email) ) {
		$msg = 'Please enter internal email';
    } elseif($blog_type != 'Community' && !is_email($internal_email )) {
		$msg = 'Please enter a valid internal email';
    } elseif($blog_type != 'Community' && empty($external_email) ) {
		$msg = 'Please enter external email';
    } elseif($blog_type != 'Community' && !is_email($external_email)) {
		$msg = 'Please enter a valid external email';
    } elseif($blog_type != 'Community' && empty($site_username) ) {
		$msg = 'Please enter site username';
    } else {           
            
        global $wpdb;        
        $result = $wpdb->update(
            $wpdb->prefix .'customblog_list', 
            array( 
                'status' => $status,                
                'domain' => $domain,
                'sample_url' => $sample_url,
                'domain_authority' => $domain_authority,
                'domain_rating' => $domain_rating,
                'organic_traffic' => $organic_traffic,
                'spam_score' => $spam_score,
                'niche' => $niche,
                'link_type' => $link_type,
                'post_type' => $post_type,
                'more_info' => $more_info,
                'community_email' => $community_email,
                'community_username' => $community_username,
                'community_password' => $community_password,
                'internal_email' => $internal_email,
                'external_email' => $external_email,
                'site_username' => $site_username,
            ), 
            array(
                "id" => $blog_id
            ) 
        );

        if($result == 1) {
            $msg = 'Updated.';
            $response_arr['flag'] = TRUE;   
        } else {
            $msg = 'Make some changes and try again.';
        }             
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/******************************** Add Client **********************************/
add_action('wp_ajax_add_client_process', 'ajaxAddClient');
add_action('wp_ajax_nopriv_add_client_process', 'ajaxAddClient');
function ajaxAddClient() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];
    $user_id = strip_tags(trim($_POST['user_id']));
    
    $client_name = strip_tags(trim($_POST['client_name']));
    $company_name = strip_tags(trim($_POST['company_name']));
    $source = strip_tags(trim($_POST['company_source']));
    $source_detail = strip_tags(trim($_POST['source_detail']));

    $phone = strip_tags(trim($_POST['client_phone']));
    $whatsapp = strip_tags(trim($_POST['client_whatsapp']));
    $email = strip_tags(trim($_POST['client_email']));
    $skype = strip_tags(trim($_POST['client_skype']));
    $website = strip_tags(trim($_POST['client_website']));
    $vat_number = strip_tags(trim($_POST['client_vat_number']));

    $address = strip_tags(trim($_POST['client_address']));
    $city = strip_tags(trim($_POST['client_city']));
    $state = strip_tags(trim($_POST['client_state']));
    $zip = strip_tags(trim($_POST['client_zip']));
    $country = strip_tags(trim($_POST['client_country']));    
    $client_group = strip_tags(trim($_POST['client_group']));
    $currency = strip_tags(trim($_POST['client_currency']));
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($client_name)) {
        $msg = 'Please enter client name';
    } elseif (empty($phone)) {
        $msg = 'Please enter phone number';		
    } elseif (strlen($phone) < 8 || strlen($phone) > 15) {
        $msg = 'Please enter a valid phone number';		
    } elseif(!empty($email) && !is_email($email)) {
        $msg = 'Please enter a valid email address';
    } else {           
            
        global $wpdb;
        $result = $wpdb->insert( 
            'wp_client_list', array(
                "user_id" => $user_id,
                "client_name" => $client_name ,
                "company_name" => $company_name ,
                "source" => $source,
                "source_detail" => $source_detail,
                "phone" => $phone, 
                "whatsapp" => $whatsapp,
                "email" => $email,
                "skype" => $skype, 
                "website" => $website,
                "vat_number" => $vat_number ,
                "address" => $address,
                "city" => $city, 
                "state" => $state, 
                "zip" => $zip, 
                "country" => $country,
                "client_group" => $client_group ,
                "currency" => $currency,
                "status" => 1,
                
            )
        );

        if($result == 1) {
            $msg = 'Inserted.';
            $response_arr['flag'] = TRUE;   
        } else {
            $msg = 'Some error occours!! Please try later.';
        }		
             
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/******************************** Edit Client **********************************/
add_action('wp_ajax_edit_client_process', 'ajaxEditClient');
add_action('wp_ajax_nopriv_edit_client_process', 'ajaxEditClient');
function ajaxEditClient() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];

    $client_id = strip_tags(trim($_POST['client_id']));    
    $user_id = strip_tags(trim($_POST['user_id']));    
    $client_name = strip_tags(trim($_POST['client_name']));
    $company_name = strip_tags(trim($_POST['company_name']));
    $phone = strip_tags(trim($_POST['client_phone']));
    $whatsapp = strip_tags(trim($_POST['client_whatsapp']));
    $email = strip_tags(trim($_POST['client_email']));
    $skype = strip_tags(trim($_POST['client_skype']));
    $website = strip_tags(trim($_POST['client_website']));
    $vat_number = strip_tags(trim($_POST['client_vat_number']));
    $address = strip_tags(trim($_POST['client_address']));
    $city = strip_tags(trim($_POST['client_city']));
    $state = strip_tags(trim($_POST['client_state']));
    $zip = strip_tags(trim($_POST['client_zip']));
    $country = strip_tags(trim($_POST['client_country']));    
    $client_group = strip_tags(trim($_POST['client_group']));
    $currency = strip_tags(trim($_POST['client_currency']));
    $status = strip_tags(trim($_POST['client_status']));
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($client_name)) {
        $msg = 'Please enter client name';
    } elseif (empty($phone)) {
        $msg = 'Please enter phone number';		
    } elseif (strlen($phone) < 8 || strlen($phone) > 15) {
        $msg = 'Please enter a valid phone number';		
    } elseif(!empty($email) && !is_email($email)) {
        $msg = 'Please enter a valid email address';
    } else {           
            
        global $wpdb;        
        $result = $wpdb->update(
            $wpdb->prefix .'client_list', 
            array( 
                "client_name" => $client_name ,
                "company_name" => $company_name ,
                "phone" => $phone, 
                "whatsapp" => $whatsapp,
                "email" => $email,
                "skype" => $skype, 
                "website" => $website,
                "vat_number" => $vat_number ,
                "address" => $address,
                "city" => $city, 
                "state" => $state, 
                "zip" => $zip, 
                "country" => $country,
                "client_group" => $client_group ,
                "currency" => $currency,
                "status" => $status
            ), 
            array(
                "id" => $client_id
            ) 
        );

        if($result == 1) {
            $msg = 'Updated.';
            $response_arr['flag'] = TRUE;   
        } else {
            $msg = 'Make some changes and try again.';
        }             
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/************************ Update Profile ***************************/
add_action('wp_ajax_update_profile_process', 'ajaxUpdateProfile');
add_action('wp_ajax_nopriv_update_profile_process', 'ajaxUpdateProfile');
function ajaxUpdateProfile() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];
    $user_id = strip_tags(trim($_POST['user_id']));
    $u_name = strip_tags(trim($_POST['u_name']));  
    $u_phone = strip_tags(trim($_POST['u_phone']));	
    $new_password = strip_tags(trim($_POST['new_password']));    
    $new_conf_password = strip_tags(trim($_POST['new_conf_password']));    
    $emailid = get_userdata($user_id)->user_email;
    
    if (empty($user_id)) {
        $msg = "Login to make changes on your profile.";
    } elseif (empty($u_name)) {
        $msg = 'Please enter name of first parent';
    } elseif(strlen($u_phone) < 8 || strlen($u_phone) > 15) {
        $msg = 'Please enter a valid Phone number';
    } elseif (!empty($new_conf_password) && empty($new_password)) {
        $msg = 'Please enter your password';
    } elseif (!empty($new_password) && empty($new_conf_password)) {
        $msg = 'Please enter your retype password';
    } elseif (!empty($new_password) && ($new_password != $new_conf_password)) {
        $msg = 'Retype password does not matched with password';
	} else {           
            
        if($new_password != '') {            
            $user_id = wp_update_user( array( 'ID' => $user_id, 'user_pass' => $new_password, 'user_email' => $u_email ) );
        } else {
            $user_id = wp_update_user( array( 'ID' => $user_id, 'user_email' => $u_email ) );
        }
        
        $namearray = explode(" ",$u_name);		
		if(count($namearray) > 1) {
			$last_name = array_pop($namearray);			
		} else { $last_name = ''; }
		$first_name = implode (" ",$namearray);
		
        //$last_name = array_pop($namearray);
        //$first_name = implode (" ",$namearray);		
        update_user_meta($user_id, 'first_name', $first_name);
        update_user_meta($user_id, 'last_name', $last_name);
        update_user_meta($user_id, 'phone_number', $u_phone);		
		
        $msg = 'Your profile updated successfully';
        $response_arr['flag'] = TRUE;        
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/******************************** Add Project **********************************/
add_action('wp_ajax_project_process_add', 'ajaxAddProject');
add_action('wp_ajax_nopriv_project_process_add', 'ajaxAddProject');
function ajaxAddProject() {

    $response_array = ['flag' => FALSE, 'msg' => NULL];
    $user_id = strip_tags(trim($_POST['user_id']));    
    $project_name = strip_tags(trim($_POST['project_name']));
    $client_id = strip_tags(trim($_POST['client_id']));
    $project_manager = strip_tags(trim($_POST['project_manager']));
    $coordinator_arr =$_POST['coordinator'];
    $coordinator = serialize($coordinator_arr);

    $project_type = $_POST['project_type'];
    $payment_method = strip_tags(trim($_POST['payment_method']));
    $currency = strip_tags(trim($_POST['currency']));
    $price = strip_tags(trim($_POST['price']));
    $start_date = strip_tags(trim($_POST['start_date']));
    $deadline = strip_tags(trim($_POST['deadline']));    
    $levels_arr = $_POST['levels'];
    $levels = serialize($levels_arr);
    $description = strip_tags(trim($_POST['project_desc']));
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($project_name)) {
        $msg = 'Please enter project name.';
    } elseif (empty($client_id)) {
        $msg = 'Please choose client.';		
    } else {           
            
        global $wpdb;
        $result = $wpdb->insert( 
            'wp_project_list', array(
                "user_id" => $user_id,
                "project_name" => $project_name ,
                "client_id" => $client_id,
                "project_manager" => $project_manager,
                "coordinator" => $coordinator,                
                "project_type" => $project_type,
                "payment_method" => $payment_method,
                "currency" => $currency,
                "price" => $price,                 
                "start_date" => $start_date,
                "deadline" => $deadline,                 
                "levels" => $levels,
                "project_desc" => $description,
                "status" => 1,           
            )
        );

        if($result == 1) {
            $msg = 'Inserted.';
            $response_array['flag'] = TRUE;   
        } else {
            $msg = 'Some error occours!! Please try later.';
        }             
        
    }
    $response_array['msg'] = $msg;
    echo json_encode($response_array);
    exit;
}

/******************************** Edit Project **********************************/
add_action('wp_ajax_edit_project_process', 'ajaxEditProject');
add_action('wp_ajax_nopriv_edit_project_process', 'ajaxEditProject');
function ajaxEditProject() {
    $response_array = ['flag' => FALSE, 'msg' => NULL];
    $project_id = $_POST['project_id'];
    $user_id = strip_tags(trim($_POST['user_id']));    
    $project_name = strip_tags(trim($_POST['project_name']));
    $client_id = strip_tags(trim($_POST['client_id']));
    $project_manager = strip_tags(trim($_POST['project_manager']));
    $coordinator_arr =$_POST['coordinator'];
    $coordinator = serialize($coordinator_arr);

    $project_type = $_POST['project_type'];
    $payment_method = strip_tags(trim($_POST['payment_method']));
    $currency = strip_tags(trim($_POST['currency']));
    $price = strip_tags(trim($_POST['price']));
    $start_date = strip_tags(trim($_POST['start_date']));
    $deadline = strip_tags(trim($_POST['deadline']));    
    $levels_arr = $_POST['levels'];
    $levels = serialize($levels_arr);
    $description = strip_tags(trim($_POST['project_desc']));
    $status = strip_tags(trim($_POST['project_status']));
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($project_name)) {
        $msg = 'Please enter client name';
    } elseif (empty($client_id)) {
        $msg = 'Please enter phone number';		
    } else {           
            
        global $wpdb;
        $result = $wpdb->update(
            $wpdb->prefix .'project_list', 
            array( 
                "user_id" => $user_id,
                "project_name" => $project_name ,
                "client_id" => $client_id,
                "project_manager" => $project_manager,
                "coordinator" => $coordinator,                
                "project_type" => $project_type,
                "payment_method" => $payment_method,
                "currency" => $currency,
                "price" => $price,                 
                "start_date" => $start_date,
                "deadline" => $deadline,                 
                "levels" => $levels,
                "project_desc" => $description,
                "status" => $status
            ), 
            array(
                "id" => $project_id
            ) 
        );

        if($result == 1) {
            $msg = 'Updated.';
            $response_array['flag'] = TRUE;   
        } else {
            $msg = 'Make some changes and try again';
        }             
        
    }
    $response_array['msg'] = $msg;
    echo json_encode($response_array);
    exit;
}

/******************************** Add Content **********************************/
add_action('wp_ajax_add_content_process', 'ajaxAddContent');
add_action('wp_ajax_nopriv_add_content_process', 'ajaxAddContent');
function ajaxAddContent() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];
    $user_id = strip_tags(trim($_POST['user_id']));
    
    $title = strip_tags(trim($_POST['title']));
    $content_type = strip_tags(trim($_POST['content_type']));
    $client_id = strip_tags(trim($_POST['client_id']));
    $project_id = strip_tags(trim($_POST['project_id']));

    $google_doc_link = strip_tags(trim($_POST['google_doc_link']));
    $live_link = strip_tags(trim($_POST['live_link']));
    $date = strip_tags(trim($_POST['date']));
    $more_info = strip_tags(trim($_POST['more_info']));
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($title)) {
        $msg = 'Please enter title';
    } elseif (empty($client_id)) {
        $msg = 'Please select any client';		
    } else {           
            
        global $wpdb;
        $result = $wpdb->insert( 
            'wp_content_list', array(
                "user_id" => $user_id,
                "title" => $title ,
                "content_type" => $content_type ,
                "client_id" => $client_id,
                "project_id" => $project_id,
                "google_doc_link" => $google_doc_link,
                "live_link" => $live_link,
                "date" => $date,
                "more_info" => $more_info,
                "status" => 1,                
            )
        );

        if($result == 1) {
            $msg = 'Inserted.';
            $response_arr['flag'] = TRUE;   
        } else {
            $msg = 'Some error occours!! Please try later.';
        }		
             
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/******************************** Edit Content **********************************/
add_action('wp_ajax_edit_content_process', 'ajaxEditContent');
add_action('wp_ajax_nopriv_edit_content_process', 'ajaxEditContent');
function ajaxEditContent() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];

    $content_id = strip_tags(trim($_POST['content_id']));
    $user_id = strip_tags(trim($_POST['user_id']));    
    $title = strip_tags(trim($_POST['title']));
    $content_type = strip_tags(trim($_POST['content_type']));
    $client_id = strip_tags(trim($_POST['client_id']));
    $project_id = strip_tags(trim($_POST['project_id']));

    $google_doc_link = strip_tags(trim($_POST['google_doc_link']));
    $live_link = strip_tags(trim($_POST['live_link']));
    $date = strip_tags(trim($_POST['date']));
    $more_info = strip_tags(trim($_POST['more_info']));
    $status = $_POST['status'];
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($content_id)) {
        $msg = 'Please select any content to make changes.';
    } elseif (empty($title)) {
        $msg = 'Please enter title.';		
    } elseif (empty($client_id)) {
        $msg = 'Please select a client.';		
    } else {           
            
        global $wpdb;        
        $result = $wpdb->update(
            $wpdb->prefix .'content_list', 
            array(                
                "content_type" => $content_type ,
                "title" => $title ,
                "client_id" => $client_id,
                "project_id" => $project_id,
                "google_doc_link" => $google_doc_link,
                "live_link" => $live_link,
                "date" => $date,
                "more_info" => $more_info,
                "status" => $status,
            ), 
            array(
                "id" => $content_id
            ) 
        );        

        if($result == 1) {
            $msg = 'Updated.';
            $response_arr['flag'] = TRUE;   
        } else {
            $msg = 'Make some changes and try again.';
        }             
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/******************************** Add Link **********************************/
add_action('wp_ajax_add_link_process', 'ajaxAddLink');
add_action('wp_ajax_nopriv_add_link_process', 'ajaxAddLink');
function ajaxAddLink() {
    $response_array = ['flag' => FALSE, 'msg' => NULL];
    $user_id = strip_tags(trim($_POST['user_id']));    
    $domain = strip_tags(trim($_POST['domain']));
    $title = strip_tags(trim($_POST['title']));
    $client_id = strip_tags(trim($_POST['client_id']));
    $project_id = strip_tags(trim($_POST['project_id']));
    $url_live = strip_tags(trim($_POST['url_live']));
    $landing_page_url = strip_tags(trim($_POST['landing_page_url']));
    $keyword = strip_tags(trim($_POST['keyword']));
    $link_type = strip_tags(trim($_POST['link_type']));
    $date = strip_tags(trim($_POST['date']));
    $blog_type = strip_tags(trim($_POST['blog_type']));
        $amount = strip_tags(trim($_POST['amount']));
        $contact_mail = strip_tags(trim($_POST['contact_mail']));
      $profile = strip_tags(trim($_POST['profile']));
        $internal_email = strip_tags(trim($_POST['internal_email']));
        $external_email = strip_tags(trim($_POST['external_email']));
    $link_status = strip_tags(trim($_POST['link_status']));
    $worked_by = strip_tags(trim($_POST['worked_by']));
    $more_info = $_POST['more_info'];
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($domain)) {
        $msg = 'Please enter the domain.';
    } elseif (empty($title)) {
        $msg = 'Please enter title.';		
    } else {           
            
        global $wpdb;
        $result = $wpdb->insert( 
            'wp_link_list', array(
                "user_id" => $user_id,
                "domain" => $domain ,
                "title" => $title ,                
                "client_id" => $client_id,
                "project_id" => $project_id,
                "url_live" => $url_live,
                "landing_page_url" => $landing_page_url,
                "keyword" => $keyword ,
                "link_type" => $link_type ,                
                "date" => $date,
                "blog_type" => $blog_type,
                "live_url" => $url_live,
                "amount" => $amount,
                "contact_mail" => $contact_mail ,
                "profile" => $profile ,                
                "internal_email" => $internal_email,
                "external_email" => $external_email,
                "link_status" => $link_status,
                "worked_by" => $worked_by,
                "more_info" => $more_info ,
                "status" => 1,
            )
        );

        if($result == 1) {
            $msg = 'Inserted.';
            $response_array['flag'] = TRUE;   
        } else {
            $msg = 'Some error occours!! Please try later.';
        }             
        
    }
    $response_array['msg'] = $msg;
    echo json_encode($response_array);
    exit;
}

/******************************** Edit Link **********************************/
add_action('wp_ajax_edit_link_process', 'ajaxEditLink');
add_action('wp_ajax_nopriv_edit_link_process', 'ajaxEditLink');
function ajaxEditLink() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];

    $link_id = strip_tags(trim($_POST['link_id']));
    $user_id = strip_tags(trim($_POST['user_id']));    
    $domain = strip_tags(trim($_POST['domain']));
    $title = strip_tags(trim($_POST['title']));
    $client_id = strip_tags(trim($_POST['client_id']));
    $project_id = strip_tags(trim($_POST['project_id']));
    $url_live = strip_tags(trim($_POST['url_live']));
    $landing_page_url = strip_tags(trim($_POST['landing_page_url']));
    $keyword = strip_tags(trim($_POST['keyword']));
    $link_type = strip_tags(trim($_POST['link_type']));
    $date = strip_tags(trim($_POST['date']));
    $blog_type = strip_tags(trim($_POST['blog_type']));
        $amount = strip_tags(trim($_POST['amount']));
        $contact_mail = strip_tags(trim($_POST['contact_mail']));
      $profile = strip_tags(trim($_POST['profile']));
        $internal_email = strip_tags(trim($_POST['internal_email']));
        $external_email = strip_tags(trim($_POST['external_email']));
    $link_status = strip_tags(trim($_POST['link_status']));
    $worked_by = strip_tags(trim($_POST['worked_by']));
    $more_info = $_POST['more_info'];
    $status = $_POST['status'];

    if($blog_type == 'paid_post') { $profile = $internal_email =  $external_email = ''; }
    else if($blog_type == 'community_post') { $amount = $contact_mail = $internal_email =  $external_email = ''; }
    else { $amount = $contact_mail =  $profile = ''; }
    
    if (empty($user_id)) {
        $msg = "Login to make changes.";
    } elseif (empty($link_id)) {
        $msg = 'Please select any content to make changes.';
    } elseif (empty($title)) {
        $msg = 'Please enter title.';		
    } elseif (empty($client_id)) {
        $msg = 'Please select a client.';		
    } else {           
            
        global $wpdb;        
        $result = $wpdb->update(
            $wpdb->prefix .'link_list', 
            array(                
                "user_id" => $user_id,
                "domain" => $domain ,
                "title" => $title ,                
                "client_id" => $client_id,
                "project_id" => $project_id,
                "url_live" => $url_live,
                "landing_page_url" => $landing_page_url,
                "keyword" => $keyword ,
                "link_type" => $link_type ,                
                "date" => $date,
                "blog_type" => $blog_type,
                "live_url" => $url_live,
                "amount" => $amount,
                "contact_mail" => $contact_mail ,
                "profile" => $profile ,                
                "internal_email" => $internal_email,
                "external_email" => $external_email,
                "link_status" => $link_status,
                "worked_by" => $worked_by,
                "more_info" => $more_info ,
                "status" => $status,
            ), 
            array(
                "id" => $link_id
            ) 
        );        

        if($result == 1) {
            $msg = 'Updated.';
            $response_arr['flag'] = TRUE;   
        } else {
            $msg = 'Make some changes and try again.';
        }             
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

/************************************ Add Blog Ends **************************/


/*****************************************************************************
 * 
 * 
 *
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 *****************************************************************************/

/* add_action('wp_ajax_remove_cart', 'ajaxRemoveCart');
add_action('wp_ajax_nopriv_remove_cart', 'ajaxRemoveCart');
function ajaxRemoveCart() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL, 'cartcount' => '','html'=>''];
    
    $cartid = $_POST['cartid'];
    if(empty($cartid) || empty($_SESSION['cart'])) {
        $msg = 'Something went wrong';
    } else if(array_key_exists($cartid,$_SESSION['cart'])){   
		unset($_SESSION['cart'][$cartid]);
        $cart_data=get_cart_data();
		$currentcartcount = !empty($cart_data['total_item'])?$cart_data['total_item']:0;
        $msg = 'Successfully removed from cart';
        $response_arr['flag'] = TRUE;
        $response_arr['cartcount'] = $currentcartcount;
        if(empty($cart_data)){$response_arr['html'] = '<td colspan="3" style="text-align: center;">No data found. Add plans in your cart.</td>';}
    }
    
    
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

add_action('wp_ajax_add_to_cart', 'ajaxAddtocart');
add_action('wp_ajax_nopriv_add_to_cart', 'ajaxAddtocart');
function ajaxAddtocart() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL, 'cartcount' => ''];
    
    $planid = $_POST['planid'];
	$plan_type = $_POST['plan_type'];
    if(empty($planid)) {
        $msg = 'Something went wrong';
    }else if(empty($plan_type) || ($plan_type!='annually' && $plan_type!='monthly')) {
        $msg = 'Something went wrong';
    } else {
        $price = get_post_meta( $planid, '_plans_price', true );
        $t=time();        
        $_SESSION['cart'][$t] = array(
            'plan_id' => $planid,
			'plan_type'=>$plan_type,
        );
        
        $cart_data=get_cart_data();
		$currentcartcount = !empty($cart_data['total_item'])?$cart_data['total_item']:0;
        $msg = 'Successfully added to cart';
        $response_arr['flag'] = TRUE;
        $response_arr['cartcount'] = $currentcartcount;
    }
    
    
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

function im_is_same_type_cart_data() {
	$cart_data=get_cart_data();
	$is_same_type=false;
	if(!empty($cart_data['items']))
	{
		if(count(array_unique(array_column($cart_data['items'],'plan_type'))) == 1)
			$is_same_type=true;		
	}
	return $is_same_type;
}

add_action('wp_ajax_forgotpass_process', 'ajaxForgotPassword');
add_action('wp_ajax_nopriv_forgotpass_process', 'ajaxForgotPassword');
function ajaxForgotPassword() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];
    $email = strip_tags(trim($_POST['u_email']));    
    
	//wp_mail('sharmita.shee@infoway.us', 'Forgot Password' , 'Message');
	
	
    global $redhatm;
    $user=get_user_by('email',$email);

    if (empty($email)){
		$msg = 'Please enter an email address';
	} elseif (!is_email($email)) {
        $msg = 'Please enter valid email address';
    } elseif (empty($user->ID)) {
        $msg = 'Invalid email';
    } else {
            global $redhatm;
            $reset_password_page = $redhatm['reset_password'];
			$redirection_link = get_the_permalink($reset_password_page);

			$reset_key=base64_encode($user->ID.'||'.$email);

			$subject= 'IMAPCK\'D Forgot Password';
            if (!empty($redhatm['logo']['url'])) {
                $logo= '<img src="' . $redhatm['logo']['url'] . '" />';            }
            $message=file_get_contents(locate_template("template-parts/mail-format.php"));
            
			$message=str_replace(
                array(
                        '{{logo}}',
                        '{{display_name}}',
                        '{{content}}'
                ),
                array(
                        $logo,
                        $user->first_name.'&nbsp;'.$user->last_name,
                        'Please <a href="'.$redirection_link.'?reset_password='.$reset_key.'">click here</a> to reset your password.'
                ),
                $message
                );
             
                wp_mail($email,$subject,$message);
			
			//wp_mail('sharmita.shee@infoway.us', $subject , $message );
                     
			$msg = 'An email has been send to your email id. Check your email';
			$response_arr['flag'] = TRUE;
			//$response_arr['url'] = home_url();
            
        
        }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

add_action('wp_ajax_resetpass_process', 'ajaxResetPassword');
add_action('wp_ajax_nopriv_resetpass_process', 'ajaxResetPassword');
function ajaxResetPassword() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL, 'url' => ''];
    $currentuser = strip_tags(trim($_POST['user_data']));    
    $password = strip_tags(trim($_POST['new_password']));    
    $conf_password = strip_tags(trim($_POST['new_conf_password']));    
    
    $user=get_user_by('email',$currentuser);

    if (empty($currentuser)) {
        $msg = "You can't reset your password";
    } elseif (empty($user->ID)) {
        $msg = 'Your email does not exist. Register first to continue.';
    } elseif ($password == '') {
        $msg = 'Please enter password';
    } elseif (strlen($password) < 6) {
        $msg = 'Password must be at least 6 characters';
    } elseif (empty($conf_password)) {
        $msg = 'Please re-enter password';
    } elseif ($password != $conf_password) {
        $msg = 'Retype password does not matched with password';
    } else {           
            
        $user_id = wp_update_user( array( 'ID' => $user->ID, 'user_pass' => $password ) );

        if ( is_wp_error( $user_id ) ) {
            $msg = 'Some error occurs. Try after sometime.';
        } else {
            $msg = 'Your password has been changed successfully';
            $response_arr['flag'] = TRUE;
			$response_arr['url'] = home_url('/');
        }
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

add_action('wp_ajax_payment_process', 'ajaxPaymentProcess');
add_action('wp_ajax_nopriv_payment_process', 'ajaxPaymentProcess');
function ajaxPaymentProcess() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];    
    $f_name = strip_tags(trim($_POST['f_name']));    
    $l_name = strip_tags(trim($_POST['l_name']));    
    $u_email = strip_tags(trim($_POST['u_email']));    
    $u_amount = strip_tags(trim($_POST['u_amount']));    
    
    if (empty($f_name)) {
        $msg = 'Please enter your first name';
    } elseif (empty($l_name)) {
        $msg = 'Please enter your last name';
    } elseif (empty($u_email)) {
        $msg = 'Please enter your email';
    } elseif (empty($u_amount)) {
        $msg = 'Please enter amount';
    } else {           
        
        
        $msg = 'Your profile updated successfully';
        $response_arr['flag'] = TRUE;
        
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
}

add_action('wp_ajax_cancel_request_process', 'ajax_cancel_requesr_process');/add_action('wp_ajax_nopriv_cancel_request_process', 'ajax_cancel_requesr_process');
function ajax_cancel_requesr_process() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];    
    $plan_id = strip_tags(trim($_POST['plan_id']));    
    $user_id = strip_tags(trim($_POST['user_id']));    
    $subscription_id = strip_tags(trim($_POST['subscription_id']));    
    $start_date = strip_tags(trim($_POST['start_date']));
	$end_date = strip_tags(trim($_POST['end_date']));    
	$reason = strip_tags(trim($_POST['reason']));    
    
	
    if (empty($plan_id)) {
        $msg = 'No plans found with this plan id.';
    } elseif (empty($user_id)) {
        $msg = 'Login again to cancel.';
    } elseif (empty($reason)) {
		$msg = 'Please enter a reason.';
	} elseif (empty($subscription_id) || empty($start_date) || empty($end_date)) {
        $msg = 'Some error occurs. Try after sometime.';
    } else {           
        
		global $wpdb;
		$canel_chk = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}subscription_cancel_request
			WHERE user_id = $user_id AND subscription_id = '$subscription_id'		
		");
		if(!empty($canel_chk)) {			
			$msg = 'You have already requested for this cancellation.';		
		} else {			
			$wpdb->insert($wpdb->prefix.'subscription_cancel_request',array(
				'plan_id' => $plan_id,
				'user_id' => $user_id,
				'subscription_id' => $subscription_id,
				'start_date' => $start_date,
				'end_date' => $end_date,
				'reason' => $reason,
				'status' => 'requested'
			));
			
			$msg = 'Your request sent successfully';
			$response_arr['flag'] = TRUE;
		}
        
    }
    $response_arr['msg'] = $msg;
    echo json_encode($response_arr);
    exit;
} */
?>