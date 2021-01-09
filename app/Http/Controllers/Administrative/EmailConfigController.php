<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailConfigController extends Controller
{
    public function smtp(){
        return view('administrative.mail.smtp');
    }

    public function updateSmtp(Request $request){
        $request->validate([
            'host' => 'required',
            'port' => 'required',
            'username' => 'required',
            'password' => 'required',
            'encryption' => 'required',
            'from_name' => 'required',
            'from_email' => 'required'
        ]);
        try {
            update_static_option('smtp_email_host', $request->input('host'));
            update_static_option('smtp_email_port', $request->input('port'));
            update_static_option('smtp_email_username', $request->input('username'));
            update_static_option('smtp_email_password', $request->input('password'));
            update_static_option('smtp_email_encryption', $request->input('encryption'));
            update_static_option('smtp_email_from_name', $request->input('from_name'));
            update_static_option('smtp_email_from_email', $request->input('from_email'));

            $env_val['MAIL_HOST'] = !empty($request->host) ? $request->host : 'YOUR_SMTP_MAIL_HOST';
            $env_val['MAIL_PORT'] = !empty($request->port) ? $request->port : 'YOUR_SMTP_MAIL_POST';
            $env_val['MAIL_USERNAME'] = !empty($request->username) ? $request->username : 'YOUR_SMTP_MAIL_USERNAME';
            $env_val['MAIL_PASSWORD'] = !empty($request->password) ? $request->password : 'YOUR_SMTP_MAIL_USERNAME_PASSWORD';
            $env_val['MAIL_ENCRYPTION'] = !empty($request->encryption) ? $request->encryption : 'YOUR_SMTP_MAIL_ENCRYPTION';
            $env_val['MAIL_FROM_NAME'] = !empty($request->from_name) ? $request->from_name : 'YOUR_SMTP_FROM_NAME';

            setEnvValue([
                'MAIL_HOST' => '"'.$env_val['MAIL_HOST'].'"',
                'MAIL_PORT' =>  '"'.$env_val['MAIL_PORT'].'"',
                'MAIL_USERNAME' => '"'.$env_val['MAIL_USERNAME'].'"',
                'MAIL_PASSWORD' => '"'.$env_val['MAIL_PASSWORD'].'"',
                'MAIL_ENCRYPTION' => '"'.$env_val['MAIL_ENCRYPTION'].'"',
                'MAIL_FROM_NAME' => '"'.$env_val['MAIL_FROM_NAME'].'"'
            ]);

            return redirect()->back()->withToastSuccess('Successfully SMTP updated!');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
        }
    }

    public function testSmtp(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        if (sendSmtpTest($request->input('email')) == true){
            return redirect()->back()->withToastSuccess('SMTP working Successfully !');
        }else{
            return redirect()->back()->withErrors('SMTP is not working !');
        }
    }
}
