@extends('layout')
@section('title', 'Dashboard')
@section('content')
  
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi {{ auth()->user()->name ?? '' }}, welcome back!</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Total Orders</div>
                        <div class="stat-digit">{{ $counts->total_order }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Pending</div>
                        <div class="stat-digit">{{ $counts->pending_orders }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Dispatched</div>
                        <div class="stat-digit">{{ $counts->dispatched_orders }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fa-solid fa-handshake-angle"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Delivered</div>
                        <div class="stat-digit">{{ $counts->delivered_orders }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories</h4>
                </div>
                <div class="card-body">
                    <div class="row" id="product-category">
        
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    const productCategories = () => {
        const container = $('#product-category');
        container.empty(); 
        $.ajax({
            url: '{{ route('category-listing') }}',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (!response || response.length === 0) {
                    container.append('<p>No categories found.</p>');
                    return;
                }
                response.forEach(function(category, index) {
                    const url = `{{ route('product-details', ':id') }}`.replace(':id', category.id);
                    const cardHtml = `
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-card">
                                <img src="${category.cate_image ? `{{ asset('images/product/') }}/${category.cate_image}` : '{{ asset('images/no_image.jpeg') }}'}" 
                                     class="product-card-img" 
                                     alt="Category Image">
                                <div class="product-card-body">
                                    <h5 class="product-card-title">${category.category_name}</h5>
                                    <p class="product-card-text">${category.description || 'No description available.'}</p>
                                    <a href="${url}" class="product-card-btn">View Products</a>
                                </div>
                            </div>
                        </div>`;

                    container.append(cardHtml);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching categories:', error);
                console.log('Response Text:', xhr.responseText);
            }
        });
    };
    $(document).ready(function () {
        productCategories();
    });
</script>

@endsection