@extends('cli.home')
@section('con')
<section class="jo0">
    <div class="d-flex">
        <div class="item">
            <h2>profits last week</h2>
            <span>{{$lastweekprice}}$</span>
        </div>
        <div class="item">
            <h2>profits this day </h2>
            <span>{{$todayprice}}$</span>
        </div>
      
        <div class="item">
            <h2>profits last year </h2>
            <span>{{$lastyearprice}}$</span>
        </div>

        <div class="item">
            <h2>profits since the beginning </h2>
            <span>{{$begprice}}$</span>
        </div>
    </div>
</section>

@endsection