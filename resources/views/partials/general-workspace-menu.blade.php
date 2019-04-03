{{-- TODO insérer des tites localisés via fichiers @lang dans les attributs title des a --}}
<div id="toolbar_mainpools" class="clearfix m-0 px-2">
    <ul class="list-inline text-right m-0 mb-0 pb-1 pt-0 px-2">
        <li class="list-inline-item float-left">
            <a href="/doc" 
            class="text-muted" title="@lang('doc.documentationTitle')">
                <span class="fas fa-question-circle align-middle"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="/workspace/my-user-account" class="text-muted" title="@lang('auth.authTitle')">
                <span class="fas fa-key align-middle"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="/workspace/profile" class="text-muted" title="@lang('profile.myProfileTitle')">
                <span class="fa fa-user-circle align-middle"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="/workspace/networking" class="text-muted" title="@lang('projects.networkingTitle')">
                <span class="fa fa-user-plus align-middle"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="/workspace/projects" class="text-muted" title="@lang('projects.projectsTitle')">
                <span class="fa fa-business-time align-middle"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="/workspace/alerts" class="text-muted" title="@lang('profile.alertsTitle')">
                <span class="fa fa-bell align-middle"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="/workspace" class="text-muted" title="@lang('profile.workspaceTitle')">
                <span class="fa fa-toolbox align-middle"></span>
            </a>
        </li>
    </ul>
</div>