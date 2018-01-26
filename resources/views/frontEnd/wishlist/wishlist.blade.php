@extends('frontEnd.master')
@section('title')
View Wishlist
@endsection
@section('mainContent')
<section id="cartpage">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="panel panel-default">
<div class="panel-body">
<h4 class="pro_title">Your Wishlist</h4>
<hr/>
<?php


    $message = Session::get('message');
    if(isset($message)){
        echo '<div class="alert alert-success">'.$message.'</div>';
    }
    $result = count($wishlists);
    if($result>0){
?>
<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Action</th>
                </tr>
            </thead>
        <tbody>
    @foreach($wishlists as $wishlist)
        <tr>
            <td>{{ $wishlist->productName }}</td>
            <td>
            <img src="{{ ($wishlist->productImage) }}" width="40px" height="40px">
            </td>
            <td>TK {{ $wishlist->productPrice }}</td>
            

            <td>
             <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('/delete-wishlist/'.$wishlist->wishlist_id) }}">
            <button class="btn btn-danger">
                    <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
           </a>
            <?php $customerId = Session::get('customerId'); ?>
            <form class="formTo" action="{{ url('/switchToCart/'.$wishlist->wishlist_id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="wishlist_id" value="{{ $wishlist->wishlist_id }}">
                    <input type="hidden" name="productId" value="{{ $wishlist->id }}">
                    <input type="hidden" name="cmrId" value="{{ $customerId }}">
                    <button class="btn btn-info" type="submit"> To Cart </button>
            </form>
                 
            </td>
           
        </tr>
     @endforeach
         <tr>
             <td></td>
             <td></td>
             <td></td>
             <td><a href="{{url('/clear-wishlist')}}" class="btn btn-danger">
                            Clear Wishlist
                        </a></td>
         </tr>

        </tbody>

        </table>

</div>
<?php } else{
     echo ' ';
} ?>


</div>
</div>

</div>
</div>
</div>
</section>
@endsection