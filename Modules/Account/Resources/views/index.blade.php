@extends('account::layouts.master')
    @section('content')
        @auth
        <?php $userCheck = Crypt::encrypt(Auth::user()->firstname);?>
        @endauth
        <div class="container py-3">
            @include('flash::message')
            <h1>
                <i class="fa fa-key d-inline-block"></i>
                <strong>@lang('interface.myAccount')</strong>
            </h1>
            {{-- MY ACCOUNT --}}

            <div class="row-fluid mb-3">
                <div id="my-account">
                    <div class="row border border-right">
                        <div class="col-md-3 text-center">
                            <table style="height: 100%; min-height:160px;" class="text-center mx-auto">
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <i class="fa fa-key fa-5x d-inline-block"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-9 border-right" style="background-color:#ededed">
                            <h4 class="d-inline-block py-2 mb-0 ">
                                @lang('users.myAccount')
                            </h4>
                            <p>
                                @lang('users.myAccountLead')
                            </p>
                            @auth
                                <ul class="list-inline">
                                    {{-- Pour désactiver la visibilité compte d'utilisateur, il faut 
                                    qu'il soit actif et visible --}}
                                    @if(Auth::user()->visibility_id == 1 && Auth::user()->status_id == 1)
                                        <form id="statusOffFrm2" action="/account/visibility-off" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_request" value="{{ $userCheck }}" />
                                            <button form="statusOffFrm2" type="submit" role="button" class="btn btn-sm btn-primary mr-2 mb-2">@lang('users.myAccountSetInvisible')</button>
                                        </form>
                                    {{-- Pour activer le compte d'utilisateur, il faut d'abord qu'il soit désactivé et
                                        invisible --}}
                                    @elseif(Auth::user()->status_id == 1)
                                        @if(Auth::user()->visibility_id == 0 && Auth::user()->status_id == 0)
                                            <li  class="list-inline-item">
                                                    <form id="statusOnFrm" action="/account/status-on" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_request" value="{{ $userCheck }}" />
                                                    <button form="statusOnFrm" type="submit" role="button" class="btn btn-sm btn-primary mr-2 mb-2">@lang('users.myAccountSetActive')</button>
                                                </form>
                                            </li>
                                        {{-- Pour désactiver le compte d'utilisateur, il faut qu'il soit actif et
                                        invisible --}}
                                        @elseif(Auth::user()->visibility_id == 0 && Auth::user()->status_id == 1)
                                            <li  class="list-inline-item">
                                                <form id="statusOffFrm" action="/account/status-off" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_request" value="{{ $userCheck }}" />
                                                <button form="statusOffFrm" type="submit" role="button" class="btn btn-sm btn-primary mr-2 mb-2">@lang('users.myAccountSetInactive')</button>
                                            </form>
                                        </li>
                                        @endif
                                    @endif
                                    
                                    @if(Auth::user()->visibility_id == 0 && Auth::user()->status_id == 1)
                                        {{-- Pour désactiver la visibilité du compte d'utilisateur, il faut qu'il soit visible et actif --}}
                                        @if(Auth::user()->visibility_id == 1 && Auth::user()->status_id == 1 && is_null(Auth::user()->deleted_at))
                                            <li  class="list-inline-item">
                                                <form id="visibilityOffFrm" action="/account/visibility-off" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_request" value="{{ $userCheck }}" />
                                                    <button form="visibilityOffFrm" type="submit" role="button" class="btn btn-sm btn-primary mr-2 mb-2">@lang('users.myAccountSetInvisible')</button>
                                                </form>
                                            </li>
                                        {{-- Pour activer la visibilité du compte d'utilisateur, il faut d'abord qu'il soit 
                                        invisible et actif --}}
                                        @elseif(Auth::user()->visibility_id == 0 && Auth::user()->status_id == 1 && is_null(Auth::user()->deleted_at))
                                            <li  class="list-inline-item">
                                                <form id="visibilityOnFrm"  action="/account/visibility-on" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_request" value="{{ $userCheck }}" />
                                                    <button form="visibilityOnFrm" type="submit" role="button" class="btn btn-sm btn-primary mr-2 mb-2">@lang('users.myAccountSetVisible')</button>
                                                </form>
                                            </li>
                                        @endif
                                    @endif
                                    {{-- Pour supprimer le compte d'utilisateur, il faut d'abord désactiver le compte et
                                    sa visibilité --}}
                                    @if(Auth::user()->visibility_id == 0 && Auth::user()->status_id == 0 && is_null(Auth::user()->deleted_at))
                                    <li  class="list-inline-item">
                                            <form id="statusOnFrm2" action="/account/status-on" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_request" value="{{ $userCheck }}" />
                                            <button form="statusOnFrm2" type="submit" role="button" class="btn btn-sm btn-primary mr-2 mb-2">@lang('users.myAccountSetActive')</button>
                                        </form>
                                    </li>
                                    <li  class="list-inline-item">
                                            <button type="button" class="btn btn-outline-secondary mr-2 mb-2" data-toggle="modal" 
                                            data-target="#deleteMyAccount">
                                                @lang('users.deleteMyAccount')
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteMyAccount" tabindex="-1" role="dialog" aria-labelledby="deleteMyAccount" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteMyAccountLabel">
                                                        @lang('users.deleteMyAccountTitle')
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="alert-warning">
                                                            @lang('users.deleteMyAccountWarning')
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary mr-2 mb-2" data-dismiss="modal">@lang('interface.cancel')</button>
                                                        <form id="deleteFrm" action="/account/delete" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="user_request" value="{{ $userCheck }}" />
                                                            <button form="deleteFrm" type="submit" role="button" class="btn btn-sm btn-primary mr-2 mb-2">
                                                                    @lang('users.deleteMyAccount')
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </li>    
                                    @endif
                                </ul>
                                @endauth
                        </div>
                    </div>
                </div>
            </div>
            @component('account::show', ['userProfile' => $userProfile])@endcomponent
    @stop
