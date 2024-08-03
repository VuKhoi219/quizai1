@extends('layour.index')


<div id="main">
    <div id="header">
        <ul class="nav-pc" id="nav">
            <li><a id="heading-logo" style="font-size: 20px;" href="#main">Quiz<span>AI</span></a>
            </li>
            <li><a href=" #about">Giới thiệu</a></li>
            <li>
                <a>Chủ đề
                    <i class="nav-arrow-down ti-angle-down"></i>
                </a>
                <ul class="subnav">
                    <li><a href="#courses">Tất cả</a></li>
                    <li><a href="#courses">Toán</a></li>
                    <li><a href="#courses">Lý</a></li>
                    <li><a href="#courses">Hóa</a></li>
                    <li><a href="#courses">Anh</a></li>
                    <li><a href="#courses">Sử</a></li>
                </ul>
            </li>
            <li><a href="#contact">Liên hệ</a></li>
            <li><a href="#contribute">Góp ý</a></li>
            <li><a id="reload1" href="#qna">Hỏi đáp</a></li>
            @csrf
            <li ng-if="Student == null" class="ng-scope"><a href="{{route('login')}}">Đăng nhập</a></li>
            <li ng-if="Student == null" class="ng-scope"><a href="{{route('register')}}">Đăng ký</a></li>


        </ul>

        <div style="margin-right: 0px;" class="search-btn mode">
            <i onclick="changesIcon(this)" class="bx bx-sun bx-moon sun-moon"></i>
            <!-- <label class="switch">
                <input type="checkbox">
                <span class="slider-btn"></span>
            </label> -->
        </div>
        <!-- search -->
        <div class="search-btn" data-toggle="modal" data-target="#myModal" id="search">
            <i class="search-icon ti-search"> </i>
        </div>


        <div id="mobile-menu" class="mobile-menu-btn">

            <!-- <i id="menu-i" class="menu-icon ti-menu"></i> -->
            <button id="menu-i" class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>
        <div class="mobile-menu-btn mode">
            <!-- <i class="search-icon ti-search" id="search-mobile"> </i> -->
            <i onclick="changesIcon(this)" class="bx bx-sun bx-moon sun-moon"></i>
        </div>

        <!-- .nav -->
    </div>
    <main ng-view="" class="ng-scope">
        <section class="ng-scope">
            <div id="slider">
                <div class="text-content">
                    <h1 class="text-heading"><span class="text-heading">Chào mừng đến với</span> <br id="wrap-heading">
                        <span id="heading-logo">QuizAI</span>
                    </h1>
                    <div class="text-description">
                        Môi trường sáng tạo thú vị cho riêng bạn!

                    </div>
                    <button ng-click="getStating()" class="cssbuttons-io-button"> Bắt đầu nào
                        <div class="icon">
                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>

        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Giới thiệu</h6>
                    <p class="text-justify">Frog Quiz<i> HỆ THỐNG TRẮC NGHIỆM MIỄN PHÍ 2024</i>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>QuizAI team</h6>
                    <ul class="footer-links">
                        <li><a href="#">Quiz Guide</a></li>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">TikTok</a></li>
                        <li><a href="#">YouTube</a></li>
                        <li><a href="#">Fanpage</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright © 2024 All Rights Reserved by
                        <a href="#">QuizAI</a>.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>

