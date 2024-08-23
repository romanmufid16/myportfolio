package com.romanmufid.buku.repository;

import com.romanmufid.buku.entity.Buku;
import org.springframework.data.jpa.repository.JpaRepository;

/**
 *
 * @author Acer
 */
public interface BukuRepository extends JpaRepository<Buku, Long>{
    public Buku findBukuById(Long id);
}
