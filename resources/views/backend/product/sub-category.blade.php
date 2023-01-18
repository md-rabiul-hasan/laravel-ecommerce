<option value="">Select Sub-Category</option>
@if(count($sub_category) > 0)
    @foreach($sub_category as $sub_cat)
        <option value="{{ $sub_cat->id }}">{{ $sub_cat->title }}</option>
    @endforeach
@else
    <option value="">No Sub-Category Please add subcategory</option>
@endif
