@extends('tmpl.public')

@section('content')

<main class="main page home">
    <div class="bg"></div>
        <div class="video__home">
            <video autoplay loop poster="/images/paws/videopic.jpg" id="bgvid" class="show-for-large-up">
                <source src="videos/websitefood2.webm" type="video/webm">
                <source src="videos/websitefood2.mp4" type="video/mp4">
            </video>
        </div>
        <div id="vidpause"></div>
        <section class="columns small-12 medium-10 medium-push-1 large-8 large-push-2 xlarge-6 xlarge-push-3 section__white--form">
            @if (isset($message))
               <div class="message__alert">{{ $message }}</div>
            @endif
            @if (isset($registered))
                <div class="registered__message">{{ $registered }}</div>
            @else
                {{ Form::open(array('action' => 'HomeController@postAddUser', 'class' => 'form-horizontal')) }} 
                    <h2 class="form__title--signup">Fresh New Food at Selection Cafe</h2> 

                    <div class="form-group {{ ($errors->has('fname')) ? 'has-error' : '' ; }} row">
                        {{ Form::label('fname', 'Full Name: ', array('class' => ' form_field_title ')) }}
                        <div class=""> 
                            {{ Form::text('fname', (isset($input['fname'])? Input::old('fname') : (isset($data->fname)? $data->fname : '' )), array('class' => ($errors->has('fname'))? 'columns small-12 medium-8 input__text input__text--error' : 'columns small-12 medium-8 input__text', 'placeholder' => ($errors->has('fname'))? $errors->first('fname') : '' )) }} 
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' ; }} row">
                        {{ Form::label('email', 'Email: ', array('class' => ' form_field_title ')) }}
                        <div class="">
                            {{ Form::text('email', (isset($input['email'])? Input::old('email') : (isset($data->email)? $data->email : '' )), array('class' => ($errors->has('email'))? 'columns small-12 medium-8 input__text input__text--error' : 'columns small-12 medium-8 input__text', 'placeholder' => ($errors->has('email'))? $errors->first('email') : '' )) }}  
                        </div>
                    </div>  
     
           
                
                    <div class="form__buttons">
                        {{ Form::submit('', array('class' => 'form__image__submit')) }}
                    </div>

                    <!-- <div class="form-group">
                        {{ Form::submit('', array('class' => 'form__image__submit form__image__submit--small')) }}
                    </div> -->
                {{ Form::close() }} 
            @endif        
        </section>
        <section class="section__white--homepage">
            <!-- <img src="/images/paws/s2leaf.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="leaf1"> -->
            <p>Today is an oppotunity</p>
        </section>
        <section id="mission"class="section__mission">
            <!-- <img src="/images/paws/rleaf.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="leaf3"> -->
            <article class="small-12 medium-10 medium-push-1 large-8 large-push-2 xlarge-6 xlarge-push-3">
                <p class="">
                    Every now and then something special turns into reality and this is true for the new proud owners of Selection Cafe.
                    Our passion and love for food has developed into a career. We are currently expanding our current business<a class="textlink" href="https://www.sonaughtybutnice.com"> SoNaughtyButNice.com </a>.
                    We look forward to introducing a new concept into South Melbourne and celebrating the best food our country has to offer!
                </p>
                <!-- <br/> -->
                <p class=""></p>
                <!-- <br/> -->
                <p class=""></p>
            </article>         
        </section>
        <div class=" section__white--homepage"> 
            <section class="row ">
                <p>Instagram Feed</p>
                @foreach($insta_array['data'] as $image)
                <a href="https://instagram.com/sonaughtybutnice" class="columns small-4 large-2 end">
                    <div class="image-box">
                        <img src="{{$image['images']['low_resolution']['url']}}"> </img>    
                    </div>
                </a>
                @endforeach
            </section>
        </div>



            <!-- <img src="/images/selection/logo200.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="show-for-small-only" style="width: 200px;  margin: auto;"> -->
            <!-- <img src="/images/selection/logo300.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="show-for-medium-only" style="width: 300px;  margin: auto;"> -->
            <!-- <img src="/images/selection/logo400.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="show-for-large-up" style="width: 400px;  margin: auto;"> -->
            <!-- <p>Where real food comes to life</p> -->
        </section>
        <section id="fs" class="section__facebook">
            <!-- <img src="/images/paws/s2leaf.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="leaf1"> -->
            <a id="fl" href="https://www.facebook.com/pages/Time-4-Paws/341349089397253?fref=ts" class="facebook__link">
                
                Check us out on facebook
            </a>
        </section>
        <!-- <section id="vision"class="section__vision">
            <article class="small-12 medium-10 medium-push-1 large-8 large-push-2 xlarge-6 xlarge-push-3">
                <b class="vision_p">
                A cafe that welcomes the ENTIRE family, with menus
                for everyone including you furbaby!
                </b>
                <br/><br/>
                <p class="vision_p">We invite you to</p>
                <ul class="vision_list">
                    <li class="bullet_point">Treat your 4-legged part of the family to a nutritious breaky, brunch or lunch</li>
                    <li class="bullet_point">Make new friends for you and your fur baby in a safe and friendly environment</li>
                    <li class="bullet_point">Experience personalised service where you and your family are our family</li>
                    <li class="bullet_point">Interested in adopting a real food lifestyle in your home? Let us show you how</li>
                    <li class="bullet_point">Check out Eco friendly products for your dog</li>
                    <li class="bullet_point">Try our exclusive Time 4 Paws home cooked ‘real’ dry food for your fury friend.</li>
                    <li class="bullet_point">Incorporate Paleo/LCHF lifestyle into your household</li>
                    <li class="bullet_point">Be amongst like minded people</li>
                <br/>
                <p class="vision_p">
                    Don’t have a furbaby?
                </p>
                <p class="vision_p">
                    Come experience great service, great atmosphere and get your 4 legged fur fix =) After all everyone needs to take ‘Time 4 Paws’
                </p>
            </article>  
            <!-- <img src="/images/paws/bleaf.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="leaf2">        -->
        </section>
    </main>
@stop

@section('_footer')
    <script type="text/javascript" src="/js/flexslider.js"></script>
    <script type="text/javascript" src="/js/tabs.js"></script>
    <script type="text/javascript" src="/js/gallery.js"></script>
    <script>
        // $(window).load(function() {
        //   $('.flexslider--thumbs').flexslider({
        //     controlNav: "thumbnails",
        //     controlsContainer: "#thumbs",
        //     animationSpeed: 300,
        //     slideshow: false,
        //     directionNav: false,

        //     animation: "slide",
        //     direction: "vertical"
        //   });
        // });

        var vid = document.getElementById("bgvid");
        var pauseButton = document.getElementById("vidpause");
        function vidFade() {
        vid.classList.add("stopfade");
        }
        vid.addEventListener('ended', function() {
        // only functional if "loop" is removed
        vid.pause();
        // to capture IE10
        vidFade();
        });
        pauseButton.addEventListener("click", function() {
        vid.classList.toggle("stopfade");
        if (vid.paused) {
        vid.play();
        pauseButton.innerHTML = "Pause";
        } else {
        vid.pause();
        pauseButton.innerHTML = "Paused";
        }
        })
        $('video').prop('volume', 0)
        $('video').prop('muted', true)
        
    </script>
    <script>
        video#bgvid { transition: 5s opacity; }
        .stopfade { opacity: .5; }
        

    </script>
@stop
