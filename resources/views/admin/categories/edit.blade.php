<div class="form-group">
    <label for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
    <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
        <option value="0">Select a parent category</option>
        @foreach($categories as $key => $category)
            @if ($targetCategory->parent_id == $key)
                <option value="{{ $key }}" selected> {{ $category }} </option>
            @else
                <option value="{{ $key }}"> {{ $category }} </option>
            @endif
        @endforeach
    </select>
    @error('parent_id') {{ $message }} @enderror
</div>
