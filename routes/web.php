<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewPageController;
use App\Http\Controllers\ItemPageController;
use App\Http\Controllers\IndexController;
use Illuminate\Database\Eloquent\Model;
use App\Models\stock as stocks;
use App\Models\sell as sells;
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

Route::get('/welcome', function () {
    return view('user.first');
});
// Route::get('/welcome1', function () {
//     return view('user.register');
// });

Route::get('/message', function () {
    return view('admin.add_form');
});

Route::get('/', [IndexController::class , 'indexPage']);
Route::get('/products', [IndexController::class , 'indexPage']);
Route::get('/profile', [ViewPageController::class , 'profilePage']);
Route::get('/change_password', [ViewPageController::class , 'changePassword']);
Route::post('/change_password_data', [ItemPageController::class , 'chancePassword']);
Route::get('/signin', [IndexController::class , 'viewLoginPage'])->name('signIn');
Route::get('/registration', [IndexController::class , 'viewRegisterPage']);
Route::get('/posts', [IndexController::class , 'postPage']);
Route::get('/add_item', [ViewPageController::class , 'addItemPage'])->name('add_item');
Route::post('/add_item_data', [ItemPageController::class , 'addItem']);

Route::get('/view_item', [ViewPageController::class , 'viewItemPage'])->name('view_item');

Route::post('/update_item_data', [ItemPageController::class , 'updateItem']);
Route::get('/update_item/{id}', [ViewPageController::class , 'updateItemPage']);

Route::post('/delete_item_data', [ItemPageController::class , 'deleteItem']);
Route::get('/delete_item/{id}', [ViewPageController::class , 'deleteItemPage']);

Route::get('/sell_item', [ViewPageController::class , 'sellItemPage'])->name('sell_item');
Route::post('/sell_item_data', [ItemPageController::class , 'sellItem']);
Route::post('/sell_item_data_sample', [ItemPageController::class , 'sellItemSample']);

Route::get('/view_history', [ViewPageController::class , 'sellHistoryItemPage'])->name('view_history');
Route::get('/update_sell_item/{id}', [ViewPageController::class , 'updateSellItemPage']);
Route::post('/update_sell_item_data', [ItemPageController::class , 'updateSellItem']);

Route::get('/delete_sell_item/{id}', [ViewPageController::class , 'deleteSellItemPage']);
Route::post('/delete_sell_item_data', [ItemPageController::class , 'deleteSellItem']);

Route::get('/track_item', [ViewPageController::class , 'trackHistoryItemPage'])->name('track_history');
Route::post('/track_history_data', [ItemPageController::class , 'trackSellItem']);

Route::get('/view_users', [ViewPageController::class , 'userViewPage'])->name('view_users');
Route::get('/view_post_only/{id}', [ViewPageController::class , 'viewRequestPostPage']);
Route::get('/assign_user_role/{id}', [ViewPageController::class , 'getUserRole']);
Route::post('/update_user_role_data', [ItemPageController::class , 'updateUserRole']);

Route::get('/delete_user/{id}', [ViewPageController::class , 'deleteUser']);
Route::post('/delete_user_data', [ItemPageController::class , 'deleteUser']);

Route::get('/view_comment', [ViewPageController::class , 'commentViewPage'])->name('view_comment');
Route::get('/view_user_comment', [ViewPageController::class , 'commentUserViewPage'])->name('view_user_comment');
Route::get('/edit_comment_status/{type}/{id}', [ViewPageController::class , 'editCommentStatus']);

Route::get('/delete_comment/{type}/{id}', [ViewPageController::class , 'deleteCommentStatus']);
Route::post('/delete_comment_status_data', [ItemPageController::class , 'deleteComment']);

Route::get('/view_post', [ViewPageController::class , 'postViewPage'])->name('view_post');
Route::get('/view_user_post', [ViewPageController::class , 'postUserViewPage'])->name('view_user_post');
Route::get('/edit_post_status/{type}/{id}', [ViewPageController::class , 'editPostViewPage']);
Route::get('/delete_post/{type}/{id}', [ViewPageController::class , 'deletePostViewPage']);

Route::get('/create_post', [ViewPageController::class , 'createPostViewPage'])->name('create_post');
Route::post('/update_post_data', [ItemPageController::class , 'updatePost']);
Route::get('/edit_post/{type}/{id}', [ViewPageController::class , 'editNewPostViewPage']);

Route::post('/create_post_data', [ItemPageController::class , 'createPost']);
Route::post('/update_post_status_data', [ItemPageController::class , 'updatePostStatus']);
Route::post('/delete_post_data', [ItemPageController::class , 'deletePost']);
Route::post('/mass_update_comment/{type}', [ItemPageController::class , 'massUpdateComment']);

Route::get('/view_logs', [ItemPageController::class , 'userLog']);
Route::post('/get_user_logs', [ItemPageController::class , 'userLog']);
Route::get('/view_user_log', [ViewPageController::class , 'userLogsViewPage']);

Route::post('/like_unlike_post', [ItemPageController::class , 'likeUnlikePost']);
Route::post('/add_comment_to_post', [ItemPageController::class , 'addCommentPost']);

Route::post('/send_message_to_user', [ItemPageController::class , 'sendMessage']);

Route::get('/create_send_mail/{id?}/{reply?}', [ViewPageController::class , 'viewSendMailPage']);
Route::get('/view_inbox_mail', [ViewPageController::class , 'viewInboxMailPage'])->name('inbox_mail');
Route::post('/read_unread_trash', [ItemPageController::class , 'readUnreadInbox']);
Route::get('/view_sent_mail', [ViewPageController::class , 'viewSentMailPage']);
Route::get('/view_trash_mail', [ViewPageController::class , 'viewTrashMailPage']);
Route::get('/open_inbox_mail/{id}', [ViewPageController::class , 'viewInboxSingleMailPage']);

Route::get('/logOut', [IndexController::class , 'appLogout'])->name('signOut');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





