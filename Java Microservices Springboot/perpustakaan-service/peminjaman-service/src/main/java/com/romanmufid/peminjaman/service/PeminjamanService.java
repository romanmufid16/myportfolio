package com.romanmufid.peminjaman.service;

import com.romanmufid.peminjaman.entity.Peminjaman;
import com.romanmufid.peminjaman.repository.PeminjamanRepository;
import com.romanmufid.peminjaman.vo.Anggota;
import com.romanmufid.peminjaman.vo.Buku;
import com.romanmufid.peminjaman.vo.ResponseTemplate;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;

/**
 *
 * @author Acer
 */
@Service
public class PeminjamanService {
    @Autowired
    private PeminjamanRepository peminjamanRepository;
    
    @Autowired
    private RestTemplate restTemplate;
    
    public Peminjaman savePeminjaman(Peminjaman peminjaman){
        return peminjamanRepository.save(peminjaman);
    }
    
    public ResponseTemplate getPeminjamanById(Long id){
        ResponseTemplate vo = new ResponseTemplate();
        Peminjaman peminjaman = peminjamanRepository
                .findPeminjamanById(id);
        Anggota anggota = restTemplate
                .getForObject("http://localhost:8080/anggota/"+peminjaman
                        .getIdAnggota(), Anggota.class);
        Buku buku = restTemplate
                .getForObject("http://localhost:8090/buku/"+peminjaman
                        .getIdBuku(), Buku.class);
        vo.setPeminjaman(peminjaman);
        vo.setAnggota(anggota);
        vo.setBuku(buku);
        return vo;
    }
    
    public List<Peminjaman> getAllPeminjaman(){
        return peminjamanRepository.findAll();
    }
    
    public Peminjaman updatePeminjaman(Peminjaman peminjaman){
        return peminjamanRepository.save(peminjaman);
    }
    
    public void deletePeminjamanById(Long id){
        peminjamanRepository.deleteById(id);
    }
}
