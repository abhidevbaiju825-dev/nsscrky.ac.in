<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('Home/submit_antiragging_complaint', 'Home::submit_antiragging_complaint');

// Admin Authentication Route Configuration
$routes->get('nssmanage', 'AdminAuth::login');
$routes->post('nssmanage/attempt', 'AdminAuth::attemptLogin');
$routes->get('nssmanage/logout', 'AdminAuth::logout');
$routes->setAutoRoute(true);

// Secure Admin Routing
$routes->get('AdminPortal', 'AdminDashboard::index');
$routes->post('AdminPortal/setAcademicYear', 'AdminDashboard::setAcademicYear');

// Admin CRUD - News
$routes->group('AdminPortal/news', static function ($routes) {
    $routes->get('/', 'AdminNews::index');
    $routes->get('create', 'AdminNews::create');
    $routes->post('store', 'AdminNews::store');
    $routes->get('delete/(:num)', 'AdminNews::delete/$1');
});

// Admin CRUD - Notices
$routes->group('AdminPortal/notices', static function ($routes) {
    $routes->get('/', 'AdminNotices::index');
    $routes->get('create', 'AdminNotices::create');
    $routes->post('store', 'AdminNotices::store');
    $routes->get('delete/(:num)', 'AdminNotices::delete/$1');
});

// Admin CRUD - Departments
$routes->group('AdminPortal/departments', static function ($routes) {
    $routes->get('/', 'AdminDepartments::index');
    $routes->get('create', 'AdminDepartments::create');
    $routes->post('store', 'AdminDepartments::store');
    $routes->get('edit/(:num)', 'AdminDepartments::edit/$1');
    $routes->post('update/(:num)', 'AdminDepartments::update/$1');
    $routes->get('delete/(:num)', 'AdminDepartments::delete/$1');
});

// Public AJAX
$routes->post('Home/course_details', 'Home::course_details');

// Admin CRUD - Gallery (Album-based)
$routes->group('AdminPortal/gallery', static function ($routes) {
    $routes->get('/', 'AdminGallery::index');
    $routes->get('create-album', 'AdminGallery::createAlbum');
    $routes->post('store-album', 'AdminGallery::storeAlbum');
    $routes->get('edit-album/(:num)', 'AdminGallery::editAlbum/$1');
    $routes->post('update-album/(:num)', 'AdminGallery::updateAlbum/$1');
    $routes->get('delete-album/(:num)', 'AdminGallery::deleteAlbum/$1');
    $routes->get('images/(:num)', 'AdminGallery::images/$1');
    $routes->post('upload/(:num)', 'AdminGallery::storeImage/$1');
    $routes->get('delete-image/(:num)', 'AdminGallery::deleteImage/$1');
});

// Admin CRUD - Staff Database
$routes->group('AdminPortal/staff', static function ($routes) {
    $routes->get('/', 'AdminStaff::index');
    $routes->get('create', 'AdminStaff::create');
    $routes->post('store', 'AdminStaff::store');
    $routes->get('edit/(:num)', 'AdminStaff::edit/$1');
    $routes->post('update/(:num)', 'AdminStaff::update/$1');
    $routes->get('delete/(:num)', 'AdminStaff::delete/$1');
    $routes->get('approve/(:num)', 'AdminStaff::approve/$1');
});

// Admin CRUD - Principal Desk
$routes->group('AdminPortal/principal_desk', static function ($routes) {
    $routes->get('/', 'AdminPrincipalDesk::index');
    $routes->post('update', 'AdminPrincipalDesk::update');
    // Former Principals
    $routes->post('store_former', 'AdminPrincipalDesk::store_former');
    $routes->get('edit_former/(:num)', 'AdminPrincipalDesk::edit_former/$1');
    $routes->post('update_former/(:num)', 'AdminPrincipalDesk::update_former/$1');
    $routes->get('delete_former/(:num)', 'AdminPrincipalDesk::delete_former/$1');
    $routes->get('make_former/(:num)', 'AdminPrincipalDesk::make_former/$1');
});

