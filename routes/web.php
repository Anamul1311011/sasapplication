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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/makestoragelink', 'HomeController@makestoragelink')->name('');
Route::get('/add/coupon', 'HomeController@addcoupon');
Route::post('/coupon/insert', 'HomeController@insertcoupon');




//Admin Dashboard route
Route::get('/dashboard', 'DashboardController@dashboard')->name('');


//Admin Setting Route
Route::get('/admin/setting', 'DashboardController@admin_setting')->name('admin_setting');
Route::post('/admin/setting/update', 'DashboardController@update_users')->name('update_users');


/////Team members routes///////////////
Route::get('/team/members', 'DashboardController@team_members')->name('team_members');
Route::post('/team/members/insert', 'DashboardController@insert_members')->name('insert_members');
Route::post('/team/members/update', 'DashboardController@update_members')->name('update_members');
Route::get('/team/members/delete/{id}', 'DashboardController@delete_members')->name('delete_members');


//Admin Settings Routes//////////////////////////////////
Route::get('/settings/view','DashboardController@settings')->name('settings');
Route::post('/settings/insert','DashboardController@insert_settings')->name('insert_settings');
Route::post('/settings/update','DashboardController@update_settings')->name('update_settings');
Route::get('/settings/delete/{id}','DashboardController@delete_settings')->name('delete_settings');


//Admin Section Type Routes//////////////////////////////
Route::get('/section','DashboardController@sections')->name('sections');
Route::post('/section/insert','DashboardController@insert_sections')->name('insert_sections');
Route::post('/section/update','DashboardController@update_sections')->name('update_sections');
Route::get('/section/delete/{id}','DashboardController@delete_section')->name('delete_section');


//Admin Partners Routes
Route::get('/partners','DashboardController@partners')->name('partners');
Route::post('/partners/insert','DashboardController@insert_partners')->name('insert_partners');
Route::post('/partners/update','DashboardController@update_partners')->name('update_partners');
Route::get('/partners/delete/{id}','DashboardController@delete_partners')->name('delete_partners');



//////////Awesome Applications Routes/////////////////////////
Route::get('/awesomeApplications','FrontendController@awesome_applications')->name('awesome_applications');
Route::post('/awesomeApplications/insert','FrontendController@insert_awesome_applicatins')->name('insert_awesome_applicatins');
Route::post('/awesomeApplications/update','FrontendController@update_awesome_applicatins')->name('update_awesome_applicatins');
Route::get('/awesomeApplications/delete/{id}','FrontendController@delete_awesome_application')->name('delete_awesome_application');


////////Unique Services Routes////////////////////
Route::get('/uniqueServices','FrontendController@unique_services')->name('unique_services');
Route::post('/uniqueServices/insert','FrontendController@insert_unique_services')->name('insert_unique_services');
Route::post('/uniqueServices/update','FrontendController@update_unique_services')->name('update_unique_services');
Route::get('/uniqueServices/delete/{id}','FrontendController@delete_unique_services')->name('delete_unique_services');
//
Route::get('/uniqueServices/features','FrontendController@unique_services_features')->name('unique_services_features');
Route::post('/uniqueServices/features/insert','FrontendController@insert_unique_services_features')->name('insert_unique_services_features');
Route::post('/uniqueServices/features/update','FrontendController@update_unique_services_features')->name('update_unique_services_features');
Route::get('/uniqueServices/features/delete/{id}','FrontendController@delete_unique_services_features')->name('delete_unique_services_features');






//Development Applicatins Routes////////
Route::get('/developmentApplications','FrontendController@development_apps')->name('development_apps');
Route::post('/developmentApplications/insert','FrontendController@insert_development_applications')->name('insert_development_applications');
Route::post('/developmentApplications/update','FrontendController@update_development_applications')->name('update_development_applications');
Route::get('/developmentApplications/delete/{id}','FrontendController@delete_development_applications')->name('delete_development_applications');



//Multipurpose applications Routes///////
Route::get('/multipurposeApplications','FrontendController@multipurpose_apps')->name('multipurpose_apps');
Route::post('/multipurposeApplications/insert','FrontendController@insert_multipurpose_applications')->name('insert_multipurpose_applications');
Route::post('/multipurposeApplications/update','FrontendController@update_multipurpose_applications')->name('update_multipurpose_applications');
Route::get('/multipurposeApplications/delete/{id}','FrontendController@delete_multipurpose_applications')->name('delete_multipurpose_applications');




