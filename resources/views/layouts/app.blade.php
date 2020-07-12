<!DOCTYPE HTML>
<html>
     <head>
     <title>posts</title>   
         <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <style>
        *{padding:0;margin:0;}
        .container {width:1000px;padding:0;margin:0 auto;overflow: hidden;}
        .header{padding: 0;margin: 0;background-color: #f1f1f1;}
        .header .nav{width:100%;background-color:#777;text-align: center;}
        .header .navtop{width:100%;height: 50px;background-color: red;}
        .header .slidbar{width:100%;height: 100px;background-color:#fff;}
        .header .navbar{width:100%;height: 50px;background-color:#333;color:#fff;}
        .main{}
        .main .post{
            float: left;
            width: 67%;
            background-color: #f5f3f3;
            padding: 5px 20px;
            font-size: 17px;
            }      
        .main .saidbar{float:right;width:33%;height: 100%;background-color:#999;}
        .footer{color: #fff;height: 60px;background-color:#333;} 
   form{
    width: 100%;
}
img {
    width: 100%;
}
li{
    float: left;
    padding: 15px;
    margin: 0;
    color: #ffffff;  
}
li a{
    color: #FFFFFF  
}
    </style> 
    
</head>   
<body>
 <section class="header" >
    <div class="container"><h1>posts page</h1> 
        <div class="nav"><hr>
          <span>home</span> | <span>date</span><br><span>header</span>
         </div>
        <div class="navtop">navtop</div>  
        <div class="slidbar">slidbar</div>
        <div class="navbar">
<!--             @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/posts') }}">Home</a>
                    @else
                        <a href="{{url('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->
            <div class="content">
          <!--  <div class="title m-b-md">
                    Home
                </div> -->

                <div class="links">
                   <ul class="nav">
                   <li> <a href="/posts">Home</a> |
                   </li>
                  <li>
                    <a href="#">Blog</a> |

                   </li>
                  <li>
                    <a href="/statistics">Statisticss</a> |

                   </li>

                   @if(Auth::check())

                     @if(Auth::user()->hasrole('admin'))

                      <li>
                      <a href="/admin">Admin</a>
                     </li>
                      @endif
                     @if(Auth::user()->hasrole('manager'))

                      <li>
                      <a href="/admin">Admin</a>
                     </li>
                      @endif
                    <li>
                    <a href="#">username: {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                    <a href="logout">logout</a>
                    </li>

                   @else
                   <li>
                   <a href="/login">login</a>

                   </li>
                    <li>
                   <a href="/registered">register</a>

                   </li>

                   @endif

                   </ul> 
                    

                </div>
            </div>
        </div>  
    </div>
</section>     
 <section class="main">
    <div class="container">
    <article class="article">
       @yield('content')
    </article>
       
    <sidebar class="saidebar" >
      <div class="saidbar">
        <h3>widgete</h3>

        saidbar
      </div>

    </sidebar>
  </div>  
</section>
<section class="footer">
  <div class="container">
    footer
  </div>
</section>     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
        
</html>