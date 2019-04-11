<?php 
$selectedLocale = Session::get('locale');
$sessionLanguageIds = \Modules\UiTables\Entities\Sourcelanguage::where('code', $selectedLocale)->select('id')->get();
$nativePoolManager = \Modules\Pool\Entities\PoolManager::where('pool_id', $pool->id)->
whereIn('language_id', $sessionLanguageIds)->first();
?>
@isset($nativePoolManager)
    <h6 class="d-inline-block mb-2 mt-3">
            <img height="16" alt="{{ session('locale') }}" 
            src="{!! asset('img/flags/'.session('locale').'.png') !!}" />
            <strong>
                    {{ $nativePoolManager->user->firstname }}
                    {{ $nativePoolManager->user->surname }}</strong>
    </h6>
    <a class="text-dark" href="tel:{{$nativePoolManager->user->userProfile->phone}}">
            {{$nativePoolManager->user->userProfile->phone}}
    </a>
    @auth
    <ul class="list-inline mt-2 mb-3">
        <li class="list-inline-item">    
            <form id="getQuoteFromPM" action="/zones/contacts/contact-pool-manager" method="POST">
                @csrf
                <input type="hidden" name="pool_name" 
                value="{{ Crypt::encrypt($pool->code) }}" />
                <input type="hidden" name="pool_manager" 
                value="{{ Crypt::encrypt($nativePoolManager->id) }}" />
                <button class="btn btn-sm btn-outline-secondary" type="submit" form="getQuoteFromPM" role="button">
                    <i class="fa fa-envelope"></i>
                </button>
            </form>
        </li>
        <li class="list-inline-item">
            <form id="showMember" method="POST" action="{{ route('member') }}">
                @csrf
                <input id="inputMember" type="hidden" name="user_request" 
                value="{{ Crypt::encrypt($nativePoolManager->user_id) }}" />
                <button class="btn btn-sm btn-outline-secondary" type="submit" role="button" 
                form="showMember">
                    <i class="fa fa-user-circle"></i>
                </button>
            </form>
        </li>
        <li class="list-inline-item">
            <form id="recruitMember" action="/zones/interact/users/add-to-my-team" method="POST">
                @csrf
                <input type="hidden" name="selected_user" value="{{ Crypt::encrypt($nativePoolManager->user_id) }}" />
                <button role="button" form="recruitMember" type="submit" 
                class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-user-plus"></i>
                </button>
            </form>
        </li>
    </ul>
    <a class="btn btn-sm btn-primary mb-3 mr-2" role="button" href="/zones/pools/{{ $pool->parent->code}}/{{ $pool->code }}">
            @lang('interface.moreInfo')
    </a>
    @endauth
    @guest
    <ul class="list-inline mt-2 mb-3">
        <li class="list-inline-item">
            <a href="{{route('login')}}" 
                class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-bolt"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="{{route('login')}}"
                class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-user-circle"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="{{route('login')}}" 
            class="btn btn-sm btn-outline-secondary">
                <i class="fa fa-user-plus"></i>
            </a>
        </li>
    </ul>
    <a class="btn btn-sm btn-primary mb-3 mr-2" role="button" href="/zones/pools/{{ $pool->parent->code}}/{{ $pool->code }}">
            @lang('interface.moreInfo')
    </a>
    @endguest
    @else
        <a class="mb-3 mr-2" role="button" href="/zones/pools/{{ $pool->parent->code}}/{{ $pool->code }}">    
            @include('pool::ctas.ctaPools')
        </a>
        <a class="btn btn-primary btn-sm mb-3 mr-2" href="/zones/profile" role="button"> 
            @lang('interface.joinThisPool')
        </a>
@endisset