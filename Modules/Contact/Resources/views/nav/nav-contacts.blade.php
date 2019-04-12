@auth
<ul class="list-group text-center d-none d-md-block" style="background-color:#e7e7e5c7 !important">
    <li class="list-group-item px-2 py-1 border-bottom" 
    style="border-bottom:solid 1px #555 !important; background-color:#e7e7e5c7 !important">
        <a href="/contact/contact-eutranet" class="text-muted" title="@lang('contacts.contactEutranet')">
            <i class="fa fa-envelope fa-3x d-inline-block"></i>
        </a>
        <span class="d-block bottom position-relative w-100">@lang('contacts.contactEutranet')</span>
    </li>
    <li class="list-group-item px-2 py-1 border-bottom" 
    style="border-bottom:solid 1px #555 !important; background-color:#e7e7e5c7 !important">
        <a href="/contact/contact-core" class="text-muted">
            <i class="fa fa-chalkboard-teacher fa-3x d-inline-block"></i>
        </a>
        <span class="d-block bottom position-relative w-100">
            @lang('contacts.contactTeam')
        </span>
    </li>
    <li class="list-group-item px-2 py-1 border-bottom" 
    style="border-bottom:solid 1px #555 !important; background-color:#e7e7e5c7 !important">
        <a href="/contact/contact-webmaster" class="text-muted" title="@lang('contacts.reportABug')">
            <i class="fa fa-laptop-code fa-3x d-inline-block"></i>
        </a>
        <span class="d-block bottom position-relative w-100">
            @lang('contacts.reportABug')
        </span>
    </li>
    <li class="list-group-item px-2 py-1 border-bottom" 
    style="border-bottom:solid 1px #555 !important; background-color:#e7e7e5c7 !important">
        <a href="/contact/contact-my-team" class="text-muted">
            <i class="fa fa-mail-bulk fa-3x d-inline-block"></i>
        </a>
        <span class="d-block bottom position-relative w-100">@lang('contacts.sendAMailing')</span>
    </li>
</ul>
@endauth