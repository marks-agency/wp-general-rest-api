<?php 

namespace Models;
use WP_Query;

class EntryMetaModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function entriesMetaByFormID($form_id){
     global $wpdb;
     $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_entrymeta WHERE ".$wpdb->prefix."oi_markform_entries_id = $form_id ",OBJECT);

     $entriesMeta = [];

     foreach($results as $key => $value){
         
          $entryMeta = json_decode(json_encode($value), true);

          if($value->type=="questao_do_tipo_arquivo"){
            $entryMeta["formated_answer"] =  $this->transformTypeFileAnswer($value);
          }

          $entriesMeta[] = $entryMeta; 
     }

     return  $entriesMeta;
    
   }

   public function searchEntryMetaAnswer($answer, $offset = 0, $numberOfRecordsPerPage = 20){
    global $wpdb;
    $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_entrymeta WHERE answer LIKE '%$answer%' LIMIT ".$offset.",".$numberOfRecordsPerPage,OBJECT);

    $entriesMeta = [];

    foreach($results as $key => $value){
        
         $entryMeta = json_decode(json_encode($value), true);
         
         if(!empty($value->audio)){
          $entryMeta["audio"] =  $this->addUrlBase($value->audio);
          }

         if($value->type=="questao_do_tipo_arquivo"){
           $entryMeta["formated_answer"] =  $this->transformTypeFileAnswer($value);
         }

         $entriesMeta[] = $entryMeta; 
    }

    return  $entriesMeta;
   
  }


   private function transformTypeFileAnswer($value){
      $results = explode(',', $value->answer);
      $elements = [];
      foreach ($results as $result){
        $file = explode('/', $result);
        $number_item = count($file);
        if(!empty($file[$number_item-1])){
          $file_name = $file[$number_item-1];
          $result = $this->addUrlBase($result);
          $element = [];
          
          if (!empty($file_name) && $file_name != " "){
            $element["file_name"] =  $file_name;
            $element["file_url"]  = $result;
            $elements[] = $element;
          }
        }
  
      }
      return $elements;
  }
  
  private function addUrlBase($result){
     $oldUrlBase="https://marktestingbucket.s3-sa-east-1.amazonaws.com/";
     $newUrlBase="https://oimark.blob.core.windows.net/";
  
     $defaultUrl = str_replace("https://marktestingbucket.s3-sa-east-1.amazonaws.com/","",$result);
  
     return $newUrlBase.$defaultUrl;
  }


}
