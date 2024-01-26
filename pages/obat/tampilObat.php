<?php
    include 'koneksi.php';
    $query = "SELECT * FROM obat";
    $result = mysqli_query($mysqli, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama_obat']}</td>
                <td>{$row['kemasan']}</td>
                <td>{$row['harga']}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-warning edit-btn' data-obatid='{$row['id']}'>Edit</button>
                    <a href='pages/obat/hapusObat.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Anda yakin ingin hapus?\");'>Hapus</a>
                </td>
            </tr>";
    }
    mysqli_close($mysqli);

?>