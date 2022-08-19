<?php 

namespace Models;
use WP_Query;

class PostModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function post(){
        
        $posts =   new WP_Query(array('post_type'=>'markform'));
        $markformPosts = [];

        while($posts->have_posts()){

                $posts->the_post();
                $authorID = $posts->post->post_author;
                $author =  get_user_by('ID',$authorID);

                $singlePost = [];

                $singlePost['id'] = $posts->post->ID;
                $singlePost['post_title'] = $posts->post->post_title;
                $singlePost['post_name'] = $posts->post->post_name;
                $singlePost['post_date'] = $posts->post->post_date;
                $singlePost['post_author_name'] = $author->display_name;
                $singlePost['perma_link'] =  get_permalink($posts->post->ID);
                $singlePost['number_of_chield'] =  $this->countNumberOfBreafingByID($posts->post->ID);

                $markformPosts[] = $singlePost;
        }

        $info = [];
        $info["count"] = wp_count_posts('markform')->publish;

        $results = [];
        $results["info"] = $info;
        $results["results"] = $markformPosts;
        
        return  $results;
   }

   private function countNumberOfBreafingByID($ID){
        global $wpdb;
        $result = $wpdb->get_results("SELECT count(*) as ChildCount FROM ".$wpdb->prefix."oi_markform_entries WHERE form_id = $ID ");
        return $result[0]->ChildCount;
   }


}
