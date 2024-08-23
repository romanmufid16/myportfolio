<?php

function koneksi()
{
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "tk_2b_blog";
    $port = "4306";

    $conn = mysqli_connect(
        $hostName,
        $userName,
        $password,
        $dbName,
        $port

    );

    if ($conn) {
        return $conn;
    } else {
        die('gagal menghubungkan ke database');
    }
}

function myQuery($sql)
{
    $query = mysqli_query(koneksi(), $sql);
    if ($query) {
        return $query;
    } else {
        die("terjadi kesalahan Query SQL");
    }
}

function insert($table, $data)
{
    if (!is_array($data) || count($data) == 0) {
        return false;
    }
    $field = "";
    $value = "";
    foreach ($data as $key => $isi) {
        $field .= ",`$key`";
        $value .= ",'$isi'";
    }
    $field = substr($field, 1);
    $value = substr($value, 1);

    $sql = "INSERT INTO $table ($field) VALUE ($value)";
    $query = myQuery($sql);
    return $query;

    echo $sql;
}


function update($table, $data, $syarat)
{
    if (!is_array($data) || count($data) == 0) {
        return false;
    }
    $set = "";
    foreach ($data as $key => $isi) {
        $set .= ", `$key` = '$isi'";
    }
    $set_ = substr($set, 1);
    $sql = "UPDATE $table SET $set_ WHERE $syarat";
    $query = myQuery($sql);
    return $query;
}

function allData($table, $where = "", $order = "", $limit = "")
{
    $sql = "SELECT * FROM $table $where $order $limit";
    $query = myQuery($sql);
    $datas = array();
    while ($data = mysqli_fetch_assoc($query)) {
        $datas[] = $data;
    }
    return $datas;
}

function listBuku($table, $where = "", $order = "", $limit = "")
{

    $sql = "SELECT * FROM $table $where $order $limit";
    $query = myQuery($sql);
    $no = 1;
    echo "<table border='1' cellpadding='10'>";
    echo "
    <tr>
    <th>No</th>
    <th>Kode buku</th>
    <th>Nama Buku</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>";

    while ($data = mysqli_fetch_assoc($query)) {
?>
        <!-- $datas[] = $data; -->
        <tr>
            <td><?php echo $no;
                $no++; ?></td>
            <td><?php echo $data['kode_buku']; ?></td>
            <td><?php echo $data['nama_buku']; ?></td>
            <td><?php echo $data['penulis']; ?></td>
            <td><?php echo $data['penerbit']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td><a href="hapus_buku.php?id=<?= $data['kode_buku'] ?>" class="btn btn-warning" onclick="return confirm('Anda yakin?')">Hapus</a> | <a href="edit_buku.php?id=<?= $data['kode_buku'] ?>" class="btn btn-info">Edit</a></td>

        </tr>
    <?php
    }
    return $data;
}


function listAnggota($table, $where = "", $order = "", $limit = "")
{

    $sql = "SELECT * FROM $table $where $order $limit";
    $query = myQuery($sql);
    $no = 1;
    echo "<table border='1' cellpadding='10'>";
    echo "
    <tr>
    <th>No</th>
    <th>Kode Anggota</th>
    <th>Nama Anggota</th>
    <th>Jurusan</th>
    <th>Program Studi</th>
    <th>Email</th>
    <th>Aksi</th>
    </tr>";

    while ($data = mysqli_fetch_assoc($query)) {
    ?>
        <!-- $datas[] = $data; -->
        <tr>
            <td><?php echo $no;
                $no++; ?></td>
            <td><?php echo $data['kode_anggota']; ?></td>
            <td><?php echo $data['nama_anggota']; ?></td>
            <td><?php echo $data['jurusan']; ?></td>
            <td><?php echo $data['prodi']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><a href="hapus_anggota.php?id=<?= $data['kode_anggota'] ?>" class="btn btn-warning" onclick="return confirm('Anda yakin?')">Hapus</a> | <a href="edit_anggota.php" class="btn btn-info">Edit</a></td>
        </tr>
<?php
    }
    return $data;
}
function hapusBuku()
{
    $sql = "DELETE FROM buku WHERE kode_buku='$_GET[id]'";
    $query = myQuery($sql);

    if ($query) {
        header("location:list_buku.php");
    } else {
        print("Gagal Menghapus data");
    }

    return $query;
}

function hapusAnggota()
{
    $sql = "DELETE FROM anggota WHERE kode_anggota='$_GET[id]'";
    $query = myQuery($sql);

    if ($query) {
        header("location:list_anggota.php");
    } else {
        print("Gagal Menghapus data");
    }

    return $query;
}


function oneData($table, $syarat)
{
    $sql = "SELECT * FROM $table WHERE $syarat";
    $query = myQuery($sql);
    $data = mysqli_fetch_assoc($query);
    return $data;
}

function delete($table, $key)
{
    $sql = "DELETE FROM $table WHERE $key";
    $query = myQuery($sql);
    return $query;
}

