<?php

namespace Plugins;

use Plugins\NotificationPlugin ;

class NotificationHookPlugin
{

    public function loadsHooks(){
        add_action('briefing_was_filled', [ $this, 'briefingWasFilled' ] , 2,2);
    }

    /*
    *
    */
    public function briefingWasFilled($post_id,$user_id){
        //update_option( "Hook_opcao_nova_do_entrou_aqui", [ $post_id,$user_id]);

        $notificationPlugin = new NotificationPlugin();

        $notificationPlugin->createNotificationForFilledBreafing([]); 
    }


}
