@extends('doc::layouts.master')

@section('pageTitle')
    {{ $domain->name }}
@endsection

@section('pageDescription')
    {{ $domain->keywords }}
@endsection

@include('flash::message')	
@section('content')
<h1><span class=" fa fa-users"></span>
    <strong>
        {{ $domain->name }}
    </strong>
</h1>
<p class="lead">
    {{ $domain->lead }}
    @lang('pool.thisListPoolsInDomain')
</p>
 
@if(isset($childrenpools))
    @php($i = 0)
    @forelse($childrenpools as $pool)
        <?php $subpools[$i] = \Modules\Pool\Entities\Pool::where('parent_id', $pool->id)->get(); ?>
        <div class="row no-gutters container mb-3 px-2">
            <div class="col-md-12">
                <div class="row border border-right">
                    <div class="col-md-7 border-right" style="background-color:#ededed">
                        <h4 class="d-inline-block py-2 mb-0 ">
                            <a href="/pools/{!! $pool->parentPool->slug !!}/{{ $pool->slug }}" class="text-dark">
                                <span class="fa fa-users mr-2"></span>
                                {{ $pool->name }}
                            </a>
                        </h4>
                        @include('pool::nav.navFromStatistics')
                        
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
                        <a href="/pools/{!! $pool->parentPool->slug !!}/{{ $pool->slug }}" 
                            class="text-dark mb-3 d-inline-block">
                            @lang('interface.discoverPool')
                        </a>
                    </div>
                    <div class="col-md-5 bg-white" >
                        @include('pool::nav.navInteractionButtons')
                    </div>
                </div>
            </div>
        </div>
        @empty
            @lang('interface.noItemsToDisplay')
    @endforelse
@endif
@endsection