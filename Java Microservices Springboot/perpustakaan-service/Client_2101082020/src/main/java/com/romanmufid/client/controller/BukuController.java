package com.romanmufid.client.controller;


import com.romanmufid.client.FormBuku;
import com.romanmufid.client.model.Buku;
import com.romanmufid.client.service.BukuService;
import java.util.List;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Acer
 */
public class BukuController {
    private final BukuService bukuService;
    private final FormBuku formBuku;
    
    public BukuController(FormBuku formBuku){
        this.formBuku = formBuku;
        bukuService = new BukuService();
    }
    
    public void clearForm(){
        formBuku.getTxtBukuId().setText("");
        formBuku.getTxtKodeBuku().setText("");
        formBuku.getTxtJudul().setText("");
        formBuku.getTxtPenerbit().setText("");
        formBuku.getTxtTahun().setText("");
    }
    
    public void getBukuId(){
        Long id = Long.parseLong(formBuku.getTxtBukuId().getText());
        Buku buku = bukuService.getBuku(id);
        if (buku != null) {
            formBuku.getTxtKodeBuku().setText(buku.getKodeBuku());
            formBuku.getTxtJudul().setText(buku.getJudul());
            formBuku.getTxtPenerbit().setText(buku.getPenerbit());
            formBuku.getTxtTahun().setText(buku.getTahunTerbit());    
        } else {
            JOptionPane.showMessageDialog(formBuku, "Data tidak ada");
        }
    }
    
    public void saveAnggota(){
        Buku buku = new Buku();
        buku.setKodeBuku(formBuku.getTxtKodeBuku().getText());
        buku.setJudul(formBuku.getTxtJudul().getText());
        buku.setPenerbit(formBuku.getTxtPenerbit().getText());
        buku.setTahunTerbit(formBuku.getTxtTahun().getText());
        buku = bukuService.saveBuku(buku);
        if (buku != null) {
            formBuku.getTxtBukuId().setText(buku.getId().toString());
            JOptionPane.showMessageDialog(formBuku, "Entry Data Berhasil");
        } else {
            JOptionPane.showMessageDialog(formBuku, "Entry Data Gagal");
        }
    }
    
    public void updateAnggota(){
        Buku buku = new Buku();
        buku.setId(Long.parseLong(formBuku.getTxtBukuId().getText()));
        buku.setKodeBuku(formBuku.getTxtKodeBuku().getText());
        buku.setJudul(formBuku.getTxtJudul().getText());
        buku.setPenerbit(formBuku.getTxtPenerbit().getText());
        buku.setTahunTerbit(formBuku.getTxtTahun().getText());
        buku = bukuService.updateBuku(buku);
        if (buku != null) {
            formBuku.getTxtBukuId().setText(buku.getId().toString());
            JOptionPane.showMessageDialog(formBuku, "Update Data Berhasil");
        } else {
            JOptionPane.showMessageDialog(formBuku, "Update Data Gagal");
        }
    }
    
    public void deleteAnggota(){
        Long id = Long.parseLong(formBuku.getTxtBukuId().getText());
        bukuService.deleteBukuById(id);
        JOptionPane.showMessageDialog(formBuku, "Delete Data Berhasil");
    }
    
    public void viewTabel(){
        DefaultTableModel tableModel = (DefaultTableModel)formBuku
                .getTabelBuku()
                .getModel();
        tableModel.setRowCount(0);
        List<Buku> bukuList = bukuService.getAllBuku();
        for (Buku buku : bukuList){
            Object[] row = {
                buku.getId(),
                buku.getKodeBuku(),
                buku.getJudul(),
                buku.getPenerbit(),
                buku.getTahunTerbit()
            };
            tableModel.addRow(row);
        }
    }
}
