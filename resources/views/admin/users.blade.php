@extends('admin.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
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
                <h2 class="heading-section">users<Scadule</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table style="background: #fff;" class="table table-responsive-xl table-striped">
                      <thead>
                        <tr>
                          <th>name of user</th>
                          
                          
                          <th>credi-card given ?</th>
                          <th>email</th>
                          <th>phone </th>
                          <th>status</th>
                         <th>operations</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ( $cli as $key => $item)
                        @if ($item->id == 0)
                            @continue
                        @endif
                        <tr class="alert" role="alert">
                            <td>{{$item->username}}</td>
                            
                            <td>
                                @if ($item->creditcardnumber)
                                <td>yes</td>
                                 @else   
                                 <td>no</td>
                                @endif
                            </td>

                        
                          <td>{{$item->email}}</td>
                          <td>{{ $item->phone }}</td>
                         
                          @if ($item->pending)
                          <td>pending</td>
                           @else   
                           <td>active</td>
                          @endif
                       
                          <td>
                            
                              <button type="button" class="close" >
                                <a class="aclose" href='{{url("/adminclidel2/$item->id")}}'> <span aria-hidden="true"><i class="fa fa-close"></i></span></a>
                          </button>
                          <button type="button" class=""  aria-label="edit">
                            <a href='{{url("/admincliview2/$item->id")}}'>view info</a>
                          </button>
                        </td>
                  
                        </tr>  
                        @endforeach
                       
                      </tbody>
                    </table>
                    {!! $cli->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
