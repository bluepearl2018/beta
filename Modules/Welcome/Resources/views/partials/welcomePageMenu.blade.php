@isset($pageMenu)
    @if ($pageMenu->count())
    <ul id="page-accordion" class="navbar-expand-md py-2 list-group side-left-menu" 
    style="border:none!important">
        @foreach ($pageMenu as $k => $menu_item)
            @if($menu_item->slug <> 'welcome')
            <li class="py-1 border-0"
            style="border:none; border-bottom:solid 1px #555 !important;list-style:none!important"> 
                <h5 class="pl-3 mb-0" id="heading{{ ucFirst($menu_item->slug) }}">
                    <a class="nav-item 
                    {{ ($menu_item->slug == Request::url())?' active':'' }}" 
                    href="/page/{{ $menu_item->slug }} "
                    style="width:95%;">
                    <strong style="color:#312a2a!important;">{{ $menu_item->title }} </strong>
                    </a>
                    <span class="ml-auto mr-3 float-right text-right" 
                    style="width:5%"
                        role="button"
                        data-toggle="collapse" 
                        data-target="#collapse{{ ucFirst($menu_item->slug) }}" 
                        aria-expanded="{{ ($k==0)?' true':' false' }}" 
                        aria-controls="collapse{{ ucFirst($menu_item->slug) }}">
                        <span class="fa fa-angle-right"></span>
                    </span>
                </h5>
            </li>
            @endif
        @endforeach
    </ul>
    <!-- End page-accordion -->
    @endif
@endisset
