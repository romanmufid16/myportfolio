package com.romanmufid.client.controller;

import com.romanmufid.client.FormPeminjaman;
import com.romanmufid.client.model.Peminjaman;
import com.romanmufid.client.service.PeminjamanService;
import java.util.List;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Acer
 */
public class PeminjamanController {
    private final PeminjamanService peminjamanService;
    private final FormPeminjaman formPeminjaman;
    
    public PeminjamanController(FormPeminjaman formPeminjaman){
        this.formPeminjaman = formPeminjaman;
        peminjamanService = new PeminjamanService();
    }
    
    public void clearForm(){
        formPeminjaman.getTxtPinjamId().setText("");
        formPeminjaman.getTxtAnggotaId().setText("");
        formPeminjaman.getTxtBukuId().setText("");
        formPeminjaman.getTxtPinjam().setText("");
        formPeminjaman.getTxtKembali().setText("");
    }
    
    public void getPeminjamanId(){
        Long id = Long.parseLong(formPeminjaman.getTxtPinjamId().getText());
        Peminjaman pinjam = peminjamanService.getPeminjaman(id);
        if (pinjam != null) {
            formPeminjaman.getTxtAnggotaId()
                    .setText(pinjam.getIdAnggota().toString());
            formPeminjaman.getTxtBukuId()
                    .setText(pinjam.getIdBuku().toString());
            formPeminjaman.getTxtPinjam()
                    .setText(pinjam.getTglPinjam().toString());
            formPeminjaman.getTxtKembali()
                    .setText(pinjam.getTglKembali().toString());
        }else {
            JOptionPane.showMessageDialog(formPeminjaman, "Data tidak ada");
        }
        
    }
    
    public void savePeminjaman(){
        Peminjaman pinjam = new Peminjaman();
        pinjam.setIdAnggota(Long.parseLong(formPeminjaman
                .getTxtAnggotaId().getText()));
        pinjam.setIdBuku(Long.parseLong(formPeminjaman
                .getTxtBukuId().getText()));
        pinjam.setTglPinjam(formPeminjaman.getTxtPinjam().getText());
        pinjam.setTglKembali(formPeminjaman.getTxtKembali().getText());
        pinjam = peminjamanService.savePinjam(pinjam);
        if (pinjam != null) {
            formPeminjaman.getTxtPinjamId().setText(pinjam.getId().toString());
            JOptionPane.showMessageDialog(formPeminjaman, "Entry Data Berhasil");
        } else {
            JOptionPane.showMessageDialog(formPeminjaman, "Entry Data Gagal");
        }
    }
    
    public void updatePeminjaman(){
        Peminjaman pinjam = new Peminjaman();
        pinjam.setId(Long.parseLong(formPeminjaman.getTxtPinjamId().getText()));
        pinjam.setIdAnggota(Long.parseLong(formPeminjaman
                .getTxtAnggotaId().getText()));
        pinjam.setIdBuku(Long.parseLong(formPeminjaman
                .getTxtBukuId().getText()));
        pinjam.setTglPinjam(formPeminjaman.getTxtPinjam().getText());
        pinjam.setTglKembali(formPeminjaman.getTxtKembali().getText());
        pinjam = peminjamanService.savePinjam(pinjam);
        if (pinjam != null) {
            formPeminjaman.getTxtPinjamId().setText(pinjam.getId().toString());
            JOptionPane.showMessageDialog(formPeminjaman, "Update Data Berhasil");
        } else {
            JOptionPane.showMessageDialog(formPeminjaman, "Update Data Gagal");
        }
    }
    
    public void deletePeminjaman(){
        Long id = Long.parseLong(formPeminjaman.getTxtPinjamId().getText());
        peminjamanService.deletePinjamById(id);
        JOptionPane.showMessageDialog(formPeminjaman, "Delete Data Berhasil");
    }
    
    public void viewTabel(){
        DefaultTableModel tableModel = (DefaultTableModel)formPeminjaman
                .getTabelPinjam().getModel();
        tableModel.setRowCount(0);
        List<Peminjaman> pinjamList = peminjamanService.getAllPinjam();
        for (Peminjaman pinjam : pinjamList){
            Object[] row = {
                pinjam.getId(),
                pinjam.getIdAnggota(),
                pinjam.getIdBuku(),
                pinjam.getTglPinjam(),
                pinjam.getTglKembali()
            };
            tableModel.addRow(row);
        }
    }
}
