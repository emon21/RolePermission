<?php

namespace App\Helpers;

# Flash Message

class FlashMessage
{

   // public static function addFlash(string $type, string $message, string $title = null, array $options = [])
   // {
   //    // Session::flash($type, $message);


   //    flash()->addFlash([
   //       "type"    => $type,
   //       "message" => $message,
   //       "title"   => $title,
   //       "options" => $options
   //    ]);
   // }

   public static function addFlash(string $type, string $message, string $title = null)
   {
      flash()->addFlash([
         "type"    => $type,
         "message" => $message,
         "title"   => $title,
        
      ]);

     // flash()->addFlash( 'error', 'Your password has been reset.','Role Updated');
   }

}

// if (!function_exists('addFlash')) {
//    function addFlash(string $type, string $message, string $title = null, array $options = [])
//    {
//       flash()->addFlash([
//          "type"    => $type,
//          "message" => $message,
//          "title"   => $title,
//          "options" => $options
//       ]);
//    }
// }
