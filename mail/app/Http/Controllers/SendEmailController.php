<?php

namespace App\Http\Controllers;
//require 'vendor/autoload.php';

//use Mailgun\Mailgun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mailgun;
use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\SendEmailController;

class SendEmailController extends Controller
{
    


        public static function sendSampleEmail()
            {
                $recipient = 'pintilied41@gmail.com';
                
                $response = Http::post("https://api.mailgun.net/v3/sandboxd236050581a249fc83978dade8ec0314.mailgun.org/messages", [
                    'auth' => ['api', '90d84da543ad0d37b2a93648a6d210f7-1900dca6-02f4710f'],
                    'form_params' => [
                        'from' => 'd.pintilie@mail.ru',
                        'to' => $recipient,
                        'subject' => 'Sample Email',
                        'html' => view('emails.test')->render(),
                    ],
                ]);
                
                //dd($response);

                if ($response->successful()) {
                    return "Email sent successfully!";
                } else {
                    return "Failed to send email.";
                }
            }


        // public static function sendEmail()
        //     {
                    
        //             # Instantiate the client.
        //             $mgClient = new Mailgun('90d84da543ad0d37b2a93648a6d210f7-1900dca6-02f4710f');
        //             $domain = "sandboxd236050581a249fc83978dade8ec0314.mailgun.org";


        //             # Make the call to the client.
        //             $result = $mgClient->sendMessage($domain, array(
        //                 'from'	=> 'Excited User <mailgun@YOUR_DOMAIN_NAME>',
        //                 'to'	=> 'pintilied41@gmail.com',
        //                 'subject' => 'Hello',
        //                 'text'	=> 'Testing some Mailgun awesomeness!'
        //             ));
                
              

        //         if ($response->successful()) {
        //             return "Email sent successfully!";
        //         } else {
        //             return "Failed to send email.";
        //         }
        //     }

        public static function sendEmail()
        {
            /** 
             * Store a receiver email address to a variable.
             */
            $reveiverEmailAddress = "pintilied41@gmail.com";
    


            
            /**
             * Import the Mail class at the top of this page,
             * and call the to() method for passing the 
             * receiver email address.
             * 
             * Also, call the send() method to incloude the
             * HelloEmail class that contains the email template.
             */
            Mail::to($reveiverEmailAddress)->subject('New subject')->view('emails.test');
    



            /**
             * Check if the email has been sent successfully, or not.
             * Return the appropriate message.
             */
            if (Mail::failures() != 0) {
                return "Email has been sent successfully.";
            }
            return "Oops! There was some error sending the email.";



        }


}
