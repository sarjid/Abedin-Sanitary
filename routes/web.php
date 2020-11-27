<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','PagesController@index');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/user/logout','HomeController@Logout')->name('user.logout');
// ============================ admin routes category================= 
Route::get('admin/categories-all','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store','Admin\CategoryController@store')->name('store.category');
Route::get('admin/categories-edit/{id}','Admin\CategoryController@edit');
Route::post('admin/categories-update','Admin\CategoryController@update')->name('update.category');
Route::get('admin/categories-delete/{id}','Admin\CategoryController@delete');
Route::get('admin/categories-inactive/{id}','Admin\CategoryController@inactive');
Route::get('admin/categories-active/{id}','Admin\CategoryController@active');
// -------- sub cat --------- 
Route::get('admin/sub/categories-all','Admin\CategoryController@Subindex')->name('admin.sub.category');
Route::post('admin/sub/categories-store','Admin\CategoryController@SubStore')->name('store.sub.category');
Route::get('admin/sub/categories-edit/{id}','Admin\CategoryController@Subedit');
Route::post('admin/sub/categories-update','Admin\CategoryController@Subupdate')->name('update.sub.category');
Route::get('admin/sub/categories-delete/{id}','Admin\CategoryController@subDelete');
Route::get('admin/sub/categories-inactive/{id}','Admin\CategoryController@Subinactive');
Route::get('admin/sub/categories-active/{id}','Admin\CategoryController@Subactive');
// ----------------------------- Delar ------------------------ 
Route::get('admin/delar/company-add','Admin\DelarController@CompanyAdd')->name('admin.company');
Route::post('admin/delar/company-store','Admin\DelarController@storeCompany')->name('store.company');
Route::get('admin/delar/company-edit/{id}','Admin\DelarController@editCompany');
Route::post('admin/delar/company-update','Admin\DelarController@updateCompany')->name('update.company');
Route::get('admin/delar/company-delete/{id}','Admin\DelarController@DeleteCompany');
Route::get('admin/delar/company-inactive/{id}','Admin\DelarController@inactiveCompany');
Route::get('admin/delar/company-active/{id}','Admin\DelarController@ActiveCompany');
// ------ company serveices ------------ 
Route::get('admin/delar/products-add','Admin\DelarController@DelarProduct')->name('admin.company.products');
Route::post('admin/delar/products-store','Admin\DelarController@StoredelarProduct')->name('store.delar.products');
Route::post('admin/delar/products-update','Admin\DelarController@UpdateProduct')->name('update.delar.service');
Route::get('admin/delar/products-edit{id}','Admin\DelarController@EditService');
Route::get('admin/delar/products-delete{id}','Admin\DelarController@DeleteService');
Route::get('admin/delar/products-inactive{id}','Admin\DelarController@InactiveService');
Route::get('admin/delar/products-active{id}','Admin\DelarController@ActiveService');
// ---------------------------------- products -------------------------------- 
Route::get('admin/products-add','Admin\ProductController@Add')->name('admin.add.products');
// get sucategory by ajax 
Route::get('get/subcategory/{cat_id}','Admin\ProductController@GetSubCat');
Route::get('get/delar/service/{company_id}','Admin\ProductController@GetCompId');
Route::post('admin/products-store','Admin\ProductController@Store')->name('store.products');
Route::get('admin/products-manage','Admin\ProductController@ManageProduct')->name('admin.manage.products');
Route::get('admin/products-view/{id}/{slug}','Admin\ProductController@ViewProducts');
Route::get('admin/products-edit/{id}/{slug}','Admin\ProductController@EditProducts');
Route::post('admin/products-update-withoutimg/{id}','Admin\ProductController@WithoutImgUpdt');
Route::post('admin/products-update-with-image/{id}','Admin\ProductController@UpdateImg');
Route::get('admin/products-delete/{id}','Admin\ProductController@delete');
Route::get('admin/products-inactive/{id}','Admin\ProductController@Inactive');
Route::get('admin/products-active/{id}','Admin\ProductController@Active');
// ----------------------------products comments ----------------------------------- 
Route::get('admin/product/comments','Admin\ProductController@ShowAll')->name('admin.product.comments');
Route::get('admin/product/comments-view/{id}','Admin\ProductController@View');
Route::get('admin/product/comments-delete/{id}','Admin\ProductController@deleteComment');
// ----------------------------------------- employee ---------------------------------------------- 
Route::get('admin/employee-add','Admin\EmployeeController@Add')->name('admin.employee');
Route::post('admin/employee-store','Admin\EmployeeController@Store')->name('store.employee');
Route::get('admin/employee-manage','Admin\EmployeeController@Manage')->name('admin.manage.employee');
Route::get('admin/employee-edit/{id}','Admin\EmployeeController@edit');
Route::post('admin/employee-update/{id}','Admin\EmployeeController@Update');
Route::get('admin/employee-delete/{id}','Admin\EmployeeController@delete');
Route::get('admin/employee-inactive/{id}','Admin\EmployeeController@Inactive');
Route::get('admin/employee-active/{id}','Admin\EmployeeController@Active');
// ------------------------------ services --------------------------- 
Route::get('admin/services-add','Admin\ServiceController@index')->name('admin.services');
Route::post('admin/services-store','Admin\ServiceController@Store')->name('store.services');
Route::get('admin/services-edit/{id}','Admin\ServiceController@edit');
Route::post('admin/services-update/{id}','Admin\ServiceController@Update');
Route::get('admin/services-delete/{id}','Admin\ServiceController@delete');
Route::get('admin/services-inactive/{id}','Admin\ServiceController@Inactive');
Route::get('admin/services-active/{id}','Admin\ServiceController@Active');
// --------------------- customer review ---------------- 
Route::get('admin/customer/review-add','Admin\CustomerController@index')->name('admin.review');
Route::post('admin/customer/review-store','Admin\CustomerController@Store')->name('store.review');
Route::get('admin/customer/review-edit/{id}','Admin\CustomerController@edit');
Route::post('admin/customer/review-update/{id}','Admin\CustomerController@Update');
Route::get('admin/customer/review-delete/{id}','Admin\CustomerController@delete');
Route::get('admin/customer/review-inactive/{id}','Admin\CustomerController@Inactive');
Route::get('admin/customer/review-active/{id}','Admin\CustomerController@Active');
// ----------------------------------- About us ----------------------- 
Route::get('admin/about-us','Admin\AboutController@index')->name('admin.about.us');
Route::post('admin/about-us/update-data','Admin\AboutController@Update')->name('update-about-us');
// ======================================== contact us =================================== 
Route::get('admin/contact-us','Admin\ContactController@ContactPage')->name('admin.contact');
Route::post('admin/contact-update','Admin\ContactController@Update')->name('update.contact');
// ================= message show in admin panel ================
Route::get('admin/contact/message','Admin\MessageController@ContactPage')->name('admin-contact-message');
Route::get('admin/contact/message-view/{id}','Admin\MessageController@ShowMsg');
Route::get('admin/trash/message','Admin\MessageController@Trash')->name('admin-trash-list');
Route::get('admin/trash/message-delete/{id}','Admin\MessageController@Delete');
// ========================================= setting ============ ======== 
Route::get('admin/site-setting','Admin\SettingController@index')->name('admin.setting');
Route::post('admin/update/site-setting','Admin\SettingController@Update')->name('update-site-setting');
Route::get('admin/seo-setting','Admin\SettingController@SeoPage')->name('admin-seo-setting');
Route::post('admin/update/seo-setting','Admin\SettingController@SeoUpdate')->name('update-seo-setting');
// ======================================= create new admin ============= 
Route::get('admin/new-admin/create','Admin\RoleController@Create')->name('admin.create');
Route::post('admin/new-admin/store','Admin\RoleController@Store')->name('store.admin');
Route::get('admin/all-admin/list','Admin\RoleController@ShowAll')->name('admin-manage');
Route::get('admin/edit-sub-admin/{id}','Admin\RoleController@Edit');
Route::post('admin/sub-admin/update/{id}','Admin\RoleController@update');
Route::get('admin/delete-sub-admin/{id}','Admin\RoleController@Delete'); 
// =========================================== Profile ================================
Route::get('admin/my-profile','Admin\ProfileController@index')->name('admin.my.profile');
Route::post('admin/my-profile/update','Admin\ProfileController@Update')->name('update.admin.profile');
Route::get('admin/profile/change-password','Admin\ProfileController@Password')->name('change.password');
Route::post('admin/my-profile/update-pass','Admin\ProfileController@UpdatePassword')->name('update.password');
// ======================================= headline ============================ 
Route::get('admin/headline','Admin\HeadlineController@index');
Route::post('admin/headline/update','Admin\HeadlineController@update');
Route::get('admin/headline/deactive','Admin\HeadlineController@deactive');
Route::get('admin/headline/active','Admin\HeadlineController@active');
// ============================================= Fontend Routes ======================================= 
// product view
Route::get('products/details/{product_id}/{slug}','Fontend\ProductController@ViewProduct');
Route::post('products/store-comment','Fontend\ProductController@StoreComment')->name('store.comment');
Route::get('about-us','PagesController@AboutPage')->name('about.us');
Route::get('our-products','PagesController@ProductPage')->name('our.products');
Route::get('category/products/{id}/{slug}','PagesController@CatWiseProduct');
Route::get('delar/products/{id}/{slug}','PagesController@DelarWiseProduct');
Route::get('subcategory/products/{id}/{slug}','PagesController@SubCatProduct');
Route::get('delar/company-products/{id}/{slug}','PagesController@DelarCompanyProducts');
Route::get('contact-us','PagesController@ContactPage')->name('contact');
Route::post('contact/message-send','PagesController@ContactMsg');
// ============================ search products ================ 
Route::post('products/search-result','SearchController@Search')->name('search.products');








