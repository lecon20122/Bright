
@foreach ($subcategories as $subcategory)
    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
    @if (count($subcategory->children)>0)
        @include('admin.modules.categories.sub-categories', ['subcategories' => $subcategory->children])
    @endif
@endforeach
