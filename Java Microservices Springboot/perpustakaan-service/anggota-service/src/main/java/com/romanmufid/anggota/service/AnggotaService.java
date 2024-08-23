package com.romanmufid.anggota.service;

import com.romanmufid.anggota.entity.Anggota;
import com.romanmufid.anggota.repository.AnggotaRepository;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author Acer
 */
@Service
public class AnggotaService {
    @Autowired
    private AnggotaRepository anggotaRepository;
    
    public Anggota saveAnggota(Anggota anggota){
        return anggotaRepository.save(anggota);
    }
    
    public Anggota findAnggotaById(Long id){
        return anggotaRepository.findAnggotaById(id);
    }
    
    public List<Anggota> findAllAnggota(){
        return anggotaRepository.findAll();
    }
    
    public Anggota updateAnggota(Anggota anggota){
        return anggotaRepository.save(anggota);
    }
    
    public void deleteAnggotaById(Long id){
        anggotaRepository.deleteById(id);
    }
}
