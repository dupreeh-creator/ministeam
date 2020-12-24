<?php

use Illuminate\Support\Facades\Route;

Route::get('games',['uses'=>'\App\Http\Controllers\GamesController@ministeam','as'=>'ministeam']);
Route::get('/',[\App\Http\Controllers\GamesController::class, 'ministeam'])->name('ministeam');
//Begin registration
Route::get('/signup',[\App\Http\Controllers\AuthController::class, 'getSignUp'])->middleware('guest')->name('auth.signup');
Route::post('/signup',[\App\Http\Controllers\AuthController::class, 'postSignUp'])->middleware('guest');
//End

//Begin login
Route::get('/signin',[\App\Http\Controllers\AuthController::class, 'getSignIn'])->middleware('guest')->name('auth.signin');
Route::post('/signin',[\App\Http\Controllers\AuthController::class, 'postSignIn'])->middleware('guest') ;
//End

//Begin of Exit
Route::get('signout',[\App\Http\Controllers\AuthController::class, 'getSignOut'])->name('auth.signout');
//End

//Begin of search friends
Route::get('/search',[\App\Http\Controllers\SearchController::class, 'getResults'])->name('search.results');
//End

//Begin of viewing profile
Route::get('/user/{username}',[\App\Http\Controllers\ProfileController::class, 'getProfile'])->name('profile.index');
//End

//Begin of Editing profile
Route::get('/profile/edit',[\App\Http\Controllers\ProfileController::class, 'getEdit'])->middleware('auth')->name('profile.edit');
Route::post('/profile/edit',[\App\Http\Controllers\ProfileController::class, 'postEdit'])->middleware('auth')->name('profile.edit');
//end
Route::get('/profile/page',[\App\Http\Controllers\ProfileController::class, 'userPage'])->middleware('auth')->name('user.index');
//Begin of Viewing Friends
Route::get('/friends',[\App\Http\Controllers\FriendController::class, 'getIndex'])->middleware('auth')->name('friend.index');
//end

//Begin of Adding Friends
Route::get('/friends/add/{username}',[\App\Http\Controllers\FriendController::class, 'getAdd'])->middleware('auth')->name('friend.add');
//end

//Begin of Accepting Friends
Route::get('/friends/accept/{username}',[\App\Http\Controllers\FriendController::class, 'getAccept'])->middleware('auth')->name('friend.accept');
//end

//Begin of Delete Friends
Route::post('/friends/delete/{username}',[\App\Http\Controllers\FriendController::class, ' '])->middleware('auth')->name('friend.delete');
//end

Route::post('/status',[\App\Http\Controllers\StatusController::class, 'postStatus'])->middleware('auth')->name('status.post');
Route::post('/status/{statusId}/reply',[\App\Http\Controllers\StatusController::class, 'postReply'])->middleware('auth')->name('status.reply');
//Viewing of our cite
Route::get('games',['uses'=>'\App\Http\Controllers\GamesController@index','as'=>'allgames']);
//end

Route::get('/year/{yea}',['uses'=>'\App\Http\Controllers\GamesController@showYear','as'=>'yearGame']);
//Viewing by category RPG Games
Route::get('games/RPG',['uses'=>'\App\Http\Controllers\GamesController@RPGgames','as'=>'rpgGames']);
//end

//Viewing by category FPS Games
Route::get('games/FPS',['uses'=>'\App\Http\Controllers\GamesController@FPSGames','as'=>'fpsGames']);
//end

//Viewing by category Action Games
Route::get('games/Action',['uses'=>'\App\Http\Controllers\GamesController@ActionGames','as'=>'actionGames']);
//ends

//Viewing by category Action Games
Route::get('games/TCP',['uses'=>'\App\Http\Controllers\GamesController@TPSGames','as'=>'tcpGames']);
//ends

//Searching a game
Route::get('searchGame',['uses'=>'\App\Http\Controllers\SearchController@searchGame','as'=>'searchGame']);
//end
//add to cart
Route::get('games/addToCart/{id}',['uses'=>'\App\Http\Controllers\GamesController@addGameToCart','as'=>'AddToCartGame']);
//end

