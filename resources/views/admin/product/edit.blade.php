@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <form action="{{ route('product.update', $product->id) }}" method='post' id='productForm' name='productForm'>
            @method('put')
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input value="{{ old('title', $product->title) }}" type="text" name="title"
                                                id="title" class="form-control" placeholder="Title">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input value="{{ old('slug', $product->slug) }}" type="text" name="slug"
                                                id="slug" class="form-control" placeholder="slug">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea value="{{ old('slug', $product->description) }}" name="description" id="description" cols="30"
                                                rows="10" class="summernote" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="short_description"> Short Description</label>
                                            <textarea value="{{ old('slug', $product->short_description) }}" name="short_description" id="short_description"
                                                cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="shipping_returns">Shipping Returns</label>
                                            <textarea value="{{ old('slug', $product->shipping_returns) }}" name="shipping_returns" id="shipping_returns"
                                                cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="product-gallery">
                            @if ($productImages->isNotEmpty())
                                @foreach ($productImages as $image)
                                    <div class="col-md-4" id="image-row-{{ $image->id }}">
                                        <div class="card" style="width: 18rem;">
                                            <input type="hidden" name="image_array[]" value="{{ $image->id }}">
                                            <img src="{{ asset('upload/product-images/small/' . $image->image) }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">

                                                <a href="#" onclick="deleteImage({{ $image->id }})"
                                                    class="btn btn-danger">delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input value="{{ old('price', $product->price) }}" type="text" name="price"
                                                id="price" class="form-control" placeholder="Price">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input value="{{ old('price', $product->compare_price) }}" type="text"
                                                name="compare_price" id="compare_price" class="form-control"
                                                placeholder="Compare Price">
                                            <p></p>
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product’s original price into Compare at
                                                price. Enter a lower value into Price.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input value="{{ old('sku', $product->sku) }}" type="text" name="sku"
                                                id="sku" class="form-control" placeholder="sku">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input value="{{ old('barcode', $product->barcode) }}" type="text"
                                                name="barcode" id="barcode" class="form-control"
                                                placeholder="Barcode">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="hidden" name="track_qty" value="No">
                                                <input class="custom-control-input" name="track_qty" id="track_qty"
                                                    type="checkbox" value="Yes"
                                                    {{ $product->track_qty == 'Yes' ? 'checked' : ' ' }}>
                                                <label for="track_qty" class="custom-control-label">
                                                    Track Qty
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input value="{{ old('qty', $product->qty) }}" type="number" min="0"
                                                name="qty" id="qty" class="form-control" placeholder="Qty">
                                            <p></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <h2 class="h4 mb-3">Related Products</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <select multiple class="related-products w-100" name="related_products[]"
                                                id="related_products" class="form-control">
                                                @if (!empty($relatedProducts))
                                                    @foreach ($relatedProducts as $relproduct)
                                                        <option selected value="{{ $relproduct->id }}">
                                                            {{ $relproduct->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option {{ $product->status == '1' ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $product->status == '0' ? 'selected' : '' }} value="0">Block
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="h4  mb-3">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select category</option>
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option {{ $product->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select subcategory</option>
                                        @if ($subCategories->isNotEmpty())
                                            @foreach ($subCategories as $subcategory)
                                                <option
                                                    {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}
                                                    value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product brand</h2>
                                <div class="mb-3">
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select brand</option>
                                        @if ($brands->isNotEmpty())
                                            @foreach ($brands as $brand)
                                                <option {{ $product->brand_id == $brand->id ? 'selected' : '' }}
                                                    value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control">
                                        <option {{ $product->is_featured == 'No' ? 'selected' : '' }} value="No">No
                                        </option>
                                        <option {{ $product->is_featured == 'Yes' ? 'selected' : '' }} value="Yes">Yes
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('product.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
@endsection
@section('customJS')
    <script>
        //for related products
        $('.related-products').select2({
            ajax: {
                url: '{{ route('product.getProducts') }}',
                dataType: 'json',
                tags: true,
                multiple: true,
                minimumInputLength: 3,
                processResults: function(data) {
                    return {
                        results: data.tags
                    };
                }
            }
        });

        //For slug change

        $("#title").change(function() {
            element = $(this);
            $.ajax({
                url: '{{ route('getSlug') }}',
                type: 'get',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {

                    if (response["status"] == true) {
                        $("#slug").val(response["slug"]);
                    }

                }
            })
        });

        //for dropzone image

        Dropzone.autoDiscover = false;

        $(function() {
            // Summernote
            $('.summernote').summernote({
                height: '300px'
            });
            const dropzone = $("#image").dropzone({

                url: "{{ route('product-images.update') }}",
                maxFiles: 10,
                paramName: 'image',
                params: {
                    'product_id': '{{ $product->id }}'
                },
                addRemoveLinks: true,
                acceptedFiles: "image/jpeg,image/png,image/gif",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(file, response) {
                    // $("#image_id").val(response.image_id);
                    //console.log(response)

                    var html = `<div class="col-md-4" id="image-row-${response.image_id}" ><div  class="card" style="width: 18rem;">
        <input type="hidden" name="image_array[]" value="${response.image_id}">
            <img src="${response.ImagePath}" class="card-img-top" alt="...">
            <div class="card-body">
                
                <a href="#" onclick="deleteImage(${response.image_id})" class="btn btn-danger">delete</a>
            </div>
        </div></div>`;

                    $("#product-gallery").append(html);
                },
                complete: function(file) {
                    this.removeFile(file);
                }
            });

        });

        function deleteImage(id) {
            $("#image-row-" + id).remove();
            if (confirm("Are you sure you want to delete this image")) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    url: "{{ route('product-images.delete') }}",
                    type: 'put',
                    data: {
                        id: id
                    },
                    dataType: 'json',

                    success: function(response) {

                        if (response.status == true) {
                            alert(response.message)
                        } else {
                            alert(response.message)
                        }


                    }
                });

            }
        }
    </script>

    <script>
        $('#category').change(function() {
            var category_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('productSubcategories.index') }}",
                type: 'post',
                data: {
                    category_id: category_id
                },
                dataType: 'json',
                success: function(response) {

                    $("#sub_category").find("option").not(":first").remove();

                    $.each(response["subcategories"], function(key, item) {
                        $("#sub_category").append(
                            `<option value='${item.id}'>${item.name}</option>`
                        );
                    });

                },
                error: function() {
                    console.log("something went wrong")
                }
            });

        });
    </script>
    <script>
        $("#productForm").submit(function(event) {
            event.preventDefault();
            var element = $(this)
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('product.update', $product->id) }}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response['status'] == true) {

                        $("#title").siblings("p").removeClass("invalid-feedback").html('');
                        $("#title").removeClass("is-invalid");

                        $("#slug").siblings("p").removeClass("invalid-feedback").html('');
                        $("#slug").removeClass("is-invalid");

                        window.location.href = "{{ route('product.index') }}"

                    } else {
                        var errors = response['errors'];

                        if (errors['title']) {
                            $("#title").addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback')
                                .html(errors['title']);
                        } else {
                            $("#title").siblings("p").removeClass("invalid-feedback").html('');
                            $("#title").removeClass("is-invalid");
                        }


                        if (errors['slug']) {
                            $("#slug").addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(errors['slug']);
                        } else {
                            $("#slug").siblings("p").removeClass("invalid-feedback").html('');
                            $("#slug").removeClass("is-invalid");

                        }
                    }

                },
                error: function() {
                    console.log('something went wrong');
                }
            });
        })
    </script>
@endsection
