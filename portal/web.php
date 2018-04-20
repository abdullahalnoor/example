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


// Route::get('/','WelcomeController@home');
Route::get('/all-job','WelcomeController@allJob');
Route::get('/detail-job-info/{id}','WelcomeController@detailJobInfo');


 //Start LucumPageController 
 Route::get('/','LucumPageController@home'); 
 Route::get('/practice','PracticePageController@home'); 
 Route::get('/hub','HubPageController@home'); 
 Route::get('/federation','FederationPageController@home'); 
 //End LucumPageController  



//Start Registration First Step

Route::get('/registration-one','RegistrationOneController@showRegistrationFormOne');
Route::post('/registration-one/store-info','RegistrationOneController@storeRegistrationOneInfo');
//End Registration First Step

//Start Registration Second Step
// Route::get('/registration-two','RegistrationTwoController@showRegistrationFormTwo');
// Route::post('/registration-two/store-info','RegistrationTwoController@storeRegistrationTwoInfo');
//End Registration Second Step

//Start  PracticeCcgFormController
Route::get('/practice-ccg-form','PracticeCcgFormController@showPracticeCcgForm');
Route::post('/new/practice-ccg','PracticeCcgFormController@storePracticeCcgInfo');
//End PracticeCcgFormController

//Start  PracticeItSystemmFormController
Route::get('/practice-it-system-form','PracticeItSystemmFormController@showPracticeItSystemmForm');
Route::post('/new/practice-it-system','PracticeItSystemmFormController@storePracticeItSystemmInfo');
//End PracticeItSystemmFormController

//Start Practice Form Step
Route::get('/practice-form','Auth\PracticeRegisterController@showRegistrationForm');
Route::post('/store/practice-form','Auth\PracticeRegisterController@register');
//End Practice Form Step

// Start  LucumProfileController


Route::prefix('lucum')->middleware(['ajax.check'])->group(function(){
	// Route::get('add-profile','LucumProfileController@showProfileForm');
	// Route::post('store-profile','LucumProfileController@storeProfileInfo');
	Route::get('profile','LucumProfileController@index');
	Route::get('view-profile-info','LucumProfileController@showProfileInfo');
	Route::get('add-profile-image','LucumProfileController@create');
	Route::post('store-profile-image','LucumProfileController@storeProfileImage');

	// start LucumDocumentController
	Route::get('document','LucumDocumentController@index');
	Route::get('add-document','LucumDocumentController@create');
	Route::post('store-document','LucumDocumentController@store');
	

	// end LucumDocumentController

	// start LucumExperienceController
	Route::get('experience','LucumExperienceController@index');
	Route::get('add-experience','LucumExperienceController@create');
	Route::post('store-experience','LucumExperienceController@store');
	// start LucumQualificationController
	Route::get('qualification','LucumQualificationController@index');
	Route::get('add-qualification','LucumQualificationController@create');
	Route::post('store-qualification','LucumQualificationController@store');
	// start LucumItSystemController
	Route::get('it-system','LucumItSystemController@index');
	Route::get('add-it-system','LucumItSystemController@create');
	Route::post('store-it-system','LucumItSystemController@store');
	// start LucumLanguageController
	Route::get('language','LucumLanguageController@index');
	Route::get('add-language','LucumLanguageController@create');
	Route::post('/store-language','LucumLanguageController@store');

});
// End  LucumProfileController


