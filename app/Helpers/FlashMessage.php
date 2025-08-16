<?php

namespace App\Helpers;

# Flash Message

class FlashMessage
{

   public static function addFlash(string $type, string $message, string $title = null)
   {
      // flash()->addFlash([
      //    "type"    => $type,
      //    "message" => $message,
      //    "title"   => $title,
      //    "options" => $options
      // ]);

      // flash()->addFlash( 'error', 'Your password has been reset.','Role Updated');
   }

   // Flash Notification Helper Function

   public static function AddMessage(string $type, string $message, string $title = null, array $options = [])
   {
     
      flash()->addFlash($type,$message,$title,$options);

   }

   
}

