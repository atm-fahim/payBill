@extends('layouts.app')

@section('content')
    <div class="container card border-top border-0 border-4 border-primary p-3">
        <div class="row justify-content-center">
            <h2>Album: {{ !empty($album) ? $album->name : 'N/A' }}</h2>
            <div class="col-lg-12">
                <!-- Upload Form -->
                <div class="col-md-4 float-start">
                    <form id="uploadForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="imageInputs">
                            <div class="image-row d-flex align-items-center mb-2">
                                <input type="file" name="images[]" class="form-control me-2" onchange="previewImageInline(this)">
                                <img src="" class="preview-img d-none me-2" style="width:80px; height:80px; object-fit:cover; border:1px solid #ccc; border-radius:4px;">
                                <button type="button" class="btn btn-sm btn-danger remove-btn">Remove</button>
                            </div>
                        </div>
                        <button type="button" id="addMore" class="btn btn-secondary mt-2">+ Add More</button>
                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                    </form>
                </div>

                <!-- Preview Area -->
                <div class="col-md-8 float-start" id="previewArea">
                    @if(!empty($album))
                        @foreach($album->images as $image)
                            <div class="d-inline-block position-relative m-2">
                                <img src="{{ asset($image->image_path) }}" width="100" style="border:1px solid #ccc; border-radius:4px;">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        // Add a new row with file input, preview, and remove button
        $('#addMore').click(function () {
            $('#imageInputs').append(`
            <div class="image-row d-flex align-items-center mb-2">
                <input type="file" name="images[]" class="form-control me-2" onchange="previewImageInline(this)">
                <img src="" class="preview-img d-none me-2" style="width:80px; height:80px; object-fit:cover; border:1px solid #ccc; border-radius:4px;">
                <button type="button" class="btn btn-sm btn-danger remove-btn">Remove</button>
            </div>
        `);
        });

        // Show image preview inline with the input
        function previewImageInline(input) {
            let previewImg = $(input).siblings('.preview-img');
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.attr('src', e.target.result).removeClass('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Remove the row when "Remove" button is clicked
        $(document).on('click', '.remove-btn', function () {
            $(this).closest('.image-row').remove();
        });

        // AJAX Upload
        $('#uploadForm').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                @if(!empty($album))
                url: "{{ route('album.uploadImages', $album->id) }}",
                @endif
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function () {
                    location.reload();
                }
            });
        });
    </script>
@endsection
