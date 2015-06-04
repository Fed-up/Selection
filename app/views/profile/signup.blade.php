@extends('tmpl.public')

@section('__header') 
@stop  

@section('content')   
<div class="band page">
	<nav class=" subnav subnav--centre">
	    <h2 class="content__title--main"><a class="plain__header__link" href="/">Hello!! Get excited, healthy desserts are near..</a></h2>
	</nav>
	<div class="container row"> <!--Sign up section-->
		<section class="content__page--sub"> 
			<section class="columns small-12 medium-8 medium-push-2 large-6 large-pull-0 xlarge-4">
				<div class="section section--form" >
				  	<!-- <h1 class="page-header">@yield('title')</h1> -->
				    	@if(isset($data->id))
				  			{{ Form::open(array('action' => 'UserProfileController@postUpdateMembers', 'class' => 'form-horizontal')) }}
				        @else
				        	{{ Form::open(array('action' => 'UserProfileController@postAddUser', 'class' => 'form-horizontal')) }} 
				        @endif
				        <h2 class="content__title--main--signup">Create a free account<br/> Join us Today =)</h2> 
			         	<div class="form-group {{ ($errors->has('fname')) ? 'has-error' : '' ; }}">
				        	{{ Form::label('fname', 'First Name: ', array('class' => ' content-title--sub ')) }}
				            <div class="">
				                {{ ($errors->has('fname'))? '<p>'. $errors->first('fname') .'</p>' : '' }}
				                {{ Form::text('fname', (isset($input['fname'])? Input::old('fname') : (isset($data->fname)? $data->fname : '' )), array('class' => 'input__text')) }} 
				            </div>
				        </div>
			            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' ; }}">
				            {{ Form::label('email', 'Email: ', array('class' => ' content-title--sub ')) }}
				            <div class="">
				                {{ ($errors->has('email'))? '<p>'. $errors->first('email') .'</p>' : '' }}
				                {{ Form::text('email', (isset($input['email'])? Input::old('email') : (isset($data->email)? $data->email : '' )), array('class' => 'input__text')) }} 
				            </div>
				        </div>
			            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' ; }}">
			            	{{ Form::label('password', 'Password: ', array('class' => ' content-title--sub ')) }}
			                <div class="">
			                    {{ ($errors->has('password'))? '<p>'. $errors->first('password') .'</p>' : '' }}
			                    {{ Form::password('password', array('class'=>'input__text' ) ) }}
			                </div>
			            </div>
			            <div class="form-group {{ ($errors->has('password_match')) ? 'has-error' : '' ; }}">
			            	{{ Form::label('password_match', 'Password Match: ', array('class' => ' content-title--sub ')) }}
			                <div class="">
			                    {{ ($errors->has('password_match'))? '<p>'. $errors->first('password_match') .'</p>' : '' }}
			                    {{ Form::password('password_match', array('class'=>'input__text' ) ) }}
			                </div>
			            </div>
			        
			      	
				        <div class="form-group">
				            <div class="form__buttons">
					            <a href="/">
					                {{ Form::button('Cancel' ,array('class' => 'form__button--sub form__button--sub--signup')) }}
					            </a>
					            {{ Form::submit('Join', array('class' => 'side__login__button side__login__button--signup')) }}
				            
				            </div>
				        </div>
					{{ Form::close() }}      	
				</div>
			</section>
			<section class="columns show-for-large-up large-6 large xlarge-8">
				<div class="section section--form" >
					<h3 class="content__title--main">Welcome to Selection Cafe</h3>
					<p class="content__sub__heading">We are on a mission to provide you with nutritious foods and quick service</p>
					<ul class="promo__list__ul">
						<li class="promo__list">Join today for free!! </li>
						<li class="promo__list">Order online =)</li>
						<li class="promo__list">Receive the latest news and updates about Selection Cafe</li>
						<li class="promo__list">Get early bird discounts to all future events</li>
						<li class="promo__list">Be the first to recieve free eBooks</li>
					</ul>
				</div>
			</section>
			<div class="footer__push"></div>
		</section>
	</div>
</div> 

@stop