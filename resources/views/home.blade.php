@extends('header')

    @section('introduction')

        <!-- Introduction -->
        <section class="bg-dark text-light p-7 p-lg-0 pt-lg-5 text-center text-sm-start">
            <div class="container" style="padding-bottom: 2%;">
                <div class="d-sm-flex align-items-center justify-content-between flex-container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6">
                    <img
                        class="img-fluid img-thumbnail w-40 "
                        src="{{asset('images/CSE_D.png')}}"
                        alt="CSE Departments"
                    />
                    </div>
                    <div class="col-md-6"><br class="d-sm">
                    <h1>Hello <span class="text-warning"> Everyone !! </span></h1>
                    <p class="lead my-4">
                        We are the Students of CSE departments and developed this web application for helping our teachers in maintaining students's attendence record in an easy way.
                        Here, Teacher will be referred to as the “User”, User will be responsible to update his profile as well as manage his daily activities. Users will 
                        have the authority to add and remove students and update their details. Each User maintains attendance of students and also generates month wise 
                        reports of the same.
                    </p>
                    <button type="button" class="btn btn-warning"style="margin-bottom: 10px;">
                        <a target="blank" style="text-decoration: none; color: black;" href="https://www.rtu.ac.in/index/view_menudata.php?page=Department-of-CSE385"> 
                        Visit CSE Departments
                        </a>
                    </button>
                    </div>
                </div>
                </div>
            </div>
        </section>

    @endsection

    @section('testimonial')

        <!-- Testimonial -->
            <div class="splide splide1 TestM container bg-light text-dark">
                <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                    <div class="TestSize active">
                        <h2>
                        Where does it come from?
                        </h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    </li>
                    <li class="splide__slide">
                    <div class="TestSize active">
                        <h2>
                        Where does it come from?
                        </h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    </li>
                    <li class="splide__slide">
                    <div class="TestSize active">
                        <h2>
                        Where does it come from?
                        </h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    </li>
                </ul>
                </div>
            </div>

    @endsection

    @section('developer')

        <!-- Developer Team -->
        <section id="instructors" class="p-5 bg-warning">
            <h2 class="text-center text-white">Developer Team</h2><br>
            <div class="splide splide2 developer">
                <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide">
                    <div class="card bg-light developer-card">
                        <div class="card-body text-center">
                        <img
                            src="{{asset('images/shri.png')}}"
                            class="card-img-top rounded-circle mb-3"
                            alt=""
                        />
                        <h3 class="card-title mb-3">Shrinit Goyal</h3>
                        <div class="">
                            <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            </p>
                        </div>               
                        <a target="blank" href="https://www.linkedin.com/in/shrinitg"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a target="blank" href="https://github.com/shrinitg"><i class="bi bi-github text-dark mx-1"></i></a>
                        </div>
                    </div>
                    </li>

                    <li class="splide__slide">
                    <div class="card bg-light developer-card">
                        <div class="card-body text-center">
                        <img
                            src="{{asset('images/Sunny.png')}}"
                            class="card-img-top rounded-circle mb-3"
                            alt="Sunny"
                        />
                        <h3 class="card-title mb-3">Sunny Katariya</h3>
                        <div class="">
                            <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            </p>
                        </div>  
                        <a target="blank" href="https://www.linkedin.com/in/sunny-katariya-72b5a1171/"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a target="blank" href="https://github.com/skpycoder786"><i class="bi bi-github text-dark mx-1"></i></a>
                        </div>
                    </div>
                    </li>

                    <li class="splide__slide">
                    <div class="card bg-light developer-card">
                        <div class="card-body text-center">
                        <img
                            src="{{asset('images/Suraj.png')}}"
                            class="card-img-top rounded-circle mb-3"
                            alt="Suraj"
                        />
                        <h3 class="card-title mb-3">Suraj Lalwani</h3>
                        <div class="">
                            <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            </p>
                        </div>  
                        <a target="blank" href="https://www.linkedin.com/in/suraj-lalwani-b96899195"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a target="blank" href="https://github.com/Suraj246-lgtm"><i class="bi bi-github text-dark mx-1"></i></a>
                        </div>
                    </div>
                    </li>
                    
                    <li class="splide__slide">
                    <div class="card bg-light developer-card">
                        <div class="card-body text-center">
                        <img
                            src="{{asset('images/Rakesh.png')}}"
                            class="card-img-top rounded-circle mb-3"
                            alt="Rakesh"
                        />
                        <h3 class="card-title mb-3">Rakesh Nagar</h3>
                        <div class="">
                            <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            </p>
                        </div>              
                        <a target="blank" href="https://www.linkedin.com/mwlite/in/rakesh-kr-nagar-085417171"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a target="blank" href="https://github.com/white-shadow-227"><i class="bi bi-github text-dark mx-1"></i></a>
                        </div>
                    </div>
                    </li>

                </ul>
                </div>
            </div>
        </section>

    @endsection

    <!-- Modal Loop (1-2-3-1) -->
    
    <!-- Modal-1 for Login and forget password -->
    <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Faculty Login</h5>
            <button id="M1_Cross_btn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="M1_Login_form" action="/login" method="post">
              @csrf
              <div class="mb-3">
                <input name="M1_Email_inp" type="email" class="form-control" id="" placeholder="User Email">
              </div>
              <div class="mb-3">
                <input name="M1_Password_inp" type="password" class="form-control" id="" placeholder="Password">
              </div>
              <div class="mb-3">
                <select name="M1_Subject_inp" id="Class_subject" class="form-control Subject_select">
                  <option value="" selected hidden>Select Class Subject</option>
                  <option value="OS">Operating System</option>
                  <option value="CN">Computer Network</option>
                  <option value="DBMS">DataBase Management System</option>
                </select>
              </div>
              <button id="M1_Forget_password_btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <a id="closemodal1" class="ModelLink" style="color: white;" href="" data-bs-toggle="modal" data-bs-target="#Modal2">
                  Forget Password
                </a>
              </button>
              <input type="submit" id="M1_Login_btn" class="btn btn-warning" value="Login" style="float: right;">
            </form> 
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal-2 for mail and OTP -->
    <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Provide Account Details</h6>
            <button id="M2_Cross_btn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form id="M2_OTP_form">
              <div class="mb-3">
                <p>To recover the password for your account, please provide us your registered email</p>
                <input name="M2_Email_inp" type="email" class="form-control" id="M2_email_inp" placeholder="User Email"><br>
                <button 
                  type="button"
                  id="M2_Send_OTP_btn"
                  class="ModelLink btn btn-warning"
                  onclick="Add_OTP_div()"
                >
                  Send OTP
                </button><br>
              </div>
              <div id="GiveOTP" class="mb-3 form-control">
                <p>Check your email. You must have received an email with the OTP</p> 
                <input name="M2_EnterOTP_inp" type="password" minlength="8" class="form-control" id="exampleFormControlInput2" placeholder="Enter OTP"><br>
                <button 
                  type="button" 
                  id="M2_SubmitOTP_btn"
                  class="btn btn-warning" 
                  data-bs-dismiss="modal"
                  onclick="Remove_OTP_div()">
                  <a href="" class="ModelLink" data-bs-toggle="modal" data-bs-target="#Modal3">
                    Submit
                  </a>
                </button>
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>

    <!-- Modal-3 for Change and confirm password -->
    <div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reset your password</h5>
            <button id="M3_Cross_btn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="M3_ResetP_form" action="/Dashboard.html" method="get">
              <div class="mb-3">
                <input name="M3_NewPassword_inp" type="email" class="form-control" id="exampleFormControlInput2" placeholder="New password">
              </div>
              <div class="mb-3">
                <input name="M3_ConfirmPassword_inp" type="password" minlength="8" class="form-control" id="exampleFormControlInput2" placeholder="Confirm password">
              </div>
              <button id="M3_Submit_btn" type="button" class="btn btn-warning" data-bs-dismiss="modal">
                <a href="" class="ModelLink" data-bs-toggle="modal" data-bs-target="#Modal1">
                  Submit
                </a>
              </button>
            </form> 
          </div>
        </div>
      </div>
    </div>

