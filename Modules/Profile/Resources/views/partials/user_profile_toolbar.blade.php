<div class="toolBar mb-4" style="border-bottom: dashed 2px #ededed;">
    <ul class="list-inline mb-1">
        <li class="list-inline-item">
                @if(is_null($userVAT) || is_null($userVAT) || $countLanguagePairs < 1 ||$countPools < 1)
                <a id="warningsAndAlertsBtn" data-target="#warningsAndAlerts" 
                data-toggle="collapse">
                    <span class="badge badge-danger d-inline-block align-middle" style="font-size:0.75rem">
                        <span class="fa fa-bell">
                        </span>
                    </span>
                </a>
            @endif
        </li>
        <li class="list-inline-item">
            @if(Auth::User()->hasRole('certified'))
             <span class="badge align-middle" 
                style="background-color:#d3cec6">
                    <i class="fa fa-star"></i> 
                    @lang('profile.certifiedUser')
                </span>
            @endif 
        </li>
        <li class="list-inline-item">
            @if(Auth::User()->hasRole('certified'))
             <span class="badge align-middle" 
                style="background-color:#d3cec6">
                    <i class="fa fa-vote-yea"></i> 
                    @lang('profile.noSubscription')
                </span>
            @endif 
        </li>
    </ul>
</div>