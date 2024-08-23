package com.romanmufid.buku.controller;

import com.romanmufid.buku.entity.Buku;
import com.romanmufid.buku.service.BukuService;
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
@RequestMapping("/buku")
public class BukuController {
    @Autowired
    private BukuService bukuService;
    
    @PostMapping("/")
    public Buku saveBuku(@RequestBody Buku buku){
        return bukuService.saveBuku(buku);
    }
    
    @GetMapping("/{id}")
    public Buku findBukuById(@PathVariable("id") Long id){
        return bukuService.findBukuById(id);
    }
    
    @GetMapping("/")
    public List<Buku> findAllBuku(){
        return bukuService.findAllBuku();
    }
    
    @PutMapping("/")
    public Buku updateBuku(@RequestBody Buku buku){
        return bukuService.updateBuku(buku);
    }
    
    @DeleteMapping("/{id}")
    public void deleteBukuById(@PathVariable("id") Long id){
        bukuService.deleteBukuById(id);
    }
}
