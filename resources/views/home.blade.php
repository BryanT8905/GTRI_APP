@extends('layout.app')

@section('content')

    <!-- Dashboard BEGIN -->
    <div id="mainPage" class="mb-5 px-0 py-5 mt-5 mainPageExpanded" >

      <!-- Title -->
      <div class="d-sm-flex mb-4">
        @can('isAdmin') 
        <h3>Admin</h3>
        @endcan    
        <h3 class="mx-2">Dashboard</h3>
      </div>

      <!-- Example Explanation -->
      <div class="row">
        <div class="col-xl-11 col-md-6 mb-4">
          <div class="card shadow bg-primary">
            <div class="card-body">
              <h4 class="card-title text-light mb-4">This is an example</h4>
              <p class="card-text text-light mb-4">This page showcases an idea of how the dashboard would be laid out and designed via Bootstrap. There's no actual backend data nor frontend code to showcase backend data, but future developers should be able to create similar Bootstrap elements to use JS, jQuery, and add-ons to those libraries to show general data from the database in a meaningful way. This data can include recent activity, overviews on each of the sub-applications, etcera.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Row of Sample Data Images -->
      <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card shadow">
            <div class="card-header d-flex">
              <h5 class="card-title m-0">Sample data</h5>
            </div>
            <img src="{{asset('img/dashboardExample2.jpg')}}" class="card-img-bottom" alt="">
          </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card shadow">
            <div class="card-header d-flex">
              <h5 class="card-title m-0">Sample data</h5>
            </div>
            <img src="{{asset('img/dashboardExample3.jpg')}}" class="card-img-bottom" alt="">
          </div>
        </div>
      </div>

      <!-- Row with Bootstrap progress bars and Piechart Image -->
      <div class="row">
        <div class="col-xl-7 mb-4">
          <div class="card shadow">
            <div class="card-header d-flex">
              <h5 class="card-title m-0">Sample data</h5>
            </div>
            <div class="card-body">
              <h6>Project A <span class="float-right">90%</span></h6>
              <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width:90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <h6>Project B <span class="float-right">40%</span></h6>
              <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width:40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <h6>Project C <span class="float-right">20%</span></h6>
              <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width:20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <h6>Project D <span class="float-right">100%</span></h6>
              <div class="progress mb-4">
                <div class="progress-bar bg-success" role="progressbar" style="width:100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-md-6 mb-4">
          <div class="card shadow">
            <div class="card-header d-flex">
              <h5 class="card-title m-0">Sample data</h5>
            </div>
            <img src="{{asset('img/dashboardExample1.jpg')}}" class="card-img-bottom" alt="">
          </div>
        </div>
      </div>
    <!-- Row of Color Links to Sub-Apps' main pages -->
    <div class="row">
        <div class="col-xl-2 mb-4">
          <div class="card shadow bg-success text-light">
            <div class="card-body">
              <p class="card-text font-weight-bold">SUB-APP 1</p>
            </div>
          </div>
        </div>
        <div class="col-xl-2 mb-4">
          <div class="card shadow bg-warning text-light">
            <div class="card-body">
              <p class="card-text font-weight-bold">SUB-APP 2</p>
            </div>
          </div>
        </div>
        <div class="col-xl-2 mb-4">
          <div class="card shadow bg-info text-light">
            <div class="card-body">
              <p class="card-text font-weight-bold">SUB-APP 3</p>
            </div>
          </div>
        </div>
        <div class="col-xl-2 mb-4">
          <div class="card shadow bg-dark text-light">
            <div class="card-body">
              <p class="card-text font-weight-bold">SUB-APP 4</p>
            </div>
          </div>
        </div>
        <div class="col-xl-2 mb-4">
          <div class="card shadow bg-danger text-light">
            <div class="card-body">
              <p class="card-text font-weight-bold">SUB-APP 5</p>
            </div>
          </div>
        </div>
        <div class="col-xl-2 mb-4">
          <div class="card shadow bg-primary text-light">
            <div class="card-body">
              <p class="card-text font-weight-bold">SUB-APP 6</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Dashboard END -->


@endsection
