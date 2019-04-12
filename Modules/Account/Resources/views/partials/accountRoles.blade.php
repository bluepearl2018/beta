<div class="card mb-3">
    <h4 class="card-header bg-secondary">
        <span class="fa fa-user"></span>
        <strong>@lang('users.accountRoles')</strong>
    </h4>
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                @php($roles = \App\Models\Role::all())
                @php($displayRoles = [])
                @foreach(Auth::User()->getRoleNames() as $roleNames)
                    @php($displayRoles[] = $roleNames)
                @endforeach
                <h6 class="border-bottom">@lang('account.youHaveFollowingRoles')</h6>
                @forelse($roles->whereIn('name', $displayRoles) as $names)
                    <h6 class="">
                        {{$names->title}}
                    </h6>
                    <p>{{$names->description}}</p>
                    @includeIf('account::ctas.'.$names->name.'Account')
                    @empty
                    <p>@lang('interface.noItemsToDisplay')</p>
                @endforelse
            </div>
        </div>
    </div>
</div>