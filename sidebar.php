 <!-- //////////////////////////////////////////////////////////////Sidebar//////// -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Servics</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


      <li>
        <a href="service_add.php">
          <i class="bi bi-circle"></i><span>Add Service</span>
        </a>
      </li>



      <li>
        <a href="service_view.php">
          <i class="bi bi-circle"></i><span>View Service</span>
        </a>
       </li>

    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Course</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="course_add.php">
          <i class="bi bi-circle"></i><span>Add Course</span>
        </a>
      </li>

      <li>
        <a href="course_view.php">
          <i class="bi bi-circle"></i><span>View Course</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="gallery_add.php">
          <i class="bi bi-circle"></i><span>Add Gallery</span>
        </a>
      </li>
      <li>
        <a href="gallery_view.php">
          <i class="bi bi-circle"></i><span>View Gallery</span>
        </a>
      </li>
   
    </ul>
  </li><!-- End Charts Nav -->

 

  <li class="nav-heading">pages</li>



  <!--<li class="nav-item">
    <a class="nav-link collapsed" href="contact.php">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li>-->

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
  <a class="nav-link collapsed" href="logout.php">
    <i class="bi bi-box-arrow-right text-danger"></i>
    <span class="text-danger">Logout</span>
  </a>
</li>







</ul>

</aside>


<!-- /////////////////////////////////////////////////////////////////////End Sidebar --->
