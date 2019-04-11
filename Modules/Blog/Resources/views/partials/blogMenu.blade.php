@isset($blogMenu)
    @if ($blogMenu->count())
      <div id="accordion" class="container-fluid card-columns">
            @foreach ($blogMenu as $k => $menu_item)
                <div class="card mb-0 py-0 border-top"> 
                    <a class="h2 mb-0 py-3 px-3 text-light d-block bg-primary {{ (Request::is('blog/'.$menu_item->slug.'*'))? 'font-weight-bold':'' }}" id="heading{{$menu_item->slug }}"  
                    data-toggle="collapse" data-target="#collapse{{$menu_item->slug }}" 
                    aria-expanded="{{ (Request::is('blog/'.$menu_item->slug))? 'true':'false' }}" 
                    aria-controls="collapse{{$menu_item->slug }}">
                        <span>
                            {{ $menu_item->title }}
                        </span>
                    </a>
                    <div id="collapse{{$menu_item->slug }}" class="py-3 border-top {{ (Request::is('blog/'.$menu_item->slug.'*'))? 'show':'collapsed' }}"
                         aria-labelledby="heading{{$menu_item->slug }}" 
                         data-parent="#accordion">
                        @if($menu_item->children)
                            @foreach($menu_item->children as $child)
                                <a class="nav-link m-0 py-0" href="/blog/{{ $child->parent->slug }}/{{ $child->slug }}"
                                class="{{ (Request::is('blog/'.$menu_item->slug.'*'))? 'active text-light':'' }} nav-item text-muted p-0 font-weight-bold {{ (Request::is('blog/'.$menu_item->slug.'*'))? 'border-left pl-3 text-light':''}}" href="/blog/artlit/archi">
                                <span class="align-top" style="color: rgb(10, 131, 152);">
                                <span>[&nbsp;</span>
                                <span style="color: rgb(43, 27, 27) !important;">
                                    {{ $child->title }}
                                </span>
                                <span class="align-top" style="color: rgb(10, 131, 152);">::</span>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="d-sm-inline-block clearfix"></div>
            @endforeach
     </div> 
    @endif
@endisset
