package com.romanmufid.pengembalian.service;

import com.romanmufid.pengembalian.entity.Pengembalian;
import com.romanmufid.pengembalian.repository.PengembalianRepository;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author Acer
 */
@Service
public class PengembalianService {
    @Autowired
    private PengembalianRepository pengembalianRepository;

    public Pengembalian savePengembalian(Pengembalian pengembalian) {
        return pengembalianRepository.save(pengembalian);
    }

    public Pengembalian getPengembalianById(Long id) {
        return pengembalianRepository.findPengembalianById(id);
    }

    public List<Pengembalian> getAllPengembalian() {
        return pengembalianRepository.findAll();
    }

    public Pengembalian updatePengembalian(Pengembalian pengembalian) {
        return pengembalianRepository.save(pengembalian);
    }

    public void deletePengembalianById(Long id) {
        pengembalianRepository.deleteById(id);
    }
}
