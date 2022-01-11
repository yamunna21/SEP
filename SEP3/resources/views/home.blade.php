@php
    $user = Auth::user();
@endphp
@if($user->status =='Banned')
        <div class="alert alert-danger" >
         Sorry {{ Auth::user()->firstname }}, you are banned !
            Contact the Administrator !
        </div>
    @php
    Auth::logout();
    @endphp
    @endif

@if($user->status =='Active')
@extends('layouts.app')
@auth
@section('content')
    <div class="carousel-item active",class="fill" style="background-image: url(https://i.postimg.cc/1XNkY21G/istock.jpg)"/>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
        }
        .wrapper {
            width: 1170px;
            margin: auto;
        }
        header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://i.postimg.cc/1XNkY21G/istock.jpg);
            height: 100vh;
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
            position: relative;
        }
        .nav-area {
            float: right;
            list-style: none;
            margin-top: 30px;
        }
        .nav-area li {
            display: inline-block;
        }
        .nav-area li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            text-transform: uppercase;
            display: block;
            width: 60px;
        }

        .nav-area li a:hover {
            background-color: #333;
        }
        .logo {
            float: left;
        }
        .logo img {
            padding: 15px 0px;
            position: relative;
            left: 50px;
        }
        .welcome-text {
            position: absolute;
            width: 600px;
            height: 300px;
            margin: 10% 30%;
            text-align: center;
        }
        .welcome-text h1 {
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            font-size: 60px;
        }
        .welcome-text h1 span {
            color: #00fecb;
        }
        .welcome-text a {
            border: 1px solid #fff;
            padding: 10px 20px;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 14px;
            margin-top: 20px;
            display: inline-block;
            color: #fff;

        }
        .welcome-text a:hover {
            background: #fff;
            color: #333;
        }

        .pictures {
            width: 10px;
            height:10px;
            position:relative;
            left:10px;
            top:630px
        }

        .dash{
            position:relative;
            right:-800px;
            top:50px;
            color: white;
        }


        @media (max-width:600px) {
            .wrapper {
                width: 100%;
            }
            .logo {
                float: none;
                text-align: center;
                margin: auto;
            }

            }
            .nav-area {
                float: right;
                margin-top: 0;
            }
            .nav-area li a{
                padding: 10px;
                font-size: 14px;
            }
            .nav-area {
                text-align: center;
            }
            .welcome-text {
                width: 100%;
                height: auto;
                margin: 10% -40%;
            }
            .welcome-text h1 {
                font-size: 40px;
            }

            .welcome-text h2 {
                font-size: 20px;
                color: white;
            }

    </style>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="{{url('/images/logo.png')}}" width="200px" height="200px" alt="Image"/>
            </div>
        <div class="dash">
            <h3>Welcome {{ Auth::user()->firstname }} ! </h3>
        </div>

        <div class="welcome-text">
            <br>
            <br>
            <h1>
                Dercs Computer<br>Repair Shop<span><br> Management System</span></h1><br>
            <h2>Repair guides and disassembly information<br>for PC laptops of all shapes, sizes, and colors.
            </h2>
            <br><h2>"Computer Technology Is So Built Into<br>Our Lives That It's Part Of The Surround<br>Of Every Artists."~ Steven Levy</h2>
        </div>
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    </header>

@endsection
@endauth
@endif
