package com.romanmufid.buku.service;

import com.romanmufid.buku.entity.Buku;
import com.romanmufid.buku.repository.BukuRepository;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author Acer
 */
@Service
public class BukuService {
    @Autowired
    private BukuRepository bukuRepository;
    
    public Buku saveBuku(Buku buku){
        return bukuRepository.save(buku);
    }
    
    public Buku findBukuById(Long id){
        return bukuRepository.findBukuById(id);
    }
    
    public List<Buku> findAllBuku(){
        return bukuRepository.findAll();
    }
    
    public Buku updateBuku(Buku buku){
        return bukuRepository.save(buku);
    }
    
    public void deleteBukuById(Long id){
        bukuRepository.deleteById(id);
    }
}
