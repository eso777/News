<?php
Route::get('admin/login' , 'LoginCtrl@getShowAdmin') ;
Route::post('admin/login' , 'LoginCtrl@postAdminLogin') ;
Route::get('admin/logout' , 'LoginCtrl@adminLogout') ;
	

Route::group(['prefix' => 'admin', 'middleware'=>'authAdmin'], function() {
	
	// Get Layout Page .
	Route::get('/',function()
	{
		return View('admin.layout');
	});	

	// Start Admins Area .
	Route::resource('admins' , 'AdminsCtrl') ;
	// End Admins Area .

	// Start Sections Area.
	Route::resource('sections' , 'SectionsCtrl') ;
	// End Sections Area.

	// Start Journalists-accounts Area .
	Route::resource('Journalists/acc','JournalistsAccCtrl') ;
	Route::get('disableJour/{id}','JournalistsAccCtrl@statusUsers') ;
	// End Journalists-accounts Area .
	
	//breaking-news
	Route::resource('breaking-news','breakingNewsCtrl') ;
	//breaking-news

	// pricing .
	Route::resource('pricing','PricingCtrl') ;
	// pricing .

	// Pages .
	Route::resource('pages','PagesCtrl') ;
	// Pages .

	// Photos .
	Route::resource('photos','PhotosCtrl') ;
	// Photos .
	

	
}); 
