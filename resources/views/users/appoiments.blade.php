@extends('users.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

@if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Appointments<Scadule</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl table-striped">
                      <thead>
                        <tr>
                          <th>#ID</th>
                          <th>Address</th>
                          
                          <th>Date</th>
                          <th>Work-hours</th>
                          <th>number in queue</th>
                          <th>Clinic</th>
                          <th>price</th>
                          <th>status</th>
                          <th>operation</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ( $appoiment as $key => $item)
                        <tr class="alert" role="alert">
                            <td>{{$key}}</td>
                          <td>{{$item->cli->b_no}}/{{$item->cli->street}}/{{$item->cli->city}}</td>
                          <td>{{$item->date}}</td>
                          <td>{{$item->cli->works_from}} to  {{$item->cli->works_to}}</td>
                          <td>{{$item->queue_num}}</td>
                          <td>{{$item->cli->name}}</td>
                          @if ($item->revisit)
                          <td>{{$item->cli->price2}}</td>
                           @else   
                           <td>{{$item->cli->price}}</td>
                          @endif
                         @if ($item->payment_status)
                         <td class="status border-bottom-0"><span class="non-active">Non-paid</span></td>
                         
                          @else 
                          <td class="status"><span class="active">paid</span></td>
                          @endif
                          <td>
                              <button type="button" class="close" >
                                <a class="aclose" href="{{url('/userdelete',$item->id)}}"> <span aria-hidden="true"><i class="fa fa-close"></i></span></a>
                          </button>
                          <button type="button" class="edit"  aria-label="edit">
                            <a href="{{url('/useredit',$item->id)}}"><i class="fa fa-edit"></i></a>
                          </button>
                        </td>
                        </tr>  
                        @endforeach
                       
                      </tbody>
                    </table>
                    {!! $appoiment->withQueryString()->links('pagination::bootstrap-5') !!}

                </div>
            </div>
        </div>
    </div>
</section>

@endsection