<?php
namespace App\Http\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Route;


class MailHelper
{
    public static function sendMail($to='', $subject='', $mail_data = '', $cc='afshinishop@gmail.com'){

        $headers = "From: Afshini <afshinishop@gmail.com>\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "Reply-To: afshinishop@gmail.com \r\n";
        $headers .= "Return-Path: afshinishop@gmail.com \r\n";
        if(!empty($cc)){
            $headers .= 'CC: '.$cc . "\r\n";    
        }

        if ( mail($to,$subject,$mail_data,$headers) ) {
           return true;
        } else {
           return false;
        }
                        
    }   
}