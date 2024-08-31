<?php
include('../link/desigene/db.php');

$response = array('success' => false, 'data' => '');

$query = "SELECT * FROM `login`";
$result = mysqli_query($conn, $query);

if ($result) {
    $data = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $data .= '<tr>
                    <td>' . htmlspecialchars($row['FullName']) . '</td>
                    <td>' . htmlspecialchars($row['Gender']) . '</td>
                    <td>' . htmlspecialchars($row['Email']) . '</td>
                    <td>' . htmlspecialchars($row['EmployeeNumber']) . '</td>
                    <td>' . htmlspecialchars($row['Designation']) . '</td>
                    <td>
                        <button class="btn btn-dark edit-btn" data-id="' . htmlspecialchars($row['Id']) . '"><i class="fa-solid fa-pencil-alt"></i></button>
                        <button class="btn btn-dark delete-btn" data-id="' . htmlspecialchars($row['Id']) . '"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>';
    }
    $response['success'] = true;
    $response['data'] = $data;
} else {
    $response['message'] = 'Error fetching data: ' . mysqli_error($conn);
}

echo json_encode($response);
