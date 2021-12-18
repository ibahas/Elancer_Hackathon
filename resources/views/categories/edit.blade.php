@extends('layouts.app')

@section('page-title', 'Edit Category')

@section('content')
    <div class="profile-container percentage-box profile queue">

        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content">
                <div class="tab-pane fade show active vh-100">
                    <form action="{{ route('service.update', $category->id) }}" method="post">
                        @csrf
                        @method('put')

                        @include('categories._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