//типа показывает игры которые у тя в карте
Route::get('card',['uses'=>'\App\Http\Controllers\GamesController@showCard','as'=>'cardgames']);
//конец

//удаляешь с карты
Route::get('games/deleteGameFromCard/{id}',['uses'=>'\App\Http\Controllers\GamesController@deleteGameFromCard','as'=>'DeleteGameFromCard']);
//конец

//ну тип в в дб добавляешь
Route::get('games/createOrder/',['uses'=>'\App\Http\Controllers\GamesController@createOrder','as'=>'createOrder']);
//конец

//когда это закончиться??? Админ панель//
Route::get('admin/games',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@index','as'=>'AdminDisplayGames'])->middleware('restrictToAdmin');
//Begin Editing Game
Route::get('admin/editGameForm/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@editGameForm','as'=>'AdminEditGames']);
Route::post('admin/updateGame/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@updateGame','as'=>'AdminUpdate']);
//End

//Begin Updating Image For Game
Route::get('admin/editGameImageForm/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@editGameImageForm','as'=>'AdminEditImageForm']);
Route::post('admin/updateImage/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@updateGameImage','as'=>'AdminUpdateImage']);
//End

//Begin Creating Game
Route::get('admin/createGameForm',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@createGameForm','as'=>'AdminCreateGames']);
Route::post('admin/sendCreateGameForm',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@sendCreateGameForm','as'=>'AdminSendCreateGameForm']);
//End

//Begin Deleting Game
Route::get('admin/deleteGame/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminGamesController@deleteGame','as'=>'AdminDeleteGame']);
//end

//
Route::get('admin/users',['uses'=>'\App\Http\Controllers\Admin\AdminUsersController@index','as'=>'AdminDisplayUsers'])->middleware('restrictToAdmin');
Route::get('admin/editUsers/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminUsersController@editUsersForm','as'=>'AdminEditUsers']);
Route::post('admin/updateUsers/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminUsersController@updateUser','as'=>'AdminUpdateUser']);
Route::get('admin/editUserImageForm/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminUsersController@editUserImageForm','as'=>'AdminEditImageProfile']);
Route::post('admin/updateUserProfileImage/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminUsersController@updateUserProfileImage','as'=>'AdminUpdateImageProfile']);
Route::get('admin/deleteUser/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminUsersController@deleteUser','as'=>'AdminDeleteUser']);





Route::get('games/news',['uses'=>'\App\Http\Controllers\AnnouncementsController@index','as'=>'news']);
Route::get('games/news/{id}',['uses'=>'\App\Http\Controllers\AnnouncementsController@getNews','as'=>'getNews']);

Route::get('admin/news',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@index','as'=>'AdminDisplayNews'])->middleware('restrictToAdmin');

//Begin Editing News
Route::get('admin/editNewsForm/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@editNewsForm','as'=>'AdminEditNews']);
Route::post('admin/updateNews/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@updateNews','as'=>'AdminNewsUpdate']);
//End
//
////Begin Updating Image For Game
Route::get('admin/editNewsImageForm/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@editNewsImageForm','as'=>'AdminEditNewsImageForm']);
Route::post('admin/updateNewsImage/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@updateNewsImage','as'=>'AdminUpdateNewsImage']);
////End
//
////Begin Creating Game
Route::get('admin/createNewsForm',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@createNewsForm','as'=>'AdminCreateNews']);
Route::post('admin/sendCreateNewsForm',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@sendCreateNewsForm','as'=>'AdminSendCreateNewsForm']);
////End
//
////Begin Deleting Game
Route::get('admin/deleteNews/{id}',['uses'=>'\App\Http\Controllers\Admin\AdminAnnController@deleteNews','as'=>'AdminDeleteNews']);
////end
Route::get('searchNews',['uses'=>'\App\Http\Controllers\AnnouncementsController@searchNews','as'=>'searchNews']);
