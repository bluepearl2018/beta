{!! $menu !!}

@isset($categories_items)
    <nav class="navbar navbar-expand-lg navbar-light p-0 px-2 border-bottom">
        <div id="general-menu" class="collapse navbar-collapse mr-auto px-2 text-dark">
            <ul class="navbar-nav text-dark w-100" style="z-index:9999; font-size:0.85rem">            
            @if ($categories_items->count())
                @foreach ($categories_items as $k => $category_item)
                    @if ($category_item->children->count())
                        <li class="nav-item dropdown {{ ($k==0)?' firstitem':'' }}">
                        <span class="nav-link dropdown-toggle text-dark" 
                            data-toggle="dropdown" role="button" aria-haspopup="true" 
                            aria-expanded="false">{{ $category_item->name }} 
                            <span class="caret"></span>
                        </span>
                        
                        <div class="dropdown-menu" 
                         aria-labelledby="navbarDropdownMenuLink">
                        
                            @foreach ($category_item->children as $i => $child)
                            <a href="/pages/{{ $child->parent->slug }}/{{ $child->slug }}" class="dropdown-item {{ ($child->url() == Request::url())?'active':'' }}">
                                {{ $child->name }}
                            </a>
                            @endforeach
                        </div>
                        </li>
                    @else
                        <li class="mr-auto nav-item {{ ($k==0)?' firstitem':'' }} {{ ($category_item->url() == Request::url())?' active':'' }}">
                            <a class="nav-link" href="{{ $category_item->url() }}">{{ $category_item->name }}</a>
                        </li>
                    @endif
                @endforeach
                    <li class="nav-item ml-auto">
                        <a href="/pages/about/job-offers/win-win-deal-for-go-live" class="nav-link text-dark">
                            <span class="rounded p-1 text-light text-dark font-weight-normal border"><small>
                            <i class="fa fa-exclamation-circle mr-1 text-dark"></i>
                            </small>
                            Offre de lancement
                        </span>
                        </a>
                    </li>
            @endif
            </ul>
        </div>
    </nav>
@endisset