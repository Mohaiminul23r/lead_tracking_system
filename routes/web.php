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
	 return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
});
	
	Route::resource('addresses','AddressController')->middleware('permissions');
	Route::resource('cities','CityController')->middleware('permissions');
	Route::resource('countries','CountryController')->middleware('permissions');
	Route::resource('companies','CompanyController')->middleware('permissions');
	Route::resource('departments','DepartmentController')->middleware('permissions');
	Route::resource('designations','DesignationController')->middleware('permissions');
	Route::resource('employeetypes','EmployeeTypeController')->middleware('permissions');
	Route::resource('offices','OfficeController')->middleware('permissions');
	Route::resource('permissions','PermissionController')/*->middleware('permissions')*/;
	Route::resource('employees', 'EmployeeInformationController')->middleware('permissions');
	Route::resource('projectcategories','ProjectCategoryController')->middleware('permissions');
	Route::resource('projects','ProjectController')->middleware('permissions');
	Route::resource('projectslabs','ProjectSlabController')->middleware('permissions');
	Route::resource('roles','RoleController')/*->middleware('permissions')*/;
	Route::resource('callhistories','CallHistoryController')->middleware('permissions');
	Route::resource('clients','ClientController')->middleware('permissions');
	Route::resource('followups','FollowupController')->middleware('permissions');
	Route::resource('meetings','MeetingController')->middleware('permissions');
	Route::resource('tadetails','TAController')->middleware('permissions');
	Route::resource('sales','SaleController')->middleware('permissions');
	Route::resource('schedules','ScheduleController')->middleware('permissions');
	Route::resource('probations','ProbationController')->middleware('permissions');


	Route::get('/address/get-data-json',"AddressController@GetDataForDataTable")->name('addressJson');
	Route::get('/city/get-data-json',"CityController@GetDataForDataTable")->name('cityJson');
	Route::get('/country/get-data-json',"CountryController@GetDataForDataTable")->name('countryJson');
	Route::get('/company/get-data-json',"CompanyController@GetDataForDataTable")->name('companyJson');
	Route::get('/company/get-company',"CompanyController@GetAll")->name('getCompnay');
	Route::get('/department/get-data-json',"DepartmentController@GetDataForDataTable")->name('departmentJson');
	Route::get('/department/get-department',"DepartmentController@GetAll")->name('getDepartment');
	Route::get('/designation/get-data-json',"DesignationController@GetDataForDataTable")->name('designationJson');
	Route::get('/designation/get-designation',"DesignationController@GetAll")->name('getdesignation');
	Route::get('/employeetype/get-data-json',"EmployeeTypeController@GetDataForDataTable")->name('employeetypeJson');
	Route::get('/employee_type/get-employee-type',"EmployeeTypeController@GetAll")->name('get-employee-type');
	Route::get('/office/get-data-json',"OfficeController@GetDataForDataTable")->name('officeJson');
	Route::get('/permission/get-data-json',"PermissionController@GetDataForDataTable")->name('permissionJson');
	Route::get('/permission/get-permission',"PermissionController@GetAll")->name('getPermission');
	Route::get('/employee/get-data-json',"EmployeeInformationController@GetDataForDataTable")->name('userJson');
	Route::get('/projectcategory/get-data-json',"ProjectCategoryController@GetDataForDataTable")->name('projectcategoryJson');
	Route::get('/projectcategory/get-projectcategory',"ProjectCategoryController@GetAll")->name('getProjectCategory');
	Route::get('/project/get-data-json',"ProjectController@GetDataForDataTable")->name('projectJson');
	Route::get('/projectslab/get-data-json',"ProjectSlabController@GetDataForDataTable")->name('projectslabJson');
	Route::get('/role/get-role', "RoleController@GetAll")->name('getRole');
	Route::get('/role/get-data-json',"RoleController@GetDataForDataTable")->name('roleJson');
	Route::post('/storeAddress/{id}','EmployeeInformationController@StoreAddress')->name('addAddressForUser');
	Route::post('/updateAddress/{id}','UserController@UpdateAddress')->name('updateAddressForUser');
	Route::post('/role/attachRole/{id}', "RoleController@AttachRole")->name('attachRole');
	Route::get('/followup/get-data-json',"FollowupController@GetDataForDataTable")->name('followupJson');
	Route::get('report/salesIndex','ReportController@salesIndex')->name('createSalesReport')->middleware('permissions:createSalesReport');
	Route::post('report/salesIndex','ReportController@salesReport')->name('viewSalesReport')->middleware('permissions:viewSalesReport');
	Route::get('report/projectsIndex','ReportController@projectsIndex')->name('createProjectsReport')->middleware('permissions:createProjectsReport');
	Route::post('report/projectsIndex','ReportController@projectsReport')->name('viewProjectsReport')->middleware('permissions:viewProjectsReport');
	Route::get('report/meetingsIndex','ReportController@meetingsIndex')->name('createMeetingsReport')->middleware('permissions:createMeetingsReport');
	Route::post('report/meetingsIndex','ReportController@meetingsReport')->name('viewMeetingsReport')->middleware('permissions:viewMeetingsReport');
	/*download*/
	Route::post('download/salesReport','ReportController@DownloadPdfSales')->name('downloadSalesReport');
	Route::post('download/mettingsReport','ReportController@DownloadPdfMeetings')->name('downloadMeetingReport');
	Route::post('download/eprojectsReport','ReportController@DownloadPdfProjects')->name('DownloadPdfProjects');
	Route::post('/autocomplete/fetchProject', 'ReportController@fetchProject')->name('autocomplete.fetch.project');
	Route::post('/autocomplete/fetchUser', 'ReportController@fetchUser')->name('autocomplete.fetch.user');
	Route::get('/meeting/get-data-json', "MeetingController@GetDataForDataTable")->name('meetingJson');
	Route::get('/client/get-data-json',"ClientController@GetDataForDataTable")->name('clientJson');
	Route::get('/client/get-client', "ClientController@GetAll")->name('getClient');
	Route::get('/minulesmail/{id}', 'MeetingController@sendmail')->name('sendMinutes');
	Route::get('/file/download/{id}', 'MeetingController@DownloadFile')->name('DownloadFile');
	Route::get('/callhistory/get-data-json',"CallHistoryController@GetDataForDataTable")->name('callhistoryJson');
	Route::get('/sale/get-data-json',"SaleController@GetDataForDataTable")->name('saleJson');
	Route::get('/schedule/get-data-json',"ScheduleController@GetDataForDataTable")->name('scheduleJson');
	Route::get('/city/{id}/get-by-country',"CityController@GetAllByCountry")->name('cityBycountry');
	Route::get('/country/get-country',"CountryController@GetAll")->name('getCountry');
	Route::get('/employee/get-employee',"UserController@GetAll")->name('getEmployee');
	Route::get('/office/{id}/get-by-company',"OfficeController@GetAllByCompnay")->name('officeByCompany');
	Route::put('/employee/cngPassword/{id}',"UserController@chnagePassword")->name('cngPassword');
	Route::get('/project/{id}/get-by-projectcategory',"ProjectController@GetAllByProjectCategory")->name('projectByprojectcategory');
	Route::get('/project/get-project', "ProjectController@GetAll")->name('getProject');
	Route::get('/projectslab/{id}/get-by-project',"ProjectSlabController@GetAllByProject")->name('projectslabByproject');
	Route::get('/user/get-user', "UserController@GetAll")->name('getUser');
	Route::get('report/employeesIndex','ReportController@employeesIndex')->name('createEmployeesReport')->middleware('permissions:createEmployeesReport');
	Route::post('report/employeesIndex','ReportController@employeesReport')->name('viewEmployeesReport')->middleware('permissions:viewEmployeesReport');
	Route::post('download/employeesReport','ReportController@DownloadPdfEmployees')->name('downloadEmployeeReport');

	Route::get('/markAsRead/{id}', function($id){
		auth()->user()->notifications()->whereId($id)->delete();
	})->name('markAsRead');

	Route::get('/markAllAsRead', function(){
		auth()->user()->notifications()->delete();
		return back();
	})->name('markAllAsRead');


