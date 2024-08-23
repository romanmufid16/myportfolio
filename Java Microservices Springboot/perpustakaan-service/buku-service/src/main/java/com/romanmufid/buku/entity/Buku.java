package com.romanmufid.buku.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

/**
 *
 * @author Acer
 */
@Entity
@Data
@NoArgsConstructor
@AllArgsConstructor
public class Buku {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private String kodeBuku;
    private String judul;
    private String penerbit;
    private String tahunTerbit;
}
