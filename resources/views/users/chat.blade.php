@extends('users.home')
@section('con')
<div class="pakages pt-5 pb-5">
    <div class="container   ">
        <div class="row justify-content-center">
            <div class="col text-center mb-2">
                <div class="section_title color_b">chat bot</div>
                <!-- <div class="section_subtitle color_b">to choose from</div> -->
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6  wow bounceInLeft">
             
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="package_item1 pt-0 ">
                    <div class="form-container pb-80">

                        <button class="chatbot-toggler">
                            <span class="material-symbols-rounded">mode_comment</span>
                            <span class="material-symbols-outlined">close</span>
                        </button>
                        <div class="chatbot">
                            <header>
                                <h2>Chatbot</h2>
                                <span class="close-btn material-symbols-outlined">close</span>
                            </header>
                            <ul class="chatbox">
                                <li class="chat incoming">
                                    <span class="material-symbols-outlined">smart_toy</span>
                                    <p>Hi there 👋<br>How can I help you today?</p>
                                </li>
                            </ul>
                            <div class="chat-input">
                                <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
                                <span id="send-btn" class="material-symbols-rounded">send</span>
                            </div>
                        </div>


                    </div>

                </div>

            </div>







@endsection