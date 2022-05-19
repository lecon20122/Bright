@foreach ($subcategories as $subcategory)
    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
    @if (count($subcategory->children))
        @include('product.subCategoryList', ['subcategories' => $subcategory->children])
    @endif
@endforeach
