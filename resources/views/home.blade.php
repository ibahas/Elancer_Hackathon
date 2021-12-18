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
                    <div class="row">

                        <form method="post" action="{{ route('queue.store') }}" enctype="multipart/form-data"
                            class="col-6">
                            @csrf
                            <div class="row">
                                <p class="col-12">
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
                        @if ($clientQueue)
                            <div class="col-6">
                                <div class="alert alert-success">
                                    @php
                                        echo trans('site.queue_no') . ' ' . $clientQueue['no'] . ' ' . trans('site.remaining_time') . ' ' . $var . ' ' . trans('site.minute\s');
                                        
                                    @endphp
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-settings />

@endsection