//Start Practice Login Form 
Route::prefix('practice')->group(function(){
	Route::get('/login/form','Auth\PracticeLoginController@showLoginForm');
	Route::post('/practice-login','Auth\PracticeLoginController@login');
	//Route::post('/practice-logout','Auth\PracticeLoginController@logout');
	Route::get('/practice-home','PracticeHomeController@index')->name('practice.home');

	//Start   JobSessionController
	Route::get('/add-job-session','JobSessionController@index');
	Route::post('/store-job-session','JobSessionController@storeJobSession');
	Route::get('/view-job-session','JobSessionController@viewJobSession');
	Route::get('/view-job-session-info','JobSessionController@viewJobSessionInfo');
	Route::post('/store-job-session-info','JobSessionController@storeJobSessionInfo');
	Route::get('/view-job-session-priority-access','JobSessionController@viewPriorityAccess');
	Route::post('/store-job-session-priority-access','JobSessionController@storePriorityAccess');
	Route::get('/view-job-session-review-publish','JobSessionController@viewReviewPublish');
	Route::post('/store','JobSessionController@store');
	Route::get('/my-job','JobSessionManageController@index');
	Route::get('/my-job-detail/{id}','JobSessionManageController@myJobDetail');
	Route::get('/delete-my-job/{id}','JobSessionManageController@deleteMyJob');
	Route::get('/published-my-job/{id}','JobSessionManageController@publishedMyJob');
	Route::get('/unpublished-my-job/{id}','JobSessionManageController@unpublishedMyJob');
	Route::get('/edit-job-session/{id}','JobSessionManageController@editSession');
	Route::get('/edit-view-job-session','JobSessionManageController@showEditSession');
	Route::get('/edit-job-session-view/{id}','JobSessionManageController@showEditSessionView');
	Route::post('/store-edit-job-session-view','JobSessionManageController@storeEditSessionView');
	Route::get('/edit-job-session-priority-access','JobSessionManageController@showEditPriorityAccess');
	Route::post('/store-edit-job-session-priority-access','JobSessionManageController@storeEditPriorityAccess');
	Route::get('/edit-review-publish','JobSessionManageController@showEditReviewPublishForm');
	Route::post('/update-job-session','JobSessionManageController@updateJobSession');
	Route::post('/update-session','JobSessionManageController@updateSession');

	// Start DoctorProfileController
	Route::get('my-doctor','DoctorProfileController@index');
	Route::get('doctor-profile/{id}','DoctorProfileController@viewDoctorProfileInfo');
	Route::get('all-document-download/{id}','DoctorProfileController@allDocumentDownload');
	// End DoctorProfileController

	// start LucumApplicantController
	Route::get('/job-applicant/{id}','LucumApplicantController@viewJobApplicant');
	Route::get('/recruit-application/{id}/{job_id}','LucumApplicantController@recruitLucumApplication');
	Route::get('/cancel-application/{id}/{job_id}','LucumApplicantController@cancelLucumApplication');
	Route::get('/applicant-profile/{id}/{jobId?}','LucumApplicantController@viewApplicantProfile');
	// Route::get('/read-notificatioln/{id}','LucumApplicantController@viewApplicantProfile');
	// end LucumApplicantController

	// Route::get('/view-job-session','JobSessionController@viewJobSession');
	// Route::get('/view-job-session-info','JobSessionController@viewJobSessionInfo');
	// Route::get('/priority-access-info','JobSessionController@viewPriorityAccessInfo');
	// Route::get('/review-session','JobSessionController@viewReviewSessionInfo');
	//End   JobSessionController 
	//End   SessionInfoController 
	


});
//End Practice Login Form

//start JobController 
//Route::prefix('job')->group();  
Route::get('/job','JobController@index');
Route::get('/post-job','JobController@showJobForm');
Route::post('/new-post-job','JobController@storeNewJob');
Route::get('/unpublish-job-status/{id}','JobController@unpublishJobStatus');
Route::get('/publish-job-status/{id}','JobController@publishJobStatus');
Route::get('/view-job/{id}','JobController@viewJobDetail');
Route::get('/edit-job/{id}','JobController@showEditJobForm');
Route::post('/update-job','JobController@updateJobInfo');
Route::get('/delete-job/{id}','JobController@deleteJobInfo');
Route::get('/applied-job/{id}','JobController@appliedJobInfo');
Route::get('/applicant-cv-info/{id}','JobController@applicantCvInfo');
Route::get('/read-notificatioln/{id}/{jobId}','JobController@readNotification');

//start PracticeJobListController
Route::get('/practice/home','PracticeJobListController@index');


// Applied Job AppliedJobController
Route::prefix('user')->group(function(){
	Route::get('/apply-job/{id}','AppliedJobController@applyJob');
	Route::get('/apply-practice-job/{id}','AppliedPracticeJobController@applyJob');
});
// start UserJobController
Route::prefix('user-job')->group(function(){
	Route::get('job-list','UserJobController@index');
	Route::get('job-detail/{id}','UserJobController@jobDetailInfo');
	Route::get('practice-job-list','UserJobController@practiceJobList');
	Route::get('practice-job-detail/{id}','UserJobController@practiceJobDetail');
	// Route::get('mark-read/{id}','UserJobController@jobDetailInfo');
});

