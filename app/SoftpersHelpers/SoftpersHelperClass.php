<?php

namespace App\SoftpersHelpers;
use File;

class SoftpersHelperClass {

     /**
     * @author Muhammad Naveed
     * @github https://github.com/naveed504
     *
     * This class is a generic form of method which are to be used all around the
     * project, for reusability and static behaviour by laravel facades
     *
     * Write down all the generic methods here in this class for flexibility and reusability
     * Please note this class will be autoloaded via composer and injected to the service
     * providers.
     */

     /**
      * save File for all types
      */
      public function saveFile($file, $path)
      {
         $getImgPath =$this->checkFilePath($path);
         if(empty($file)) {
            $newImage = '';
         } else {
          $fileName = time().'.'.$file->clientExtension();
          $file->move($getImgPath, $fileName);
          $newImage = $fileName;
         }
         return $newImage;
      } 
      
      /**
       * check File path . create directory if not exist
       */
     public function checkFilePath($filepath)
     {
         if(!File::isDirectory($filepath)){
            File::makeDirectory($filepath, 0777, true, true);
         }
         return $filepath;
     }
}