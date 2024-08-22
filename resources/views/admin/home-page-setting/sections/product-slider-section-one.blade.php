@php
    // Fetch the slider section data from the database
    $sliderSectionOne = isset($sliderSectionOne) ? json_decode($sliderSectionOne->value, true) : [
        'category' => null,
        'sub_category' => null,
        'child_category' => null,
    ];

    // Check if all sections are empty
    $isEmpty = !(
        !empty($sliderSectionOne['category']) ||
        !empty($sliderSectionOne['sub_category']) ||
        !empty($sliderSectionOne['child_category'])
    );
@endphp

<div class="tab-pane fade" id="list-slider-one" role="tabpanel" aria-labelledby="list-slider-section-one">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.product.slider-section-one') }}" method="POST">
                @csrf
                @method('PUT')

                @if ($isEmpty)
                    <h4 class="text-danger">Warning, it's empty data. It needs to be filled.</h4>
                @endif

                <div class="row">
                    <!-- Category Selection -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_1" class="form-control main-category">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $sliderSectionOne['category'] ? 'selected' : '' }}>
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
                                // Fetch sub-categories based on the selected category
                                $subCategories = \App\Models\SubCategory::where('category_id', $sliderSectionOne['category'])->get();
                            @endphp
                            <label>Sub Category</label>
                            <select name="sub_cat_1" class="form-control sub-category">
                                <option value="">Select</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ $subCategory->id == $sliderSectionOne['sub_category'] ? 'selected' : '' }}>
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
                                // Fetch child categories based on the selected sub-category
                                $childCategories = \App\Models\ChildCategory::where('sub_category_id', $sliderSectionOne['sub_category'])->get();
                            @endphp
                            <label>Child Category</label>
                            <select name="child_cat_1" class="form-control child-category">
                                <option value="">Select</option>
                                @foreach ($childCategories as $childCategory)
                                    <option value="{{ $childCategory->id }}" {{ $childCategory->id == $sliderSectionOne['child_category'] ? 'selected' : '' }}>
                                        {{ $childCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

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
