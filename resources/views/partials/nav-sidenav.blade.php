<a href="/doc" class="text-center text-light" style="font-size:120%" title="@lang('doc.documentationTitle')">
    <span class="fas fa-question-circle align-middle"></span>
<a href="/account" class="text-light" title="@lang('auth.authTitle')">
    <span class="fas fa-key align-middle"></span>
</a>
<a href="/profile" class="text-center text-light" style="font-size:120%" title="@lang('profile.myProfileTitle')">
    <span class="fa fa-user-circle align-middle"></span>
</a>
<a href="/networking" class="text-center text-light" style="font-size:120%" title="@lang('projects.networkingTitle')">
    <span class="fa fa-user-plus align-middle"></span>
</a>
<a href="/projects" class="text-center text-light" style="font-size:120%" title="@lang('projects.projectsTitle')">
    <span class="fa fa-business-time align-middle"></span>
</a>
<a href="/alerts" class="text-center text-light" style="font-size:120%" title="@lang('profile.alertsTitle')">
    <span class="fa fa-bell align-middle"></span>
</a>
<a href="/workspace" class="text-center text-light" style="font-size:120%" title="@lang('profile.workspaceTitle')">
    <span class="fa fa-toolbox align-middle"></span>
</a>
@guest
    @if (Route::has('login'))
            <a href="{{ route('login') }}" class="text-center text-light" style="font-size:120%" title="@lang('interface.login')">
                <span class="fa fa-sign-in-alt align-middle"></span>
            </a>
    @endif
@endguest
@auth
        <a href="{{ route('logout') }}" onclick="document.getElementById('logoutForm').submit()"style="font-size:120%" class="text-center text-light" title="@lang('interface.logout')">
            <span class="fa fa-sign-out-alt align-middle"></span>
        </a>
@endauth
<a style="border-radius:0" style="font-size:120%" class="text-center text-light {{ Request::is('account*')? 'bg-secondary' : '' }}" id="v-pills-home-tab" href="/account" role="tab" aria-selected="{{ Request::is('account*')? 'true' : '' }}">
    <i class="fa fa-3x fa-key" style="font-size:200%"></i>
</a>
<a style="border-radius:0" class="nav-link text-center {{ Request::is('profile*')? 'bg-secondary' : '' }}" id="v-pills-profile-tab" href="/profile" role="tab" aria-selected="{{ Request::is('profile*')? 'true' : '' }}">
    <i class="fa fa-3x fa-user-circle" style="font-size:200%"></i>
</a>
<a style="border-radius:0" class="nav-link text-center {{ Request::is('alerts')? '' : 'bg-light' }}" id="v-pills-alerts-tab" href="/alerts" role="tab" aria-selected="{{ Request::is('alerts')? 'true' : '' }}">
    <i class="fa fa-3x fa-bell" style="font-size:200%"></i>
</a>
<a href="/welcome" class="text-muted">
    <i class="fa fa-home fa-2x d-inline-block"></i>
</a>
<a href="/pools" class="nav-link text-center text-muted">
    <i class="fa fa-users fa-2x d-inline-block"></i>
</a>
<a href="/workspace/jobs" class="nav-link text-center text-muted">
    <i class="fa fa-bolt fa-2x d-inline-block"></i>
</a>
<a href="/workspace/networking" class="nav-link text-center text-muted">
    <i class="fa fa-globe fa-2x d-inline-block"></i>
</a>
<a href="/workspace/project" class="nav-link text-center text-muted">
    <i class="fa fa-business-time fa-2x d-inline-block"></i>
</a>
<a href="/news" class="nav-link text-center text-muted">
    <i class="fa fa-rss fa-2x d-inline-block"></i>
</a>
<a href="/contacts" class="nav-link text-center text-muted" style="background-color:#e7e7e5c7 !important">
    <i class="fa fa-envelope fa-2x d-inline-block"></i>
</a>