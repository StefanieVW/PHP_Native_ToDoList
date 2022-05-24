<?php
session_start();
if(!isset($_SESSION["user_email"])){
  header("Location: ../../index.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Development ToDo</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                  class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="Dev.php">ToDo_List</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="Dev.php">TL</a>
          </div>
          <ul class="sidebar-menu">
            <li class="active"><a class="nav-link" href="Dev.php"><i class="fas fa-fire"></i>
                <span>Development</span></a></li>
            <li><a class="nav-link" href="#"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="../../app/Controllers/logout.php" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Logout
            </a>
          </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <button class="btn btn-primary" id="myModal" data-toggle="modal" data-target="#Modalku">Tambah Task</button>
          </div>

          <div class="section-body">
            <h2 class="section-title">ToDo List Dev</h2>
            <p class="section-lead">Mari Buat Project yang spektakuler</p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>ToDo List Dev</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th>Nama Task</th>
                            <th>Nama Developer</th>
                            <th>Tipe Task</th>
                            <th style="width: 15rem">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">1</td>
                            <td>Create a mobile app</td>
                            <td>
                              <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35"
                                data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>
                              <div class="badge badge-success">Completed</div>
                            </td>
                            <td>
                              <a href="#" class="btn btn-icon icon-left btn-primary" id="myModalEdit"
                                data-toggle="modal" data-target="#Modaledit"><i class="far fa-edit"></i> Edit</a>
                              <a href="#" class="btn btn-icon icon-left btn-success"
                                data-confirm="Realy?|Tasknya sudah selesai?"
                                data-confirm-yes="alert('Task Completed, Thankyouu :)');"><i class="fas fa-check"></i>
                                Completed</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

    </div>
    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div>
      </div>
      <div class="footer-right">
        1.0.0
      </div>
    </footer>
  </div>
  </div>

  <!-- Tempat Modal -->
  <!--  Modal Tambah -->
  <div class="modal fade" tabindex="-1" role="dialog" id="Modalku">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Task Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../app/Controllers/dev.php?function=insert_development" method="POST">
            <div class="form-group">
              <label>Nama Task</label>
              <input type="text" class="form-control" id="nama_task" name="nama_task" required>
            </div>
            <div class="form-group">
              <label>Tipe Task</label>
              <input type="text" class="form-control" id="tipe_task" name="tipe_task" required>
            </div>
            <!--<div class="form-group">
                      		<label>Tipe Task</label>
                      		<select class="form-control">
                        	<option>Green Task</option>
                        	<option>Yellow Task</option>
                        	<option>Red Task</option>
                      		</select>
                    	</div> -->
            <div class="form-group">
              <label>Nama Developer</label>
              <input type="text" class="form-control" id="nama_developer" name="nama_developer" required>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--  Modal Edit -->
  <div class="modal fade" tabindex="-1" role="dialog" id="Modaledit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="" method="POST">
            <div class="form-group">
              <label>Nama Task</label>
              <input type="text" class="form-control" name="nama_task" required>
            </div>
            <div class="form-group">
              <label>Tipe Task</label>
              <select class="form-control">
                <option>Green Task</option>
                <option>Yellow Task</option>
                <option>Red Task</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Developer</label>
              <input type="text" class="form-control" name="nama_developer" required>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/page/bootstrap-modal.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>