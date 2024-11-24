<?php
require 'vendor/autoload.php'; // Load Firebase Admin SDK dependencies

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// Initialize Firebase
$factory = (new Factory)->withServiceAccount('/path/to/your-firebase-adminsdk.json');
$firestore = $factory->createFirestore();
$database = $firestore->database();

// Get search parameters
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

// Fetch the customer matching the provided name or phone
$customersRef = $database->collection('CUSTOMER');
$query = $customersRef->where('OWNER_NAME', '=', $searchTerm)->documents();

// Prepare an array to hold all customer data
$customers = [];
foreach ($query as $customerDoc) {
    if ($customerDoc->exists()) {
        $customerData = $customerDoc->data();

        // Fetch associated pet records for each customer
        $petsRef = $database->collection('PATIENT_RECORD');
        $petsQuery = $petsRef->where('OWNER_ID', '=', $customerData['OWNER_ID'])->documents();

        foreach ($petsQuery as $petDoc) {
            $petData = $petDoc->data();

            // Fetch each pet’s medical history
            $historyRef = $database->collection('PATIENT_HISTORY')->where('PETS_ID', '=', $petData['PETS_ID'])->documents();
            $medicalHistory = [];
            foreach ($historyRef as $historyDoc) {
                $historyData = $historyDoc->data();
                $formattedDate = isset($historyData["DATE"]) 
                    ? (new DateTime($historyData["DATE"]))->format('F - d - Y') 
                    : 'N/A';

                $medicalHistory[] = [
                    'patient_id' => $historyData["PATIENT_ID"] ?? 'N/A',
                    'weight' => $historyData["WT_KGS"] ?? 'N/A',
                    'temperature' => $historyData["TEMP_C"] ?? 'N/A',
                    'medical_history' => $historyData["MEDICAL_HISTORY"] ?? 'N/A',
                    'treatment' => $historyData["TREATMENT_PRESCRIPTION"] ?? 'N/A',
                    'date' => $formattedDate
                ];
            }

            $petDetails = [
                'owner_name' => $customerData['OWNER_NAME'],
                'pet_name' => $petData['PETS_NAME'],
                'gender' => $petData['GENDER'],
                'age' => $petData['AGE'],
                'species' => $petData['SPECIES'],
                'breed' => $petData['BREED'],
                'address' => $customerData['ADDRESS'],
                'phone' => $customerData['TEL_PHONE_NO'],
                'date_of_birth' => $petData['DATE_OF_BIRTH'],
                'markings' => $petData['MARKINGS'],
                'medical_history' => $medicalHistory
            ];

            // Display the pet data in the desired format
            echo generatePetRow($petData['PETS_ID'], $petDetails);
        }
    }
}

// Function to generate HTML for a pet row
function generatePetRow($petId, $petDetails) {
    $jsonHistory = htmlspecialchars(json_encode($petDetails['medical_history']));
    return "
        <tr>
            <td>{$petDetails['owner_name']}</td>
            <td>{$petDetails['pet_name']}</td>
            <td>{$petDetails['gender']}</td>
            <td>{$petDetails['age']}</td>
            <td>{$petDetails['species']}</td>
            <td>{$petDetails['breed']}</td>
            <td>
                <button class='btn btn-info btn-sm me-2' 
                    data-dob='{$petDetails['date_of_birth']}' 
                    data-owner='{$petDetails['owner_name']}' 
                    data-age='{$petDetails['age']}' 
                    data-pet-id='{$petId}' 
                    data-species='{$petDetails['species']}' 
                    data-gender='{$petDetails['gender']}' 
                    data-breed='{$petDetails['breed']}' 
                    data-markings='{$petDetails['markings']}' 
                    data-address='{$petDetails['address']}' 
                    data-phone='{$petDetails['phone']}' 
                    data-pet='{$petDetails['pet_name']}' 
                    data-medical-history='{$jsonHistory}' 
                    onclick='openPatientHistoryModal(this)'>View History</button>
            </td>
        </tr>
    ";
}
?>
