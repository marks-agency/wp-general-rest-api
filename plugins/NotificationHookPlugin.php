<?php

namespace Plugins;

use Plugins\NotificationPlugin ;
use Models\PostModel;

class NotificationHookPlugin
{

    public function loadsHooks(){
        
        add_action('briefing_was_filled', [ $this, 'briefingWasFilled' ] , 2,2);
        add_action('woocommerce_new_order', [ $this, 'woocommerceNewOrder' ] , 2,2);
        add_action('woocommerce_order_status_changed', [ $this, 'PaymentReceived' ], 2, 3);
        add_action('oi_mark_deactive_site', [ $this, 'deactiveSite' ] , 2,2);
        add_action('oi_mark_deactive_site_alert', [ $this, 'deactiveSiteAlert' ] , 2,2);
        // add_action('woocommerce_subscription_status_updated', [ $this, 'PaymentReceived' ], 2, 3);
    }

    /*
    *
    */
    public function briefingWasFilled($post_id, $metaValueNotification){

        if (empty($post_id) || empty($metaValueNotification)){
            return ;
        }

        $postModel = new PostModel();

        $post = $postModel->getPostByID($post_id);
        
        if (empty($post)){
            return ;
        }

        $notificationData = [];
        
        $userID = $metaValueNotification['user_id'];

        $customerName = "cliente";
        
        if (!empty($userID)){
            
            $cliente =  get_user_by('ID',$userID);
            if (!empty($userID)){
                
                $customerName = $cliente->display_name;
                
                if (!empty($cliente->user_firstname) &&!empty($cliente->user_lastname)){
                    $customerName =  $cliente->user_firstname." ".$cliente->user_lastname;
                } 
            }
             
        }
        
        $notificationData["post_id"] = $post["id"];
        $notificationData["post_type"] = $post["markform"];
        $notificationData["post_title"] = $post["post_title"];
        $notificationData["user_id"] = $userID;
        $notificationData["customer_name"] = $customerName;
        $notificationData["entry_id"] = $metaValueNotification['entry_id'];
        
        
        $notificationPlugin = new NotificationPlugin();
        $notificationPlugin->createNotificationForFilledBreafing($notificationData); 
    }

    /*
    *
    */
    public function woocommerceNewOrder( $order_id, $order){
        
        if (empty($order_id) || empty($order)){
            return ;
        }
        
        if ( ! is_a( $order, 'WC_Abstract_Order' ) ) {
            $order = wc_get_order( $order );
        }
    
        if(!empty($order->get_parent_id())){
            return ;
        }

        $items = $order->get_items();
        $userID = $order->get_user_id();

        $notificationData = [];

        $customerName = "cliente";
        
        if (!empty($userID)){
            
            $cliente =  get_user_by('ID',$userID);
            if (!empty($userID)){
                $customerName = $cliente->display_name;
                
                if (!empty($cliente->user_firstname) &&!empty($cliente->user_lastname)){
                    $customerName =  $cliente->user_firstname." ".$cliente->user_lastname;
                } 
            }
             
        }

        $notificationData["post_id"] = $order_id;
        $notificationData["post_type"] = get_post_type( $order_id );
        $notificationData["post_title"] = get_the_title( $order_id );
        $notificationData["user_id"] = $userID;
        $notificationData["customer_name"] = $customerName;
        
        $notificationPlugin = new NotificationPlugin();
        $notificationPlugin->createNotificationForWoocommerceNewOrder($notificationData); 
    }

    /*
    *
    */
    public function PaymentReceived( $order_id, $old_status, $new_status){
        
        if (empty($order_id) || empty($old_status) || empty($new_status)){
            return ;
        }

        if ($new_status != "on-hold"){
            return ;
        }

        $order = wc_get_order( $order_id );

        $userID = $order->get_user_id();

        $notificationData = [];

        $customerName = "cliente";
        
        if (!empty($userID)){
            
            $cliente =  get_user_by('ID',$userID);
            if (!empty($userID)){
                
                $customerName = $cliente->display_name;

                if (!empty($cliente->user_firstname) &&!empty($cliente->user_lastname)){
                    $customerName =  $cliente->user_firstname." ".$cliente->user_lastname;
                } 
            }
             
        }

        $notificationData["post_id"] = $order_id;
        $notificationData["post_type"] = get_post_type( $order_id );
        $notificationData["post_title"] = get_the_title( $order_id );
        $notificationData["user_id"] = $userID;
        $notificationData["customer_name"] = $customerName;
        
        $notificationPlugin = new NotificationPlugin();
        $notificationPlugin->createNotificationPaymentReceived($notificationData);  
    }

    /*
    *
    */
    public function deactiveSite( $blog_id, $subscription_id){
        
        if (empty($blog_id) || empty($subscription_id)){

            return ;
        }
    
        $current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
        $blogName = $current_blog_details->blogname;
        $blogHome = $current_blog_details->home;
        
        switch_to_blog($blog_id);
        
        $adminEmail = get_bloginfo("admin_email");

        restore_current_blog();

        $user = get_user_by( 'email', $adminEmail );
        

        $userID = $user->ID;

        $notificationData = [];

        $customerName = "cliente";
        
        if (!empty($userID)){
            
            $cliente =  get_user_by('ID',$userID);
            if (!empty($userID)){
                
                $customerName = $cliente->display_name;
                
                if (!empty($cliente->user_firstname) &&!empty($cliente->user_lastname)){
                    $customerName =  $cliente->user_firstname." ".$cliente->user_lastname;
                } 
            }
             
        }

        $notificationData["post_id"] = $blog_id;
        $notificationData["subscription_id"] = $subscription_id;
        $notificationData["post_type"] = get_post_type( $blog_id );
        $notificationData["post_title"] = get_the_title( $blog_id );
        $notificationData["user_id"] = $userID;
        $notificationData["customer_name"] = $customerName;
        $notificationData["blogname"] = $blogHome;
        $notificationData["bloghome"] = $blogName;
        
        $notificationPlugin = new NotificationPlugin();
        $notificationPlugin->createNotificationDeactivationSite($notificationData); 
    }

    /*
    *
    */
    public function deactiveSiteAlert( $blog_id, $subscription_id){
        
        if (empty($blog_id) || empty($subscription_id)){

            return ;
        }
    
        $current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
        $blogName = $current_blog_details->blogname;
        $blogHome = $current_blog_details->home;
        
        switch_to_blog($blog_id);
        
        $adminEmail = get_bloginfo("admin_email");

        restore_current_blog();

        $user = get_user_by( 'email', $adminEmail );
        

        $userID = $user->ID;

        $notificationData = [];

        $customerName = "cliente";
        
        if (!empty($userID)){
            
            $cliente =  get_user_by('ID',$userID);
            if (!empty($userID)){
                
                $customerName = $cliente->display_name;
                
                if (!empty($cliente->user_firstname) &&!empty($cliente->user_lastname)){
                    $customerName =  $cliente->user_firstname." ".$cliente->user_lastname;
                } 
            }
             
        }

        $notificationData["post_id"] = $blog_id;
        $notificationData["subscription_id"] = $subscription_id;
        $notificationData["post_type"] = get_post_type( $blog_id );
        $notificationData["post_title"] = get_the_title( $blog_id );
        $notificationData["user_id"] = $userID;
        $notificationData["customer_name"] = $customerName;
        $notificationData["blogname"] = $blogHome;
        $notificationData["bloghome"] = $blogName;
        
        $notificationPlugin = new NotificationPlugin();
        $notificationPlugin->createNotificationDeactivationSiteAlert($notificationData); 
    }


}
