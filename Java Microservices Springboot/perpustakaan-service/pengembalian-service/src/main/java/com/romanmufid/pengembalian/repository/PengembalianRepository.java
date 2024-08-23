package com.romanmufid.pengembalian.repository;

import com.romanmufid.pengembalian.entity.Pengembalian;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

/**
 *
 * @author Acer
 */
@Repository
public interface PengembalianRepository extends JpaRepository<Pengembalian, Long>{
    public Pengembalian findPengembalianById(Long id);
}
