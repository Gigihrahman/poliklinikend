<?php
include 'koneksi.php';
$query = "SELECT pasien.id, pasien.nama, daftar_poli.id AS id_daftar_poli, daftar_poli.keluhan, daftar_poli.status_periksa,periksa.tgl_periksa,periksa.catatan
                FROM daftar_poli 
                INNER JOIN pasien ON (pasien.id = daftar_poli.id_pasien)
		INNER JOIN periksa ON(daftar_poli.id = periksa.id_daftar_poli) ORDER BY periksa.id_daftar_poli";
$result = mysqli_query($mysqli, $query);
$data = [];

while ($row = mysqli_fetch_assoc($result)) {



    echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama']}</td>                
                <td>{$row['keluhan']}</td>
                <td>
                    
                 ";
    if (array_key_exists('status_periksa', $row)) {
        // Check the status and display the appropriate button
        if ($row['status_periksa'] == 1) {
            // Status is 1, hide "Periksa" button and show "Edit" button
            echo "<button class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='" . $row['id'] . "' data-poli='" . $row['id_daftar_poli'] . "'>Edit</button>";
        } else {
            // Status is 0, hide "Edit" button and show "Periksa" button
            echo "<button class='btn btn-success periksa-btn' data-toggle='modal' data-target='#periksaModal' data-id='" . $row['id'] . "' data-poli='" . $row['id_daftar_poli'] . "'>Periksa</button>";
        }
    } else {
        // Handle the case where 'status_periksa' key is not present in the array
        echo "Status not available";
    }

    echo "</td>";
    echo "</tr>";
    $data[] = $row;
}
mysqli_close($mysqli);
