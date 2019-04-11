@extends('pool::layouts.master')
@section('aside')
    <ul class="nav nav-pills nav-fill py-3" role="tablist">
        <li class="nav-item m-1 rounded">
            <a class="nav-link rounded active" id="project-managers-pill" data-toggle="pill" href="#project-managers" 
            role="tab" aria-controls="project-managers" aria-selected="true">
                <i class="fa fa-user"></i>
                @lang('pool.projectManagers')
            </a>
        </li>
        <li class="nav-item m-1 rounded">
            <a class="nav-link" id="academics-pill" data-toggle="pill" href="#academics" 
            role="tab" aria-controls="academics" aria-selected="false">
                @lang('pool.academics')
            </a>
        </li>
        <li class="nav-item m-1 rounded">
            <a class="nav-link" id="translators-pill" data-toggle="pill" href="#translators" 
            role="tab" aria-controls="translators" aria-selected="false">
                @lang('pool.translators')
            </a>
        </li>
        <li class="nav-item m-1 rounded">
            <a class="nav-link" id="developers-pill" data-toggle="pill" href="#developers" 
            role="tab" aria-controls="developers" aria-selected="false">
                @lang('pool.developers')
            </a>
        </li>
        <li class="nav-item m-1 rounded">
            <a class="nav-link" id="dtpers-pill" data-toggle="pill" href="#dtpers" 
            role="tab" aria-controls="dtpers" aria-selected="false">
                @lang('pool.dtpers')
            </a>
        </li>
        <li class="nav-item m-1 rounded">
            <a class="nav-link" id="resources-pill" data-toggle="pill" href="#resources" 
            role="tab" aria-controls="resources" aria-selected="false">
                @lang('pool.resources')
            </a>
        </li>
    </ul>
@endsection
@section('content')
    @isset($poolData)
        <div class="d-flex flex-md-row flex-column row-fluid">
            <div class="col-md-9 col-12 order-3 order-md-2 bg-light py-3">
                <h1><span class=" fa fa-users"></span>
                    <strong>
                        {{ $poolData->name }}
                    </strong>
                </h1>
                <div class="row-fluid">
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
            <div class="col-md-3 col-12 order-1 order-md-3 py-3 d-none d-md-block" style="background-color: teal">
                @include('pool::ctas.ctaPools')
            </div>
        </div>
    @endisset
@endsection
