package com.romanmufid.peminjaman.vo;

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
public class Buku {
    private Long id;
    private String kodeBuku;
    private String judul;
    private String penerbit;
    private String tahunTerbit;
}
