package com.romanmufid.anggota.entity;

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
@AllArgsConstructor
@NoArgsConstructor
public class Anggota {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private String nama;
    private String alamat;
}
