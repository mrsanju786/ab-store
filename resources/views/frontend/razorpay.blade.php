@extends('frontend.layouts.inner_main')
@section('title')
<title>Demo | RazorPay</title>
@endsection


@section('content')
<style>
    .button-style{
        font-size: 22px;
        font-weight: 600;
    }
    .div-style{
        display: inline-flex;   
        width: 280px;  
        background-color: #02042B; 
        border-radius: 5px; 
        padding: 5px 25px;
    }
    .info{
        color:#ff0000;
    }
</style>
<section id="breadcrumbRow" class="row">
    <h2>Online Payment</h2>
    <div class="row pageTitle m0">
        <div class="container">
            <h4 class="fleft">Online Payment</h4>
            <ul class="breadcrumb fright">
                <li><a href="{{route('home')}}">home</a></li>
                <li class="active">Online Payment</li>
            </ul>
        </div>
    </div>
</section>

<section class="row contentRowPad">
<!-- razorpay modal -->
    <div class="container" id="razorpay_div">
        <div class="row">
            <div class="col-md-12">
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                @endif

                @if($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <h5 class="info">* Please do not go back or refresh the page.</h5>            
    <section id="homeBlog">
        <div class="container blog_j">
            <div class="row sectionTitle">
                <?php 
               
                    $amounts =0; 
                    
                    $amounts =$amount;
                
                ?>
                <div class="fs25"><strong>Payable Amount : {{round($amounts)}}</strong>  </div>
                <div class="div-style">
                    <div class="button-style">
                    
                        <div class="panel-heading">
                            <?php 
                            $r_subTotal = round($amounts*100); 

                            $randomNumber=mt_rand(10,999999999);
                            $receipt = 'AB-'.str_pad($randomNumber,12,0,STR_PAD_LEFT);

                            $razorPay = array(
                                'razor_key' => env('RAZOR_KEY'),
                                'razor_secret' => env('RAZOR_SECRET')
                            );
                            
                            
                            $api = new Razorpay\Api\Api($razorPay['razor_key'], $razorPay['razor_secret']);
                            $order = $api->order->create(array('receipt' => $receipt, 'amount' => $r_subTotal, 'currency' => 'INR'));
                            $order_id = $order['id'];
                            $order_amount = round($order['amount']);
                            
                            ?>
                            <form action="{!!route('payment-razor')!!}" method="POST">
                            @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ $razorPay['razor_key'] }}"
                                        data-amount={{$order_amount}}
                                        data-order_id={{$order_id}}
                                        data-buttontext="Pay with Razorpay"
                                        data-name="AB-Mobile"
                                        data-description="AB-Mobile Payment"
                                        data-image=""
                                        data-prefill.email="{{$user_email}}"
                                        data-theme.color="#ff7529">
                                </script>
                                <input type="hidden" name="order_amount" value="{{$amounts}}">
                                <input type="hidden" name="unique_no" value="{{$receipt}}">
                                <input type="hidden" name="addr_id" id="addr_id" value="{{$address_id}}">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- razorpay modal end -->
</section>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


@endsection