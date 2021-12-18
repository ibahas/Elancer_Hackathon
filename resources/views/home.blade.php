@extends('layouts.app')
@section('title')
    @lang('site.account_settings')
@endsection

@section('content')

    <div class="profile-container percentage-box profile queue">

        <div class="profile-row">
            <!-- ==Content home== -->
            <div class="tab-content dashboard_content">
                <div class="tab-pane fade show active vh-100">
                    <h3>@lang('site.waiting_list_reservation') </h3>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('queue.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <p class="col-lg-6 col-md-6">
                                <label for="category_id">@lang('site.title_cat') <span
                                        class="required">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ title($category) }}</option>
                                    @endforeach
                                </select>
                            </p>


                        </diV>
                        <button type="submit"
                            class="btn btn-primary btn-xl btn-block btn_login">@lang('site.request')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <x-settings />

@endsection
