package com.romanmufid.peminjaman.controller;

import com.romanmufid.peminjaman.entity.Peminjaman;
import com.romanmufid.peminjaman.service.PeminjamanService;
import com.romanmufid.peminjaman.vo.ResponseTemplate;
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
@RequestMapping("/peminjaman")
public class PeminjamanController {
    @Autowired
    private PeminjamanService peminjamanService;
    
    @PostMapping("/")
    public Peminjaman savePeminjaman(@RequestBody Peminjaman peminjaman){
        return peminjamanService.savePeminjaman(peminjaman);
    }
    
    @GetMapping("/{id}")
    public ResponseTemplate getPeminjamanById(@PathVariable("id") Long id){
        return peminjamanService.getPeminjamanById(id);
    }
    
    @GetMapping("/")
    public List<Peminjaman> getAllPeminjaman(){
        return peminjamanService.getAllPeminjaman();
    }
    
    @PutMapping("/")
    public Peminjaman updatePeminjaman(@RequestBody Peminjaman peminjaman){
        return peminjamanService.updatePeminjaman(peminjaman);
    }
    
    @DeleteMapping("/{id}")
    public void deletePeminjamanById(@PathVariable("id") Long id){
        peminjamanService.deletePeminjamanById(id);
    }
}
