@extends('users.home')
@section('con')
<section class="pt-5 sec5">
<h5 class="text-center my-4">enter your current or prev disease so doctor can benefit from this info and anu medical info</h5>
<form action="{{url('/usermed2')}}" method="POST">
    @csrf
    @method('post')
    <div class="xz">
    @if (!count($disease))
    <input style="font-size: 20px;width:90%;display:inline-block" class="form-control mb-3" type="text" name="disease1"/>
    @else
        @foreach ($disease as $key => $item)
        <input style="font-size: 20px;width:90%;display:inline-block" value="{{$item->disease}}" class="form-control mb-3" type="text" name="disease{{$key+1}}"/>
            
        @endforeach
    @endif
   
</div>
    <a class="add mb-3 mt-3" style="cursor: pointer"><i class="fa-solid fa-plus"></i></a>
    @if (count($disease2))
    <textarea style="font-size: 22px"  class="form-control mb-3 mt-5" name="note" id="" cols="30" rows="10">{{$disease2[0]->notes}}</textarea>
    
    @else
    <textarea style="font-size: 22px"  class="form-control mb-3 mt-5" name="note" id="" cols="30" rows="10"></textarea>
      
    @endif
  
    <input type="submit" value="add" class="btn btn-primary btn-lg d-block">
</form>
</section>
@endsection