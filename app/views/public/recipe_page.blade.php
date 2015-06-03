@extends('tmpl.public')

@section('content')
    <div class="page">
    @foreach($rData as $recipe)
        <nav class=" subnav subnav--centre" data-tab data-options="deep_linking:true; scroll_to_content: false">
            <h2 class="content__title--main"><a class="plain__header__link" href="/menu">{{$recipe->name}}</a></h2>
        </nav>
        <section class="content__page--sub"> 
            <section class="row">
                {{--'<pre>'; dd($rImage[0][$recipe->id]); echo '</pre>';--}}
                <div class="columns small-9 medium-4">
                        <img src="/uploads/{{ $hImage }}" />	
                </div><!--End Five columns-->
                
                <div class="columns small-3 medium-2 medium-push-6 large-2 large-push-6 xlarge-1 xlarge-push-7">
                    <div class="intolerance__block">
                        @foreach($intolerance as $intol)
                            <div class="content__side__icon" ><span class="icon__text"> {{$intol}}</span></div>
                        @endforeach
                    </div> 
                </div>
                <div class="columns small-12 medium-6 medium-pull-2 large-6 large-pull-2 xlarge-7 xlarge-pull-1">
                    <section class="section__box section__summary">
                            {{$recipe->summary}}
                    </section> 
                </div>

                <div class="columns small-12 medium-12 medium-push-12 large-6 large-pull-2 xlarge-7 xlarge-pull-1">
                    
                    <section class="section__box section__ingredients">
                    <h3 class="content__title">The Ingredients</h3> 
                        @foreach($rIngredients as $index=>$ingredient)
                            @if($ingredient->MenuIngredients->active == 1)
                                <!-- <span class="ingredient__link"> href="/ingredient/{{$ingredient->MenuIngredients->id}} -->
                                    - {{$ingredient->MenuIngredients->name}}
                                <!-- </span> -->
                            @endif
                        @endforeach
                    </section>
                </div>

            </section>


        	<section class="row">
                
                <div class="columns small-12 medium-6 ">
                    

                    <section class="section__box">
                    <h3 class="content__title">Purchase Information</h3>
                        @if(auth::check())
                            
                                @if($sales_count == 0)
                                    <p>This product is still being perfected, please email us directly if you are interested in it, as we want to accomodate to your needs promptly.<br/>Regards,<br/>Selection Cafe</p>
                                @else
                                    <p><span class="content-link">Ideal amount:</span>&nbsp; &nbsp; {{$sales_data[0]->sales_amount}}</p>
                                    <p><span class="content-link">Ideal grams:</span>&nbsp; &nbsp; {{$sales_data[0]->total_recipe_grams}}g</p>
                                    <p><span class="content-link">Ideal cost:</span>&nbsp; &nbsp; $ {{$sales_data[0]->B2B_total_recipe_revenue}}</p><br/>

                                    <p><span class="content-link">Total grams per piece:</span>&nbsp; &nbsp; {{$sales_data[0]->total_grams_per_piece}}g</p>
                                    <p><span class="content-link">Total cost per piece:</span>&nbsp; &nbsp; ${{$sales_data[0]->B2B_sales_price}}</p>
                                    <hr>
                                    <p>All products are handmade to perfection, we are able to tailor this product to your specific requirements at no additional cost. 
                                    <!-- <br/>Our prices are formulated, so the cost to produce is 30%, ensuring you recieve the same value every time you purchase these delicious creations</p> -->
                                @endif

                        @else
                            <p>Please <a class="content-link" href="/login">Login</a> or <a class="content-link" href="/signup">create an account</a> to order your meal online</p>   
                        @endif
                        
                    </section>  	 
                </div> 
                <div class="columns small-12 medium-6">
                    <section class="section__box">
                        <!-- <p> Nutritional Panel is coming</p> -->
                        @if(Auth::check())
                            <h3 class="content__title">Little Extras</h3>
                            @foreach($recipe->MenuRecipesExtras as $rExtras)
                                <p>
                                    {{$rExtras->description}}
                                </p><br/>
                            @endforeach 
                        @else
                            <p>Please <a class="content-link" href="/login">Login</a> or <a class="content-link" href="/signup">create an account</a> to view more info about this menu item</p>
                        @endif
                    </section>  

                </div>
            </section>


            <!-- <section class="row"> 
        
                @foreach($recipe->Images as $image)
                    
                        <a href="#" class="columns small-4 large-2 end">
                            <div class="image-box">
                                <img class="image-box" src="/uploads/{{ $image->name }}" />
                            </div>
                        </a>
                     
                @endforeach
                
            </section> -->
            <!-- <section class="row">
                    <div class="columns small-12 "> 
                    @if(Auth::check())
                
                        <h3 class="content__title">Little Extras</h3>
                        <section class="section__box">
                            @foreach($recipe->MenuRecipesExtras as $rExtras)
                                <p>
                                    {{$rExtras->description}}
                                </p><br/>
                            @endforeach 
                        </section>
                    @else
                        <section class="section__box">
                            <p>Please <a class="content-link" href="/login">Login</a> or <a class="content-link" href="/signup">create an account</a> to view more info about this menu item</p>
                        </section>
                    @endif
                </div>            
            </section> -->
            <a href="/menu"><h3 class="content__title">{{$selection_title}}</h3></a>
            <div class="row content-boxes__wrapper content">
                <section class="row cousin__selection">
                    @foreach($sData as $recipe)
                        <div class="columns small-12 medium-6 large-4 xlarge-3 xxlarge-2 end">
                            <article class="content-box">
                                <div class="row collapse" id="recipe__row">                                   
                                    <a href="/recipe/{{$recipe->id}}" class="columns small-4 medium-12 tile__title end">
                                        <span class="tile__title--inner">{{$recipe->name}}</span>
                                        <img src="/uploads/{{ $sRecipe_image[$recipe->id] }}" />
                                    </a>
                                    <section class="columns small-8 medium-12 content-box__copy--wrapper">
                                        <div class="content-box__copy">
                                            <a href="/recipe/{{$recipe->id}}" class="content-box__copy__inner--recipe"><h5 class="content-box__title">{{$recipe->name}}</h5></a>
                                        </div>
                                    </section>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </section>
            </div>



            <div class="footer__push"></div> 
        </section>
    @endforeach  
  	</div><!--End Band Content-->
   
@stop

@section('_footer')

@stop


