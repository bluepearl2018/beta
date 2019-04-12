<div class="card mb-3">
        <h4 class="card-header bg-secondary">
            <span class="fa fa-user"></span>
            <strong>@lang('users.accountPermissions')</strong>
        </h4>
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    @php($permissions = \App\Models\Permission::all())
                    @php($displayPermissions = [])
                    @foreach(Auth::User()->getPermissionNames() as $permissionNames)
                        @php($displayPermissions[] = $permissionNames)
                    @endforeach
                    <h6 class="border-bottom">@lang('account.youHaveFollowingPermissions')</h6>
                    @forelse($permissions->whereIn('name', $displayPermissions) as $names)
                        {{$names->name}} -
                        @empty
                        <p>@lang('interface.noItemsToDisplay')</p>
                    @endforelse
                    @php(Auth::User()->givePermissionTo('access-language-pairs'))
                    @php(Auth::User()->givePermissionTo('access-tools'))
                    @php(Auth::User()->givePermissionTo('access-social-medias'))
                    @php(Auth::User()->givePermissionTo('access-organizations'))
                    @php(Auth::User()->givePermissionTo('access-services'))
                    @php(Auth::User()->givePermissionTo('access-pools'))
                    @php(Auth::User()->givePermissionTo('access-subscriptions'))
                </div>
            </div>
        </div>
    </div>