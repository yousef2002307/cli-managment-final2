@extends('cli.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<div class="pakages pt-5 pb-5">
    <div class="container   ">
        <div class="row justify-content-center">
            <div class="col text-center mb-2">
                <!-- <div class="section_title color_b">eximination</div> -->
                <!-- <div class="section_subtitle color_b">to choose from</div> -->
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6">
                <section class="form-container ">

                    <form action="{{url('/examination2')}}" method="post">
                        @csrf
                        @method('post')
                        @if ($app->status == 1 || $app->status == 2)
                        <input type="hidden" value="00" name="hid"/>
                        <input type="hidden" value="{{$id2}}" name="hid2"/>
                        
                        @else 
                        <h3>condition</h3>

                        <p>notes</p>
                        <textarea type="text" name="note" placeholder="write any notes aboutthe condition"
                            class="box" required></textarea>
                        <p>prescription</p>
                        <textarea type="text" name="pre" placeholder="write your prescraption" class="box" required></textarea>
                        <input type="hidden" value="{{$id}}" name="hid"/>
                        <input type="hidden" value="{{$id2}}" name="hid2"/>
                        <label for="" class="d-block"> determine status of revisiting :</label>
                        <select name="select" class="form-control" >
                            <option value="0">no revisit</option>
                            <option value="1"> revisit after 1 week</option>
                            <option value="2"> revisit after 3 week</option>
                            <option value="3"> revisit after 5 weeks</option>
                            <option value="4"> revisit after 7 week</option>

                        </select>
                        @endif
                       
                        <input type="submit" value="finish examination" name="submit" class="btn">
                    </form>


                </section>
            </div>

           


        </div>

    </div>

@endsection