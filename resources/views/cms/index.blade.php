@extends('layouts.admin')
@section('title')
    Home
@endsection
@section('content')

<section class="content">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-handshake-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Volunteers</span>
            <span class="info-box-number">{{$volunteers}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$volunteers}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-feed"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Prayer Requests">Prayer Requests</span>
            <span class="info-box-number">{{$prayerrequest}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$prayerrequest}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                <span class="info-box-text" title="Prayer List">Prayer List</span>
                <span class="info-box-number">{{$prayerlist}}</span>

                <div class="progress">
                    <div class="progress-bar progress-bar-blue" style="width: {{$prayerlist}}%"></div>
                </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->

                    <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-balance-scale"></i></span>

                <div class="info-box-content">
                <span class="info-box-text" title="Total Users">Total Users</span>
                <span class="info-box-number">{{$users}}</span>

                <div class="progress">
                    <div class="progress-bar progress-bar-blue" style="width: {{$users}}%"></div>
                </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="ion ion-ios-chatbubble-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Messages</span>
            <span class="info-box-number">{{$messages}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$messages}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-tags"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Stories</span>
            <span class="info-box-number">{{$postcounts}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$postcounts}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-cubes"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Events</span>
            <span class="info-box-number">{{$events}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$events}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-bell"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Church Happenings">Church Happenings</span>
            <span class="info-box-number">{{$happenings}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$happenings}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

        <!-- Calendar -->
        <div class="box box-solid bg-blue-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <div class="btn-group">
                <button type="button" class="btn btn-blue btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new event</a></li>
                  <li><a href="#">Clear events</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-black">
            <div class="row">
              <div class="col-sm-6">
                <!-- Progress bars -->

              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.box -->


    <!-- /.row (main row) -->

  </section>


@endsection


