@extends('doc::layouts.master')
@section('content')
    <form id="createDocFrm" class="container" action="{{ route('store') }}" method="POST">
        @csrf
        <div class="row mb-2">
            <input class="form-control" type="text" placeholder="@lang('doc.docKeywords')" name="keywords" />
        </div>
        <div class="row mb-2">
            <input class="form-control" type="text" placeholder="@lang('doc.docTitle')" name="title" />
        </div>
        <div class="row mb-2">
            <input class="form-control" type="text" placeholder="@lang('doc.docLead')" name="lead" />
        </div>
        <div class="row mb-2">
            <textarea rows="12" class="form-control" type="text" placeholder="@lang('doc.docContent')" name="content">

            </textarea>
        </div>
        <div class="row mb-2">
            <select class="form-control" name="parent_id">
                @foreach(DocRepository::getDocCategories() as $k => $value)        
                    <option value="{{$value->id}}" required>
                        {{$value->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" form="createDocFrm" type="submit" role="button"> 
    </form>
@stop