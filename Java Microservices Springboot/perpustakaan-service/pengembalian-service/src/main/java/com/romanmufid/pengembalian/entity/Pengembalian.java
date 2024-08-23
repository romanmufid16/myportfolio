package com.romanmufid.pengembalian.entity;

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
public class Pengembalian {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private Long peminjamanId;
    private String tglKembali;
    private int terlambat;
    private int denda;
}
