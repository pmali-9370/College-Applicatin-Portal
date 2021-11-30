
<nav class="navbar bg-light navbar-light navbar-expand-lg">

        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbar-Responsive">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbar-Responsive" >
                <ul class="navbar-nav ">
                    <li class="nav-item " ><a href="student_list.php"   class="nav-link <?php if($active=="student"){echo "active";} ?> ">Student</a></li>
                    <li class="nav-item"><a href="college_list.php" class="nav-link <?php if($active=="college"){echo "active";} ?> ">College</a></li>
                    <li class="nav-item"><a href="exam_list.php"   class="nav-link <?php if($active=="exam"){echo "active";} ?> ">Exam</a></li>
                    <li class="nav-item"><a href="admission_list.php" class="nav-link <?php if($active=="admission"){echo "active";} ?> ">Admission</a></li>
                    <li class="nav-item"><a href="teacher_list.php" class="nav-link <?php if($active=="teacher"){echo "active";} ?> ">Teacher</a></li>
                    
                </ul>
            </div>
        </div>
        </div>
    </nav>
