<?php

namespace App\Http\Controllers\HR\Employee;


use App\Model\Currency;
use App\Model\Department;
use App\Model\EmployeeDetails\BankDetails;
use App\Model\EmployeeDetails\BenefitDetails;
use App\Model\EmployeeDetails\ContactDetails;
use App\Model\EmployeeDetails\EmergencyDetails;
use App\Model\EmployeeDetails\Employee;
use App\Model\EmployeeDetails\JobDetails;
use App\Model\EmployeeDetails\OtherDetails;
use App\Model\EmployeeDetails\PersonalDetails;
use App\Model\JobLocation;
use App\Model\JobStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class EmployeeController extends Controller{

    /**
     * @var Department
     */
    private $department;
    /**
     * @var JobStatus
     */
    private $job_status;
    /**
     * @var JobLocation
     */
    private $jobLocation;
    /**
     * @var Currency
     */
    private $currency;
    /**
     * @var PersonalDetails
     */
    private $personalDetails;
    /**
     * @var ContactDetails
     */
    private $contactDetails;
    /**
     * @var JobDetails
     */
    private $jobDetails;
    /**
     * @var BenefitDetails
     */
    private $benefitDetails;
    /**
     * @var BankDetails
     */
    private $bankDetails;
    /**
     * @var EmergencyDetails
     */
    private $emergencyDetails;
    /**
     * @var OtherDetails
     */
    private $otherDetails;
    /**
     * @var Employee
     */
    private $employee;

    public function __construct(Department $department,
                                JobStatus $job_status,
                                JobLocation $jobLocation,
                                Currency $currency,
                                PersonalDetails $personalDetails,
                                ContactDetails $contactDetails,
                                JobDetails $jobDetails,
                                BenefitDetails $benefitDetails,
                                BankDetails $bankDetails,
                                EmergencyDetails $emergencyDetails,
                                OtherDetails $otherDetails,
                                Employee $employee){

        $this->department = $department;
        $this->job_status = $job_status;
        $this->jobLocation = $jobLocation;
        $this->currency = $currency;
        $this->personalDetails = $personalDetails;
        $this->contactDetails = $contactDetails;
        $this->jobDetails = $jobDetails;
        $this->benefitDetails = $benefitDetails;
        $this->bankDetails = $bankDetails;
        $this->emergencyDetails = $emergencyDetails;
        $this->otherDetails = $otherDetails;
        $this->employee = $employee;
    }


    public function index(){
        $employees = $this->employee->paginate(10);
        return view('admin.hr.employee.index',compact('employees'));
    }
    public function getFinalData(){
      return [
            'personal-details'=>session()->has('personal-details')?session()->get('personal-details'):null,
            'contact-details'=>session()->has('contact-details')?session()->get('contact-details'):null,
            'job-details'=>session()->has('job-details')?session()->get('job-details'):null,
            'benefits-details'=>session()->has('benefits-details')?session()->get('benefits-details'):null,
            'bank-details'=>session()->has('bank-details')?session()->get('bank-details'):null,
            'emergency-details'=>session()->has('emergency-details')?session()->get('emergency-details'):null,
            'other-details'=>session()->has('other-details')?session()->get('other-details'):null,
        ];
    }

    public function create($form){
        $arr = array_keys($this->getFinalData());
        for($x=0;$x<count($arr);$x++){
            if($this->getFinalData()[$arr[$x]]== null){
                $null_key = array_search($arr[$x],$arr);
                $running = array_search($form,$arr);
                if($null_key < $running){
                    for($i=$null_key;$i<count($arr);$i++){
                        session()->forget($arr[$i]);
                    }
                   return redirect()->to('hr/employee/'.$arr[$null_key].'/create');
                }
            }
        }
        for($i=array_search($form,$arr);$i<count($arr);$i++){
            session()->forget($arr[$i]);
        }
        if($form==='personal-details'){
            $view = view('admin.hr.employee._index-personal-details');
        }elseif($form==='contact-details'){
            $view = view('admin.hr.employee._index-contact-details');
        }elseif($form==='job-details'){
            $departments = $this->department->pluck('name','id');
            $job_status = $this->job_status->pluck('name','id');
            $jobLocation = $this->jobLocation->pluck('name','id');
            $view = view('admin.hr.employee._index-job-details',compact('departments','job_status','jobLocation'));
        }elseif($form==='benefits-details'){
            $currency = $this->currency->all();
            $view = view('admin.hr.employee._index-benefits-details',compact('currency'));
        }elseif($form==='bank-details'){
            $view = view('admin.hr.employee._index-bank-details');
        }elseif($form==='emergency-details'){
            $view = view('admin.hr.employee._index-emergency-details');
        }elseif($form==='other-details'){
            $view = view('admin.hr.employee._index-other-details');
        }else{
            $arr = array_keys($this->getFinalData());
            for($i=1;$i<count($arr);$i++){
                session()->forget($arr[$i]);
            }
            return redirect()->to('hr/employee')->with('error','Sorry, the page you are looking for could not be found.');
        }
        return view('admin.hr.employee.create',compact('view'));
    }
public function store(Request $request,$form){
$this->validate($request,$this->validateRuls()[$form]);
    session()->put($form,$request->all());
    $success_msg = ucfirst(str_replace('-',' ',$form)).' has been Save Successful';
    if($form==='personal-details'){
    return redirect()->to('hr/employee/contact-details/create')->with('success',$success_msg);
    }elseif($form==='contact-details'){
        return redirect()->to('hr/employee/job-details/create')->with('success',$success_msg);
    }elseif($form==='job-details'){
        return redirect()->to('hr/employee/benefits-details/create')->with('success',$success_msg);
    }elseif($form==='benefits-details'){
        return redirect()->to('hr/employee/bank-details/create')->with('success',$success_msg);
    }elseif($form==='bank-details'){
        return redirect()->to('hr/employee/emergency-details/create')->with('success',$success_msg);
    }elseif($form==='emergency-details'){
        return redirect()->to('hr/employee/other-details/create')->with('success',$success_msg);
    }elseif($form==='other-details'){
       return $this->finishing($request);
    }else{
        $arr = array_keys($this->getFinalData());
        for($i=1;$i<count($arr);$i++){
            session()->forget($arr[$i]);
        }
        return redirect()->to('hr/employee')->with('error','Sorry, the page you are looking for could not be found.');
    }
}
    private function finishing(Request $request){
        DB::beginTransaction();
        try{
            $session_data = $this->getFinalData();
            $arr = array_keys($this->getFinalData());
            for($i=1;$i<count($arr);$i++){
                if($session_data[$arr[$i]] == null){
                    throw new \Exception('Required '.$arr[$i].' is Required');
                }
            }
            $employee = new $this->employee;
            $employee->code =$session_data['personal-details']['code']==null?time():$session_data['personal-details']['code'];
            $employee->save();

            $personal_details = new $this->personalDetails;
            $personal_details->employee_id = $employee->id;
            $personal_details->status = $session_data['personal-details']['status'];
            $personal_details->title = $session_data['personal-details']['title'];
            $personal_details->first_name = $session_data['personal-details']['first_name'];
            $personal_details->last_name = $session_data['personal-details']['last_name'];
            $personal_details->gender = $session_data['personal-details']['gender'];
            $personal_details->date_of_birth = $session_data['personal-details']['date_of_birth'];
            $personal_details->marital_status = $session_data['personal-details']['marital_status'];
            $personal_details->nationality = $session_data['personal-details']['nationality'];
            $personal_details->national_insurance = $session_data['personal-details']['national_insurance'];
            $personal_details->driving_licence_number = $session_data['personal-details']['driving_licence_number'];
            $personal_details->save();

            $contact_details = new $this->contactDetails;
            $contact_details->employee_id = $employee->id;
            $contact_details->address_1 = $session_data['contact-details']['address_1'];
            $contact_details->address_2 = $session_data['contact-details']['address_2'];
            $contact_details->town = $session_data['contact-details']['town'];
            $contact_details->country = $session_data['contact-details']['country'];
            $contact_details->post_code = $session_data['contact-details']['post_code'];
            $contact_details->post_code = $session_data['contact-details']['post_code'];
            $contact_details->home_telephone = $session_data['contact-details']['home_telephone'];
            $contact_details->personal_mobile = $session_data['contact-details']['personal_mobile'];
            $contact_details->personal_email = $session_data['contact-details']['personal_email'];
            $contact_details->save();

            $job_details = new $this->jobDetails;
            $job_details->employee_id = $employee->id;
            $job_details->department_id = $session_data['job-details']['department'];
            $job_details->job_status_id = $session_data['job-details']['job_status'];
            $job_details->job_location_id = $session_data['job-details']['job_location'];
            $job_details->start_date = $session_data['job-details']['start_date'];
            $job_details->end_date = $session_data['job-details']['end_date'];
//            $job_details->working_day = $session_data['job-details']['working_day'];
            $job_details->work_telephone = $session_data['job-details']['work_telephone'];
            $job_details->work_mobile = $session_data['job-details']['work_mobile'];
            $job_details->experience = $session_data['job-details']['experience'];
            $job_details->education = $session_data['job-details']['education'];
            $job_details->skill = $session_data['job-details']['skill'];
            $job_details->notice_period = $session_data['job-details']['notice_period'];
            $job_details->provisional_period = $session_data['job-details']['provisional_period'];
            $job_details->save();

            $benefit_details = new $this->benefitDetails;
            $benefit_details->employee_id = $employee->id;
            $benefit_details->currency_id = $session_data['benefits-details']['currency'];
            $benefit_details->salary = $session_data['benefits-details']['salary'];
            $benefit_details->salary_type = $session_data['benefits-details']['salary_type'];
            $benefit_details->save();

            $bank_details = new $this->bankDetails;
            $bank_details->employee_id = $employee->id;
            $bank_details->account_name = $session_data['bank-details']['account_name'];
            $bank_details->account_number = $session_data['bank-details']['account_number'];
            $bank_details->bank_name = $session_data['bank-details']['bank_name'];
            $bank_details->save();

            $emergency_details = new $this->emergencyDetails;
            $emergency_details->employee_id = $employee->id;
            $emergency_details->contact_1_name = $session_data['emergency-details']['contact_1']['name'];
            $emergency_details->contact_1_relationship = $session_data['emergency-details']['contact_1']['relationship'];
            $emergency_details->contact_1_home_telephone = $session_data['emergency-details']['contact_1']['home_telephone'];
            $emergency_details->contact_1_work_telephone = $session_data['emergency-details']['contact_1']['work_telephone'];
            $emergency_details->contact_1_mobile = $session_data['emergency-details']['contact_1']['mobile'];
            $emergency_details->contact_1_email = $session_data['emergency-details']['contact_1']['email'];
            $emergency_details->contact_2_name = $session_data['emergency-details']['contact_1']['name'];
            $emergency_details->contact_2_relationship = $session_data['emergency-details']['contact_1']['relationship'];
            $emergency_details->contact_2_home_telephone = $session_data['emergency-details']['contact_1']['home_telephone'];
            $emergency_details->contact_2_work_telephone = $session_data['emergency-details']['contact_1']['work_telephone'];
            $emergency_details->contact_2_mobile = $session_data['emergency-details']['contact_1']['mobile'];
            $emergency_details->contact_2_email = $session_data['emergency-details']['contact_1']['email'];
            $emergency_details->save();

            $other_details = new $this->otherDetails;
            $other_details->employee_id = $employee->id;
            $other_details->other_info = $request->other_info;
            $other_details->save();

//            throw new \Exception('some-error');
        for($i=1;$i<count($arr);$i++){
            session()->forget($arr[$i]);
        }
         DB::commit();
            $status = true;
        }catch (\Exception $e){
            $arr = array_keys($this->getFinalData());
            for($i=1;$i<count($arr);$i++){
                session()->forget($arr[$i]);
            }
          DB::rollback();
            $status = false;
            $msg = $e->getMessage();
        }
        if($status){
            return redirect()->to('hr/employee')->with('success','Employee Add Successful');
        }else{
            return redirect()->to('hr/employee/personal-details/create')->with('error',$msg);
        }

    }
    private function validateRuls(){
       return $ruls = [
            'personal-details'=>[
                'code'=>'unique:employees',
                'status'=>'required',
                'title'=>'required',
                'first_name'=>'required',
                'last_name'=>'required',
                'date_of_birth'=>'required',
                'marital_status'=>'required',
            ],
            'contact-details'=>[
                'address_1'=>'required',
            ],
            'job-details'=>[
                'department'=>'required',
            ],
            'benefits-details'=>[

            ],
            'bank-details'=>[

            ],
            'emergency-details'=>[

            ],
            'other-details'=>[

            ],
        ];
    }
}
