<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('CSS/style.css')}}" />
    <link href="/images/logo.ico" rel="icon" type="image/x-icon" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('JS/notify.min.js')}}"></script>
    <title>Home</title>
  </head>

  <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
            <div class="container">
                <div id="Logo">
                <a href="/" class="navbar-brand">
                    <img src="{{asset('images/logo.png')}}" alt="SmartAS"/>
                </a>
                </div>

                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navmenu"
                >
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    @if (session()->get('id'))
                      <li class="nav-item">
                        <a href="logout" class="nav-link">Logout</a>
                      </li>
                    @else
                      <li class="nav-item">
                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#Modal1">Faculty-Login</a>
                      </li>
                      <li class="nav-item">
                        <a href="#instructors" class="nav-link">AboutUs</a>
                      </li>
                    @endif
                </ul>
                </div>
            </div>
        </nav>

        @if ($errors->any())
        
          @foreach ($errors->all() as $error)
            <?php echo "<script>
              $.notify(" ."'". $error. "'" . ", 'error');
            </script>"; ?>
          @endforeach
            
        @endif

        @if(!empty($user))
        <?php echo "<script>
              $.notify(" ."'". $user->msg. "'" . ", 'success');
            </script>"; ?>
        @endif

    <br>

    
    <!-- DashBord Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning py-2 px-4 sticky-top">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#dashNav  "
        >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="dashNav">
        <ul class="navbar-nav mx-auto">
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Student
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item DropActive" href="" data-bs-toggle="modal" data-bs-target="#Modal4">Add Student</a>
              <a class="dropdown-item DropActive" href="" data-bs-toggle="modal" data-bs-target="#Modal5">Remove Student</a>
              <a class="dropdown-item DropActive" href="#">Get Students Data</a>
            </div>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Student
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item DropActive" href="" data-bs-toggle="modal" data-bs-target="#Modal4">Add Student</a></li>
              <li><a class="dropdown-item DropActive" href="" data-bs-toggle="modal" data-bs-target="#Modal5">Remove Student</a></li>
              <li><a class="dropdown-item DropActive" href="#">Get Students Data</a></li>
            </ul>
          </li>
          <li class="nav-item active">
            <a class="nav-link btn btn-outline-dark mx-3" id="TakeA" href="#">Take Attendence</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Generate Report
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item DropActive" href="#">Today's Report</a>
              <a class="dropdown-item DropActive" href="#">Weekly Report</a>
              <a class="dropdown-item DropActive" href="#">Monthly Report</a>
            </div>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Generate Report
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item DropActive" href="#">Today's Report</a></li>
              <li><a class="dropdown-item DropActive" href="#">Weekly Report</a></li>
              <li><a class="dropdown-item DropActive" href="#">Monthly Report</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Student
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item DropActive" href="" data-bs-toggle="modal" data-bs-target="#Modal4">Add Student</a>
                <a class="dropdown-item DropActive" href="" data-bs-toggle="modal" data-bs-target="#Modal5">Remove Student</a>
                <a class="dropdown-item DropActive" href="#">Get Students Data</a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link btn btn-outline-dark mx-3" id="TakeA" href="#">Take Attendence</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Generate Report
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item DropActive" href="#">Today's Report</a>
                <a class="dropdown-item DropActive" href="#">Weekly Report</a>
                <a class="dropdown-item DropActive" href="#">Monthly Report</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav> -->


    <!-- About Teacher and To-Do List -->
    <section id="Main_container" class="p-4">
      <div class="container">
        <div class="row g-4">
          
          <!-- About Teacher -->
          <div class="col-md-6">
            <div class="card bg-warning my-2" style="width: 18rem;">
              <img src="images/RKB.png" class="p-3" alt="Dr. R.K. Bayal">
              <h5 class="mb-3 d-flex justify-content-center">{{$user->name}}</h5>
              <ul class="list-group bg-dark flex-column">
                <li class="list-group-item">
                  <i class="material-icons IconD2">&#xe8a6;</i>
                  &nbsp; {{$user->position}}
                </li>
                <li class="list-group-item">
                  <i class="material-icons IconD2">&#xe0d0;</i>
                  &nbsp; {{$user->email}}
                  <button id="D_Email_update_btn" type="button" class="btn btn-warning Update_button">UPDATE</button>
                </li>
                <li class="list-group-item">
                  <i class="material-icons IconD2">&#xe0cf;</i>
                   &nbsp; {{$user->phone}}
                   <button id="D_Mobile_update_btn" type="button" class="btn btn-warning Update_button">UPDATE</button>
                </li>
              </ul>
            </div>
          </div>

          <!-- To-Do List -->
          <div class="col-md-6"><br class="d-sm">
            <h2 class="d-flex justify-content-center text-warning"> TO-DO LIST </h2>
            <div>
              <button id="D_Add_schedule_btn" type="button" data-bs-toggle="modal" data-bs-target="#Modal6" class="btn btn-warning Update_button Add_button">+ ADD SCHEDULE</button>
              <div id="table_div">
                <table style="height: 10px;" class="table bg-light table-wrapper-scroll-y my-custom-scrollbar ToDo_table">
                  <thead>
                    <tr>
                      <th class="C_Task" scope="col">Task</th>
                      <th class="C_Status" scope="col">Status</th>
                      <th class="C_Update" scope="col">Update</th>
                      <th class="C_Delete" scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody id="result">
                    @foreach ($to_do as $log => $value)
                      <tr>
                        <td class="C_Task"><textarea class="task" placeholder="{{$value['task']}}" disabled></textarea></td>
                        @if($value['status'] == 1)                 
                        <td class="C_Status"><span class="badge rounded-pill bg-success badge_size">Completed</span></td>
                        <td class="C_Update"></td>
                        @else
                        <td class="C_Status"><span class="badge rounded-pill bg-warning badge_size">Pending</span></td>
                        <td class="C_Update"><button id="D_Add_task_btn" type="button" onclick="updateStatus(<?php echo $value['id']?>)" id="b1" class="btn btn-warning Done_button">Done</button></td>
                        @endif
                        <td class="C_Delete"><button id="D_Delete_task_btn" type="button" onclick="deleteTask(<?php echo $value['id']?>)" id="b2" class="btn btn-danger Delete_button">Delete</button></td>
                      </tr>
                    @endforeach
                  </tbody>    
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <hr>

    <!-- Modal-4 for Add Student -->
    <div class="modal fade" id="Modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
            <button id="M4_Cross_btn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="M4_Add_student_form" action="Dashboard.html" method="get">
              <div class="mb-3">
                <input name="M4_Sname_inp" type="text" class="form-control" id="exampleFormControlInput2" placeholder="Full name">
              </div>
              <div class="mb-3">
                <input name="M4_Semail_inp" type="email" minlength="8" class="form-control" id="exampleFormControlInput2" placeholder="Student Email">
              </div>
              <div class="mb-3">
                <input name="M4_SrollNo_inp" type="number" class="form-control" id="exampleFormControlInput2" placeholder="Roll number">
              </div>
            </form> 
          </div>
          <div class="modal-footer">
            <button id="M4_Add_Student_btn" type="button" class="btn btn-warning">
              <a href="Dashboard.html" class="ModelLink"> 
                ADD
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal-5 for Remove Student -->
    <div class="modal fade" id="Modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Remove Student</h5>
            <button id="M5_Cross_btn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">        
            <form id="M5_Remove_student_form" action="Dashboard.html" method="get">
              <div class="mb-3">
                <input name="M5_Semail_inp" type="email" class="form-control" id="exampleFormControlInput2" placeholder="Student Email">
              </div>
            </form> 
          </div>
          <div class="modal-footer">
            <button id="M5_Remove_Student_btn" type="button" class="btn btn-warning">
              <a href="Dashboard.html" class="ModelLink"> 
                REMOVE
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal-6 for Add Task -->
    <div class="modal fade" id="Modal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Daily Tasks</h5>
            <button id="M6_Cross_btn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">        
            <form id="M6_Task_form">
              <div class="mb-3">
                <input name="M6_Task_inp" type="text" class="form-control" id="M6_Task_inp" placeholder="Write Your Task Here">
              </div>
            </form> 
          </div>
          <div class="modal-footer">
            <button onclick="addTask()" id="M6_Add_task_btn" type="button" class="btn btn-warning"> 
                ADD
            </button>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer -->
    <footer class="p-2 mt-2 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Made with <i class="material-icons IconD">&#xe87d;</i> and 
          <a target="blank" 
            href="https://getbootstrap.com/docs/5.1/getting-started/introduction/" 
            style="text-decoration: none;" 
            class="IconD">
            Bootstrap
          </a>
        </p>
        <a href="#" class="position-absolute bottom-0 end-0 p-3">
          <i class="bi bi-arrow-up-circle h2 arrow-color"></i>
        </a>
      </div>
    </footer> 

    <script src="{{asset('JS/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>

</html>