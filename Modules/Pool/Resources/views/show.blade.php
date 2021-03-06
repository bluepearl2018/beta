@extends('pool::layouts.master')
@section('aside')
    {{--- Pool finder --}}
    <div class="d-none d-lg-block">
        <div class="card p-3 my-3" style="background-color: teal">
            <h2 class="text-light">Trouver mon équipe d'experts</h2>
            @include('pool::partials.poolSelectorWithButton')
        </div>
    </div>
@endsection
@section('content')
    @isset($poolData)
        <div class="d-flex flex-md-row flex-column row-fluid">
            <div class="col-12 col-lg-8 order-1 bg-light py-3">
                <h1><span class=" fa fa-users"></span>
                    <strong>
                        {{ $poolData->name }}
                    </strong>
                </h1>
                <div class="row-fluid">
                    
                <ul class="nav nav-pills nav-fill p-2" role="tablist">
                        <li class="nav-item m-1 rounded border" style="background-color: silver">
                            <a class="nav-link bg-secondary rounded active" id="project-managers-pill" data-toggle="pill" href="#project-managers" 
                            role="tab" aria-controls="project-managers" aria-selected="true">
                                <i class="fa fa-user-tie"></i>
                                <div class="d-none d-md-inline-block">
                                    @lang('pool.projectManagers')
                                </div>
                            </a>
                        </li>
                        <li class="nav-item m-1 rounded border" style="background-color: silver">
                            <a class="nav-link bg-secondary" id="academics-pill" data-toggle="pill" href="#academics" 
                            role="tab" aria-controls="academics" aria-selected="false">
                                <i class="fa fa-user-graduate"></i>
                                <div class="d-none d-md-inline-block">
                                    @lang('pool.academics')
                                </div>
                            </a>
                        </li>
                        <li class="nav-item m-1 rounded border" style="background-color: silver">
                            <a class="nav-link bg-secondary" id="translators-pill" data-toggle="pill" href="#translators" 
                            role="tab" aria-controls="translators" aria-selected="false">
                                <i class="fa fa-language"></i>
                                <div class="d-none d-md-inline-block">
                                    @lang('pool.translators')
                                </div>
                            </a>
                        </li>
                        <li class="nav-item m-1 rounded border" style="background-color: silver">
                            <a class="nav-link bg-secondary" id="developers-pill" data-toggle="pill" href="#developers" 
                            role="tab" aria-controls="developers" aria-selected="false">
                                <i class="fa fa-user-cog"></i>
                                <div class="d-none d-md-inline-block">
                                    @lang('pool.developers')
                                </div>
                            </a>
                        </li>
                        <li class="nav-item m-1 rounded border" style="background-color: silver">
                            <a class="nav-link bg-secondary" id="dtpers-pill" data-toggle="pill" href="#dtpers" 
                            role="tab" aria-controls="dtpers" aria-selected="false">
                                <i class="fa fa-user-tag"></i>
                                <div class="d-none d-md-inline-block">
                                    @lang('pool.dtpers')
                                </div>
                            </a>
                        </li>
                        <li class="nav-item m-1 rounded border">
                            <a class="nav-link bg-secondary" id="resources-pill" data-toggle="pill" href="#resources" 
                            role="tab" aria-controls="resources" aria-selected="false">
                                <i class="fa fa-briefcase-medical"></i>
                                <div class="d-none d-md-inline-block">
                                    @lang('pool.resources')
                                </div>
                            </a>
                        </li>
                    </ul>
                    @if(strlen($poolData->description) < 160)
                        <p class="lead">
                            {{ $poolData->description }}
                        </p>
                        @else
                        <p class="lead">
                            {!! substr($poolData->description, 0, 160) !!}...
                            <!-- Button trigger modal -->
                            <a href="#" class="" 
                            data-toggle="modal" data-target="#longDescription">
                            @lang('pool.readMore')
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
                                            {{ $poolData->name }}
                                    </strong>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    {{ $poolData->description }}
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
                <div class="tab-content" id="usersTabContent">
                    <!-- Managers -->
                    <div class="tab-pane fade in show active" id="project-managers" role="tabpanel" 
                    aria-labelledby="project-managers-tab">
                            <!-- If has members show members -->
                            @include('pool::managers.poolManagers')
                    </div>
                    <!-- translators -->
                    <div class="tab-pane fade" id="translators" role="tabpanel" 
                    aria-labelledby="translators-tab">
                            @include('pool::linguists.pools_pool_translators')
                    </div>

                    <!-- academics -->
                    <div class="tab-pane fade" id="academics" role="tabpanel" 
                    aria-labelledby="academics-tab">
                        @include('pool::academics.pools_pool_academics')
                    </div>

                    <!-- developers -->
                    <div class="tab-pane fade" id="developers" role="tabpanel" 
                    aria-labelledby="developers-tab">
                        @include('pool::developers.pools_pool_developers')
                    </div>

                    <!-- dtpers -->
                    <div class="tab-pane fade" id="dtpers" role="tabpanel" 
                    aria-labelledby="dtpers-tab">
                        @include('pool::dtpers.pools_pool_dtpers')
                    </div>
                </div>
            </div>
            <div class="d-none col-lg-4 col-12 order-3 py-3 d-none d-md-block" style="background-color: teal">
                @include('pool::ctas.ctaPools')
            </div>
        </div>
    @endisset
@endsection
