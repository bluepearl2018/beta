@extends('pool::layouts.master')

@section('pageTitle')
    {{ $domain->name }}
@endsection

@section('pageDescription')
    {{ $domain->keywords }}
@endsection

@section('content')
<div class="p-3">
@include('flash::message')	
<h1><span class=" fa fa-users"></span>
    <strong>
        {{ $domain->name }}
    </strong>
</h1>
<p class="lead">
    {{ $domain->lead }}
</p>
 
@if(isset($childrenpools))
    @php($i = 0)
    @forelse($childrenpools as $pool)
        <?php $subpools[$i] = \Modules\Pool\Entities\Pool::where('parent_id', $pool->id)->get(); ?>
            <div class="card mb-3">
                <h4 class="card-header" style="background-color:teal">
                    <i class="fa fa-users"></i>
                    <a href="/pools/{!! $pool->parentPool->slug !!}/{{ $pool->slug }}" 
                        class="text-light nav-item">
                        {{ $pool->name }}
                    </a>
                </h4>
                <div class="d-flex flex-md-row flex-column">
                    <div class="card-body col-md-6">
                        <img  class="card-image img-fluid" src="https://via.placeholder.com/650x150" />
                        <div class="bg-dark"> 
                            @include('pool::nav.navFromStatistics')    
                        </div>
                        @if(strlen($pool->description) < 160)
                            <p>
                                {{ $pool->description }}
                            </p>
                            @else
                            <p>
                                {!! substr($pool->description, 0, 160) !!}...
                                <!-- Button trigger modal -->
                                <a href="#" class="" 
                                data-toggle="modal" data-target="#longDescription[$i]">
                                    @lang('interface.readEverything')
                                </a>
                            </p>
                            <!-- Modal -->
                            <div class="modal fade" id="longDescription[$i]" tabindex="-1" role="dialog" 
                            aria-labelledby="longDescriptionTitle[$]" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="longDescriptionTitle[$]">{{ __('À propos du pool ')}} <strong>{{ $pool->name }}</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        {{ $pool->description }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        @lang('interface.close')
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body col-md-6">
                        <div class="card">
                            @include('pool::nav.navInteractionButtons')
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center p-0">
                    <a href="/pools/{!! $pool->parentPool->slug !!}/{{ $pool->slug }}" 
                        class="nav-link">
                        @lang('interface.discoverPool')
                    </a>
                </div>
            </div>
        @empty
            @lang('interface.noItemsToDisplay')
    @endforelse
@endif
</div>
@endsection