//Stunning applications Routes///////
Route::get('/stunningApplications','FrontendController@stunning_apps')->name('stunning_apps');
Route::post('/stunningApplications/insert','FrontendController@insert_stunning_applications')->name('insert_stunning_applications');
Route::post('/stunningApplications/update','FrontendController@update_stunning_applications')->name('update_stunning_applications');
Route::get('/stunningApplications/delete/{id}','FrontendController@delete_stunning_applications')->name('delete_stunning_applications');



//Stunning applications Routes///////
Route::get('/latestTechnologies','FrontendController@latest_technologies')->name('latest_technologies');
Route::post('/latestTechnologies/insert','FrontendController@insert_latest_technologies')->name('insert_latest_technologies');
Route::post('/latestTechnologies/update','FrontendController@update_latest_technologies')->name('update_latest_technologies');
Route::get('/latestTechnologies/delete/{id}','FrontendController@delete_latest_technologies')->name('delete_latest_technologies');



//On Sale applications Routes///////
Route::get('/onsaleApplications','FrontendController@sale_applications')->name('sale_applications');
Route::post('/onsaleApplications/insert','FrontendController@insert_sale_applications')->name('insert_sale_applications');
Route::post('/onsaleApplications/update','FrontendController@update_sale_applications')->name('update_sale_applications');
Route::get('/onsaleApplications/delete/{id}','FrontendController@delete_sale_applications')->name('delete_sale_applications');



////Frontend faq routes////////////////
Route::get('/frontend_faq_categories','FrontendController@frontend_faq_categories')->name('frontend_faq_categories');
Route::post('/frontend_faq_categories/insert','FrontendController@insert_frontend_faq_category')->name('insert_frontend_faq_category');
Route::post('/frontend_faq_categories/update','FrontendController@update_frontend_faq_category')->name('update_frontend_faq_category');
//
Route::get('/frontend_faqs','FrontendController@frontend_faqs')->name('frontend_faqs');
Route::post('/frontend_faqs/insert','FrontendController@insert_frontend_faqs')->name('insert_frontend_faqs');
Route::post('/frontend_faqs/update','FrontendController@update_frontend_faqs')->name('update_frontend_faqs');
Route::get('/frontend_faqs/delete/{id}','FrontendController@delete_frontend_faq')->name('delete_frontend_faq');


/////////////Admin About Us Routes////////////////////////
Route::get('/aboutUs', 'DashboardController@aboutUs')->name('aboutUs');
Route::post('/aboutUs/insert', 'DashboardController@insert_aboutUs')->name('insert_aboutUs');
Route::post('/aboutUs/update', 'DashboardController@update_aboutUs')->name('update_aboutUs');
Route::get('/aboutUs/delete/{id}', 'DashboardController@delete_aboutUs')->name('delete_aboutUs');





///////////Admin Customer Sayings Routes
Route::get('/customer_sayings', 'DashboardController@customer_sayings')->name('customer_sayings');
Route::post('/customer_sayings/insert', 'DashboardController@insert_customer_sayings')->name('insert_customer_sayings');
Route::post('/customer_sayings/update', 'DashboardController@update_customer_sayings')->name('update_customer_sayings');
Route::get('/customer_sayings/delete/{id}', 'DashboardController@delete_customer_saying')->name('delete_customer_saying');




////////////Admin Banner Images Routes
Route::get('/banner_images', 'DashboardController@banner_images')->name('banner_images');
Route::post('/banner_images/insert', 'DashboardController@insert_banner_images')->name('insert_banner_images');
Route::post('/banner_images/update', 'DashboardController@update_banner_images')->name('update_banner_images');



////////////Admin Social Icon Routes
Route::get('/social_icons', 'DashboardController@social_icons')->name('social_icons');
Route::post('/social_icons/insert', 'DashboardController@insert_social_icons')->name('insert_social_icons');
Route::post('/social_icons/update', 'DashboardController@update_social_icons')->name('update_social_icons');
Route::get('/social_icons/delete/{id}', 'DashboardController@delete_social_icons')->name('delete_social_icons');



