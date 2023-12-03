<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\AdministrativeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// Recipe routes --------------------------------------------------------------------------------------------------------

// All Recipes
Route::get('/', [RecipeController::class, 'index']);

// Delete Recipe
Route::delete('/recipes/{recipe}/recordings/{recording}', [RecordingController::class, 'destroy'])->middleware('auth');

// Show Recipe Creation Form
Route::get('/recipes/create/{group}', [RecipeController::class, 'create'])->middleware('auth')->middleware('editor');

// Store Recipe Data
Route::post('/recipes/store/{group}', [RecipeController::class, 'store'])->middleware('auth')->middleware('editor');

// Show Recipe Edit Form
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->middleware('auth')->middleware('editor');

// Update Recipe
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->middleware('auth')->middleware('editor');

// Delete Recipe
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->middleware('auth')->middleware('editor');

// Single Recipe
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

// Recording routes -----------------------------------------------------------------------------------------------------

// Store Recipe Recording Data
Route::post('/recipes/{recipe}/recordings', [RecordingController::class, 'store'])->middleware('auth')->middleware('editor');

// Show Recipe Recording Creation Form
Route::get('/recipes/{recipe}/recordings/create', [RecordingController::class, 'create'])->middleware('auth')->middleware('editor');

// Show secipe recording edit Form
Route::get('/recipes/{recipe}/recordings/{recording}/edit', [RecordingController::class, 'edit'])->middleware('auth')->middleware('editor');

// Update recipe recording
Route::put('/recipes/{recipe}/recordings/{recording}', [RecordingController::class, 'update'])->middleware('auth')->middleware('editor');

// User routes ----------------------------------------------------------------------------------------------------------

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// All Users
Route::get('/users', [UserController::class, 'index']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show all groups
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Group routes ---------------------------------------------------------------------------------------------------------

// Manage your groups
Route::get('/groups/manage', [GroupController::class, 'manage'])->middleware('auth');

// Show all groups
Route::get('/groups', [GroupController::class, 'index']);

// Show Group Create Form
Route::get('/groups/create', [GroupController::class, 'create'])->middleware('auth')->middleware('admin');

// Store Group Data
Route::post('/groups', [GroupController::class, 'store'])->middleware('auth')->middleware('admin');

Route::post('/groups/{group_id}/join', [GroupController::class, 'join'])->middleware('auth');

Route::post('/groups/{group_id}/leave', [GroupController::class, 'leave'])->middleware('auth');

// Show Group Edit Form
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->middleware('auth')->middleware('editor');

// Update Group
Route::put('/groups/{group}', [GroupController::class, 'update'])->middleware('auth')->middleware('editor');

// Delete Group
Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->middleware('auth')->middleware('editor');

// Administrative routes ------------------------------------------------------------------------------------------------

// Administrative dashboard
Route::get('/admin/dashboard', [AdministrativeController::class, 'dashboard'])->middleware('auth')->middleware('admin');

Route::get('/admin/create', [AdministrativeController::class, 'create'])->middleware('auth')->middleware('admin');

Route::post('/admin', [AdministrativeController::class, 'store'])->middleware('auth')->middleware('admin');