<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')

  <style>
    .search_center{
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: 25px
    }
    .title_deg {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
    }

    .table_deg {
        border: 2px solid gray;
        width: 100%;
        margin: auto;
        text-align: center;
    }

    .th_deg {
        background: #eee;
        color: black;
    }

    .img {
        width: 200px;
        height: 200px;
    }


  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')


        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>


                <div class="search_center">
                    <form action="{{url('search')}}" method="GET">
                        <input style="color: black;" type="text" name="search" placeholder="Search for somthing">
                        <input type="submit" value="search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment status</th>
                        <th>Delivery status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Print PDF</th>
                        <th>Send Email</th>

                    </tr>

                    @forelse ($order as $order)

                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="img" src="/product/{{$order->image}}" alt="">
                        </td>


                        <td>
                            @if($order->delivery_status = 'processing')
                            <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are You Sure Product Is Delivered')" class="btn btn-primary">Dekivered</a>
                            @else
                            <p style="color: green">Delivered</p>
                            @endif
                        </td>


                        <td>
                            <a href="{{url('print_pdf', $order->id)}}" class="btn btn-primary">Print PDF</a>
                        </td>


                        <td>
                            <a href="{{url('send_email', $order->id)}}" class="btn btn-info">Send Email</a>
                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>

                    @endforelse

                </table>
            </div>
        </div>


      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
