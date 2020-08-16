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

Route::get('/', 'HomeController@index');

Route::get('about-us', 'HomeController@AboutUs')->name('aboutus');
Route::get('give', 'HomeController@Give')->name('give');
Route::get('new-life-christ', 'HomeController@DownlNewLife')->name('newlifechrist');
Route::get('downloads', 'HomeController@Download')->name('downloads');
Route::get('mission', 'HomeController@Mission')->name('mission');
Route::get('location-direction', 'HomeController@Direction')->name('direction');
Route::get('welcome-to-church', 'HomeController@Welcome')->name('welcome');
Route::get('new-here', 'HomeController@NewHere')->name('newhere');
Route::get('service-time', 'HomeController@ServiceTime')->name('servicetime');
Route::get('events', 'HomeController@Events')->name('events');
Route::get('store', 'HomeController@OurStore')->name('store');
Route::get('store/{slug}', 'HomeController@showStore')->name('store.show');
Route::get('contact-us', 'HomeController@Contact')->name('contact');
Route::get('church-happenings/{slug}', 'HomeController@ChurchHappening')->name('church.happenings');
Route::get('event/{slug}', 'HomeController@EventDetails')->name('event.details');
Route::get('privacy-policy', 'HomeController@Privacy')->name('privacy');
Route::get('terms-of-use', 'HomeController@Terms')->name('terms');
Route::get('prayers-lists', 'HomeController@Prayers')->name('prayers');
Route::get('gallery', 'HomeController@Gallery')->name('gallery');
Route::get('home-cell', 'HomeController@HomeCell')->name('homecell');
Route::get('volunteer-team', 'HomeController@VolunteerTeam')->name('volunteer');
Route::get('more-resources', 'HomeController@Resources')->name('resources');

Route::get('all-books', 'HomeController@Books')->name('books');
Route::get('all-series', 'HomeController@sERIES')->name('series');
Route::get('all-gifts', 'HomeController@Gifts')->name('gifts');


Route::get('connect', 'HomeController@Connect')->name('connect');
Route::get('sermons', 'HomeController@Sermon')->name('sermon');
Route::get('sermon/{slug}', 'HomeController@SermonDetails')->name('sermon.details');

//blog
Route::get('blogs', ['uses' => 'PostController@getIndex', 'as' => 'blog.index']);
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'PostController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::post('/blog/comment/{id}', 'PostController@blogComments')->name('blog.comment');

Route::get('/blog/categories/{slug}', 'PostController@blogCategories')->name('blog.categories');
Route::get('/blog/tags/{slug}', 'PostController@blogTags')->name('blog.tags');
Route::get('/blog/author/{username}', 'PostController@blogAuthor')->name('blog.author');

//error psge routes***
route::get('404', ['as'=> '404', 'uses' =>
'ErrorController@notfound']);
route::get('500', ['as'=> '505', 'uses' =>
'ErrorController@fatal']);

Route::get('/search', 'HomeController@search')->name('search');

Route::post('contact-us-post', [
    'uses'  =>  'HomeController@postMessage',
    'as'    =>  'site.contact.post'
]);


Route::post('newsletter-post', [
    'uses'  =>  'HomeController@postNews',
    'as'    =>  'news.letter.post'
]);

Route::post('new-here', [
    'uses'  =>  'HomeController@NewherePost',
    'as'    =>  'new.here.post'
]);

Route::post('prayer-request', [
    'uses'  =>  'HomeController@RequestPrayer',
    'as'    =>  'prayer.request.post'
]);

Route::post('join-home-cell', [
    'uses'  =>  'HomeController@JoinHomecell',
    'as'    =>  'homecell.post'
]);

Route::post('join-volunteer', [
    'uses'  =>  'HomeController@BecomeVolunteer',
    'as'    =>  'volunteer.post'
]);



