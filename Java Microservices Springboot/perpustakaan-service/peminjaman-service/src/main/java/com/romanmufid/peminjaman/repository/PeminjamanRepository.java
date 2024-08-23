package com.romanmufid.peminjaman.repository;

import com.romanmufid.peminjaman.entity.Peminjaman;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

/**
 *
 * @author Acer
 */
@Repository
public interface PeminjamanRepository extends JpaRepository<Peminjaman, Long>{
    public Peminjaman findPeminjamanById(Long id);
}
