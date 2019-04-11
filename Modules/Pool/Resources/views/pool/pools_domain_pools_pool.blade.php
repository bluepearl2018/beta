@extends('layouts.pools')
@section('pageTitle')
    {{ $pool->name }}
@endsection

@section('pageDescription')
    {{ $pool->description }}
@endsection

@section('content')
<h1 class="border-bottom"><span class=" fa fa-users"></span>
    <strong>
        {{ $pool->name }}
    </strong>
</h1>
@if(strlen($pool->description) < 160)
    <p class="lead">
        {{ $pool->description }}
    </p>
    @else
    <p class="lead">
        {!! substr($pool->description, 0, 160) !!}...
        <!-- Button trigger modal -->
        <a href="#" class="" 
        data-toggle="modal" data-target="#longDescription">
        @lang('pools.readMore')
        </a>
    </p>
    
    <!-- Modal -->
    <div class="modal fade" id="longDescription" tabindex="-1" role="dialog" 
    aria-labelledby="longDescriptionTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="longDescriptionTitle">
                @lang('pool.aboutThisPool') 
                <strong>
                        {{ $pool->name }}
                </strong>
            </h5>
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

@isset($pool)
    <div class="alert alert-info">
        <i class="fa fa-lightbulb"></i> Abonnez-vous à la lettre d'information 
        académique et recevez gratuitement la traduction d'articles de chercheurs 
        européens traduits en de nombreuses langues&nbsp;!
    </div>
    <div class="panel with-nav-tabs">
        <div class="panel-heading rounded">
            <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
                <li class="nav-item m-1 rounded">
                    <a class="nav-link rounded active" id="project-managers-pill" data-toggle="pill" href="#project-managers" 
                    role="tab" aria-controls="project-managers" aria-selected="true">
                        @lang('pools.projectManagers')
                    </a>
                </li>
                <li class="nav-item m-1 rounded">
                    <a class="nav-link" id="academics-pill" data-toggle="pill" href="#academics" 
                    role="tab" aria-controls="academics" aria-selected="false">
                        @lang('pools.academics')
                    </a>
                </li>
                <li class="nav-item m-1 rounded">
                    <a class="nav-link" id="translators-pill" data-toggle="pill" href="#translators" 
                    role="tab" aria-controls="translators" aria-selected="false">
                        @lang('pools.translators')
                    </a>
                </li>
                <li class="nav-item m-1 rounded">
                    <a class="nav-link" id="developers-pill" data-toggle="pill" href="#developers" 
                    role="tab" aria-controls="developers" aria-selected="false">
                        @lang('pools.developers')
                    </a>
                </li>
                <li class="nav-item m-1 rounded">
                    <a class="nav-link" id="dtpers-pill" data-toggle="pill" href="#dtpers" 
                    role="tab" aria-controls="dtpers" aria-selected="false">
                        @lang('pools.dtpers')
                    </a>
                </li>
                <li class="nav-item m-1 rounded">
                    <a class="nav-link" id="resources-pill" data-toggle="pill" href="#resources" 
                    role="tab" aria-controls="resources" aria-selected="false">
                        @lang('pools.resources')
                    </a>
                </li>
            </ul>
        </div>
        <div class="panel-body border">
            <div class="tab-content" id="usersTabContent">
                <!-- Managers -->
                <div class="tab-pane fade in show active" id="project-managers" role="tabpanel" 
                aria-labelledby="project-managers-tab">
                        <div class="container py-3 border-left border-bottom border-right">
                            <!-- If has members show members -->
                            @include('pools.pools_pool_managers')
                            
                        </div>
                </div>
                <!-- translators -->
                <div class="tab-pane fade" id="translators" role="tabpanel" 
                aria-labelledby="translators-tab">
                        <div class="container py-3 border-left border-bottom border-right">
                            @component('pools.pools_pool_translators', ['pool' => $pool,
                            'translatorsForCurrentPool' => $translatorsForCurrentPool])@endcomponent
                        </div>
                </div>

                <!-- academics -->
                <div class="tab-pane fade" id="academics" role="tabpanel" 
                aria-labelledby="academics-tab">
                    <div class="container py-3 border-left border-bottom border-right">
                        @component('pools.pools_pool_academics', [
                            'pool' => $pool, 
                            'academicsForCurrentPool' => $academicsForCurrentPool])
                        @endcomponent
                    </div>
                </div>

                <!-- developers -->
                <div class="tab-pane fade" id="developers" role="tabpanel" 
                aria-labelledby="developers-tab">
                    <div class="container py-3 border-left border-bottom border-right">
                        @component('pools.pools_pool_developers', [
                            'pool' => $pool, 
                            'developersForCurrentPool' => $developersForCurrentPool])
                        @endcomponent
                    </div>
                </div>

                <!-- dtpers -->
                <div class="tab-pane fade" id="dtpers" role="tabpanel" 
                aria-labelledby="dtpers-tab">
                    <div class="container py-3 border-left border-bottom border-right">
                        @component('pools.pools_pool_dtpers', [
                            'pool' => $pool, 
                            'dtpersForCurrentPool' => $dtpersForCurrentPool,
                            ])
                        @endcomponent
                    </div>
                </div>
                
                <!-- resources -->
                <div class="tab-pane fade" id="resources" role="tabpanel" 
                aria-labelledby="resources-tab">
                        <div class="container py-3 border-left border-bottom border-right">
                            @component('pools.pools_pool_resources', ['pool' => $pool])@endcomponent
                        </div>
                </div>
                
            </div>
        </div>
    </div>
@endisset


@endsection