///////Visitor Messaging Sending Routes/////////////////////
Route::get('/messages', 'DashboardController@messages')->name('messages');
Route::post('/message/send', 'DashboardController@send_message')->name('send_message');




//Admin Contact Route///////////////////////////////////
Route::get('/contacts/view', 'ContactController@contacts')->name('contacts');
Route::post('/contacts/insert', 'ContactController@insert_contact')->name('insert_contact');
Route::post('/contacts/update', 'ContactController@update_contact')->name('update_contact');
Route::get('/contacts/delete/{id}', 'ContactController@delete_contact')->name('delete_contact');



//Admin Service Routes//////////////////////////////////
Route::get('/services/categories', 'ServicesController@service_category')->name('service_category');
Route::post('/services/categories/insert', 'ServicesController@insert_service_category')->name('insert_service_category');
Route::post('/services/categories/update', 'ServicesController@update_service_category')->name('update_service_category');
Route::get('/services/categories/delete/{id}', 'ServicesController@delete_service_category')->name('delete_service_category');
//
Route::get('/services', 'ServicesController@services')->name('services');
Route::post('/services/insert', 'ServicesController@insert_service')->name('insert_service');
Route::post('/services/update', 'ServicesController@update_service')->name('update_service');
Route::get('/services/delete/{id}', 'ServicesController@delete_service')->name('delete_service');
//
Route::get('/services/options', 'ServicesController@service_options')->name('service_options');
Route::post('/services/options/insert', 'ServicesController@insert_service_option')->name('insert_service_option');
Route::post('/services/options/update', 'ServicesController@update_service_option')->name('update_service_option');
Route::get('/services/options/delete/{id}', 'ServicesController@delete_service_option')->name('delete_service_option');
//
Route::get('/services/features', 'ServicesController@service_features')->name('service_features');
Route::post('/services/features/insert', 'ServicesController@insert_service_feature')->name('insert_service_feature');
Route::post('/services/features/update', 'ServicesController@update_service_feature')->name('update_service_feature');
Route::get('/services/features/delete/{id}', 'ServicesController@delete_service_feature')->name('delete_service_feature');
//
Route::get('/services/plans', 'ServicesController@service_plans')->name('service_plans');
Route::post('/services/plans/insert', 'ServicesController@insert_service_plans')->name('insert_service_plans');
Route::post('/services/plans/update', 'ServicesController@update_service_plans')->name('update_service_plans');
Route::get('/services/plans/delete/{id}', 'ServicesController@delete_service_plan')->name('delete_service_plan');
//
Route::get('/services/offers/categories', 'ServicesController@offer_categories')->name('offer_categories');
Route::post('/services/offers/categories/insert', 'ServicesController@insert_offer_categories')->name('insert_offer_categories');
Route::post('/services/offers/categories/update', 'ServicesController@update_offer_categories')->name('update_offer_categories');
Route::get('/services/offers/categories/delete/{id}', 'ServicesController@delete_offer_category')->name('delete_offer_category');
//
Route::get('/services/offers', 'ServicesController@service_offers')->name('service_offers');
Route::post('/services/offers/insert', 'ServicesController@insert_service_offer')->name('insert_service_offer');
Route::post('/services/offers/update', 'ServicesController@update_service_offer')->name('update_service_offer');
Route::get('/services/offers/delete/{id}', 'ServicesController@delete_service_offer')->name('delete_service_offer');