// start CvController
Route::prefix('user-cv')->group(function(){
	Route::get('/','CvController@index');
	Route::get('/cv-form','CvController@showCvForm');
	Route::post('/add-cv','CvController@storeCvInfo');
	Route::get('/upload-cv','CvController@showCvUploadForm');
});



Route::prefix('admin')->group(function(){
	//Start AdminLoginController
	Route::get('/login','Auth\AdminLoginController@showLoginForm');
	Route::post('/login','Auth\AdminLoginController@login');
	Route::get('/home','AdminHomeController@index');

	//End AdminLoginController

	//Start AdminController
	// Route::get('/admin','AdminController@index');
	Route::get('/practice-list','AdminController@allPractices');
	Route::get('/practice-detail/{id}','AdminController@practiceDetailInfo');
	Route::get('/lucum-list','AdminController@allLucums');
	Route::get('/lucum-detail/{id}','AdminController@lucumDetailInfo');
	//End AdminController

	//Start MenuController
	Route::get('/menu','MenuController@index');
	Route::get('/add-menu','MenuController@showMenuForm');
	Route::post('/new-menu','MenuController@storeMenuInfo');
	//End MenuController 

	//Start  SubMenuController
	Route::get('/sub-menu','SubMenuController@index');
	Route::get('/add-sub-menu','SubMenuController@showSubMenuForm');
	Route::post('/new-sub-menu','SubMenuController@storeSubMenuInfo');
	//End  SubMenuController

	//Start  CommunityController
	Route::get('/view-community','CommunityController@index');
	Route::get('/view-community-detail/{id}','CommunityController@viewCommunityDetail');
	Route::get('/edit-community/{id}','CommunityController@editCommunityInfo');
	Route::post('/update-community','CommunityController@updateCommunityInfo');
	Route::get('/add-community','CommunityController@showCommunityForm');
	Route::post('/new-community','CommunityController@storeCommunityInfo');
	//End  CommunityController

	//Start  ContactController
	Route::get('','ContactController@index');
	Route::get('/add-contact','ContactController@showContactForm');
	Route::post('/new-contact','ContactController@storeContactInfo');
	//End  ContactController

	//Start  AddressController
	Route::get('/view-address','AddressController@index');
	Route::get('/add-address','AddressController@showAddressForm');
	Route::post('/new-address','AddressController@storeAddressInfo');
	//End  AddressController AboutUsController

	//Start   AboutMenuController
	Route::get('/view-about-menu','AboutMenuController@index');
	Route::get('/add-about-menu','AboutMenuController@showAboutMenuForm');
	Route::post('/new-about-menu','AboutMenuController@storeAboutMenuInfo');
	//End   AboutMenuController

	//Start   AboutMenuController
	Route::get('/view-lucum-menu','LucumMenuController@index');
	Route::get('/add-lucum-menu','LucumMenuController@showLucumMenuForm');
	Route::post('/new-lucum-menu','LucumMenuController@storeLucumMenuInfo');
	//End   AboutMenuController 

	//Start   AboutMenuController
	Route::get('/view-practice-menu','PracticeMenuController@index');
	Route::get('/add-practice-menu','PracticeMenuController@showPracticeMenuForm');
	Route::post('/new-practice-menu','PracticeMenuController@storePracticeMenuInfo');
	//End   AboutMenuController 

	//Start   ModernToolController
	Route::get('/view-tool-info','ModernToolController@index');
	Route::get('/add-tool-info','ModernToolController@showToolForm');
	Route::post('/new-tool-info','ModernToolController@storeToolInfo');
	//End   ModernToolController 

	//Start   ToolBenefitController
	Route::get('/view-benefit-info','ToolBenefitController@index');
	Route::get('/add-benefit-info','ToolBenefitController@showToolBenefitForm');
	Route::post('/new-benefit-info','ToolBenefitController@storeToolBenefitInfo');
	//End   ToolBenefitController

	//Start   PartnershipController
	Route::get('/view-partnership-info','PartnershipController@index');
	Route::get('/add-partnership-info','PartnershipController@showPartnershipForm');
	Route::post('/new-partnership-info','PartnershipController@storePartnershipInfo');
	//End   PartnershipController 

	//Start   FeatureController
	Route::get('/view-feature-info','FeatureController@index');
	Route::get('/add-feature-info','FeatureController@showFeatureForm');
	Route::post('/new-feature-info','FeatureController@storeFeatureInfo');
	//End   FeatureController 

	//Start   NetworkGPController
	Route::get('/view-network-info','NetworkGPController@index');
	Route::get('/add-network-info','NetworkGPController@shownetworkForm');
	Route::post('/new-network-info','NetworkGPController@storenetworkInfo');
	//End   NetworkGPController

	//Start   NetworkBenefitController
	Route::get('/view-network-benefit-info','NetworkBenefitController@index');
	Route::get('/add-network-benefit-info','NetworkBenefitController@showNetworkBenefitForm');
	Route::post('/new-network-benefit-info','NetworkBenefitController@storeNetworkBenefitInfo');
	//End   NetworkBenefitController 

	//Start   PracticeManagerController
	Route::get('/view-practice-maneger-info','PracticeManagerController@index');
	Route::get('/add-practice-maneger-info','PracticeManagerController@showNetworkPracticeManegerForm');
	Route::post('/new-practice-maneger-info','PracticeManagerController@storeNetworkPracticeManegerInfo');
	Route::get('/edit-practice-maneger-info/{id}','PracticeManagerController@editPracticeManegerInfo');
	Route::post('/update-practice-maneger-info','PracticeManagerController@updatePracticeManegerInfo');

	//End   PracticeManagerController 

	//Start   PracticePartnershipController
	Route::get('/view-practice-partnership-info','PracticePartnershipController@index');
	Route::get('/add-practice-partnership-info','PracticePartnershipController@showPracticePartnershipForm');
	Route::post('/new-practice-partnership-info','PracticePartnershipController@storePracticePartnershipInfo');
	//End   PracticePartnershipController 

	//Start   ClientController
	Route::get('/view-client-info','ClientController@index');
	Route::get('/add-client-info','ClientController@showClientForm');
	Route::post('/new-client-info','ClientController@storeClientInfo');
	//End   ClientController 

	//Start   HubAdvantageController
	Route::get('/view-hub-advantage-info','HubAdvantageController@index');
	Route::get('/add-hub-advantage-info','HubAdvantageController@showHubAdvantageForm');
	Route::post('/new-hub-advantage-info','HubAdvantageController@storeHubAdvantageInfo');
	//End   HubAdvantageController 

	//Start   HubFacilityController
	Route::get('/view-hub-facility-info','HubFacilityController@index');
	Route::get('/add-hub-facility-info','HubFacilityController@showHubFacilityForm');
	Route::post('/new-hub-facility-info','HubFacilityController@storeHubFacilityInfo');
	//End   HubFacilityController 

	//Start   HubSpeechController
	Route::get('/view-hub-speech-info','HubSpeechController@index');
	Route::get('/add-hub-speech-info','HubSpeechController@showHubSppeechForm');
	Route::post('/new-hub-speech-info','HubSpeechController@storeHubSppeechInfo');
	//End   HubSpeechController 
    
	//Start   FederationAdvantageController
	Route::get('/view-federation-advantage-info','FederationAdvantageController@index');
	Route::get('/add-federation-advantage-info','FederationAdvantageController@showFederationAdvantageForm');
	Route::post('/new-federation-advantage-info','FederationAdvantageController@storeFederationAdvantageInfo');
	//End   FederationAdvantageController 

	//Start   FederationFacilityController
	Route::get('/view-federation-facility-info','FederationFacilityController@index');
	Route::get('/add-federation-facility-info','FederationFacilityController@showFederationFacilityForm');
	Route::post('/new-federation-facility-info','FederationFacilityController@storeFederationFacilityInfo');
	//End   FederationFacilityController
	
	//Start   FederationSpeechController
	Route::get('/view-federation-speech-info','FederationSpeechController@index');
	Route::get('/add-federation-speech-info','FederationSpeechController@showFederationSppeechForm');
	Route::post('/new-federation-speech-info','FederationSpeechController@storeFederationSppeechInfo');
	//End   FederationSpeechController 

	

	
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


