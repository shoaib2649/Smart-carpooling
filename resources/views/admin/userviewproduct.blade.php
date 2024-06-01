<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{('images/favicon.png')}}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <style> 
.main{
   margin-left: 500px;
   padding: 34px;
}
.target{
   margin-top:20px;
   margin-bottom:10px;
}
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
       <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2 style="margin-left:95px;margin-bottom: -10px;">
                 <span style="color:blue">products</span>
               </h2>
            </div>
               
                                
         <div class="main"> 
                    <img  src="/product/{{$products->image}}" width="250px" height="250px"alt="" class="target">

             <span class="target" style="font-size:20px;">Product Title: <h1>{{$products->title}}</h1></span>
                          

                    
                     <div class="detail-box">
                        
                        @if($products->discountprice!=null)
                        <h6 class="target" style="color:red;font-size:20px;">
                           Discount Price:
                           ${{$products->discountprice}}
                           <br>
                        </h6>

                        <h6 class="target" style="text-decoration:line-through;color:blue;font-size:20px">
                           Price:
                           ${{$products->price}}
                           <br>  
                        </h6>
                        @else

                        <h6 class="target" style="color:blue;">
                           Price
                           ${{$products->price}}
                        </h6>
                        @endif
                        <div class="target" >
                           <h6>Descripton :{{$products->description}}</h6>
                        </div>
                     </div>
                 <form action="{{ route('addcart',['id' => $products->id]) }}" method="POST">
               @csrf
                <div class="row">
               <div class="col-md-4">
                  <div>
                    <input style="width:80px;margin-top:4px;" type="number" name="quantity" id="" value="1" min="1">
                 </div>
               </div>
               <div class="col-md-4">
                  <div>
                    <input type="submit" value="Add cart" >
                 </div>
               </div>
               
                 
                  </div>
             </form>
             
         
         <!-- end slider section -->
         </div>
     </section>
      </div>


      <!-- why section -->
     
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">Safe future GrowItself</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Check Community</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>