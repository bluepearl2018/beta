@auth
<form id="contact-user-form" method="POST" action="/zones/contacts/contact-user">
    @csrf
    <input type="hidden" name="check_1" value="{{ Crypt::encrypt($selectedUser->id) }}" />
    <input type="hidden" name="check_2" value="{{ Crypt::encrypt($selectedUser->status_id) }}" />
    <input type="hidden" name="check_3" value="{{ Crypt::encrypt(Auth::User()->email_verified_at) }}" />
    <button form="contact-user-form" class="btn btn-outline-secondary btn-sm">
        <span class="d-none d-md-inline-block align-middle mr-2">@lang('contacts.sendMessage')</span>
        <i class="fa fa-envelope align-middle"></i>
    </button>
</form>
@endauth