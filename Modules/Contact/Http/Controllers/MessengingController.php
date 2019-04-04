<?php

namespace App\Http\Controllers\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Profile\Entities\UserMessage;
use Mailable;
use Flash;
use Crypt;
use Auth;
use User;
use Pool;
use PoolManager;
use Sourcelanguage;
use Validator;
use Session;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageSent;
use App\Mail\TeamMailingSent;
use App\Mail\AnonymousMessageSent;

class ContactController extends Controller
{
    public function __construct(){
        
    }

    /**************************************************************
    | ------------ CONTACT EUTRANET (GENERAL EMAIL) --------------- |
    ***************************************************************/
    
    public function getContactEutranet()
    {
        return view('contacts.contact_eutranet.contact_eutranet');
    }
    public function postContactEutranet(Request $request)
    {
        // TODO make validation
        // dd($request->subject);
        $recipient = 'stephane.maissin@gmail.com';
        $ip = $_SERVER['REMOTE_ADDR'];
        $sender = $request->firstname.' '.$request->surname;
        Mail::to(['contact.us@eutranet.com'])
        ->cc($request->email)
        ->send(new AnonymousMessageSent(
            $request->firstname, $request->surname, $request->phone,
            $request->email, $request->subject, $request->body, $sender, $ip, $recipient));
        return redirect('/zones/contacts');
    }

    /**************************************************************
    | ------------ CONTACT MY TEAM (MAIL BULK) ------------------- |
    | To send mail bulk, user must be a Premium exclusive member
    ***************************************************************/
    
    public function getTeamMailing(?User $user)
    {
        if($user->hasRole('premium-exclusive'))
        {
            $myTeam = \App\Models\UserTeam::where('recruiter_id', Auth::User()->id)->get();
            return view('contacts.contact_my_team.contact_my_team')->with(compact('myTeam'));
        }
        Flash::warning('Fonctionnalité réservée aux membres Premium Exclusive');
        return redirect()->back();
    }
    public function postTeamMailing(Request $request)
    {
        // dd($request->all());
        $teamMembers = [];
        for($i = 1; $i<=count($request->mailable); $i++) 
        {
            if(isset($request['isMailable'.$i]))
            {
                $teamMembers[] = Crypt::decrypt($request['mailable'][$i]);
            }
            
        }
        
        $recipients = \App\Models\UserTeam::whereIn('user_id', $teamMembers)->get();
        // dd($selectedTeamMembers);
        foreach($recipients as $mailingContent){
            $mailingData[] = 
            [
                'firstname' => $request->firstname, 
                'surname' => $request->surname, 
                'phone' => $request->phone, 
                'email' => $request->email,
                'subject' => $request->subject,
                'body' => $request->body,
                'sender' => Auth::User()->surname,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'recipient' => $mailingContent->user->firstname.''.$mailingContent->user->surname,
                'recipient-email' => $mailingContent->user->email,
            ];
        }
        foreach($mailingData as $mailContent)
        {
            Mail::to($mailContent['recipient-email'])
            ->cc('postmaster@eutranet.com')
            ->send(new TeamMailingSent(
            $mailContent['firstname'],
            $mailContent['surname'],
            $mailContent['phone'],
            $mailContent['email'],
            $mailContent['subject'],
            $mailContent['body'],
            $mailContent['sender'],
            $mailContent['ip'],
            $mailContent['recipient']));
        }
        return redirect('/zones/contacts');
        
    }

    /**************************************************************
    | ------------ CONTACT A CORE TEAM MEMBER ------------------- |
    ***************************************************************/
    
    public function getCoreMailing()
    {
        $this->middleware(['auth', 'verified']);
        $coreTeam = \App\User::where('is_core', TRUE)->where('is_admin', FALSE)->get();
        return view('contacts.contact_core.contact_core')->with(compact('coreTeam'));
    }
    public function postCoreMailing(Request $request)
    {
        // dd($request->all());
        $this->middleware(['auth', 'verified']);
        if(isset($request['isMailable']))
        {
            $coreMember[] = Crypt::decrypt($request['mailable']);
        }
        
        $recipient = \App\User::whereIn('id', $coreMember)
        ->where('is_admin', FALSE)
        ->where('is_core', TRUE)
        ->firstOrFail();

        if(!empty($recipient)){
            // dd($selectedTeamMembers);
            $mailingData = 
            [
                'firstname' => $request->firstname, 
                'surname' => $request->surname, 
                'phone' => $request->phone, 
                'email' => $request->email,
                'subject' => $request->subject,
                'body' => $request->body,
                'sender' => Auth::User()->firstname.' '.Auth::User()->surname,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'recipient' => $recipient->firstname.''.$recipient->surname,
                'recipient-email' => $recipient->email,
            ];
            Mail::to($mailingData['recipient-email'])
            ->cc('postmaster@eutranet.com')
            ->send(new TeamMailingSent(
            $mailingData['firstname'],
            $mailingData['surname'],
            $mailingData['phone'],
            $mailingData['email'],
            $mailingData['subject'],
            $mailingData['body'],
            $mailingData['sender'],
            $mailingData['ip'],
            $mailingData['recipient']));

            return redirect('/zones/contacts');
        }
        abort('404');
    }