//Admin Application Routes////////////////////////////////////
Route::get('/applications/category', 'ApplicationsController@application_category')->name('application_category');
Route::post('/applications/category/insert', 'ApplicationsController@insert_application_category')->name('insert_application_category');
Route::post('/applications/category/update', 'ApplicationsController@update_application_category')->name('update_application_category');
//
Route::get('/applications', 'ApplicationsController@applications')->name('applications');
Route::post('/applications/insert', 'ApplicationsController@insert_applications')->name('insert_applications');
Route::post('/applications/update', 'ApplicationsController@update_applications')->name('update_applications');
Route::get('/applications/delete/{id}', 'ApplicationsController@delete_applications')->name('delete_applications');
//
Route::get('/apps/category/details', 'ApplicationsController@application_category_details')->name('application_category_details');
Route::post('/apps/category/details/insert', 'ApplicationsController@insert_app_cat_details')->name('insert_app_cat_details');
Route::post('/apps/category/details/update', 'ApplicationsController@update_app_cat_details')->name('update_app_cat_details');
Route::get('/apps/category/details/delete/{id}', 'ApplicationsController@delete_app_cat_details')->name('delete_app_cat_details');
//
Route::get('/apps/features', 'ApplicationsController@application_features')->name('application_features');
Route::post('/apps/features/insert', 'ApplicationsController@insert_app_features')->name('insert_app_features');
Route::post('/apps/features/update', 'ApplicationsController@update_app_features')->name('update_app_features');
Route::get('/apps/features/delete/{id}', 'ApplicationsController@delete_app_features')->name('delete_app_features');
//
Route::get('/apps/offers', 'ApplicationsController@application_offers')->name('application_offers');
Route::post('/apps/offers/insert', 'ApplicationsController@insert_application_offers')->name('insert_application_offers');
Route::post('/apps/offers/update', 'ApplicationsController@update_application_offers')->name('update_application_offers');
Route::get('/apps/offers/delete/{id}', 'ApplicationsController@delete_application_offer')->name('delete_application_offer');






//Admin Hosting Routes
Route::get('/hostings', 'HostingsController@hostings')->name('hostings');
Route::post('/hostings/insert', 'HostingsController@insert_hostings')->name('insert_hostings');
Route::post('/hostings/update', 'HostingsController@update_hostings')->name('update_hostings');
Route::get('/hostings/delete/{id}', 'HostingsController@delete_hosting')->name('delete_hosting');
//
Route::get('/hostings/features', 'HostingsController@host_features')->name('host_features');
Route::post('/hostings/features/insert', 'HostingsController@insert_host_feature')->name('insert_host_feature');
Route::post('/hostings/features/update', 'HostingsController@update_host_feature')->name('update_host_feature');
Route::get('/hostings/features/delete/{id}', 'HostingsController@delete_host_feature')->name('delete_host_feature');
//
Route::get('/hostings/offers', 'HostingsController@host_offers')->name('host_offers');
Route::post('/hostings/offers/insert', 'HostingsController@insert_hosting_offers')->name('insert_hosting_offers');
Route::post('/hostings/offers/update', 'HostingsController@update_hosting_offers')->name('update_hosting_offers');
Route::get('/hostings/offers/delete/{id}', 'HostingsController@delete_hosting_offer')->name('delete_hosting_offer');






////////////////////Admin FAQ Routes////////////////////////////////
Route::get('/faq/categories', 'FAQController@faq_categories')->name('faq_categories');
Route::post('/faq/categories/insert', 'FAQController@insert_faq_category')->name('insert_faq_category');
Route::post('/faq/categories/update', 'FAQController@update_faq_category')->name('update_faq_category');
//
Route::get('/faqs', 'FAQController@faqs')->name('faqs');
Route::post('/faqs/insert', 'FAQController@insert_faqs')->name('insert_faqs');
Route::post('/faqs/update', 'FAQController@update_faqs')->name('update_faqs');
Route::get('/faqs/delete/{id}', 'FAQController@delete_faq')->name('delete_faq');






////////////Admin Blog Routes///////////////////////////////////
Route::get('/blogs/categories', 'BlogController@blog_categories')->name('blog_categories');
Route::post('/blogs/categories/insert', 'BlogController@insert_blog_category')->name('insert_blog_category');
Route::post('/blogs/categories/update', 'BlogController@update_blog_category')->name('update_blog_category');
//
Route::get('/blogs/writers', 'BlogController@blog_writers')->name('blog_writers');
Route::post('/blogs/writers/insert', 'BlogController@insert_blog_writer')->name('insert_blog_writer');
Route::post('/blogs/writers/update', 'BlogController@update_blog_writer')->name('update_blog_writer');
Route::get('/blogs/writers/delete/{id}', 'BlogController@delete_blog_writer')->name('delete_blog_writer');
//
Route::get('/blogs', 'BlogController@blogs')->name('blogs');
Route::post('/blogs/insert', 'BlogController@insert_blogs')->name('insert_blogs');
Route::post('/blogs/update', 'BlogController@update_blogs')->name('update_blogs');
Route::get('/blogs/delete/{id}', 'BlogController@delete_blogs')->name('delete_blogs');


