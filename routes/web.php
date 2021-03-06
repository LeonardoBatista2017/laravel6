<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')
       ->namespace('Admin')
       ->group(function(){

        Route::put('plans/{url}','PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit','PlanController@edit')->name('plans.edit');
        Route::any('plans/search','PlanController@search')->name('plans.search');
        Route::get('plans/create','PlanController@create')->name('plans.create');
        Route::delete('plans/{url}','PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}','PlanController@show')->name('plans.show');
        Route::post('plans','PlanController@store')->name('plans.store');
        Route::get('plans','PlanController@index')->name('plans.index');
        
        
             /**
             * Home Dashboard
             */
            Route::get('/', 'PlanController@index')->name('admin.index');
       });

       
