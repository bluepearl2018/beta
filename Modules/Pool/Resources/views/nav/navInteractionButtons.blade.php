<?php 
$selectedLocale = App::getLocale();
$sessionLanguageIds = \Modules\UiTables\Entities\Sourcelanguage::where('code', $selectedLocale)->select('id')->get();
$nativePoolManager = \Modules\Pool\Entities\PoolManager::where('pool_id', $pool->id)->
whereIn('language_id', $sessionLanguageIds)->first();
?>

@isset($nativePoolManager)
    <div class="d-flex flex-row card-header bg-secondary px-0">
        <h6 class="col-8">
            <i><img height="16" alt="{{ $selectedLocale }}" 
            src="{!! asset('img/flags/'.$selectedLocale.'.png') !!}" /></i>
            <strong>
                    {{ $nativePoolManager->manager->firstname }}
                    {{ $nativePoolManager->manager->surname }}</strong><br>
                    {{ $nativePoolManager->manager->userProfile->postal_code }}
                    {{ $nativePoolManager->manager->userProfile->city }},
                    {{ $nativePoolManager->manager->userProfile->state }},
                    {{ $nativePoolManager->manager->userProfile->country->name }},
                    {{ $nativePoolManager->manager->VAT }},
                    {{ $nativePoolManager->manager->userProfile->phone }}<br>
                    {{ $nativePoolManager->manager->userProfile->mobile }}
        </h6>
        <img class="img-fluid col-4" src="https://via.placeholder.com/150" />
    </div>
    <div class="card-body">
        {!! $nativePoolManager->manager->userProfile->description !!}
    </div>
    @auth
    <div class="d-flex flex-row card-header bg-dark px-0">    
        <form id="getQuoteFromPM" action="/contact/contact-pool-manager" method="POST">
            @csrf
            <input type="hidden" name="pool_name" 
            value="{{ Crypt::encrypt($pool->code) }}" />
            <input type="hidden" name="pool_manager" 
            value="{{ Crypt::encrypt($nativePoolManager->id) }}" />
            <button class="btn btn-sm btn-outline-secondary" type="submit" form="getQuoteFromPM" role="button">
                <i class="fa fa-envelope"></i>
            </button>
        </form>
        <form id="showMember" method="POST" action="{{ route('member') }}">
            @csrf
            <input id="inputMember" type="hidden" name="user_request" 
            value="{{ Crypt::encrypt($nativePoolManager->user_id) }}" />
            <button class="btn btn-sm btn-outline-secondary" type="submit" role="button" 
            form="showMember">
                <i class="fa fa-user-circle"></i>
            </button>
        </form>
        <form id="recruitMember" action="/zones/interact/users/add-to-my-team" method="POST">
            @csrf
            <input type="hidden" name="selected_user" value="{{ Crypt::encrypt($nativePoolManager->user_id) }}" />
            <button role="button" form="recruitMember" type="submit" 
            class="btn btn-sm btn-outline-secondary">
                <i class="fa fa-user-plus"></i>
            </button>
        </form>
    </div>
    @endauth
    @guest
    <div class="d-flex flex-row card-header bg-dark px-0">    
        <form id="getQuoteFromPM" action="/contact/contact-pool-manager" method="POST">
            @csrf
            <input type="hidden" name="pool_name" 
            value="{{ Crypt::encrypt($pool->code) }}" />
            <input type="hidden" name="pool_manager" 
            value="{{ Crypt::encrypt($nativePoolManager->id) }}" />
            <button class="btn btn-sm btn-outline-secondary" type="submit" form="getQuoteFromPM" role="button">
                <i class="fa fa-envelope"></i>
            </button>
        </form>
        <form id="showMember" method="POST" action="/contact/contact-pool-manager">
            @csrf
            <input id="inputMember" type="hidden" name="user_request" 
            value="{{ Crypt::encrypt($nativePoolManager->user_id) }}" />
            <button class="btn btn-sm btn-outline-secondary" type="submit" role="button" 
            form="showMember">
                <i class="fa fa-user-circle"></i>
            </button>
        </form>
        <form id="recruitMember" action="/networking/add-to-my-team" method="POST">
            @csrf
            <input type="hidden" name="selected_user" value="{{ Crypt::encrypt($nativePoolManager->user_id) }}" />
            <button role="button" form="recruitMember" type="submit" 
            class="btn btn-sm btn-outline-secondary">
                <i class="fa fa-user-plus"></i>
            </button>
        </form>
    </div>
    @endguest
    @else
        <a class="mb-3 mr-2" role="button" href="/zones/pools/{{ $pool->parent->code}}/{{ $pool->code }}">    
            @include('pool::ctas.ctaPools')
        </a>
        <a class="btn btn-primary btn-sm mb-3 mr-2" href="/zones/profile" role="button"> 
            @lang('interface.joinThisPool')
        </a>
@endisset