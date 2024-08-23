package com.romanmufid.anggota.controller;


import com.romanmufid.anggota.entity.Anggota;
import com.romanmufid.anggota.service.AnggotaService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

/**
 *
 * @author Acer
 */
@RestController
@RequestMapping("/anggota")
public class AnggotaController {
    @Autowired
    private AnggotaService anggotaService;
 
    
    @PostMapping("/")
    public Anggota saveAnggota(@RequestBody Anggota anggota){
        return anggotaService.saveAnggota(anggota);
    }
    
    @GetMapping("/{id}")
    public Anggota findAnggotaById(@PathVariable("id") Long id){
        return anggotaService.findAnggotaById(id);
    }
    
    @GetMapping("/")
    public List<Anggota> findAllAnggota(){
        return anggotaService.findAllAnggota();
    }
    
    @PutMapping("/")
    public Anggota updateAnggota(@RequestBody Anggota anggota){
        return anggotaService.updateAnggota(anggota);
    }
    
    @DeleteMapping("/{id}")
    public void deleteAnggotaById(@PathVariable("/id") Long id){
        anggotaService.deleteAnggotaById(id);
    }
}
