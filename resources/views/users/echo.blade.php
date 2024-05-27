
@extends('users.home')
@section('con')

<div class="pakages pt-5 pb-5">
    <div class="container   ">
        <div class="row justify-content-center">
            <div class="col text-center mb-2">
                <div class="section_title color_b">echo classification</div>
               
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6  wow bounceInLeft">
                <div class="package_item1 p-30 pack-img3">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="package_item1 pt-0 ">
                    <div class="form-container pb-80">

                        <form action="" method="post" enctype="multipart/form-data" class="h-500">
                            <p>upload your photo</p>
                            <input type="file" name="file" class="box h-25 "></input>
                            <p>the result</p>
                            <output type="file" name="file" class="box h-25 "></output>

                        </form>

                    </div>

                </div>

            </div>



            @endsection