function upload($nama_file, $tmp_file, $max_file = 2, $size_file, $extention)
{
    //profile_pic.jpg//
    $explode_file = explode(".", $nama_file);

    //profile_pic.jpg//
    $extention_file = end($explode_file);

    if (in_array($extention_file, $extention)) {
        if ($size_file <= $max_file) {
            if (move_uploaded_file($tmp_file, "images/" .$nama_file )) {
                $pesan['status'] = 1;
                $pesan['message'] = "File Berhasil di Upload";
            } else {
                $pesan['status'] = 0;
                $pesan['message'] = "File gagal Upload";
            }
        } else {
            $pesan['status'] = 0;
            $pesan['message'] = "Silahkan Upload File maximal : $max_file Mb,Silahkan di upload kembali";
        }
    } else {
        $pesan['status'] = 0;
        $pesan['message'] = 'Silahkan Upload File berupa gambar';
    }
    return $pesan;
}

function kodePembayaran(){
    $sql = "SELECT max(kode_pembayaran_2020) as maxPembayaran_2020 FROM pembayaran_2020";
    $query = myQuery($sql);
    $data = mysqli_fetch_assoc($query);

    $maxPembayaran_2020 = $data['maxPembayaran_2020'];

    $nourut = (int) substr($maxPembayaran_2020, 7,3);
    $nourut++;
    $char = 'BRG2023';
    $kode_pembayaran_2020 = $char. sprintf('%03s',$nourut);

    return $kode_pembayaran_2020;

}



































// function upload($nama_file, $temp_file, $max_file = 2, $size, $extention){
//     if($nama_file != ""){
//         //kondisi dimana jika file di upload
//         //foto.jpg
//         $explode_file = explode(".",$nama_file);
//         //jpg
//         $tipe_file = end($explode_file);
//         // ['jpg','jpeg','png']
//         if(in_array($tipe_file, $extention)){
//             //kb -> mb bagi 1024 * 1024
//             if($size >= $max_file ){
//                 if(move_uploaded_file($temp_file, "images/$nama_file")){
//                     $pesan['status'] = 1;
//                     $pesan['info'] = "File berhasil di upload";
//                 }else{
//                     $pesan['status'] = 2;
//                     $pesan['info'] = "File gagal di upload";
//                 }

//                 //kondisi jika file lebih kecil dari batas maximal upload
//             }else{
//                 //jika file lebih besar dari batas maximal
//                 $pesan['status'] = 0;
//                 $pesan['info'] = "File yang di upload terlalu besar, Maximal : $max_file Mb";
//             }

//         }else{
//             $status['']=0;
//             $pesan = "File yang di upload bukan berupa gambar";

//         }

//     }else{
//         $pesan['status'] = 2;
//         $pesan['info'] = "Tidak ada file yang di upload";
         
//     }
//     return $pesan;
// }



// $dataBuku = [
//     'kode_buku' => '008',
//     'nama_buku' => 'Flutter',
//     'penulis' => 'Sandika',
//     'penerbit' => 'Gramedia',
//     'status' => '1',
// ];

// $dataAnggota = [
//     'kode_anggota' => '008',
//     'nama_anggota' => 'Bintang',
//     'jurusan' => 'TI',
//     'prodi' => 'Tkom',
//     'email' => 'bintangauliuzul18@gmail.com'

// ];

// insert($table = "buku", $dataBuku);
// insert($table = "anggota", $dataAnggota);
// echo "Data Berhasil di simpan ";


// $oneData = oneData($table ="buku" ,$syarat = "kode_buku = '001'");
// if(is_array($oneData)){
//     echo "<pre>";
//     print_r($oneData);
//     echo "</pre>";
//     }else{ echo "data tidak di temukan";} 


// $allData = allData($table = "buku", $where = "", $order = "", $limit = "");
// if (is_array($allData)) {
//     echo "<pre>";
//     print_r($allData);
//     echo "</pre>";
// } else {
//     echo "data tidak di temukan";
// } 


// $updateBuku = [
// 'nama_buku' => 'Flutter Lanjutan 3',
// 'penulis' => 'Sandika 2',
// 'penerbit' => 'Gramedia 2',
// 'status' => '0'
// ];

// $updateAnggota = [
//     'kode_anggota' => 'B001',
//     'nama_anggota' => 'Bintang Aulizul',
//     'jurusan' => 'Mesin',
//     'prodi' => 'Tkom',
//     'email' => 'bintangaulizul18@gmail.com'
// ];


// update($table="buku",$updateBuku, $syarat = "kode_buku = '001'");
// update($table="anggota",$updateAnggota, $syarat = "kode_anggota = 'B001'");
// echo "Data Berhasil Di Update"; 



// delete($table = "buku", $key = "kode_buku = '001'");
// delete($table = "anggota", $key = "kode_anggota = 'B001'");
// echo "Data Berhasil Di Delete"; 
