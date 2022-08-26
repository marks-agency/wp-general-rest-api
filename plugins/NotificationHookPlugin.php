<?php

namespace Plugins;

use Plugins\NotificationPlugin ;

class NotificationHookPlugin
{

    public function loadsHooks(){
        add_action('briefing_was_filled', [ $this, 'briefingWasFilled' ] , 2,2);
        add_action('woocommerce_new_order', [ $this, 'woocommerceNewOrder' ] , 2,2);
    }

    /*
    *
    */
    public function briefingWasFilled($post_id,$user_id){
        //update_option( "Hook_opcao_nova_do_entrou_aqui", [ $post_id,$user_id]);

        $notificationPlugin = new NotificationPlugin();

        $notificationPlugin->createNotificationForFilledBreafing([]); 
    }

    public function woocommerceNewOrder( $order_id, $order){
        
        $items = $order->get_items();

        $notificationPlugin = new NotificationPlugin();

        $notificationPlugin->createNotificationForWoocommerceNewOrder($items); 
    }


}
