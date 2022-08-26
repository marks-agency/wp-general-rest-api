<?php

namespace Plugins;

use Plugins\NotificationPlugin ;
use Models\PostModel;

class NotificationHookPlugin
{

    public function loadsHooks(){
        add_action('briefing_was_filled', [ $this, 'briefingWasFilled' ] , 2,2);
        //add_action('woocommerce_new_order', [ $this, 'woocommerceNewOrder' ] , 2,2);
        //add_action('briefing_was_filled', [ $this, 'deactiveSite' ] , 2,2);
        //add_action('woocommerce_subscription_status_updated', [ $this, 'deactiveSite' ], 2, 3);
    }

    /*
    *
    */
    public function briefingWasFilled($post_id, $metaValueNotification){
        //update_option( "Hook_opcao_nova_do_entrou_aqui", [ $post_id,$user_id]);

        if (empty($post_id) || empty($metaValueNotification)){
            return ;
        }

        $notificationPlugin = new NotificationPlugin();
        $postModel = new PostModel();

        //$metaValueNotification[]

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
            }
             
        }
        
        $notificationData["post_id"] = $post["id"];
        $notificationData["post_type"] = $post["markform"];
        $notificationData["post_title"] = $post["post_title"];
        $notificationData["user_id"] = $userID;
        $notificationData["customer_name"] = $customerName;
        

        $notificationPlugin->createNotificationForFilledBreafing($notificationData); 
    }

    /*
    *
    */
    public function woocommerceNewOrder( $order_id, $order){
        
        $items = $order->get_items();

        $notificationPlugin = new NotificationPlugin();

        $notificationPlugin->createNotificationForWoocommerceNewOrder($items); 
    }

    /*
    *
    */
    public function deactiveSite( $post_id,$user_id){
        
        $notificationPlugin = new NotificationPlugin();

        $notificationPlugin->createNotificationDeactivationSite([]); 
    }

    /*
    *
    */
    public function PaymentReceived( $subscription,$new_status,$old_status){
        
        $notificationPlugin = new NotificationPlugin();

        $notificationPlugin->createNotificationPaymentReceived([]); 
    }


}
