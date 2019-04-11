
<h2 class="card-header bg-secondary">
        @lang('pool.contactAcademicsDirectly')
    </h2>
    @php($ac=0)
    <div class="card-columns">
            <div class="card mb-3">
                <h5 class="card-header text-light p-1" style="background-color: teal">
                    <span class="fa fa-bolt mr-2 d-block"></span>
                    @lang('pool.joinThisPool')
                </h5>
                <p class="px-2">
                    <small>
                        @lang('pool.joinThisPoolAsAAcademicForFree')
                    </small>
                </p>
            </div>
    @forelse($academicsForCurrentPool as $academic)
        @if($academic->visibility_id == 1 && $academic->status_id == 1)
            <form id="showAcademic{{$ac}}" method="POST" action="{{ route('show-public-profile') }}">
                @csrf
                <input id="userPool{{$ac}}" type="hidden" name="user_pool" value="{{ Crypt::encrypt($poolData->slug) }}" />
                <input id="input{{$ac}}" type="hidden" name="user_request" value="{{ Crypt::encrypt($academic->academic_id) }}" />
            </form>
            <form id="contactAcademic{{$ac}}" method="POST" action="{{ url('/contact/contact-user') }}">
                <input id="userPool{{$ac}}" type="hidden" name="user_pool" value="{{ Crypt::encrypt($poolData->slug) }}" />
                <input id="input{{$ac}}" type="hidden" name="user_request" value="{{ Crypt::encrypt($academic->academic_id) }}" />
                <input id="subject{{$ac}}" type="hidden" name="contact_from_pool" value="@lang('contact.contactFromPool')" />
            </form>
            <div class="card mb-3">
                <h5 class="card-header bg-primary text-light p-1">
                        <span class="fa fa-language mr-2 d-block"></span>
                        {{ $academic->user->firstname }}
                        {{ $academic->user->surname }}
                </h5>
                <div class="d-block">
                    @if($academic->user->hasRole('premium'))
                        <span class="badge badge-success">Premium</span>
                    @elseif($academic->user->hasRole('premium-exclusive'))
                        <span class="badge badge-success">Premium Exclusive</span>
                    @elseif(!$academic->user->hasRole('premium-exclusive') && !$academic->user->hasRole('premium'))
                        <span class="badge badge-warning">Free</span>
                    @endif
                </div>
                @isset($academic->user->avatar)
                    <div class="card-image">
                            <img src="{{ $academic->user->avatar }}" class="img-fluid" />
                    </div>
                @endisset
                @isset($academic->userProfile->description)
                    <div class="card-body">
                            <p>{!! $academic->userProfile->description !!}</p>
                    </div>
                @endisset
                <div class="card-footer d-flex bg-secondary p-1">
                    <button form="showAcademic{{$ac}}" role="button" class="btn btn-sm" type="submit">
                        <i class="fa fa-eye"></i>
                    </button>
                    <button form="contactAcademic{{$ac}}" role="button" class="btn btn-sm" type="submit">
                        <i class="fa fa-envelope"></i>
                    </button>
                    <button form="recruitAcademic{{$ac}}" role="button" class="btn btn-sm" type="submit">
                        <i class="fa fa-user-plus"></i>
                    </button>
                </div>
            </div>
        @endif
        @empty
            <div class="card mb-3">
                <h5 class="card-header text-light p-1" style="background-color:tomato ">
                    <span class="fa fa-bolt mr-2 d-block"></span>
                    @lang('pool.becomeAFirstJoiner')
                </h5>
                <p class="px-2">
                    <small>
                        @lang('pool.becomeAFirstJoinerExplanation')
                    </small>
                </p>
            </div>
        @php($ac++)
    @endforelse
    </div>
    <div class="card-deck">
        <div class="card">
            <h5 class="card-header">
                @lang('interface.reportABug')
            </h5>
            <div class="card-body">
                <span class="img-fluid fa fa-bug"></span>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                @lang('interface.suggestNewFunction')
            </h5>
            <div class="card-body">
                <span class="img-fluid fa fa-envelope"></span>
            </div>
        </div>
    </div>