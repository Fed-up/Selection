@extends('tmpl.public')



@section('content')
    <section class="page">  
        <nav class=" subnav subnav--centre" data-tab data-options="deep_linking:true; scroll_to_content: false">
            <h2 class="content__title--main"><a class="plain__header__link" href="/">Today's Menu</a></h2>
       </nav>

        <section class="content__page--sub"> 
            <!-- <h3>Fresh all day - savoury meals</h3> -->
            <div class="row content-boxes__wrapper content">
                <div class="row">
                    <h3 class="section__menu__heading">Fresh all day - savoury meals</h3>
                    @foreach($savData as $index=>$recipe)
                        <div class="columns small-12 medium-6 large-4 xlarge-3 xxlarge-2 end">
                            <article class="content-box">
                                <div class="row collapse" id="recipe__row">                                   
                                    <a href="/recipe/{{$recipe->id}}" class="columns small-4 medium-12 tile__title end">
                                        <span class="tile__title--inner">{{$recipe->name}}</span>
                                        <img src="/uploads/{{ $savImage[$recipe->id] }}" />
                                    </a>
                                    <section class="columns small-8 medium-12 content-box__copy--wrapper">
                                        <div class="content-box__copy">
                                            <a href="/recipe/{{$recipe->id}}" class="content-box__copy__inner--recipe"><h5 class="content-box__title">{{$recipe->name}}</h5></a>
                                            <!-- @if(!empty($category[$recipe->id]))
                                                <a href="/collection/{{$category[$recipe->id]->id}}" class="content-box__tag">{{$category[$recipe->id]->name}}</a>
                                            @else
                                                <a href="/collections" class="content-box__tag">Collections</a>
                                            @endif -->
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <h3 class="section__menu__heading">Quick - savoury snacks</h3>
                    @foreach($snaData as $index=>$recipe)
                        <div class="columns small-12 medium-6 large-4 xlarge-3 xxlarge-2 end">
                            <article class="content-box">
                                <div class="row collapse" id="recipe__row">                                   
                                    <a href="/recipe/{{$recipe->id}}" class="columns small-4 medium-12 tile__title end">
                                        <span class="tile__title--inner">{{$recipe->name}}</span>
                                        <img src="/uploads/{{ $snaImage[$recipe->id] }}" />
                                    </a>
                                    <section class="columns small-8 medium-12 content-box__copy--wrapper">
                                        <div class="content-box__copy">
                                            <a href="/recipe/{{$recipe->id}}" class="content-box__copy__inner--recipe"><h5 class="content-box__title">{{$recipe->name}}</h5></a>
                                            <!-- @if(!empty($category[$recipe->id]))
                                                <a href="/collection/{{$category[$recipe->id]->id}}" class="content-box__tag">{{$category[$recipe->id]->name}}</a>
                                            @else
                                                <a href="/collections" class="content-box__tag">Collections</a>
                                            @endif -->
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div> 
        </section> 
  	</section><!--End Band Content-->
@stop
{{-- '<pre>'; print_r($recipe->MenuCategories->name); echo '</pre>'; --}}

@section('_footer')
	<script type="text/javascript" src="/public/js/flexslider.js"></script>
	<script type="text/javascript" src="/public/js/tabs.js"></script>
    <script type="text/javascript" src="/js/gallery.js"></script>
@stop