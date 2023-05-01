<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include('admin.css')

  <style>
    .h1_style{
        text-align: center;
        font-size: 25px;
    }

    .div_style{
        padding-left: 35%;
        padding-top: 30px;
    }

    label {
        display: inline-block;
        width: 200px;
        font-size: 15px;
        font-weight: bold;
    }

    .input_color{
        color: black;
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

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <h1 class="h1_style">Send Email To : {{$order->email}}</h1>

                <form action="{{url('send_user_email', $order->id)}}" method="POST">
                    @csrf
                    <div class="div_style">
                        <label for="">Email Greeting :</label>
                        <input class="input_color" type="text" name="greeting">
                    </div>

                    <div class="div_style">
                        <label for="">Email First line :</label>
                        <input class="input_color" type="text" name="firstline">
                    </div>

                    <div class="div_style">
                        <label for="">Email Body :</label>
                        <input class="input_color" type="text" name="body">
                    </div>

                    <div class="div_style">
                        <label for="">Email Button name :</label>
                        <input class="input_color" type="text" name="button">
                    </div>

                    <div class="div_style">
                        <label for="">Email Url :</label>
                        <input class="input_color" type="text" name="url">
                    </div>

                    <div class="div_style">
                        <label for="">Email Last line :</label>
                        <input class="input_color" type="text" name="lastline">
                    </div>

                    <div class="div_style">
                        <input type="submit" value="Send Email" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    @include('admin.script2me')

  </body>
</html>
