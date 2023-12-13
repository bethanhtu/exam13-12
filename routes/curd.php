<?php

use App\Http\Controllers\Categories;
use App\Http\Controllers\Figures;
use Illuminate\Support\Facades\Route;

     Route::prefix('/admin')->group(function (){

        Route::prefix('/category')->group(function(){
            Route::get('/', [Categories::class, 'list'])->name('admin.category.list');
            Route::post('/add',[Categories::class,'add'])->name('admin.category.add');
            Route::post('/edit',[Categories::class,'edit'])->name('admin.category.edit');
            Route::get('/delete/{id}',[Categories::class,'delete'])->name('admin.category.delete');
        });

        Route::prefix('/figures')->group(function(){
            Route::get('/', [Figures::class, 'list'])->name('admin.figures.list');
            Route::get('/add', [Figures::class, 'doAdd'])->name('admin.figures.doAdd');
            Route::post('/add',[Figures::class,'add'])->name('admin.figures.add');
            Route::get('/edit/{id}',[Figures::class, 'doEdit'])->name('admin.figures.doEdit');
            Route::post('/edit',[Figures::class, 'edit'])->name('admin.figures.edit');
            Route::get('/delete/{id}',[Figures::class,'delete'])->name('admin.figures.delete');
        });
   });


        