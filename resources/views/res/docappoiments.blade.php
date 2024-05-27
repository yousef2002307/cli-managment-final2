@extends('res.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

@if(session('success2'))
  <div class="alert alert-success">
      {{ session('success2') }}
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
                          
                          <th>Address</th>
                          
                          <th>Date</th>
                          <th>day</th>
                          <th>name</th>
                          <th>price</th>
                          <th>status</th>
                          <th>operation</th>
                          <th>more info</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ( $appoiment as $key => $item)
                        <tr class="alert" role="alert">
                           
                          <td>{{$item->patients->b_no}}/{{$item->patients->street}}/{{$item->patients->city}}</td>
                          <td>{{$item->date}}</td>
                          <td>{{ \Carbon\Carbon::parse($item->date)->format('l') }}</td>
                          <td>{{$item->patients->name}}</td>
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
                                <a class="aclose" href="{{url('/resdelete/' . $item->id . '/' . $item->patients->id)}}"> <span aria-hidden="true"><i class="fa fa-close"></i></span></a>
                          </button>
                         
                        </td>
                        <td>
                          <a href="{{url('/viewinfo2',$item->patients->id)}}" class="inf hvr-bounce-to-right theme_btn_two  ">view info</a>
                        </td>
                        </tr>  
                        @endforeach
                        <!--
                        <tr class="alert" role="alert">
                            <td>#1</td>
                          <td>Benha</td>
                          <td>Markotto89</td>
                          <td>12-3-2024</td>
                          <td class="status"><span class="active">Active</span></td>
                          <td>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                          <button type="button" class="edit"  aria-label="edit">
                            <a href="#"><i class="fa fa-edit"></i></a>
                          </button>
                        </td>
                        </tr>
                        <tr class="alert" role="alert">
                            <td>#2</td>
                            <td>Benha</td>
                            <td>Markotto89</td>
                          <td>12-3-2024</td>
                          <td class="status border-bottom-0"><span class="non-active">Non-Active</span></td>
                          <td>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                          <button type="button" class="edit"  aria-label="edit">
                            <a href="#"><i class="fa fa-edit"></i></a>
                          </button>
                        </td>
                        </tr>
                        <tr class="alert" role="alert">
                            <td>#3</td>
                            <td>Benha</td>
                          
                          <td class="border-bottom-0">Markotto89</td>
                          <td>12-3-2024</td>
                          <td class="status border-bottom-0"><span class="waiting">Waiting for Resassignment</span></td>
                          <td class="border-bottom-0" >
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                          <button type="button" class="edit"  aria-label="edit">
                            <a href="#"><i class="fa fa-edit"></i></a>
                          </button>
                        </td>
                        </tr>
                    
                    -->
                      </tbody>
                    </table>
                    {!! $appoiment->withQueryString()->links('pagination::bootstrap-5') !!}
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection