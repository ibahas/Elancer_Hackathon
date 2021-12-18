@extends('layouts.app')
@section('title')
    @lang('site.dashborad')
@endsection
@section('content')
    <div class="profile-container percentage-box profile queues">

        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content ">

                <div class="tab-pane fade show active vh-100">
                    <h3>@lang('site.queues')</h3>
                    <a href="{{ route('queues') }}">@lang('site.all_queues')</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('site.queue_user')</th>
                                <th scope="col">@lang('site.queue_status')</th>
                                <th scope="col">@lang('site.queue_no')</th>
                                <th scope="col">@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queues as $queue)

                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $queue->user->name }}</td>
                                    <td>
                                        <form action="{{ route('changeStatus', $queue->id) }}" id="status_{{$queue->id}}" method="POST">
                                            @csrf

                                            <select name="status" id="status" onchange="document.getElementById('status_{{$queue->id}}').submit()">
                                                <option value="open">@lang('site.open')</option>
                                                <option value="complet">@lang('site.complet')</option>
                                                <option value="uncompleted">@lang('site.uncompleted')</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $queue->no }}</td>
                                    <td>{{ title($queue->category) }}</td>
                                    <td>
                                        <a href="{{ route('queue.edit', $queue) }}"
                                            class="btn btn-info bx bx-pen">@lang('site.edit')</a>
                                        <br>
                                        <form action="{{ route('queue.destroy', $queue) }}" method="POST"
                                            id="formDelete_{{ $queue->id }}">
                                            @method('DELETE')
                                            @csrf

                                        </form>
                                        <button type="button" class="btn btn-danger bx bx-trash"
                                            onclick="document.getElementById('formDelete_{{ $queue->id }}').submit()">@lang('site.delete')</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="profile-container percentage-box profile clients">

        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content">

                <div class="tab-pane fade show active vh-100">
                    <h3>@lang('site.clients')</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('site.name_user')</th>
                                <th scope="col">@lang('site.email_user')</th>
                                <th scope="col">@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)

                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>

                                        <form action="{{ route('client.destroy', $client) }}" method="POST"
                                            id="formDelet_e_{{ $client->id }}">
                                            @csrf
                                            @method('DELETE')

                                        </form>
                                        <button type="button" class="btn btn-danger bx bx-trash"
                                            onclick="document.getElementById('formDelet_e_{{ $client->id }}').submit()">@lang('site.delete')</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="profile-container percentage-box profile categories">

        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content">


                <div class="tab-pane fade show active vh-100">
                    <h3>@lang('site.categories')</h3>
                    <a href="{{ route('service.create') }}">@lang('site.new_cat')</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('site.name')</th>
                                <th scope="col">@lang('site.email')</th>
                                <th scope="col">@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)

                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <a href="{{ route('service.edit', $category) }}"
                                            class="btn btn-info bx bx-pen">@lang('site.edit')</a>
                                        <br>
                                        <form action="{{ route('service.destroy', $category) }}" method="POST"
                                            id="formDelete__{{ $category->id }}">
                                            @method('DELETE')
                                            @csrf

                                        </form>
                                        <button type="button" class="btn btn-danger bx bx-trash"
                                            onclick="document.getElementById('formDelete__{{ $category->id }}').submit()">@lang('site.delete')</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>






    <x-settings />

@endsection
