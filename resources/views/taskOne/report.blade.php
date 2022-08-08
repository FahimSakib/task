@extends('layouts.app')

@section('content')
<div class="container">
<h3>Report (Top Customers by product)</h3>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
        @php
            $qty=0;
            $priceSum=0;
            $totalSum=0;
        @endphp
        @foreach ($report as $item)
        <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->purchase_quantity }}</td>
            <td>{{ $item->product_price }}</td>
            <td>{{ $item->purchase_quantity*$item->product_price }}</td>
          </tr>
          @php
              $qty += $item->purchase_quantity;
              $priceSum += $item->product_price;
              $totalSum += $item->purchase_quantity*$item->product_price;
          @endphp
        @endforeach
        <tr>
            <td colspan="2">Gross Total:</td>
            <td>{{ $qty }}</td>
            <td>{{ $priceSum }}</td>
            <td>{{ $totalSum }}</td>
          </tr>
    </tbody>
  </table>
</div>
@endsection