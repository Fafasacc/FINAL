<?php
// Enable error reporting (consider disabling in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// AWS RDS MySQL connection parameters (consider using environment variables)
$servername = getenv('DB_SERVERNAME') ?: "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com";
$dbUsername = getenv('DB_USERNAME') ?: "admin";
$dbPassword = getenv('DB_PASSWORD') ?: "Lorax_290";
$dbname = getenv('DB_NAME') ?: "product_managements";

// Create a new connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for search term
$searchTerm = isset($_GET['search']) ? "%" . $conn->real_escape_string($_GET['search']) . "%" : null;

// Base SQL query to load pet details and medical history
$sql = "
    SELECT c.OWNER_NAME, 
           COALESCE(c.ADDRESS, 'N/A') AS ADDRESS, 
           COALESCE(c.TEL_PHONE_NO, 'N/A') AS TEL_PHONE_NO, 
           p.PETS_ID, 
           p.PETS_NAME, 
           p.GENDER, 
           p.AGE, 
           COALESCE(p.SPECIES, 'N/A') AS SPECIES, 
           COALESCE(p.BREED, 'N/A') AS BREED,
           COALESCE(p.MARKINGS, 'N/A') AS MARKINGS, 
           COALESCE(p.DATE_OF_BIRTH, 'N/A') AS DATE_OF_BIRTH,
           h.PATIENT_ID, 
           COALESCE(h.WT_KGS, 'N/A') AS WT_KGS, 
           COALESCE(h.TEMP_C, 'N/A') AS TEMP_C, 
           COALESCE(h.MEDICAL_HISTORY, 'N/A') AS MEDICAL_HISTORY, 
           COALESCE(h.TREATMENT_PRESCRIPTION, 'N/A') AS TREATMENT_PRESCRIPTION, 
           h.DATE AS HISTORY_DATE
    FROM PATIENT_RECORD p
    JOIN CUSTOMER c ON p.OWNER_ID = c.OWNER_ID
    LEFT JOIN PATIENT_HISTORY h ON p.PETS_ID = h.PETS_ID
";

// Apply search filter if provided
if ($searchTerm) {
    $sql .= " WHERE c.OWNER_NAME LIKE ? OR p.PETS_NAME LIKE ?";
}

// Sort by pet name in ascending order
$sql .= " ORDER BY p.PETS_NAME ASC, h.DATE ASC";

$stmt = $conn->prepare($sql);

// Bind the search term if it's provided
if ($searchTerm) {
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
}

// Execute the statement and check for errors
if (!$stmt->execute()) {
    die("SQL Execution Error: " . $stmt->error);
}

$result = $stmt->get_result();
$currentPetId = null;
$medicalHistory = [];

        // Display results in a table format
        while ($row = $result->fetch_assoc()) {
            $petId = htmlspecialchars($row["PETS_ID"]);

            if ($currentPetId !== $petId) {
                if ($currentPetId !== null) {
                    echo generatePetRow($currentPetId, $petDetails, $medicalHistory);
                }
                // Reset for the new pet
                $medicalHistory = [];
                $currentPetId = $petId;

                // Capture owner and pet details
                $petDetails = [
                    'owner_name' => htmlspecialchars($row["OWNER_NAME"]),
                    'pet_name' => htmlspecialchars($row["PETS_NAME"]),
                    'gender' => htmlspecialchars($row["GENDER"]),
                    'age' => htmlspecialchars($row["AGE"]),
                    'species' => htmlspecialchars($row["SPECIES"]),
                    'breed' => htmlspecialchars($row["BREED"]),
                    'address' => htmlspecialchars($row["ADDRESS"]),
                    'phone' => htmlspecialchars($row["TEL_PHONE_NO"]),
                    'date_of_birth' => htmlspecialchars($row["DATE_OF_BIRTH"]),
                    'markings' => htmlspecialchars($row["MARKINGS"])
                ];
            }

            // Capture medical history
            if ($row['PATIENT_ID']) {
                $historyDate = new DateTime($row["HISTORY_DATE"]);
                $formattedDate = $historyDate->format('F - d - Y');

                $medicalHistory[] = [
                    'patient_id' => htmlspecialchars($row["PATIENT_ID"]),
                    'weight' => htmlspecialchars($row["WT_KGS"]),
                    'temperature' => htmlspecialchars($row["TEMP_C"]),
                    'medical_history' => htmlspecialchars($row["MEDICAL_HISTORY"]),
                    'treatment' => htmlspecialchars($row["TREATMENT_PRESCRIPTION"]),
                    'date' => $formattedDate
                ];
            }
        }

        // Print last pet's data if it exists
        if ($currentPetId !== null) {
            echo generatePetRow($currentPetId, $petDetails, $medicalHistory);
        }

        // Function to generate HTML for a pet row
        function generatePetRow($petId, $petDetails, $medicalHistory) {
            $jsonHistory = htmlspecialchars(json_encode($medicalHistory));
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

// Close statement and connection
$stmt->close();
$conn->close();
?>
