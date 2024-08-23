package com.romanmufid.peminjaman.vo;

import com.romanmufid.peminjaman.entity.Peminjaman;
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
public class ResponseTemplate {
    private Anggota anggota;
    private Buku buku;
    private Peminjaman peminjaman;
}