// Admin CRUD - About Page
$routes->group('AdminPortal/about', static function ($routes) {
    $routes->get('/', 'AdminAbout::index');
    $routes->post('store_management', 'AdminAbout::store_management');
    $routes->get('delete_management/(:num)', 'AdminAbout::delete_management/$1');
    $routes->post('store_team', 'AdminAbout::store_team');
    $routes->get('delete_team/(:num)', 'AdminAbout::delete_team/$1');
});

// Admin CRUD - College Council
$routes->group('AdminPortal/council', static function ($routes) {
    $routes->get('/', 'AdminCouncil::index');
    $routes->post('store_incharge', 'AdminCouncil::store_incharge');
    $routes->get('delete_incharge/(:num)', 'AdminCouncil::delete_incharge/$1');
    $routes->post('store_member', 'AdminCouncil::store_member');
    $routes->get('delete_member/(:num)', 'AdminCouncil::delete_member/$1');
});

// Admin CRUD - Scholarship
$routes->group('AdminPortal/scholarship', static function ($routes) {
    $routes->get('/', 'AdminScholarship::index');
    $routes->post('store', 'AdminScholarship::store');
    $routes->get('edit/(:num)', 'AdminScholarship::edit/$1');
    $routes->post('update/(:num)', 'AdminScholarship::update/$1');
    $routes->get('delete/(:num)', 'AdminScholarship::delete/$1');
});

// Admin CRUD - NAAC
$routes->group('AdminPortal/naac', static function ($routes) {
    $routes->get('/', 'AdminNAAC::index');
    $routes->post('store_certificate', 'AdminNAAC::store_certificate');
    $routes->get('delete_certificate/(:num)', 'AdminNAAC::delete_certificate/$1');
    $routes->post('store_journey', 'AdminNAAC::store_journey');
    $routes->get('delete_journey/(:num)', 'AdminNAAC::delete_journey/$1');
    $routes->post('store_cordinator', 'AdminNAAC::store_cordinator');
    $routes->get('delete_cordinator/(:num)', 'AdminNAAC::delete_cordinator/$1');
});

// Admin CRUD - Downloads
$routes->group('AdminPortal/downloads', static function ($routes) {
    $routes->get('/', 'AdminDownloads::index');
    $routes->post('store', 'AdminDownloads::store');
    $routes->get('delete/(:num)', 'AdminDownloads::delete/$1');
});

// Admin CRUD - Clubs & Cells
$routes->group('AdminPortal/clubs', static function ($routes) {
    $routes->get('/', 'AdminClubs::index');
    $routes->get('create', 'AdminClubs::create');
    $routes->post('store', 'AdminClubs::store');
    $routes->get('edit/(:num)', 'AdminClubs::edit/$1');
    $routes->post('update/(:num)', 'AdminClubs::update/$1');
    $routes->get('delete/(:num)', 'AdminClubs::delete/$1');
    
    // Designations
    $routes->get('designations/(:num)', 'AdminClubs::designations/$1');
    $routes->post('saveDesignations/(:num)', 'AdminClubs::saveDesignations/$1');
    $routes->get('deleteDesignation/(:num)/(:num)', 'AdminClubs::deleteDesignation/$1/$2');
    
    // Members
    $routes->get('members/(:num)', 'AdminClubs::members/$1');
    $routes->post('addMember/(:num)', 'AdminClubs::addMember/$1');
    $routes->get('deleteMember/(:num)/(:num)', 'AdminClubs::deleteMember/$1/$2');
});

$routes->group('AdminPortal/clubs/activities', static function ($routes) {
    $routes->get('/', 'AdminClubActivities::index');
    $routes->post('store', 'AdminClubActivities::store');
    $routes->get('delete/(:num)', 'AdminClubActivities::delete/$1');
});

