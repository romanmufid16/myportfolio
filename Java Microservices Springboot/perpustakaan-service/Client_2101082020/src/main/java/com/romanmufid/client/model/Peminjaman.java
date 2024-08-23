package com.romanmufid.client.model;

/**
 *
 * @author Acer
 */
public class Peminjaman {
    private Long id;
    private Long idAnggota;
    private Long idBuku;
    private String tglPinjam;
    private String tglKembali;

    public Peminjaman() {
    }
    
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Long getIdAnggota() {
        return idAnggota;
    }

    public void setIdAnggota(Long idAnggota) {
        this.idAnggota = idAnggota;
    }

    public Long getIdBuku() {
        return idBuku;
    }

    public void setIdBuku(Long idBuku) {
        this.idBuku = idBuku;
    }

    public String getTglPinjam() {
        return tglPinjam;
    }

    public void setTglPinjam(String tglPinjam) {
        this.tglPinjam = tglPinjam;
    }

    public String getTglKembali() {
        return tglKembali;
    }

    public void setTglKembali(String tglKembali) {
        this.tglKembali = tglKembali;
    }
    
    
}
