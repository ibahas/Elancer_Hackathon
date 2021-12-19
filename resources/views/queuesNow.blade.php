@extends('layouts.app')
@section('title')
    @lang('site.dashborad')
@endsection

@section('content')
    <div class="profile-container percentage-box profile categories">
        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content text-center" style="margin-top: 12rem; position: absolute; margin: auto; top: 0; left:0; right:0; bottom:0; color:#fff; height:100px;">
                <h1 class="text-info" style="font-size: 16rem">{{$queue->no}}</h1>
                <form action="{{ route('changeStatus', $queue->id) }}" id="status_{{ $queue->id }}" method="POST" class="text-cemter d-inline p-2 ">
                    @csrf
                    <input type="hidden" name="status" value="open">
                    <button type="submit" class="btn btn-primary">@lang('site.open')</button>

                </form>
                <form action="{{ route('changeStatus', $queue->id) }}" id="status_{{ $queue->id }}" method="POST" class="text-cemter d-inline p-2 ">
                    @csrf
                    <input type="hidden" name="status" value="complet">
                    <button type="submit" class="btn btn-success">@lang('site.complet')</button>

                </form>
                <form action="{{ route('changeStatus', $queue->id) }}" id="status_{{ $queue->id }}" method="POST" class="text-cemter d-inline p-2 ">
                    @csrf
                    <input type="hidden"name="status"  value="uncompleted">
                    <button type="submit" class="btn btn-warning">@lang('site.uncompleted')</button>

                </form>
            </div>
        </div>
    </div>


@endsection
