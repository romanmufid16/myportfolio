package com.romanmufid.pengembalian.vo;


import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;


/**
 *
 * @author Acer
 */
@Data
@NoArgsConstructor
@AllArgsConstructor
public class Peminjaman {
    private Long id;
    private Long idAnggota;
    private Long idBuku;
    private String tglPinjam;
    private String tglKembali;
}
