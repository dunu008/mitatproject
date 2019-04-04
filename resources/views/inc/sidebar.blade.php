<nav class="navbar navbar-inverse navbar-fixed-top">
    
<div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

        <span class="sr-only">Toggle Navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
        
    </button>

    <a class="navbar-brand" href="/dashboard">Admin Panel</a>
    
</div>

<!-- Logged in user -->
<ul class="nav navbar-right top-nav">                       
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fa fa-user">   </i>  {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off"> </i>{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>        
</ul>

<!-- left side sidebar -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    
    <ul class="nav navbar-nav side-nav">
        
        <!-- dashboard -->
        <li>
            <a href="/dashboard">
                <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
        </li>

        <!-- registration -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#registration">
                <i class="fas fa-user-edit"></i>Registration
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="registration" class="collapse">
                <li>
                    <a href="/registration/single-registration">Add single applicant record</a>
                </li>
                <li>
                    <a href="/registration/multiple-registration">Add multiple applicants</a>
                </li>
                <li>
                    <a href="/registration">View registrations</a>
                </li>
            </ul>
        </li>
        

        <!-- test centers -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#testcenters">
                <i class="fa fa-fw fa-location-arrow"></i>Test centers
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="testcenters" class="collapse">
                <li>
                    <a href="/venues/create">Add new test centers</a>
                </li>
                <li>
                    <a href="/venues">View or edit</a>
                </li>
            </ul>
        </li>
        

        <!-- admissions -->
        <!-- <li>
            <a href="/admissions">
                <i class="fa fa-fw fa-table"></i>Admissions
            </a>
        </li> -->

        <li>
            <a href="#" data-toggle="collapse" data-target="#admissions">
                <i class="fa fa-fw fa-table"></i>Admissions
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="admissions" class="collapse">
                <li>
                    <a href="/admissions">View admissions</a>
                </li>
                <li>
                    <a href="/admissions/edit">Set venue for admission</a>
                </li>
            </ul>
        </li>

        <!-- aptitude test results -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#testresults">
                <i class="fa fa-fw fa-edit"></i>Test results
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="testresults" class="collapse">
                <li>
                    <a href="/test-results/multiple-results">Add test results</a>
                </li>
                <li>
                    <a href="/test-results">View or edit</a>
                </li>
            </ul>
        </li>
        

        <!-- analysis -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#analyze">
                <i class="fas fa-chart-line"></i>Analysis
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="analyze" class="collapse">
                <li>
                    <a href="/analyze">Results analyze</a>
                </li>
                <li>
                    <a href="/analyze/statistics">Statistics</a>
                </li>
            </ul>
        </li>

        <!-- view applicants -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#viewApplicants">
                <i class="fa fa-fw fa-list"></i>View Applicants
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="viewApplicants" class="collapse">
                <li>
                    <a href="/viewApplicants">Applicants records</a>
                </li>
                <li>
                    <a href="/viewApplicants/statistics">Statistics</a>
                </li>
            </ul>
        </li>

        <!-- archives -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#archives">
                <i class="fa fa-fw fa-archive"></i>Archives
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="archives" class="collapse">
                <li>
                    <a href="/archive/summary">View summary</a>
                </li>
                <li>
                    <a href="/archive">View archives</a>
                </li>
            </ul>
        </li>

    </ul>

</div>


</nav>