// Admin CRUD - Students Union
$routes->group('AdminPortal/union', static function ($routes) {
    // Panel
    $routes->get('panel', 'AdminUnion::panel');
    $routes->post('panel/store', 'AdminUnion::storePanel');
    $routes->get('panel/delete/(:num)', 'AdminUnion::deletePanel/$1');
    // Incharge
    $routes->get('incharge', 'AdminUnion::incharge');
    $routes->post('incharge/store', 'AdminUnion::storeIncharge');
    $routes->get('incharge/delete/(:num)', 'AdminUnion::deleteIncharge/$1');
    // Activities
    $routes->get('activities', 'AdminUnion::activities');
    $routes->post('activities/store', 'AdminUnion::storeActivity');
    $routes->get('activities/delete/(:num)', 'AdminUnion::deleteActivity/$1');
    // Gallery
    $routes->get('gallery', 'AdminUnion::gallery');
    $routes->post('gallery/store', 'AdminUnion::storeGallery');
    $routes->get('gallery/delete/(:num)', 'AdminUnion::deleteGallery/$1');
});

// Admin CRUD - NCC
$routes->group('AdminPortal/ncc', static function ($routes) {
    $routes->get('/', 'AdminNcc::index');
    $routes->post('store', 'AdminNcc::store');
    $routes->get('delete/(:num)', 'AdminNcc::delete/$1');
});

// Admin CRUD - NSS
$routes->group('AdminPortal/nss', static function ($routes) {
    $routes->get('/', 'AdminNss::index');
    $routes->post('store', 'AdminNss::store');
    $routes->get('delete/(:num)', 'AdminNss::delete/$1');
});

// Admin CRUD - Programmes
$routes->group('AdminPortal/programmes', static function ($routes) {
    $routes->get('/', 'AdminProgrammes::index');
    $routes->get('create', 'AdminProgrammes::create');
    $routes->get('edit/(:num)', 'AdminProgrammes::edit/$1');
    $routes->post('store', 'AdminProgrammes::store');
    $routes->get('delete/(:num)', 'AdminProgrammes::delete/$1');
});

// Admin CRUD - Courses
$routes->group('AdminPortal/courses', static function ($routes) {
    $routes->get('/', 'AdminCourses::index');
    $routes->get('create', 'AdminCourses::create');
    $routes->get('edit/(:num)', 'AdminCourses::edit/$1');
    $routes->post('store', 'AdminCourses::store');
    $routes->get('delete/(:num)', 'AdminCourses::delete/$1');
});

// Admin CRUD - Alumni Management
$routes->group('AdminPortal/alumni', static function ($routes) {
    $routes->get('/', 'AdminAlumni::index');
    $routes->get('requests', 'AdminAlumni::requests');
    $routes->get('approve/(:num)', 'AdminAlumni::approve/$1');
    $routes->get('delete/(:num)', 'AdminAlumni::delete/$1');
    
    // Activities
    $routes->get('activities', 'AdminAlumni::activities');
    $routes->post('store_activity', 'AdminAlumni::store_activity');
    $routes->get('delete_activity/(:num)', 'AdminAlumni::delete_activity/$1');
});

// Institutional Data Management
$routes->group('AdminPortal/pta', ['namespace' => 'App\Controllers\AdminPortal'], function ($routes) {
    $routes->get('', 'AdminPta::index');
    $routes->get('create', 'AdminPta::create');
    $routes->post('store', 'AdminPta::store');
    $routes->get('edit/(:num)', 'AdminPta::edit/$1');
    $routes->post('update/(:num)', 'AdminPta::update/$1');
    $routes->get('delete/(:num)', 'AdminPta::delete/$1');
});

$routes->group('AdminPortal/antiragging', ['namespace' => 'App\Controllers\AdminPortal'], function ($routes) {
    $routes->get('', 'AdminAntiRagging::index');
    $routes->post('update', 'AdminAntiRagging::update');
    $routes->get('complaints', 'AdminAntiRagging::complaints');
    $routes->post('updateStatus/(:num)', 'AdminAntiRagging::updateStatus/$1');
});

$routes->group('AdminPortal/grievance', ['namespace' => 'App\Controllers\AdminPortal'], function ($routes) {
    $routes->get('', 'AdminGrievance::index');
    $routes->post('update', 'AdminGrievance::update');
    $routes->get('delete_complaint/(:num)', 'AdminGrievance::delete_complaint/$1');
});

$routes->group('AdminPortal/rti', ['namespace' => 'App\Controllers\AdminPortal'], function ($routes) {
    $routes->get('', 'AdminRti::index');
    $routes->get('create', 'AdminRti::create');
    $routes->post('store', 'AdminRti::store');
    $routes->get('edit/(:num)', 'AdminRti::edit/$1');
    $routes->post('update/(:num)', 'AdminRti::update/$1');
    $routes->get('delete/(:num)', 'AdminRti::delete/$1');
});

