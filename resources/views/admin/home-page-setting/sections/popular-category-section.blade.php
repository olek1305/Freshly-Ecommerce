@php
    // Fetch the slider section data from the database
    $popularCategorySection = isset($popularCategorySection) ? json_decode($popularCategorySection->value, true) : [];

    // Default data structure for categories
    $defaultCategoryData = [
        'category' => null,
        'sub_category' => null,
        'child_category' => null,
    ];

    // Ensure there are at least four sections with default data
    for ($i = 0; $i < 4; $i++) {
        if (!isset($popularCategorySection[$i])) {
            $popularCategorySection[$i] = $defaultCategoryData;
        }
    };

    // Check if all sections are empty
    $isEmpty = true;
    foreach ($popularCategorySection as $section) {
        if (!empty($section['category']) || !empty($section['sub_category']) || !empty($section['child_category'])) {
            $isEmpty = false;
            break;
        }
    }
@endphp

<div class="tab-pane fade show active" id="list-popular" role="tabpanel" aria-labelledby="list-popular-category-section">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.popular.category-section') }}" method="POST">
                @csrf
                @method('PUT')

                @if ($isEmpty)
                    <h4 class="text-danger">Warning, it's empty data. It needs to be filled.</h4>
                @endif

                @foreach (range(1, 4) as $index)
                    <h5>Category {{ $index }}</h5>
                    <div class="row">
                        <!-- Category Selection -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="cat_{{ $index }}" class="form-control main-category">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $popularCategorySection[$index - 1]['category'] ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Sub-Category Selection -->
                        <div class="col-md-4">
                            <div class="form-group">
                                @php
                                    $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[$index - 1]['category'])->get();
                                @endphp
                                <label>Sub Category</label>
                                <select name="sub_cat_{{ $index }}" class="form-control sub-category">
                                    <option value="">Select</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}" {{ $subCategory->id == $popularCategorySection[$index - 1]['sub_category'] ? 'selected' : '' }}>
                                            {{ $subCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Child-Category Selection -->
                        <div class="col-md-4">
                            <div class="form-group">
                                @php
                                    $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[$index - 1]['sub_category'])->get();
                                @endphp
                                <label>Child Category</label>
                                <select name="child_cat_{{ $index }}" class="form-control child-category">
                                    <option value="">Select</option>
                                    @foreach ($childCategories as $childCategory)
                                        <option value="{{ $childCategory->id }}" {{ $childCategory->id == $popularCategorySection[$index - 1]['child_category'] ? 'selected' : '' }}>
                                            {{ $childCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            /** get sub categories **/
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row');
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.get-subcategories') }}",
                    data: { id: id },
                    success: function(data) {
                        let selector = row.find('.sub-category');
                        selector.html('<option value="">Select</option>')
                        $.each(data, function(i, item) {
                            selector.append(
                                `<option value="${item.id}">${item.name}</option>`)
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });

            /** get child categories **/
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row');
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-child-categories') }}",
                    data: { id: id },
                    success: function(data) {
                        let selector = row.find('.child-category');
                        selector.html('<option value="">Select</option>')
                        $.each(data, function(i, item) {
                            selector.append(
                                `<option value="${item.id}">${item.name}</option>`)
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
