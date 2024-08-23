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
public class Anggota {
    private Long id;
    private String nama;
    private String alamat;
}