// Admin CRUD - IQAC Documents & Settings
$routes->group('AdminPortal/iqac', ['namespace' => 'App\Controllers\AdminPortal'], function ($routes) {
    $routes->get('', 'AdminIqac::index');
    $routes->get('create', 'AdminIqac::create');
    $routes->post('store', 'AdminIqac::store');
    $routes->get('edit/(:num)', 'AdminIqac::edit/$1');
    $routes->post('update/(:num)', 'AdminIqac::update/$1');
    $routes->get('delete/(:num)', 'AdminIqac::delete/$1');
    $routes->post('saveSettings', 'AdminIqac::saveSettings');
});

// Admin CRUD - Carousel
$routes->group('AdminPortal/carousel', static function ($routes) {
    $routes->get('/', 'AdminCarousel::index');
    $routes->post('save', 'AdminCarousel::save');
    $routes->get('delete/(:num)', 'AdminCarousel::delete/$1');
});

// Admin CRUD - University Toppers
$routes->group('AdminPortal/toppers', static function ($routes) {
    $routes->get('/', 'AdminToppers::index');
    $routes->get('create', 'AdminToppers::create');
    $routes->post('store', 'AdminToppers::store');
    $routes->get('delete/(:num)', 'AdminToppers::delete/$1');
});

// Admin CRUD - Announcements Ticker
$routes->group('AdminPortal/announcements', ['namespace' => 'App\Controllers\AdminPortal'], function ($routes) {
    $routes->get('', 'AdminAnnouncements::index');
    $routes->post('store', 'AdminAnnouncements::store');
    $routes->get('edit/(:num)', 'AdminAnnouncements::edit/$1');
    $routes->post('update/(:num)', 'AdminAnnouncements::update/$1');
    $routes->get('delete/(:num)', 'AdminAnnouncements::delete/$1');
    $routes->get('toggle/(:num)', 'AdminAnnouncements::toggleActive/$1');
});

// Admin CRUD - Testimonials
$routes->group('AdminPortal/testimonials', static function ($routes) {
    $routes->get('/', 'AdminTestimonials::index');
    $routes->get('create', 'AdminTestimonials::create');
    $routes->get('edit/(:num)', 'AdminTestimonials::edit/$1');
    $routes->post('store', 'AdminTestimonials::store');
    $routes->get('delete/(:num)', 'AdminTestimonials::delete/$1');
});

// Admin Enquiries Read
$routes->group('AdminPortal/enquiries', static function ($routes) {
    $routes->get('/', 'AdminEnquiries::index');
    $routes->get('read/(:num)', 'AdminEnquiries::read/$1');
    $routes->get('delete/(:num)', 'AdminEnquiries::delete/$1');
});


// Public Form Submissions
$routes->post('submit-grievance', 'Home::submit_grievance');
$routes->get('Home/staff_registration', 'Home::staff_registration');
$routes->post('Home/staff_registration_store', 'Home::staff_registration_store');

// Public Alumni Portal
$routes->group('alumni', static function ($routes) {
    $routes->get('/', 'Alumni::index');
    
    // Auth & Registration
    $routes->get('login', 'Alumni::login');
    $routes->post('attemptLogin', 'Alumni::attemptLogin');
    $routes->get('logout', 'Alumni::logout');
    $routes->get('register', 'Alumni::register');
    $routes->post('submitRegistration', 'Alumni::submitRegistration');
    
    // Protected Dashboard
    $routes->get('dashboard', 'Alumni::dashboard');
    $routes->post('addEducation', 'Alumni::addEducation');
    $routes->post('addExperience', 'Alumni::addExperience');
    $routes->get('dropEducation/(:num)', 'Alumni::dropEducation/$1');
    $routes->get('dropExperience/(:num)', 'Alumni::dropExperience/$1');
});

// Public Gallery
$routes->get('Home/gallery', 'Home::gallery');
$routes->get('Home/view_gallery/(:num)', 'Home::view_gallery/$1');
