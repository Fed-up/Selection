<?php

class MenuController  extends BaseController {

	public function getMenu(){
		$savData = MenuRecipes::orderBy(DB::raw('RAND()'))->where('selection_active', '=', 1)->where('savoury', '=', 1)
			->with(array('MenuCategories' => function($query)
			{
				$query->where('menu_categories.active', '=', 1);
			}))
			
			->with(array('Images' => function($query){
				$query->where('images.ordering', '=', 0)->where('section', '=', 'RECIPE')->where('active', '=', 1);
			}))
		
		->get();

		$snaData = MenuRecipes::orderBy(DB::raw('RAND()'))->where('selection_active', '=', 1)->where('snack', '=', 1)
			->with(array('MenuCategories' => function($query)
			{
				$query->where('menu_categories.active', '=', 1);
			}))
			
			->with(array('Images' => function($query){
				$query->where('images.ordering', '=', 0)->where('section', '=', 'RECIPE')->where('active', '=', 1);
			}))
		
		->get();

		

		foreach ($savData as $sav) {
			$count = count($sav->MenuCategories);
			if($count > 0){
				$category[$sav->id] = $sav->MenuCategories;
			}else{
				$category[$sav->id] = '';
			}
			$count = count($sav->Images);
			if($count < 1){
				$sav_image[$sav->id] = 'recipe.png';
			}else{
				foreach($sav->Images as $image){
			        if(file_exists('uploads/'.$image->name)){
			            $sav_image[$sav->id] = $image->name;
			        }else{
			           	$sav_image[$sav->id] = 'recipe.png';
			        }
				}
			}
		}

		foreach ($snaData as $sna) {
			$count = count($sna->MenuCategories);
			if($count > 0){
				$category[$sna->id] = $sna->MenuCategories;
			}else{
				$category[$sna->id] = '';
			}
			$count = count($sna->Images);
			if($count < 1){
				$sna_image[$sna->id] = 'recipe.png';
			}else{
				foreach($sna->Images as $image){
			        if(file_exists('uploads/'.$image->name)){
			            $sna_image[$sna->id] = $image->name;
			        }else{
			           	$sna_image[$sna->id] = 'recipe.png';
			        }
				}
			}
		}
		

		return View::make('public.menu')->with(array(
			'savData' => $savData,
			'savImage' => $sav_image,
			'snaData' => $snaData,
			'snaImage' => $sna_image,
			'category' => $category,
			)
		);

	}
}
