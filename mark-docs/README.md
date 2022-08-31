# Models
https://www.businessbloomer.com/woocommerce-easily-get-order-info-total-items-etc-from-order-object/
========================= hook assinatura pedido mudado =======================
```
add_action('woocommerce_subscription_status_updated', 'oi_mark_subscription_status_change_automate_woo', 10, 3);
 function oi_mark_subscription_status_change_automate_woo( $subscription,$new_status,$old_status) {
	 //$oi_mark_parent_id = $subscription->data['parent_id'];
	 
	 $subscription_get_items = $subscription->get_items();
	 
	 foreach ($subscription_get_items as $item_id => $item ) {	
		 $id_do_produto_oi_mark = wc_get_order_item_meta( $item_id, '_product_id', true);
	}
	 
	 if(empty($oi_mark_post_automatewo)){
		 return;
	 }else{
		 $link_picker = get_post_meta($id_do_produto_oi_mark,'aw_worklfow_picker_oi_mark',true);	 
	 }
	 
	 if(empty($link_picker)){
		 return;
	 }
	 
	 
	
	 
	 $userToset_oi_mark = $subscription->get_user_id();
	 $blogUserToset_oi_mark  = get_active_blog_for_user($userToset_oi_mark);
	 switch_to_blog($blogUserToset_oi_mark->blog_id);
	 
	 /*
	 * obtendo as informaçoes do produto
	 */
	 global $wpdb, $post;
     $query = new WP_Query(array('post_type'=>'aw_workflow',
								'post_status'=>array('aw-disabled','publish')));
     $markform_posts = $query->get_posts();

	 
	 $oi_mark_post_automatewo = NULL;
	 foreach ($markform_posts as $item_id => $item ) {
		//print_r($item->post_title);
		 if($item->post_title==$link_picker){
			 $oi_mark_post_automatewo = $item;
		 }
	}
	
	if( ! empty($oi_mark_post_automatewo)){
		
		if($new_status=="active"){
			$oi_mark_post_automatewo->post_status = 'publish';
		}else{
			$oi_mark_post_automatewo->post_status = 'aw-disabled';
		}
		
		wp_update_post($oi_mark_post_automatewo) ;
	}
	 
	
	
	  
	 restore_current_blog();
	 
   } 
 ```



   =====================  hook para ativar e dasativar site =====================
```
   add_action('woocommerce_subscription_status_updated', 'oi_mark_subscription_status_change_general_action', 10, 3);
 function oi_mark_subscription_status_change_general_action( $subscription,$new_status,$old_status) {
	 
	 $blogUser_id =  $subscription->get_meta("oi_mark_general_action_deactivate_and_activate_site",true);
	 $subscription_id = $subscription->get_id();
	 if(!empty($blogUser_id)){
		
			 if($new_status!="active"){			 
				 
					 oi_mark_schudule_deactive_site($blogUser_id,$subscription_id);

			 }else{
					 oi_mark_general_action_active_site_func($blogUser_id);	
			 }	 
	 }

   }


function oi_mark_schudule_deactive_site($blog_id, $subscription_id){

	$date = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

	// Modify the date
	//$date->modify('+1 minutes');
	$date->modify('+7 days');

	// Output
	//echo $date->format('Y-m-d H:i:s');

	//echo strtotime($date->format('Y-m-d H:i:s'));
	
	//Faz o agendamento da ação		
	$trigger_timestap = strtotime($date->format('Y-m-d H:i:s'));
	$info = array("blog_id"=>$blog_id,"subscription_id"=>$subscription_id);
	as_schedule_single_action($trigger_timestap, 'oi_mark_general_action_deactive_site', array("info" => $info));
}

add_action( 'oi_mark_general_action_deactive_site', 'oi_mark_general_action_deactive_site_func', 10, 1 ) ;

function oi_mark_general_action_deactive_site_func($info){
	if(!empty($info) && count($info) == 2){
		$blog_id = $info['blog_id'];
		$subscription_id = $info['subscription_id'];
		$subscription = wcs_get_subscription($subscription_id);
		
		if(!empty($subscription)){
			
		 $status = $subscription->get_status();
			if($status !== "active"){
				update_blog_status($blog_id, 'archived', 1);
				update_blog_status($blog_id, 'public', 0);
		 	}	 
	 	}	
	}
	/*update_blog_status($blog_id, 'archived', 1);
	update_blog_status($blog_id, 'public', 0);*/
}

function oi_mark_general_action_active_site_func($blog_id){
	update_blog_status($blog_id, 'archived',0);
	update_blog_status($blog_id, 'public', 1);
}
 ```
===================== push notification unicode =====================
http://www.unicode.org/emoji/charts/full-emoji-list.html#1f604

https://woocommerce.com/document/managing-orders/

https://vwo.com/blog/best-push-notifications-tactics/

gravity form


$metaValueNotification = [] ;
    $metaValueNotification["entry_id"] = $last_id;
    $metaValueNotification["user_id"] = $user_id;
    do_action('briefing_was_filled', $post_id, $metaValueNotification);

=================== obter emojis ========================
https://getemoji.com/

==========================
https://wordpress.stackexchange.com/questions/15309/how-to-get-blog-name-when-using-wordpress-multisite

//https://claudionhangapc.com/multsite_claudio/wp-json/wp-general-rest-api/v1


https://www.sqltutorial.org/sql-list-all-tables/