<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("test",function(){
    echo uniqid().floor(microtime(true));
});


Route::post("/resetPasswordlink",[\App\Http\Controllers\UserController::class,"resetPasswordlink"])
        ->name("resetPasswordlink");

       
	
	 Route::post("/admin/add_notes",[\App\Http\Controllers\UserController::class,"add_notes"])
        ->name("add_notes");

	Route::post("/admin/fetch_dates",[\App\Http\Controllers\UserController::class,"fetch_dates"])
        ->name("fetch_dates");

	Route::post("/admin/Fetch_notes_details",[\App\Http\Controllers\UserController::class,"Fetch_notes_details"])
        ->name("Fetch_notes_details");

         Route::post("/code_validate",[\App\Http\Controllers\UserController::class,"linkvalid"])
        ->name("code_validate");

         Route::post("/newpassword_user",[\App\Http\Controllers\UserController::class,"newpassword_user"])
        ->name("linkvalid");

 Route::post("/login",[\App\Http\Controllers\UserController::class,"login"])
        ->name("admin.login");
Route::prefix("admin")->group(function(){
    Route::post("login",[\App\Http\Controllers\UserController::class,"login"])
        ->name("admin.login");//login  (admin,supervisor,decorator)

    Route::post("create/supervisor",[\App\Http\Controllers\UserController::class,"createSupervisor"])
        ->middleware("auth:sanctum")
        ->name("admin.create_supervisor");
       
        Route::post("view/Supervisors",[\App\Http\Controllers\UserController::class,"Supervisors"])
        ->middleware("auth:sanctum")
        ->name("admin.Supervisors");
        // Supervisors

        Route::post("create/decorator",[\App\Http\Controllers\UserController::class,"createDecorator"])
        ->middleware("auth:sanctum")
        ->name("admin.create_decorator");
        
        Route::post("create/createDecoratoradmin",[\App\Http\Controllers\UserController::class,"createDecoratoradmin"])
        ->middleware("auth:sanctum")
        ->name("admin.createDecoratoradmin");
        
        

        Route::post("block/supervisor",[\App\Http\Controllers\UserController::class,"blockSupervisor"])
        ->middleware("auth:sanctum")
        ->name("admin.block_supervisor");

        Route::post("unblock/supervisor",[\App\Http\Controllers\UserController::class,"unblockSupervisor"])
        ->middleware("auth:sanctum")
        ->name("admin.unblock_supervisor");

        Route::post("block/decorator",[\App\Http\Controllers\UserController::class,"blockDecorator"])
        ->middleware("auth:sanctum")
        ->name("admin.block_decorator");

        Route::post("unblock/decorator",[\App\Http\Controllers\UserController::class,"unblockDecorator"])
        ->middleware("auth:sanctum")
        ->name("admin.unblock_decorator");

        Route::post("reset/password",[\App\Http\Controllers\UserController::class,"resetPassword"])
        ->middleware("auth:sanctum")
        ->name("admin.reset_password");

        Route::post("search/decorator",[\App\Http\Controllers\UserController::class,"searchDecorator"])
        ->middleware("auth:sanctum")
        ->name("admin.search_decorator");

        
        Route::post("search/supervisor",[\App\Http\Controllers\UserController::class,"searchSupervisor"])
        ->middleware("auth:sanctum")
        ->name("admin.search_supervisor");

        Route::post("list/supervisors",[\App\Http\Controllers\UserController::class,"Supervisors"])
        ->middleware("auth:sanctum")
        ->name("admin.supervisors");


        Route::post("disapprove/decorator",[\App\Http\Controllers\UserController::class,"blockDecorator"])
        ->middleware("auth:sanctum")
        ->name("admin.disapprove_decorator");

        Route::post("approve/decorator",[\App\Http\Controllers\UserController::class,"unblockDecorator"])
        ->middleware("auth:sanctum")
        ->name("admin.approve_decorator");

        Route::post("create/job",[\App\Http\Controllers\JobController::class,"createJob"])
        ->middleware("auth:sanctum")
        ->name("admin.create_job");

        Route::post("search/job/date",[\App\Http\Controllers\JobController::class,"searchJob"])
        ->middleware("auth:sanctum")
        ->name("admin.search_job");

        Route::post("search/job/refid",[\App\Http\Controllers\JobController::class,"searchJob"])
        ->middleware("auth:sanctum")
        ->name("admin.search_job");

        Route::post("search/job/assigned",[\App\Http\Controllers\JobController::class,"searchJob"])
        ->middleware("auth:sanctum")
        ->name("admin.search_job");

        Route::post("search/jobs",[\App\Http\Controllers\JobController::class,"searchJob"])
        ->middleware("auth:sanctum")
        ->name("admin.search_job");

        
        Route::post("job/count_jobs",[\App\Http\Controllers\JobController::class,"count_jobs"])
        ->middleware("auth:sanctum")
        ->name("admin.count_jobs");

              
        Route::post("view/supervisor",[\App\Http\Controllers\UserController::class,"searchSupervisor"])
        ->middleware("auth:sanctum")
        ->name("admin.search_supervisor");

        Route::post("edit/supervisor",[\App\Http\Controllers\UserController::class,"editSupervisor"])
        ->middleware("auth:sanctum")
        ->name("admin.edit_supervisor");

         Route::post("edit/editDecorator",[\App\Http\Controllers\UserController::class,"editDecorator"])
        ->middleware("auth:sanctum")
        ->name("admin.editDecorator");

        
});

