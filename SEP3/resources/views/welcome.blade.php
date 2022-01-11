@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
* {
  box-sizing: border-box;
}


body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

.w3-bar{
    background-color: #a4a5a6;
}

.header {
  padding: 80px;
  text-align: center;
  background: linear-gradient(to bottom left, #ad5389 30%, #3c1053 55%)
}

.header h1 {
  font-size: 40px;
}

.header h2 {
  font-size: 30px;
}
.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

.navbar a.right {
  float: right;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.welcome-text h1 {
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            font-size: 50px;
        }

.welcome-text h2 {
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            font-size: 20px;
        }

.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}


.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: 
#d6d6d6
;
  padding: 20px;
}


.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
}

.p1 {
  font-family: "Times New Roman", Times, serif;
}


.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}


@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>
    <header>
        <div class="header">
            <div class="logo">
                <img src="{{url('/images/logo.png')}}" width="250px" height="200px" alt="Image"/>
            </div>
            <div class="dash">
                @auth

                    <h3>You are logged in!</h3>
                @endauth
            </div>

            <div class="welcome-text">
                <br>
                <br>
                <h1>
                    Dercs Computer Repair Shop <br> Management System</h1><br>
                <h2>Repair guides and disassembly information<br>for PC laptops of all shapes, sizes, and colors.
                </h2>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
        @endif

    </header>
    <div class="navbar">
</div>

    <div class="row">
  <div class="side">
    <h4><i class="fa fa-user w2-xxlarge"> About Us</i></h4>
     <img src="{{url('/images/we.jpg')}}" class="img-thumbnail" width="410px" height="300px" alt="Image"/>
      <p class="p1">Laptop repair & support services are our marquee services and we take pride in saying that we started repairing laptop motherboards when no one knew that it can be done in Malaysia, we are not just the pioneers in all the laptop hardware repair solutions but we are glad to provide our customers the repairs which even the laptop manufacturing companies refuse to repair.</p>
      <ul class="w3-ul w3-card-4">
    <li class="w3-bar">
      <img src="{{url('/images/Mag.jpeg')}}" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
      <div class="w3-bar-item">
        <span class="w3-large">Mag</span><br>
        <span>Computer Engineer</span>
      </div>
    </li>

    <li class="w3-bar">
      <img src="{{url('/images/Deep.jpeg')}}" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
      <div class="w3-bar-item">
        <span class="w3-large">Deepa</span><br>
        <span>IT Engineer</span>
      </div>
    </li>

    <li class="w3-bar">
      <img src="{{url('/images/yam.jpeg')}}" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
      <div class="w3-bar-item">
        <span class="w3-large">Yams</span><br>
        <span>Computer Technician</span>
      </div>
    </li>

    <li class="w3-bar">
      <img src="{{url('/images/Lav.jpeg')}}" class="w3-bar-item w3-circle w3-hide-small" style="width:75px">
      <div class="w3-bar-item">
        <span class="w3-large">Lavin</span><br>
        <span>Software Engineer</span>
      </div>
    </li>
  </ul><br>
  <h4> Contact Us</h4>

<ul>
  <li>Contact No    : 011-11402286 (24/7)</li>
  <li>Office  No    : 012-7072860 (24/7)</li> 
  <li>Email Address : Deepa@gmail.com</li>
  <li>Address       : 2/14 Kulim, Kedah</li>
</ul>  

  </div>
  <div class="main">
    <h2>About DERCS – Laptop & PC Repair Malaysia</h2>
    <center><img src="{{url('/images/12.jpg')}}" width="450px" height="350px" alt="Image"/></center><br>
    <p class="p1">We only do what we do best – onsite computer repairs! We won’t leave until you are satisfied that your computer is working exactly how you want it!. We only deal with common problems that you may run into such as virus and spyware removal, setting up broadband internet and wireless networks, as well as those annoying problems where the computer simply wont turn on.</p>
    <br>
    <h2>Our Best Service</h2>
    <center><img src="{{url('/images/repair.jpg')}}" width="550px" height="400px" alt="Image"/></center><br>
    <p>Dercs is a one of the major Microsoft Surface product repairers, we have custom built our own workshop and stocked it with the necessary tools and equipment to complement our practised strategies when dealing with particular damages. These measures have all been undertaken through our passion to provide the most comprehensive repairs, both hardware and software, for our customers, from the very simple screen and battery replacement to the most complicated motherboard repairs and data reveres.</p>
  </div>
</div>

<div class="footer">
  <center><p>copyright@deepa2020</p></center>
</div>

</body>


@endsection

