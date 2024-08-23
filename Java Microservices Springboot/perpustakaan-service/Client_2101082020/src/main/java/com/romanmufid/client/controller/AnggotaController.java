package com.romanmufid.client.controller;

import com.romanmufid.client.FormAnggota;
import com.romanmufid.client.model.Anggota;
import com.romanmufid.client.service.AnggotaService;
import java.util.List;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Acer
 */
public class AnggotaController {
    private final AnggotaService anggotaService;
    private final FormAnggota formAnggota;
    
    public AnggotaController(FormAnggota formAnggota){
        this.formAnggota = formAnggota;
        anggotaService = new AnggotaService();
    }
    
    public void clearForm(){
        formAnggota.getTxtId().setText("");
        formAnggota.getTxtNama().setText("");
        formAnggota.getTxtAlamat().setText("");
    }
    
    public void getAnggotaId(){
        Long id = Long.parseLong(formAnggota.getTxtId().getText());
        Anggota anggota = anggotaService.getAnggota(id);
        if (anggota != null) {
            formAnggota.getTxtNama().setText(anggota.getNama());
            formAnggota.getTxtAlamat().setText(anggota.getAlamat());
        } else {
            JOptionPane.showMessageDialog(formAnggota, "Data tidak ada");
        }
    }
    
    public void saveAnggota(){
        Anggota anggota = new Anggota();
        anggota.setNama(formAnggota.getTxtNama().getText());
        anggota.setAlamat(formAnggota.getTxtAlamat().getText());
        anggota = anggotaService.saveAnggota(anggota);
        if (anggota !=null) {
            formAnggota.getTxtId().setText(anggota.getId().toString());
            JOptionPane.showMessageDialog(formAnggota, "Entry Data Berhasil");
        } else {
            JOptionPane.showMessageDialog(formAnggota, "Entry Data Gagal");
        }
    }
    
    public void updateAnggota(){
        Anggota anggota = new Anggota();
        anggota.setId(Long.parseLong(formAnggota.getTxtId().getText()));
        anggota.setNama(formAnggota.getTxtNama().getText());
        anggota.setAlamat(formAnggota.getTxtAlamat().getText());
        anggota = anggotaService.updateAnggota(anggota);
        if (anggota != null) {
            formAnggota.getTxtId().setText(anggota.getId().toString());
            JOptionPane.showMessageDialog(formAnggota, "Update Data berhasil");
        } else {
            JOptionPane.showMessageDialog(formAnggota, "Update Data Gagal");
        }
    }
    
    public void deleteAnggota(){
        Long id = Long.parseLong(formAnggota.getTxtId().getText());
        anggotaService.deleteAnggota(id);
        JOptionPane.showMessageDialog(formAnggota, "Delete Data Berhasil");
    }
    
    public void viewTabel(){
        DefaultTableModel tableModel = (DefaultTableModel)formAnggota.getTabelAnggota().getModel();
        tableModel.setRowCount(0);
        List<Anggota> anggotaList = anggotaService.getAllAnggota();
        for (Anggota anggota : anggotaList){
            Object[] row = {
                anggota.getId(),
                anggota.getNama(),
                anggota.getAlamat(),
            };
            tableModel.addRow(row);
        }
    }
}