Route::prefix("supervisor")->group(function(){
Route::post("login",[\App\Http\Controllers\UserController::class,"login"])
        ->name("supervisor.login");

        Route::post("reset/password",[\App\Http\Controllers\UserController::class,"resetPassword"])
        ->middleware("auth:sanctum")
        ->name("supervisor.reset_password");

        Route::post("search/job/date",[\App\Http\Controllers\JobController::class,"searchJob"])
        ->middleware("auth:sanctum")
        ->name("admin.search_job");

        Route::post("search/job/refid",[\App\Http\Controllers\JobController::class,"searchJob"])
        ->middleware("auth:sanctum")
        ->name("admin.search_job");

        Route::post("search/job/assigned",[\App\Http\Controllers\JobController::class,"searchJob"])
        ->middleware("auth:sanctum")
        ->name("admin.search_job");

        Route::post("search/job/ViewProjects",[\App\Http\Controllers\JobController::class,"ViewProjects"])
        ->middleware("auth:sanctum")
        ->name("admin.search_Plots");

        Route::post("search/job/ViewPlots",[\App\Http\Controllers\JobController::class,"ViewPlots"])
        ->middleware("auth:sanctum")
        ->name("admin.search_Plots");

        Route::post("search/job/taskDatails",[\App\Http\Controllers\JobController::class,"taskDatails"])
        ->middleware("auth:sanctum")
        ->name("admin.taskDatails");
        
         Route::post("search/job/taskDatailsAdmin",[\App\Http\Controllers\JobController::class,"taskDatailsAdmin"])
        ->middleware("auth:sanctum")
        ->name("admin.taskDatailsAdmin");

        

         Route::post("search/job/taskDatails/verificationOfWork",[\App\Http\Controllers\JobController::class,"taskDatails2"])
        ->middleware("auth:sanctum")
        ->name("admin.taskDatails2");
        
            Route::post("search/job/taskDatails/verificationOfWorkAdmin",[\App\Http\Controllers\JobController::class,"taskDatails2Admin"])
        ->middleware("auth:sanctum")
        ->name("admin.taskDatails2Admin");


        Route::post("search/job/taskDatails/healthAndSafety",[\App\Http\Controllers\JobController::class,"taskDatails3"])
        ->middleware("auth:sanctum")
        ->name("admin.taskDatails3");
        
        Route::post("search/job/taskDatails/healthAndSafetyAdmin",[\App\Http\Controllers\JobController::class,"taskDatails3Admin"])
        ->middleware("auth:sanctum")
        ->name("admin.taskDatails3ADmin");

        
        Route::post("make/workflow/makeReadySheet",[\App\Http\Controllers\FormController::class,"makeReadySheet"])
        ->middleware("auth:sanctum")
        ->name("admin.makeReadySheet");

        Route::get("fetch/workflow/makeReadySheet/{plot_id}/{tab_id}",[\App\Http\Controllers\FormController::class,"fetchworksheets"])
        ->middleware("auth:sanctum")
        ->name("admin.makeReadySheet");

        Route::post("fetch/single/workflow/makeReadySheet",[\App\Http\Controllers\FormController::class,"fetchsingleworksheets"])
        ->middleware("auth:sanctum")
        ->name("admin.makeReadySheet");

        Route::post("make/workflow/insert_handover",[\App\Http\Controllers\FormController::class,"insert_handover"])
        ->middleware("auth:sanctum")
        ->name("admin.insert_handover");
        
        Route::post("make/workflow/viewhandover",[\App\Http\Controllers\FormController::class,"viewhandover"])
        ->middleware("auth:sanctum")
        ->name("admin.viewhandover");

          Route::post("insert/healthAndSecurity/Puwer",[\App\Http\Controllers\FormController::class,"Puwer"])
        ->middleware("auth:sanctum")
        ->name("admin.Puwer");

        

        Route::post("make/workflow/singlehandover",[\App\Http\Controllers\FormController::class,"singlehandover"])
        ->middleware("auth:sanctum")
        ->name("admin.singlehandover");

        Route::post("make/workflow/insertScope",[\App\Http\Controllers\FormController::class,"insertScope"])
        ->middleware("auth:sanctum")
        ->name("admin.insertScope");

         Route::post("make/workflow/power_inspection",[\App\Http\Controllers\FormController::class,"power_inspection"])
        ->middleware("auth:sanctum")
        ->name("admin.power_inspection");

          Route::post("insert/healthAndSecurity/SlitTrip",[\App\Http\Controllers\FormController::class,"SlitTrip"])
        ->middleware("auth:sanctum")
        ->name("admin.SlitTrip");

        Route::post("fetch/workflow/viewscope",[\App\Http\Controllers\FormController::class,"viewscope"])
        ->middleware("auth:sanctum")
        ->name("admin.viewscope");

        Route::post("fetch/ready/viewMethodService",[\App\Http\Controllers\FormController::class,"viewMethodService"])
        ->middleware("auth:sanctum")
        ->name("admin.viewMethodService");
        
        Route::post("insert/workflow/RemendialSheet",[\App\Http\Controllers\PdfController::class,"RemendialSheet"])
        ->middleware("auth:sanctum")
        ->name("admin.RemendialSheet");

        Route::post("fetch/workflow/fetchRemedial",[\App\Http\Controllers\PdfController::class,"fetchRemedial"])
        ->middleware("auth:sanctum")
        ->name("admin.fetchRemedial");
        

        Route::post("fetch/workflow/viewsinglescope",[\App\Http\Controllers\FormController::class,"viewsinglescope"])
        ->middleware("auth:sanctum")
        ->name("admin.viewsinglescope");

        Route::post("make/workflow/insertWarenty",[\App\Http\Controllers\FormController::class,"insertWarenty"])
        ->middleware("auth:sanctum")
        ->name("admin.insertWarenty");

        
        Route::post("fetch/workflow/viewwarenty",[\App\Http\Controllers\FormController::class,"viewwarenty"])
        ->middleware("auth:sanctum")
        ->name("admin.viewwarenty");

        Route::post("insert/healthAndSecurity/methodStatement",[\App\Http\Controllers\FormController::class,"methodStatement"])
        ->middleware("auth:sanctum")
        ->name("admin.methodStatement");

        Route::post("insert/healthAndSecurity/cleanup",[\App\Http\Controllers\FormController::class,"cleanup"])
        ->middleware("auth:sanctum")
        ->name("admin.cleanup");

        Route::post("fetch/healthAndSecurity/fetchcleanup",[\App\Http\Controllers\PdfController::class,"fetchcleanup"])
        ->middleware("auth:sanctum")
        ->name("admin.fetchcleanup");

        Route::post("insert/healthAndSecurity/healthAndSafety",[\App\Http\Controllers\FormController::class,"healthAndSafety"])
        ->middleware("auth:sanctum")
        ->name("admin.healthAndSafety");

        Route::post("insert/healthAndSecurity/electric_equipment",[\App\Http\Controllers\FormController::class,"electric_equipment"])
        ->middleware("auth:sanctum")
        ->name("admin.electric_equipment");

        Route::post("insert/healthAndSecurity/housekeepings",[\App\Http\Controllers\FormController::class,"housekeepings"])
        ->middleware("auth:sanctum")
        ->name("admin.housekeepings");

        Route::post("fetch/healthAndSecurity/housekeepings",[\App\Http\Controllers\PdfController::class,"Housekeeping"])
        ->middleware("auth:sanctum")
        ->name("admin.Housekeeping");

        Route::post("insert/healthAndSecurity/top_decorting",[\App\Http\Controllers\FormController::class,"top_decorting"])
        ->middleware("auth:sanctum")
        ->name("admin.top_decorting");

        Route::post("insert/healthAndSecurity/decoration",[\App\Http\Controllers\FormController::class,"decoration"])
        ->middleware("auth:sanctum")
        ->name("admin.decoration");

        Route::post("insert/healthAndSecurity/Miscoat",[\App\Http\Controllers\FormController::class,"Miscoat"])
        ->middleware("auth:sanctum")
        ->name("admin.Miscoat");

        Route::post("insert/healthAndSecurity/accident",[\App\Http\Controllers\FormController::class,"Accident"])
        ->middleware("auth:sanctum")
        ->name("admin.Accident");

        
        Route::post("insert/healthAndSecurity/personal_protective",[\App\Http\Controllers\FormController::class,"personal_protective"])
        ->middleware("auth:sanctum")
        ->name("admin.personal_protective");


        Route::post("fetch/healthAndSecurity/accident",[\App\Http\Controllers\PdfController::class,"Accident"])
        ->middleware("auth:sanctum")
        ->name("admin.Accident");

        Route::post("fetch/healthAndSecurity/PersonalProtection",[\App\Http\Controllers\PdfController::class,"PersonalProtection"])
        ->middleware("auth:sanctum")
        ->name("admin.PersonalProtection");
        

        Route::post("insert/healthAndSecurity/Instruction",[\App\Http\Controllers\FormController::class,"Induction"])
        ->middleware("auth:sanctum")
        ->name("admin.Induction");
        

        Route::post("insert/healthAndSecurity/COSHH",[\App\Http\Controllers\FormController::class,"COSHH"])
        ->middleware("auth:sanctum")
        ->name("admin.COSHH");

          Route::post("insert/healthAndSecurity/HealthAndSAfetyInspection",[\App\Http\Controllers\FormController::class,"HealthAndSAfetyInspection"])
        ->middleware("auth:sanctum")
        ->name("admin.HealthAndSAfetyInspection");



         Route::post("insert/healthAndSecurity/DailyBreifing",[\App\Http\Controllers\FormController::class,"DailyBreifing"])
        ->middleware("auth:sanctum")
        ->name("admin.DailyBreifing");

        

        Route::post("fetch/healthAndSecurity/COSHH",[\App\Http\Controllers\PdfController::class,"COSHH"])
        ->middleware("auth:sanctum")
        ->name("admin.COSHH");


 Route::post("insert/healthAndSecurity/covid",[\App\Http\Controllers\FormController::class,"covid"])
        ->middleware("auth:sanctum")
        ->name("admin.covid");

        Route::post("fetch/healthAndSecurity/ToolBoxRegister",[\App\Http\Controllers\PdfController::class,"ToolBoxRegister"])
        ->middleware("auth:sanctum")
        ->name("admin.ToolBoxRegister");


        Route::post("insert/healthAndSecurity/WorkingAtHeightEquip",[\App\Http\Controllers\FormController::class,"WorkingAtHeightEquip"])
        ->middleware("auth:sanctum")
        ->name("admin.WorkingAtHeightEquip");


        
   Route::post("insert/healthAndSecurity/WorkingAtHeight",[\App\Http\Controllers\FormController::class,"WorkingAtHeight"])
        ->middleware("auth:sanctum")
        ->name("admin.WorkingAtHeight");
        
        
        Route::post("insert/healthAndSecurity/DrugAndAlcohol",[\App\Http\Controllers\FormController::class,"DrugAndAlcohol"])
        ->middleware("auth:sanctum")
        ->name("admin.DrugAndAlcohol");


          Route::post("insert/healthAndSecurity/VoilenceAndAggression",[\App\Http\Controllers\FormController::class,"VoilenceAndAggression"])
        ->middleware("auth:sanctum")
        ->name("admin.VoilenceAndAggression");

        Route::post("insert/healthAndSecurity/SilicaDust",[\App\Http\Controllers\FormController::class,"SilicaDust"])
        ->middleware("auth:sanctum")
        ->name("admin.SilicaDust");
        

          Route::post("insert/healthAndSecurity/fire_safety",[\App\Http\Controllers\FormController::class,"fire_safety"])
        ->middleware("auth:sanctum")
        ->name("admin.fire_safety");

           Route::post("insert/healthAndSecurity/DustMask",[\App\Http\Controllers\FormController::class,"DustMask"])
        ->middleware("auth:sanctum")
        ->name("admin.DustMask");


         Route::post("insert/healthAndSecurity/MobileEvelated",[\App\Http\Controllers\FormController::class,"MobileEvelated"])
        ->middleware("auth:sanctum")
        ->name("admin.MobileEvelated");

 Route::post("insert/healthAndSecurity/housekeepingTB",[\App\Http\Controllers\FormController::class,"housekeepingTB"])
        ->middleware("auth:sanctum")
        ->name("admin.housekeepingTB");


        Route::post("fetch/healthAndSecurity/WorkingAtHeightEquip",[\App\Http\Controllers\PdfController::class,"WorkingAtHeightEquip"])
        ->middleware("auth:sanctum")
        ->name("admin.WorkingAtHeightEquip");

        Route::post("insert/healthAndSecurity/Ladders",[\App\Http\Controllers\FormController::class,"Ladders"])
        ->middleware("auth:sanctum")
        ->name("admin.Ladders");

        Route::post("fetch/healthAndSecurity/Ladders",[\App\Http\Controllers\PdfController::class,"Ladders"])
        ->middleware("auth:sanctum")
        ->name("admin.Ladders");

        Route::post("insert/healthAndSecurity/quaity",[\App\Http\Controllers\FormController::class,"quaity"])
        ->middleware("auth:sanctum")
        ->name("admin.quaity");

        Route::post("fetch/healthAndSecurity/quaity",[\App\Http\Controllers\PdfController::class,"quaity"])
        ->middleware("auth:sanctum")
        ->name("admin.quaity");


        Route::post("insert/healthAndSecurity/ToolBoxRegister",[\App\Http\Controllers\FormController::class,"ToolBoxRegister"])
        ->middleware("auth:sanctum")
        ->name("admin.ToolBoxRegister");

          Route::post("insert/healthAndSecurity/IntroTraining",[\App\Http\Controllers\FormController::class,"intro_training"])
        ->middleware("auth:sanctum")
        ->name("admin.IntroTraining");

        Route::post("fetch/healthAndSecurity/COSHH",[\App\Http\Controllers\PdfController::class,"COSHH"])
        ->middleware("auth:sanctum")
        ->name("admin.COSHH");

        Route::post("fetch/healthAndSecurity/ToolBoxRegister",[\App\Http\Controllers\PdfController::class,"ToolBoxRegister"])
        ->middleware("auth:sanctum")
        ->name("admin.ToolBoxRegister");
        // ToolBoxRegister
        Route::post("fetch/healthAndSecurity/top_decorting",[\App\Http\Controllers\PdfController::class,"top_decorting"])
        ->middleware("auth:sanctum")
        ->name("admin.top_decorting");

        Route::post("fetch/healthAndSecurity/safe_working",[\App\Http\Controllers\PdfController::class,"safe_working"])
        ->middleware("auth:sanctum")
        ->name("admin.safe_working");
        
        Route::post("fetch/healthAndSecurity/fetchElectricEquipment",[\App\Http\Controllers\PdfController::class,"fetchElectricEquipment"])
        ->middleware("auth:sanctum")
        ->name("admin.fetchElectricEquipment");

        Route::post("insert/healthAndSecurity/friday_pack",[\App\Http\Controllers\FormController::class,"friday_pack"])
        ->middleware("auth:sanctum")
        ->name("admin.viewwarenty");

        
        Route::post("fetch/healthAndSecurity/HealthAndSafetyMeasure",[\App\Http\Controllers\PdfController::class,"HealthAndSafetyMeasure"])
        ->middleware("auth:sanctum")
        ->name("admin.HealthAndSafetyMeasure");

       
        Route::post("fetch/healthAndSecurity/friday_pack",[\App\Http\Controllers\PdfController::class,"friday_pack"])
        ->middleware("auth:sanctum")
        ->name("admin.viewwarenty");

        Route::post("insert/healthAndSecurity/harmfulSubstance",[\App\Http\Controllers\FormController::class,"harmfulSubstance"])
        ->middleware("auth:sanctum")
        ->name("admin.harmfulSubstance");

        Route::post("fetch/healthAndSecurity/HarmfullSubstance",[\App\Http\Controllers\PdfController::class,"HarmfullSubstance"])
        ->middleware("auth:sanctum")
        ->name("admin.HarmfullSubstance");

         Route::post("insert/verification/accurate",[\App\Http\Controllers\FormController::class,"Accurate"])
        ->middleware("auth:sanctum")
        ->name("admin.Accurate");
        

          Route::post("insert/verification/verrify_worksheet",[\App\Http\Controllers\FormController::class,"verrify_worksheet"])
        ->middleware("auth:sanctum")
        ->name("admin.verrify_worksheet");


        Route::post("send_mail",[\App\Http\Controllers\PdfController::class,"mail_sending"])
        ->middleware("auth:sanctum")
        ->name("admin.mail_sending");
 Route::post("mail_sendingAdmin",[\App\Http\Controllers\PdfController::class,"mail_sendingAdmin"])
        ->middleware("auth:sanctum")
        ->name("admin.mail_sendingAdmin");

        
});

Route::prefix("decorator")->group(function(){
    Route::post("login",[\App\Http\Controllers\UserController::class,"login"])
            ->name("supervisor.login");

            Route::post("uploadImag",[\App\Http\Controllers\UserController::class,"uploadImag"])
            ->name("decorator.uploadImag");

            Route::post("fetchImag",[\App\Http\Controllers\UserController::class,"fetchImag"])
            ->name("decorator.fetchImag");

            Route::post("uploadCSCS",[\App\Http\Controllers\UserController::class,"uploadCSCS"])
            ->name("decorator.uploadCSCS");

            
            Route::post("fetchCSCS",[\App\Http\Controllers\UserController::class,"fetchCSCS"])
            ->name("decorator.fetchCSCS");
    });