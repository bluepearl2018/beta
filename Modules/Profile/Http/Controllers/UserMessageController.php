<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use UserMessage;

class UserMessageController extends Controller
{
    
    /**
     *  List messages from Eutranet and other users
     *  Messages intended to VENDORS
     */ 

    public function listMessages(Request $request)
    {
        return view('users.user_messages.user_messages');    
    }    
    
    public function readMessage(Request $request)
    {
        // Nous analysons tout ce qui concerne le profil de l'utilisateur
        // Complétude, données manquantes et indispensables, etc.
        $messageId = Crypt::decrypt($request->user_message_to_read);
        if(Auth::User()->hasRole('verified|premium|premium-exclusive|admin')){
            $user_message_to_mark_as_read = UserMessage::where('id', $messageId)->first();
            // dd($user_message_to_mark_as_read);
            $timestamp = date(now());
            $user_message_to_mark_as_read->read_at = $timestamp;
            $user_message_to_mark_as_read->save();
            $user_message = $user_message_to_mark_as_read;
            Flash::success(trans('users.userMessageRead'));
            
        }
        return view('users.user_messages.user_read_message')->with(compact('user_message'));
    }  

    public function markMessageAsUnread(Request $request)
    {
        // Nous analysons tout ce qui concerne le profil de l'utilisateur
        // Complétude, données manquantes et indispensables, etc.
        
        if(Auth::User()->hasRole('verified|premium|premium-exclusive|admin')){
            $user_message_to_flag = UserMessage::where('id', Crypt::decrypt($request->user_message_to_flag))->firstOrFail();
            $user_message_to_flag->flagged_id = '1';
            $user_message_to_flag->save();
            Flash::success(trans('users.userMessageMarkedAsUnread'));
            return redirect('zones/users/messages');
        }
    }  
    
    public function deleteMessage(Request $request)
    {
        // Nous analysons tout ce qui concerne le profil de l'utilisateur
        // Complétude, données manquantes et indispensables, etc.
        
        if(Auth::User()->hasRole('verified|premium|premium-exclusive|admin')){
            $user_message_to_delete = UserMessage::where('id', Crypt::decrypt($request->user_message_to_delete))->firstOrFail();
            $user_message_to_delete->delete();
            Flash::success(trans('users.userMessageDeleted'));
            return redirect('zones/users/messages');
        }
    }  
}
