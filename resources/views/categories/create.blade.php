@extends('layouts.app')

@section('page-title', 'Create Category')

@section('content')
    <div class="profile-container percentage-box profile queue">

        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content">
                <div class="tab-pane fade show active vh-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('service.store') }}" method="post">
                        @csrf

                        @include('categories._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