    /**************************************************************
    | ------------ CONTACT THE WEBMASTER ------------------------- |
    ***************************************************************/
    
    public function getContactWebmaster()
    {
        $this->middleware(['auth', 'verified']);
        return view('contacts.contact_eutranet.contact_webmaster');
    }
    public function postContactWebmaster(Request $request)
    {
        // TODO make validation
        // dd($request->subject);
        $recipient = 'stephane.maissin@gmail.com';
        $ip = $_SERVER['REMOTE_ADDR'];
        $sender = $request->firstname.' '.$request->surname;
        Mail::to(['contact.webmaaster@eutranet.com'])
        ->cc($request->email)
        ->send(new AnonymousMessageSent(
            $request->firstname, $request->surname, $request->phone,
            $request->email, $request->subject, $request->body, $sender, $ip, $recipient));
        return redirect('/zones/contacts');
    }

    /**************************************************************
    | ------------ CONTACT A USER --------------------------------- |
    ***************************************************************/
    
    public function contactUser(Request $request)
    {
        $this->middleware(['auth', 'verified']);
        $currentUserId = Auth::User()->id;
        $sender = Auth::User()::where('email_verified_at', Crypt::decrypt($request->check_3))
        ->where('id', $currentUserId)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->first();
        // dd($sender);
        
        $recipient = \App\User::where('status_id', Crypt::decrypt($request->check_2))
        ->where('id', Crypt::decrypt($request->check_1))
        ->where('email_verified_at', '!=', NULL)
        ->where('visibility_id', '1')
        ->first();
        // dd($recipient);

        // TODO Add Captcha Control here
        
        if($recipient && $sender){
            // If recipient exists and account is active, ok...
            return view('contacts.contact_user.contact_user')->with(compact('recipient'));
        }
        Flash::error(Flash::message(trans('contacts.contactTempNotPossible')));
        return redirect('/zones/users/messages');

    }
    public function sendMessageToUser(Request $request){
        // TODO : increase security after recaptcha, then send
        $recipient = \App\User::where('name', Crypt::decrypt($request->check_5))->firstOrFail();
        if($request->check_4 && $recipient){
            $message_data = $request->validate([
                'subject' => 'required|min:10|max:255',
                'body' => 'required|min:24|max:800',
            ]);
        }
        if(!$message_data){
            Flash::message(trans('contacts.impossibleToSendYourMessageReasonUnknown'));
        }
        else
        // TODO Send Email to user
        // Generate EVENT 
        // Store copy of email into Email LOG
        
        UserMessage::insert([
            'subject' => $request->subject,
            'body' => $request->body, 
            'recipient_id' => $recipient->id, 
            'user_id' => Auth::User()->id]);
        $sender = Auth::User();
        Mail::to([$recipient, 'stephane.maissin@gmail.com'])->send(new MessageSent($sender, $recipient, $request->subject, $request->body));
        Flash::success(trans('contacts.messageSentTo').' '.$recipient->firstname.' '.$recipient->surname);
        return redirect('/zones/workspace');
    }
    
    /**************************************************************
    | ------------ CONTACT A POOL MANAGER ------------------------ |
    ***************************************************************/
    
    public function contactPoolEutranet()
    {
        $this->middleware('auth');
        if(isset($poolCode) && !empty($poolCode) && isset($subPoolCode) && !empty($subPoolCode)){
            return view('layouts.contact')->with(compact('poolCode', 'subPoolCode'));
        }
        Flash::error('pool zone controller.' );
        return redirect()->back();
        
    }

    // This method allows user to contact a pool manager
    public function contactPoolManager()
    {
        $this->middleware('auth');
        return view('contacts.contact_pools.contact_pool_manager');
    }

    // This method allows user to contact a pool manager according selected locale
    public function contactPoolManagerByLanguage(Request $request, $pool, $lang){
        $language_id = Sourcelanguage::where('code', $lang)->pluck('id')->first();
        $pool = Pool::where('code', $pool)->pluck('id')->first();
        $manager = PoolManager::where('pool_id', $pool)->where('language_id', $language_id)->first();
        if(!isset($manager) || empty($manager))
        {
            dd("Pas de manager spécifique pour ce pool dans la langue ".$language_id);
        }
        elseif(isset($manager) && !empty($manager)){
            // S'il existe un directeur pour le pool objet de la requête
            // Envoyer la demande au responsable Eutranet et au 
            // responsable du pool
            $mailto = $manager->manager->email;
            // Appeler le formulaire
            dd("Appeler le formulaire requis depuis General Email Controller");
        }
    }
}
