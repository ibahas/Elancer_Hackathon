<div class="form-group">
    <x-form.input id="title" class="form-control-lg" :data-id="$category->id" name="title"
        label="{{ trans('site.title_cat') }}" :value="$category->title" />
</div>
<div class="form-group">
    <x-form.input id="titleAr" class="form-control-lg" :data-id="$category->id" name="titleAr"
        label="{{ trans('site.title_cat_ar') }}" :value="$category->titleAr" />
</div>

<div class="form-group">
    <label for="description">@lang('site.description_cat')</label>
    <textarea id="description" name="description"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
    @error('description')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="descriptionAr">@lang('site.description_cat_ar')</label>
    <textarea id="descriptionAr" name="descriptionAr"
        class="form-control @error('descriptionAr') is-invalid @enderror">{{ old('descriptionAr', $category->descriptionAr) }}</textarea>
    @error('descriptionAr')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <x-form.input id="time" class="form-control-lg" :data-id="$category->time" name="time" type="number"
        label="{{ trans('site.remaining_time') }}" :value="$category->time" />
</div>
<div class="form-group">
    <button class="btn btn-primary">@lang('site.save')</button>
</div>