////////////////////////////////////Admin Routes Are Finished/////////////////////////////////////


///Welcome View Route
Route::get('/', 'ViewController@welcome')->name('welcome');

//Contact View Route
Route::get('/contact/view', 'ViewController@contact_view')->name('contact_view');


//Application View Route
Route::get('/application/view/{id}', 'ViewController@application_view')->name('application_view');
Route::get('/applications/view/all', 'ViewController@all_applications')->name('all_applications');
Route::get('/allapplications', 'ViewController@allapplications')->name('allapplications');
Route::get('/applications/categorized_apps/{id}', 'ViewController@categorized_apps')->name('categorized_apps');
Route::get('/applications/single_app/{id}', 'ViewController@single_app')->name('single_app');
Route::get('/applications/single_awesome_app/{id}', 'ViewController@single_awesome_app')->name('single_awesome_app');
Route::get('/applications/single_develop_app/{id}', 'ViewController@single_develop_app')->name('single_develop_app');
Route::get('/applications/stunning_single_app/{id}', 'ViewController@stunning_single_app')->name('stunning_single_app');
Route::get('/applications/front_multipurpose_apps', 'ViewController@front_multipurpose_apps')->name('front_multipurpose_apps');
Route::get('/applications/single_onsale_app/{id}', 'ViewController@single_onsale_app')->name('single_onsale_app');
Route::get('/applications/single_app_offer/{id}', 'ViewController@single_app_offer')->name('single_app_offer');



//Hosting View Route
Route::get('/hosting/view/{id}', 'ViewController@hosting_view')->name('hosting_view');
Route::get('/hosting/single_offer/{id}', 'ViewController@single_host_offer')->name('single_host_offer');
Route::get('/allhostings', 'ViewController@allhostings')->name('allhostings');

//Single faq view///////////////////
Route::get('/frontend_single_faq/view/{id}', 'ViewController@frontend_single_faq')->name('frontend_single_faq');



// Services View Route
Route::get('/web_services/view', 'ViewController@web_services')->name('web_services');
Route::get('/services/view', 'ViewController@all_services')->name('all_services');
Route::get('/services/single_service/{id}', 'ViewController@single_service')->name('single_service');


//Offer View Route
Route::get('/offer/per/category/{id}', 'ViewController@offer_per_cat')->name('offer_per_cat');




//Mobile Apps View Route
Route::get('/mobile_apps/view', 'ViewController@mobile_apps')->name('mobile_apps');



//About View Route
Route::get('/about/view', 'ViewController@about')->name('about');


//Blog View Route
Route::get('/blog/view', 'ViewController@front_blog')->name('front_blog');

//Quatation Route
Route::get('/quotation', 'QuotationController@quotation')->name('quotation');

//Newsletter Route
Route::get('/newsletter', 'NewsletterController@newsletter')->name('newsletter');

//Cart Route
Route::get('/add/cart/{product_id}', 'CartController@addcart')->name('addcart');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/cart/delete/{cart_id}', 'CartController@cartdelete');
Route::post('/update/cart', 'CartController@updatecart');
Route::post('/addtocart', 'CartController@addtocart');
Route::post('/final/checkout', 'CartController@finalcheckout');
//ajax response
Route::post('/getcitylist', 'CartController@getcitylist');

/////////////////////////Cart View Routes///////////////////////////
Route::get('/cart/view', 'CartController@cart_view')->name('cart_view');
Route::post('/cart/adding', 'CartController@cart_adding')->name('cart_adding');
Route::delete('/cart/remove/{service}', 'CartController@remove_it');

////////////////Customer Area//////////////////
Route::get('/customer/area', 'CustomerController@customerarea');
Route::get('/purchase/order', 'CustomerController@purchaseorder');
Route::get('/purchase/order/{sale_id}', 'CustomerController@purchaseorderindividual');

Route::get('/test', function(){
  return (new App\Mail\OrderConfirm());
});

//login with github
Route::get('login/github', 'GithubController@redirectToProvider');
Route::get('login/github/callback', 'GithubController@handleProviderCallback');

//Admin Orders Routes
Route::get('/admin/view-orders', 'CustomerController@viewOrders');
Route::get('/admin/view-orders-detail/{sale_id}', 'CustomerController@viewOrdersdetail');
