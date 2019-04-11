@if(!Request::is('/'))
<div class="bg-teal d-flex container-fluid row m-0 p-0" style="background-color: teal">
    <nav class="pb-1 d-flex container-fluid">
        <ul class="col-auto mr-auto mb-0 list-inline">
            <li class="list-inline-item">
                <a href="/doc" 
                class="text-light" title="@lang('doc.documentationTitle')">
                    <span class="fas fa-question-circle align-middle"></span>
                </a>
            </li>
        </ul>
        <ul class="col-auto ml-auto mb-0 list-inline">
            <li class="list-inline-item">
                <a href="/account" class="text-light" title="@lang('auth.authTitle')">
                    <span class="fas fa-key align-middle"></span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="/profile" class="text-light" title="@lang('profile.myProfileTitle')">
                    <span class="fa fa-user-circle align-middle"></span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="/networking" class="text-light" title="@lang('projects.networkingTitle')">
                    <span class="fa fa-user-plus align-middle"></span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="/projects" class="text-light" title="@lang('projects.projectsTitle')">
                    <span class="fa fa-business-time align-middle"></span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="/alerts" class="text-light" title="@lang('profile.alertsTitle')">
                    <span class="fa fa-bell align-middle"></span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="/workspace" class="text-light" title="@lang('profile.workspaceTitle')">
                    <span class="fa fa-toolbox align-middle"></span>
                </a>
            </li>
            @guest
                @if (Route::has('register'))
                    <li class="list-inline-item">
                        <a href="{{ route('login') }}" class="text-light" title="@lang('interface.login')">
                            <span class="fa fa-sign-in-alt align-middle"></span>
                        </a>
                    </li>
                @endif
            @endguest
            @auth
                <li class="list-inline-item">
                    <a href="{{ route('logout') }}" onclick="document.getElementById('logoutForm').submit()" class="text-light" title="@lang('interface.logout')">
                        <span class="fa fa-sign-out-alt align-middle"></span>
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
</div>
@endif