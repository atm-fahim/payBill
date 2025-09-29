@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
               <h3 style="color: #fff;"> <span>Album</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li><a href="{{route('frontend.album')}}"> Album</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- products Section Ten -->
    <section class="products-section-ten style-two">
        <div class="auto-container">
            <div class="container">
                <h1 class="mb-4">{{ $album->album_name }}</h1>
                <div class="row">
                    @forelse($album->images as $image)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow border-0">
                                <img src="{{ asset($image->image_path) }}" class="card-img-top img-responsive"
                                     alt="Image from {{ $album->album_name }}"
                                     data-bs-toggle="modal"
                                     data-bs-target="#imageModal"
                                     data-img-src="{{ asset($image->image_path) }}"
                                     style="cursor: pointer;height: 250px;float: left;padding: 10px;">
                                <div class="card-body">
                                    <p class="card-text">Uploaded on: {{ $image->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No images found in this album.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Modal to View Image -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
<style>
    .card {
        height: 300px; /* Set a fixed height for all cards */
        overflow: hidden; /* Hide overflow to keep the card size */
    }

    .card-img-top {
        height: 100%; /* Make image take the full height of the card */
        width: 100%; /* Make image take the full width of the card */
        object-fit: cover; /* Maintain aspect ratio and cover the entire area */
    }

    .img-responsive {
        max-width: 100%; /* Ensure image is responsive */
        height: auto; /* Maintain aspect ratio */
    }
</style>
    <!-- JavaScript for Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageModal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            imageModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const imgSrc = button.getAttribute('data-img-src'); // Extract info from data-* attributes
                modalImage.src = imgSrc; // Update the modal's image source
            });
        });
    </script>

    <!-- Include Bootstrap CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
