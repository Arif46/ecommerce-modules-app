<?php

namespace App\Mail;

use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;

class ResetPasswordCodeMobile extends Mailable{

    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        // return $this->markdown('emails.verification')
        //             ->subject('Verification Email');
        return $this->subject($this->subject)->view('mail.verify.verify_code');
    }

    // public $user;
    // public $subject;
    // public $company_address;
    // public $header_title;
    // public $reset_password_url, $token;

    // public function __construct($user){

    //     $this->user = $user;
	// 	$this->subject = "Reset Password for AskMe";
	// 	$this->header_title = "Password Reset";
    //     $token = rand(1001, 9999);
    //     $this->token = $token;

    //     DB::table('seller_profiles')->where('email', $user->email)->delete();

    //     DB::table('seller_profiles')->insert([
    //         'email'=>$user->email,
    //         // 'token'=> bcrypt($token),
    //         'token'=> $token,
    //         'created_at'=> Carbon::now(),
    //     ]);

    // }

    // public function build(){

    //     return $this->subject($this->subject)->view('mail.verify.verify_code');

    // }
}
