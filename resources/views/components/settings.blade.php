<div class="profile-container percentage-box profile settings">

    <div class="profile-row">
        <!-- ==Content home== -->
        <div class="tab-content dashboard_content">
            <div class="tab-pane fade show active vh-100">
                <h3>@lang('site.settings') </h3>
                <form method="post" action="{{ route('client.updateProfile') }}" enctype="multipart/form-data"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <p class="col-lg-6 col-md-6 invalid  ">
                            <label>@lang('site.name') <span class="required">*</span>@error('name') <span
                                    class="error text-danger">{{ $message }}</span>@enderror</label>
                            <input type="text" required name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ Auth::user()->name }}">
                        </p>


                        <p class="col-lg-6 col-md-6">
                            <label>@lang('site.email') <span class="required">*</span>@error('email')
                                <span class="error text-danger">{{ $message }}</span>@enderror</label>
                            <input type="text" name="email" required
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ Auth::user()->email }}">

                        </p>

                    </diV>
                    <button type="submit" class="btn btn-primary btn-xl btn-block btn_login">@lang('site.save')</button>


                </form>

            </div>
        </div>
    </div>
</div>
