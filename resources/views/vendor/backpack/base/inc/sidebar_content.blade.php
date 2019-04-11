<!-- TEST -->
<li class="treeview">
    
        
    
</li>
<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="treeview">
    <a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('statistics') }}'><i class='fa fa-pie-chart'></i> <span>Statistics</span></a>
        </li>
    </ul>
</li>

<!-- Submenu for users -->
<li class="treeview">
    <a href="#"><i class="fa fa-table"></i> <span>Application Tables</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('gender') }}'><i class='fa fa-list'></i> <span>Genders</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('status') }}'><i class='fa fa-list'></i> <span>Statuses</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('country') }}'><i class='fa fa-list'></i> <span>Countries</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('sourcelanguage') }}'><i class='fa fa-list'></i> <span>Source Languages</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('targetlanguage') }}'><i class='fa fa-list'></i> <span>Target Languages</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('service_category') }}'><i class='fa fa-list'></i> <span>Service categories</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('service') }}'><i class='fa fa-list'></i> <span>Services</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('socialmedia') }}'><i class='fa fa-list'></i> <span>Social medias</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('eutranetemail') }}'><i class='fa fa-list'></i> <span>Inhouse Emails</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('tool_category') }}'><i class='fa fa-list'></i> <span>Tool Categories</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('programmation_language') }}'><i class='fa fa-code'></i> <span>Programmation languages</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('tool') }}'><i class='fa fa-list'></i> <span>Tools</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('organization_category') }}'><i class='fa fa-list'></i> <span>Organization Categories</span></a>
        </li>
    </ul>
</li>

<!-- Submenu for users -->
<li class="treeview">
    <a href="#"><i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('user') }}'><i class='fa fa-users'></i> <span>Users</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('role') }}'><i class='fa fa-list'></i> <span>Roles</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('permission') }}'><i class='fa fa-key'></i> <span>Permissions</span></a>
        </li>
    </ul>
</li>

<!-- Submenu for dpcuments -->
<li class="treeview">
    <a href="#"><i class="fa fa-download"></i> <span>Downloadables</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        
        <li>
            <a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a>
        </li>

        <li>
            <a href='{{ backpack_url('doc') }}'><i class='fa fa-download'></i> <span>Downloadable documents</span></a>
        </li>

        <li>
            <a href='{{ backpack_url('doc_type') }}'><i class='fa fa-list'></i> <span>Downloadable categories</span></a>
        </li>
    </ul>
</li>
<!-- Submenu for Pages -->
<li class="treeview">
    <a href="#"><i class="fa fa-file-o"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">    
        <li><a href="{{ backpack_url('menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
    
        <li><a href="{{ url(config('backpack.base.route_prefix').'/pages') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
    </ul>
</li>
<!-- Submenu for Articles -->
<li class="treeview">
    <a href="#"><i class="fa fa-file-o"></i> <span>Articles</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">

    
        <li><a href="{{ backpack_url('article') }}"><i class="fa fa-newspaper-o"></i> <span>Articles</span></a></li>
    

    
        <li><a href="{{ backpack_url('category') }}"><i class="fa fa-list"></i> <span>Categories</span></a></li>
    

    
        <li><a href="{{ backpack_url('tag') }}"><i class="fa fa-tag"></i> <span>Tags</span></a></li>
        
    </ul>
</li>

<!-- Submenu for pools -->
<li class="treeview">
    <a href="#"><i class="fa fa-users"></i> <span>Pools</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('pool') }}'><i class='fa fa-users'></i> <span>Pools</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('pool_manager') }}'><i class='fa fa-users'></i> <span>Pool Managers</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('pool_emails') }}'><i class='fa fa-users'></i> <span>Pool Emails</span></a>
        </li>
    </ul>
</li>

<!-- Submenu for users -->
<li class="treeview">
    <a href="#"><i class="fa fa-language"></i> <span>Linguists</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
       
        <li>
            <a href='{{ backpack_url('vendor_user') }}'><i class='fa fa-language'></i> <span>Linguists</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('vendor_pool') }}'><i class='fa fa-users'></i> <span>Pools</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('vendor_tool') }}'><i class='fa fa-wrench'></i> <span>Tools</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('vendor_socialmedia') }}'><i class='fa fa-linkedin'></i> <span>Social medias</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('vendor_language_pairs') }}'><i class='fa fa-list'></i> <span>Language Pairs</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('vendor_subscription') }}'><i class='fa fa-thumb-tack'></i> <span>Subscriptions</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('vendor_team') }}'><i class='fa fa-user-plus'></i> <span>Team</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('vendor_organization') }}'><i class='fa fa-bank'></i> <span>Organizations</span></a>
        </li>
    </ul>
</li>

<!-- Submenu for companies -->
<li class="treeview">
    <a href="#"><i class="fa fa-industry"></i> <span>Companies</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('buyer_user') }}'><i class='fa fa-industry'></i> <span>Companies</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('buyer_socialmedia') }}'><i class='fa fa-linkedin'></i> <span>Social Medias</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('buyer_organization') }}'><i class='fa fa-bank'></i> <span>Organizations</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('buyer_language') }}'><i class='fa fa-language'></i> <span>Language</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('buyer_team') }}'><i class='fa fa-user-plus'></i> <span>Team</span></a>
        </li>
    </ul>
</li>

<!-- Submenu for DTP specialists -->
<li class="treeview">
    <a href="#"><i class="fa fa-edit"></i> <span>DTP Specialists</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('user_dtpers') }}'><i class='fa fa-edit'></i> <span>DTP specialists</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('dtper_socialmedia') }}'><i class='fa fa-linkedin'></i> <span>Social Medias</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('dtper_organization') }}'><i class='fa fa-bank'></i> <span>Organizations</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('dtper_language') }}'><i class='fa fa-language'></i> <span>Language</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('dtper_team') }}'><i class='fa fa-user-plus'></i> <span>Team</span></a>
        </li>
    </ul>

<!-- Submenu for Developers  -->
<li class="treeview">
    <a href="#"><i class="fa fa-code"></i> <span>Developers</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
            <li>
                <a href='{{ backpack_url('user_developers') }}'><i class='fa fa-edit'></i> <span>Developers</span></a>
            </li>
            <li>
                <a href='{{ backpack_url('developer_socialmedia') }}'><i class='fa fa-linkedin'></i> <span>Social Medias</span></a>
            </li>
            <li>
                <a href='{{ backpack_url('developer_organization') }}'><i class='fa fa-bank'></i> <span>Organizations</span></a>
            </li>
            <li>
                <a href='{{ backpack_url('developer_language') }}'><i class='fa fa-language'></i> <span>Language</span></a>
            </li>
            <li>
                <a href='{{ backpack_url('developer_programmation_language') }}'><i class='fa fa-code'></i> <span>Coding In</span></a>
            </li>
    </ul>
</li>

<!-- Submenu for organizations -->
<li class="treeview">
    <a href="#"><i class="fa fa-bank"></i> <span>Organizations</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('organization') }}'><i class='fa fa-bank'></i> <span>Organizations</span></a>
        </li>
    </ul>
</li>

<!-- Submenu for jobs -->
<li class="treeview">
    <a href="#"><i class="fa fa-briefcase"></i> <span>Jobs</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li>
            <a href='{{ backpack_url('jobs') }}'><i class='fa fa-briefcase'></i> <span>Jobs</span></a>
        </li>
        <li>
            <a href='{{ backpack_url('user_job') }}'><i class='fa fa-briefcase'></i> <span>Jobs from users</span></a>
        </li>
    </ul>
</li>