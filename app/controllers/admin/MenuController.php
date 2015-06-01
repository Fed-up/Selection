<?php
class Admin_MenuController extends BaseController{

	public function getMenu(){
		$recipes = MenuRecipes::where('selection_active', '!=', 9)->orderBy('name','ASC')->get();
		$savoury = MenuRecipes::where('savoury', '=', 1)->orderBy('name','ASC')->get();
		$snack = MenuRecipes::where('snack', '=', 1)->orderBy('name','ASC')->get();
		$dessert = MenuRecipes::where('dessert', '=', 1)->orderBy('name','ASC')->get();
		$refreshment = MenuRecipes::where('refreshment', '=', 1)->orderBy('name','ASC')->get();
		$title = 'Cafe Menu';


		print_r($tab_data);exit;
		
		if(isset($tab_data)){
			exit;
			switch(true)
			{
			    
			    case ($tab_data == 1):
			        echo "sav1";exit;
			        break;
			    case ($tab_data == 2):
			        echo "sna";exit;
			        break;
			    case ($tab_data == 3):
			        echo "des";exit;
			        break;
			    case ($tab_data == 4):
			        echo "ref";exit;
			        break;
			    default:
			        echo "sav";exit;
			        break;
			}
		}
		// 


		// ($tab_data == 'sav')? print_r($tab_data) : '' ;
		// ($tab_data == 'sna')? print_r($tab_data) : '' ;
		// ($tab_data == 'des')? print_r($tab_data) : '' ;
		// ($tab_data == 'ref')? print_r($tab_data) : '' ;
		// exit;
		return View::make('admin.menu.index')
			->with(array( 
				'recipes' => $recipes,
				'savoury' => $savoury,
				'snack' => $snack, 
				'dessert' => $dessert,
				'refreshment' => $refreshment,
				'title' => $title,
				'tab_data' => 'des',
			));
	}

	public function getSavoury($id){
		$data = MenuRecipes::findOrFail($id);
		$data->savoury  = ($data->savoury == 0) ? 1 : 0;
		$data->save();
		$tab_data = 1;
		return Redirect::action('Admin_MenuController@getMenu')
		->with(array(
			'tab_data' => $tab_data, 
		));
	}

	public function getSnack($id){
		$data = MenuRecipes::findOrFail($id);
		$data->snack  = ($data->snack == 0) ? 1 : 0;
		$data->save();
		$tab_data = 2;
		return Redirect::action('Admin_MenuController@getMenu')
		->with(array(
			'tab_data' => $tab_data, 
		));
	}
	
	public function getDessert($id){
		$data = MenuRecipes::findOrFail($id);
		$data->dessert  = ($data->dessert == 0) ? 1 : 0;
		$data->save();
		$tab_data = 3;
		return Redirect::action('Admin_MenuController@getMenu')
		->with(array(
			'tab_data' => $tab_data, 
		));
	}

	public function getRefreshment($id){
		$data = MenuRecipes::findOrFail($id);
		$data->refreshment  = ($data->refreshment == 0) ? 1 : 0;
		$data->save();
		$tab_data = 4;
		return Redirect::action('Admin_MenuController@getMenu')
		->with(array(
				'tab_data' => $tab_data, 
		));
	}
}



