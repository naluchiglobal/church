@extends('layouts.admin')
@section('title')
Prayer List
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
            <button type="button" class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#createClientModal"><i class="menu-item-icon icon ion-ios-plus-outline tx-20"></i> Add Prayer </button>
          <div class="box-header">
            <h3 class="box-title">PRAYER LIST</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">#</th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Title</th>
                    <th class="wd-15p">Name</th>
                    <th scope="wd-15p">Body</th>
                    <th scope="wd-15p">Date</th>
                    <th class="wd-15p">Action</th>
                  </tr>
              </thead>
              <tbody>
                @if(count($prayerlist) < 1)
                <tr>
                    <th>No record currently available</th>
                </tr>
                @else
                @foreach($prayerlist as $key=>$state)
                <td>{{++$key}}</td>

                    <td>
                        @if(Storage::disk('public')->exists('prayer/'.$state->image) && $state->image)
                        <img src="{{Storage::url('prayer/'.$state->image)}}" alt="{{$state->title}}" width="60" class="img-responsive img-rounded">
                    @else
                    <img src="{{asset('img/download.png')}}"  width="60" class="img-responsive img-rounded">
                    @endif
                    </td>
                    <td>{{$state->title}}</td>
                    <td>{{$state->name}}</td>
                    <td>{!! $state->body !!}</td>
                    <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                    <td>
                    <a  onclick="deleteContact({{ $state->id }})">
                      <a href="#" class="btn btn-danger btn-icon mg-r-5 mg-b-10" onclick="deleteContact({{ $state->id }})"><i class="icon ion-ios-trash-outline tx-24"></i> Trash</a></a>
                      </a>
                     </td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>

          </table>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->



    </div>
    @include('modals.add_clients')
    <!-- /.row -->
  </section>
  <!-- /.content -->
  <script>

    function showMessage(id) {
        $('#' + id).modal('show');
    }

    function deleteContact(id) {

        event.preventDefault();

        if (confirm("Are you sure?")) {

            $.ajax({
                url: 'delete/prayerlist/' + id,
                method: 'get',
                success: function(result){
                    window.location.assign(window.location.href);
                }
            });

        } else {

            console.log('Delete process cancelled');

        }

    }

    </script>

    @endsection