//Cart routes ***
Route::get('checkout', 'CartController@Checkout')->name('checkout');
Route::get('cart', 'CartController@cart')->name('cart');
Route::get('cart/add/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('cart/update/{id}/{qty}', 'CartController@updateCart')->name('cart.update');
Route::get('cart/delete/{id}', 'CartController@cartDelete')->name('cart.delete');
Route::get('cart/save/{id}', 'CartController@Savecart')->name('cart.save');
Route::get('cart/restore/{id}', 'CartController@restoreCart')->name('cart.restore');

//checkout routes ***
Route::get('/pay-with-card', 'CheckoutController@payWithCard')->name('paywithcard');
Route::get('/payonpickup', 'CheckoutController@payOnPickup')->name('payonpickup');
Route::get('/payondelivery', 'CheckoutController@payOnDelivery')->name('payondelivery');
Route::get('/pay-with-wallet', 'CheckoutController@payWithWallet')->name('paywithwallet');
Route::get('/pay-withcard-guest', 'CheckoutController@payWithCardGuest')->name('paywithcardguest');


// Admin Login Routes ***
Route::prefix('admin')->group(function () {
    Route::get('/login', 'admin\AdminLoginController@login')->name('admin.login');
    Route::get('/logout', 'admin\AdminLoginController@logout')->name('admin.logout');
    Route::post('/login', 'admin\AdminLoginController@loginAdmin')->name('admin.login.submit');
    Route::get('cms', 'admin\AdminController@adminIndex')->name('cms.index');
});

Route::prefix('cms')->group(function () {

//    ***pages routes**

    Route::get('user/list', 'admin\AdminController@UserList')->name('cms.users');
    Route::get('home-intro', 'admin\AdminController@Homeintro')->name('cms.homeintro');
    Route::get('about', 'admin\AdminController@AdminAbout')->name('cms.about');
    Route::get('sliders', 'admin\AdminController@AdminSliders')->name('cms.sliders');
    Route::get('volunteers', 'admin\AdminController@AdminVolunteer')->name('cms.volunteers');
    Route::get('pending-volunteers', 'admin\AdminController@AdminPendingVolunteer')->name('cms.pendingvolunteers');
    Route::get('prayer/requests', 'admin\AdminController@PrayerRequest')->name('cms.prayerrequests');
    Route::get('prayer/list', 'admin\AdminController@PrayerList')->name('cms.prayerlist');
    Route::get('faqs', 'admin\AdminController@AdminFaq')->name('cms.faqs');
    Route::get('gallery', 'admin\AdminController@AdminGallery')->name('cms.gallery');
    Route::get('privacy-policy', 'admin\AdminController@AdminPrivacy')->name('cms.privacy');
    Route::get('Terms-of-use', 'admin\AdminController@AdminTermsofUse')->name('cms.terms');
    Route::get('contact', 'admin\AdminController@AdminContact')->name('cms.contact');
    Route::put('team/{id}', 'admin\AdminController@teamupdate')->name('cms.team.update');
    Route::get('team/{id}', 'admin\AdminController@teamshow');
    Route::get('church/stories', 'admin\AdminController@ChurchStories')->name('cms.churchstories');
    Route::get('churchstories/{id}', 'admin\AdminController@ChurchStoriesshow');
    Route::put('churchstories/{id}', 'admin\AdminController@ChurchstoriesUpdate')->name('cms.churchstories.update');



    // **action routes


    Route::put('pendingvolunteer/{id}', 'admin\AdminController@Pendingvolunteerupdate')->name('cms.pendingvolunteer.update');
    Route::get('pendingvolunteer/{id}', 'admin\AdminController@pendingvolunteerShow');
    Route::put('pendingfeedbacks/{id}', 'admin\AdminController@Pendingfeedbacksupdate')->name('cms.pendingfeedbacks.update');
    Route::get('pendingfeedbacks/{id}', 'admin\AdminController@pendingfeedbacksShow');
    Route::put('upcomingevent/{id}', 'admin\AdminController@UpcomingEventUpdate')->name('cms.upcoming.update');
    Route::get('upcomingevent/{id}', 'admin\AdminController@UpcomingEventshow');
    Route::put('faqs/{id}', 'admin\AdminController@FaqUpdate')->name('cms.faqs.update');
    Route::get('faqs/{id}', 'admin\AdminController@Faqshow');
    Route::get('about/{page}/{id}', 'admin\AdminController@show')->name('cms.show');
    Route::post('about/{page}', 'admin\AdminController@store')->name('cms.store');

    Route::get('delete/{page}/{id}', 'admin\AdminController@destroy')->name('cms.destroy');



    Route::get('sitesettings', 'admin\AdminController@site_configuration')->name('cms.settings');
    Route::put('site-settings', 'admin\AdminController@site_configuration_update')->name('cms.site-settings.update');
    Route::put('slider/{slider}', 'admin\AdminController@sliders')->name('admin.slider.update');
    Route::get('delete/{slider}', 'admin\AdminController@deleteslider')->name('admin.slider.delete');
    Route::get('explore/{page}/{id}', 'admin\AdminController@show')->name('cms.show');
    Route::put('explore/{page}/{id}', 'admin\AdminController@update')->name('cms.update');

});


        //create user routes ***
        Route::redirect('users', 'users/index', 301);
        Route::get('all/roles', 'admin\AdminController@roles')->name('cms.user.roles');
        Route::post('roles', 'admin\AdminController@createRole')->name('cms.roles.store');
        Route::post('roles/roles/permissions/update', 'admin\AdminController@permissionUpdate')->name('cms.roles.permissions.update');
        Route::get('users/index', 'admin\AdminController@allUsers')->name('cms.users.index');
        Route::post('users/store', 'admin\AdminController@createAccount')->name('cms.users.store');
        Route::get('users/edit/{id}', 'admin\AdminController@editAccount')->name('cms.users.edit');
        Route::put('users/update', 'admin\AdminController@updateAccount')->name('cms.users.update');
        Route::get('users/delete/{id}', 'admin\AdminController@deleteAccount')->name('cms.users.delete');
        Route::get('roles/delete/{id}', 'admin\AdminController@roleDestroy')->name('roles.delete');

Auth::routes();


