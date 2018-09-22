<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/agents/new','AgentController@showNewAgentForm')->name('agents.new.show');
Route::get('/agents','AgentController@showAllAgents')->name('agents.show');
Route::get('/agents/{id}/remove','AgentController@removeAgent')->name('agents.remove');
Route::get('/agents/{id}/change','AgentController@showChangeAgentForm')->name('agents.change.show');
Route::post('/agents/{id}/change','AgentController@changeAgent')->name('agents.change.submit');
Route::post('/agents/create','AgentController@createNewAgent')->name('agents.new.submit');

Route::get('/categories/new','CategoryController@showNewCategoryForm')->name('categories.new.show');
Route::post('/categories/new','CategoryController@createNewCategory')->name('categories.new.submit');
Route::get('/categories','CategoryController@showCategories')->name('categories.show');
Route::get('/categories/{id}/remove','CategoryController@removeCategory')->name('categories.remove');
Route::get('/categories/{id}/change','CategoryController@showChangeCategoryForm')->name('categories.change.show');
Route::post('/categories/{id}/change','CategoryController@changeCategory')->name('categories.change.submit');

Route::get('/calls/agents',"CallController@showAllAgents")->name('calls.agents');
Route::get('calls/{id}/eval',"CallController@showCallEvaluationForm")->name('calls.eval.show');
Route::get('calls/{id}/details',"CallController@showAgentCalls")->name('calls.agent-calls');
Route::get('calls/{id}/full',"CallController@showCallDetails")->name('calls.call-details');
Route::get('reports/week',"ReportController@showWeekReportForm")->name('reports.week.show');
Route::get('reports/week/export',"ReportController@exportWeekReport")->name('reports.week.export');
Route::get('reports/month',"ReportController@showMonthReportForm")->name('reports.month.show');
Route::post('reports/month',"ReportController@generateMonthReport")->name('reports.month.submit');
Route::post('reports/week',"ReportController@generateWeekReport")->name('reports.week.submit');
Route::get('reports/extra',"ExtraEvalController@showExtraEvalForm")->name('reports.extra.show');
Route::post('reports/extra',"ExtraEvalController@submitExtraEvals")->name('reports.extra.submit');
Route::post('/calls/evaluate',"CallController@createNewCall")->name('calls.new.submit');
Route::get('/calls/{id}/remove','CallController@removeCall')->name('calls.remove');
