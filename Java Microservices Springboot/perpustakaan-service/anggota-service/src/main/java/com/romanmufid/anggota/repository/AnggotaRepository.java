package com.romanmufid.anggota.repository;

import com.romanmufid.anggota.entity.Anggota;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

/**
 *
 * @author Acer
 */
@Repository
public interface AnggotaRepository extends JpaRepository<Anggota, Long>{
    public Anggota findAnggotaById(Long id);
}
