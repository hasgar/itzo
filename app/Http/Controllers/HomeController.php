<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Healthcare;
use App\States;
use App\User;
use App\Users;
use App\Photos;
use App\HealthcareTypes;
use App\Cities;
use App\Types;
use App\Fecilities;
use Sentinel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $states = States::where('country_id',101)->get();
        $types = Types::all();
        return view('public.home')->with('states',$states)->with('types',$types);

    }

    public function up(Request $request)
    {
        $str = file_get_contents('hospitals.json');
        $json = json_decode($str, true);
        $detail = '';
        foreach ($json as $field => $value) {
    if ($value["SL"] != "") {

        

        if(User::where('email',strtolower(str_replace(' ', '', $value["Email ID"])))->count() < 1) {
        $value["Lab"] = strtolower(str_replace(' ', '',$value["Lab"]));
        if ($value["Lab"] == "yes")
            $value["Lab"] = 1;
        else
            $value["Lab"] = 0;

        $value["Parking"] = strtolower(str_replace(' ', '',$value["Parking"]));
        if ($value["Parking"] == "yes")
            $value["Parking"] = 1;
        else
            $value["Parking"] = 0;

        $value["Single   AC rooms"] = strtolower(str_replace(' ', '',$value["Single   AC rooms"]));
        if ($value["Single   AC rooms"] == "yes")
            $value["Single   AC rooms"] = 1;
        else
            $value["Single   AC rooms"] = 0;

        $value["Single Non AC rooms"] = strtolower(str_replace(' ', '',$value["Single Non AC rooms"]));
        if ($value["Single Non AC rooms"] == "yes")
            $value["Single Non AC rooms"] = 1;
        else
            $value["Single Non AC rooms"] = 0;

        $value["Shared rooms"] = strtolower(str_replace(' ', '',$value["Shared rooms"]));
        if ($value["Shared rooms"] == "yes")
            $value["Shared rooms"] = 1;
        else
            $value["Shared rooms"] = 0;

        $value["General wards"] = strtolower(str_replace(' ', '',$value["General wards"]));
        if ($value["General wards"] == "yes")
            $value["General wards"] = 1;
        else
            $value["General wards"] = 0;

        $value["Veg"] = strtolower(str_replace(' ', '',$value["Veg"]));
        if ($value["Veg"] == "yes")
            $value["Veg"] = 1;
        else
            $value["Veg"] = 0;

        $value["Non veg"] = strtolower(str_replace(' ', '',$value["Non veg"]));
        if ($value["Non veg"] == "yes")
            $value["Non veg"] = 1;
        else
            $value["Non veg"] = 0;

        $value["Organic"] = strtolower(str_replace(' ', '',$value["Organic"]));
        if ($value["Organic"] == "yes")
            $value["Organic"] = 1;
        else
            $value["Organic"] = 0;

        $value["Personalized Diet"] = strtolower(str_replace(' ', '',$value["Personalized Diet"]));
        if ($value["Personalized Diet"] == "yes")
            $value["Personalized Diet"] = 1;
        else
            $value["Personalized Diet"] = 0;

        $value["Pharmacy"] = strtolower(str_replace(' ', '',$value["Pharmacy"]));
        if ($value["Pharmacy"] == "yes")
            $value["Pharmacy"] = 1;
        else
            $value["Pharmacy"] = 0;

        $value["Wheelchair access"] = strtolower(str_replace(' ', '',$value["Wheelchair access"]));
        if ($value["Wheelchair access"] == "yes")
            $value["Wheelchair access"] = 1;
        else
            $value["Wheelchair access"] = 0;

        $value["Ambulance"] = strtolower(str_replace(' ', '',$value["Ambulance"]));
        if ($value["Ambulance"] == "yes")
            $value["Ambulance"] = 1;
        else
            $value["Ambulance"] = 0;

        $value["Inpatient"] = strtolower(str_replace(' ', '',$value["Inpatient"]));
        if ($value["Inpatient"] == "yes")
            $value["Inpatient"] = 1;
        else
            $value["Inpatient"] = 0;

        $value["Blood bank"] = strtolower(str_replace(' ', '',$value["Blood bank"]));
        if ($value["Blood bank"] == "yes")
            $value["Blood bank"] = 1;
        else
            $value["Blood bank"] = 0;

        $value["Fitness centre"] = strtolower(str_replace(' ', '',$value["Fitness centre"]));
        if ($value["Fitness centre"] == "yes")
            $value["Fitness centre"] = 1;
        else
            $value["Fitness centre"] = 0;

        $value["Yoga"] = strtolower(str_replace(' ', '',$value["Yoga"]));
        if ($value["Yoga"] == "yes")
            $value["Yoga"] = 1;
        else
            $value["Yoga"] = 0;
        $value["Massage"] = strtolower(str_replace(' ', '',$value["Massage"]));
        if ($value["Massage"] == "yes")
            $value["Massage"] = 1;
        else
            $value["Massage"] = 0;
        $value["Sports"] = strtolower(str_replace(' ', '',$value["Sports"]));
        if ($value["Sports"] == "yes")
            $value["Sports"] = 1;
        else
            $value["Sports"] = 0;
        $value["Tours"] = strtolower(str_replace(' ', '',$value["Tours"]));
        if ($value["Tours"] == "yes")
            $value["Tours"] = 1;
        else
            $value["Tours"] = 0;
        $value["Credit Card"] = strtolower(str_replace(' ', '',$value["Credit Card"]));
        if ($value["Credit Card"] == "yes")
            $value["Credit Card"] = 1;
        else
            $value["Credit Card"] = 0;
        $value["Debit Card"] = strtolower(str_replace(' ', '',$value["Debit Card"]));
        if ($value["Debit Card"] == "yes")
            $value["Debit Card"] = 1;
        else
            $value["Debit Card"] = 0;
        $value["Cash"] = strtolower(str_replace(' ', '',$value["Cash"]));
        if ($value["Cash"] == "yes")
            $value["Cash"] = 1;
        else
            $value["Cash"] = 0;
        $value["Cheque"] = strtolower(str_replace(' ', '',$value["Cheque"]));
        if ($value["Cheque"] == "yes")
            $value["Cheque"] = 1;
        else
            $value["Cheque"] = 0;
        $value["Insurance"] = strtolower(str_replace(' ', '',$value["Insurance"]));
        if ($value["Insurance"] == "yes")
            $value["Insurance"] = 1;
        else
            $value["Insurance"] = 0;
        $value["Lab"] = strtolower(str_replace(' ', '',$value["Lab"]));
        if ($value["Lab"] == "yes")
            $value["Lab"] = 1;
        else
            $value["Lab"] = 0;
        $value["Lab"] = strtolower(str_replace(' ', '',$value["Lab"]));
        if ($value["Lab"] == "yes")
            $value["Lab"] = 1;
        else
            $value["Lab"] = 0;
        $value["Lab"] = strtolower(str_replace(' ', '',$value["Lab"]));
        if ($value["Lab"] == "yes")
            $value["Lab"] = 1;
        else
            $value["Lab"] = 0;
        $value["Departments"] = str_replace('\n', ',',$value["Departments"]);
        $value["Email ID"] = strtolower(str_replace(' ', '', $value["Email ID"]));
        if( $value["Email ID"] == "n/a" || $value["Email ID"] == "" ) {
        $value["Email ID"] = strtolower(str_replace(' ', '', $value["Healthcare Name"])).rand(1000,9999)."@example.com";
        }
        else {
            $value["Email ID"]=preg_replace('/^([^,]*).*$/', '$1', $value["Email ID"]);
        }
        $value["Name of contact person"] = strtolower(str_replace(' ', '', $value["Name of contact person"]));
        $value["Name of contact person"] = str_replace('n/a', ' ', $value["Name of contact person"]);
        $value["Mobile Number of Contact Person"] = strtolower(str_replace(' ', '', $value["Mobile Number of Contact Person"]));
        $value["Mobile Number of Contact Person"] = str_replace('n/a', ' ', $value["Mobile Number of Contact Person"]);
        $value["Contact No"] = strtolower(str_replace(' ', '', $value["Contact No"]));
        $value["Contact No"] = str_replace('n/a', ' ', $value["Contact No"]);
        $value["Fax"] = strtolower(str_replace(' ', '', $value["Fax"]));
        $value["Fax"] = str_replace('n/a', ' ', $value["Fax"]);
    if($value["Single   AC rooms"] == "yes" || $value["Single Non AC rooms"] == "yes" || $value["Shared rooms"] == "yes" || $value["General wards"] == "yes" )
    $value["accommodation"] = 1;
    else
    $value["accommodation"] = 0;
    if($value["Veg"] == "Yes" || $value["Non veg"] == "Yes" || $value["Organic"] == "Yes" || $value["Personalized Diet"] == "Yes" )
    $value["food"] = 1;
    else
    $value["food"] = 0;
    $value["latlon"] = str_replace(' ', '', $value["Latitude, Longtitude"]);
    $value["latlon"] = explode(',', $value["Latitude, Longtitude"]);
    $value["lat"] = $value["latlon"][0];
    $value["lon"] = $value["latlon"][1];

$data = array('name' => $value["Healthcare Name"],
              'email' => $value["Email ID"],
              'timing' => $value["Timing"],
              'password' => 'nJ2@a!zKm',
              'password_confirmation' => 'nJ2@a!zKm',
              'treatment_type_1' => $value["Treatment Type IDs"],
              'working_hours_mon_from' => '10 AM',
              'working_hours_mon_to' => '05 PM',
              'working_hours_sun_from' => '10 AM',
              'working_hours_sun_to' => '05 PM',
              'certificate' => 1,
              'departments' => $value["Departments"],
              'country' => $value["Country ID"],
              'state' => $value["State ID"],
              'city' => $value["City ID"],
              'village' => " ",
              'address' => $value["Address"],
              'pin' => "",
              'contact_name' => $value["Name of contact person"],
              'contact_email' => $value["Mobile Number of Contact Person"],
              'mobile' => $value["Contact No"],
              'phone' => " ",
              'fax' => $value["Fax"],
              'website' => $value["Website"],
              'description' => $value["Description"],
              'no_of_beds' => $value["No. of beds"],
              'fec-lab' => $value["Lab"],
              'fec-parking' => $value["Parking"],
              'fec-pharmacy' => $value["Pharmacy"],
              'fec-wheelchair' => $value["Wheelchair access"],
              'fec-ambulance' => $value["Ambulance"],
              'fec-inpatient' => $value["Inpatient"],
              'fec-bloodbank' => $value["Blood bank"],
              'fec-fitnesscentre' => $value["Fitness centre"],
              'fec-yoga' => $value["Yoga"],
              'fec-massage' => $value["Massage"],
              'fec-sports' => $value["Sports"],
              'fec-tours' => $value["Tours"],
              'fec-insurance' => $value["Insurance"],
              'pay-cash' => $value["Cash"],
              'pay-creditcard' => $value["Credit Card"],
              'pay-debitcard' => $value["Debit Card"],
              'pay-cheque' => $value["Cheque"],
              'accommodation' => $value["accommodation"],
              'accommodation_single_ac' => $value["Single   AC rooms"],
              'accommodation_single_non_ac' => $value["Single Non AC rooms"],
              'accommodation_shared' => $value["Shared rooms"],
              'accommodation_general' => $value["General wards"],
              'food' => $value["food"],
              'food_veg' => $value["Veg"],
              'food_non_veg' => $value["Non veg"],
              'food_organic' => $value["Organic"],
              'food_personalised' => $value["Personalized Diet"],
              'price' => " ",
              'loc-lat' => $value["lat"],
              'loc-lon' => $value["lon"],
              'type' => 2,
              );
$data['password'] = rand(100000,9999999);
$detail .= "Name: ".$value["Healthcare Name"].",Email: ".$value["Email ID"].",Password: "."\n".$data['password']."<br>";


$user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

            if(!isset($data['food_veg'])) {
                $data['food_veg'] = 0;
            }
            if(!isset($data['food_non_veg'])) {
                $data['food_non_veg'] = 0;
            }
            if(!isset($data['food_organic'])) {
                $data['food_organic'] = 0;
            }
            if(!isset($data['food_personalised'])) {
                $data['food_personalised'] = 0;
            }
            if(!isset($data['fec-lab'])) {
                $data['fec-lab'] = 0;
            }
            if(!isset($data['fec-parking'])) {
                $data['fec-parking'] = 0;
            }
            if(!isset($data['fec-pharmacy'])) {
                $data['fec-pharmacy'] = 0;
            }
            if(!isset($data['fec-wheelchair'])) {
                $data['fec-wheelchair'] = 0;
            }
            if(!isset($data['fec-ambulance'])) {
                $data['fec-ambulance'] = 0;
            }
            if(!isset($data['fec-inpatient'])) {
                $data['fec-inpatient'] = 0;
            }
            if(!isset($data['fec-bloodbank'])) {
                $data['fec-bloodbank'] = 0;
            }
            if(!isset($data['fec-fitnesscentre'])) {
                $data['fec-fitnesscentre'] = 0;
            }
            if(!isset($data['fec-yoga'])) {
                $data['fec-yoga'] = 0;
            }
            if(!isset($data['fec-massage'])) {
                $data['fec-massage'] = 0;
            }
            if(!isset($data['fec-tours'])) {
                $data['fec-tours'] = 0;
            }
            if(!isset($data['fec-sports'])) {
                $data['fec-sports'] = 0;
            }
            if(!isset($data['fec-insurance'])) {
                $data['fec-insurance'] = 0;
            }
            if(!isset($data['pay-cheque'])) {
                $data['pay-cheque'] = 0;
            }
            if(!isset($data['pay-creditcard'])) {
                $data['pay-creditcard'] = 0;
            }
            if(!isset($data['pay-debitcard'])) {
                $data['pay-debitcard'] = 0;
            }
            if(!isset($data['pay-cash'])) {
                $data['pay-cash'] = 0;
            }
            if(!isset($data['accommodation_single_ac'])) {
                $data['accommodation_single_ac'] = 0;
            }
            if(!isset($data['accommodation_single_non_ac'])) {
                $data['accommodation_single_non_ac'] = 0;
            }
            if(!isset($data['accommodation_shared'])) {
                $data['accommodation_shared'] = 0;
            }
            if(!isset($data['accommodation_general'])) {
                $data['accommodation_general'] = 0;
            }
            $healthcare = Healthcare::create([
            'name' => $data['name'],
            'user_id' => $user['id'],
            'email' =>  $data['email'],
            'certificate' =>  $data['certificate'],
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
            'village' => $data['village'],
            'address' => $data['address'],
            'pin' => $data['pin'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'fax' => $data['fax'],
            'price' => $data['price'],
            'description' => $data['description'],
            'veg' => $data['food_veg'],
            'non_veg' => $data['food_non_veg'],
            'organic' => $data['food_organic'],
            'personalised_diet' => $data['food_personalised'],
            'food' => $data['food'],
            'accommodation' => $data['accommodation'],
            'general_ward' => $data['accommodation_general'],
            'shared' => $data['accommodation_shared'],
            'single_non_ac' => $data['accommodation_single_non_ac'],
            'single_ac' => $data['accommodation_single_ac'],
            'mon_from' => $data['working_hours_mon_from'],
            'mon_to' => $data['working_hours_mon_to'],
            'sun_from' => $data['working_hours_sun_from'],
            'sun_to' => $data['working_hours_sun_to'],
            'contact_email' => $data['contact_email'],
            'contact_name' => $data['contact_name'],
            'website' => $data['website'],
            'lab' => $data['fec-lab'],
            'departments' => $data['departments'],
            'no_of_beds' => $data['no_of_beds'],
            'parking' => $data['fec-parking'],
            'pharmacy' => $data['fec-pharmacy'],
            'wheelchair' => $data['fec-wheelchair'],
            'ambulance' => $data['fec-ambulance'],
            'inpatient' => $data['fec-inpatient'],
            'bloodbank' => $data['fec-bloodbank'],
            'fitness' => $data['fec-fitnesscentre'],
            'yoga' => $data['fec-yoga'],
            'massage' => $data['fec-massage'],
            'sports' => $data['fec-sports'],
            'tours' => $data['fec-tours'],
            'insurance' => $data['fec-insurance'],
            'cash' => $data['pay-cash'],
            'debit_card' => $data['pay-debitcard'],
            'debit_card' => $data['pay-creditcard'],
            'cheque' => $data['pay-cheque'],
            'longtitude' => $data['loc-lon'],
            'latitude' => $data['loc-lat'],
            'payment_till' => '2016-12-31',
            'is_approved' => 1
        ]);

        $pro_pic = '';
            for($i=1;$i<4;$i++){
                if(!empty($value["Photo ".$i]) && $value["Photo ".$i] != "N/A"){

                  $url = $value["Photo ".$i];
                  $exx = explode('.', $url);
$exten = array_pop($exx);
                    $fileName = str_replace(" ","",uniqid('img_'.$healthcare['id'].'_', true).microtime().'.'.$exten);

      $img = 'images/healthcare/'.$fileName;
      file_put_contents($img, file_get_contents($url));

            if($i == 1)
$pro_pic = $fileName;

              $photos = Photos::create([
            'healthcare_id' => $healthcare['id'],
            'photo_url' => $fileName,
           ]);

            }
            }
            Healthcare::where('id',$healthcare['id'])->update(['pro_pic' => $pro_pic]);

            HealthcareTypes::create([
            'type_id' => $data["treatment_type_1"],
            'healthcare_id' => $healthcare['id']
        ]);

            $user1 = Sentinel::findById($user['id']);

            $role = Sentinel::findRoleByName('Healthcare');

            $role->users()->attach($user1);




     }
        }
}
echo $detail;
    }

    public function notFound()
    {

        return view('public.notFound');

    }
    public function contact()
    {
        return view('public.contact');

    }

    public function contactSend(Request $request) {
        if(isset($request['subject']) && isset($request['name']) && isset($request['email']) && isset($request['message'])) {
         $emails = "info@chiktizo.com";
          $email = htmlspecialchars($request['email']) ;
        $name = htmlspecialchars($request['name']);
$sub = htmlspecialchars($request['subject']);
$subject = "Contact Form Message from $name";
$msg = htmlspecialchars($request['message']);
$message = "Name: <b>$name</b><br>Email: <b>$email</b><br>Mobile: <b>$sub</b><br>Message: <b>$msg</b>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ". $emails . "\r\n" .
"Reply-To: " . $email . "\r\n" .
"X-Mailer: PHP/" . phpversion();
if(mail("md.jasil@gmail.com",$subject,$message,$headers)){
   return view('public.contactSuccess');
}
else {
   return view('public.contactError');
}
        }
    }

}
