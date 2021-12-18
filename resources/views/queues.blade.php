@extends('layouts.app')
@section('title')
    @lang('site.dashborad')
@endsection
@section('content')
    <div class="profile-container percentage-box profile categories">

        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content">
                <div class="tab-pane fade show active vh-100" id="queues">
                    <h3>@lang('site.clients')</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>@lang('site.queue_no')</th>
                                <th>@lang('site.queue_status')</th>
                                <th>@lang('site.queue_user')</th>
                                <th>@lang('site.queue_cat')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queues as $queue)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $queue->status }}</td>
                                    <td>{{ $queue->user->name }}</td>
                                    <td>{{ title($queue->category) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
