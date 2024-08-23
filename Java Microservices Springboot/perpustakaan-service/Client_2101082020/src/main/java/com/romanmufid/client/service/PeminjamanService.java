package com.romanmufid.client.service;

import com.google.gson.Gson;
import com.romanmufid.client.model.Peminjaman;
import java.util.List;
import kong.unirest.GenericType;
import kong.unirest.HttpResponse;
import kong.unirest.JsonNode;
import kong.unirest.Unirest;

/**
 *
 * @author Acer
 */
public class PeminjamanService {
    private final String URL ="http://localhost:9000";
    
    public Peminjaman getPeminjaman(Long id){
        Peminjaman pinjam = Unirest.get(URL+"/peminjaman/"+id)
                .asObject(Peminjaman.class).getBody();
        if (pinjam != null) {
            return pinjam;
        }
        return null;
    }
    
    public Peminjaman savePinjam(Peminjaman pinjam){
        HttpResponse<JsonNode> response = Unirest.post(URL+"/peminjaman/")
                .header("content-type", "application/json")
                .body(pinjam)
                .asJson();
        Gson gson = new Gson();
        Peminjaman p = gson
                .fromJson(response.getBody().toString(), Peminjaman.class);
        return p;
    }
    
    public List<Peminjaman> getAllPinjam(){
        List<Peminjaman> pinjamList = Unirest.get(URL+"/peminjaman/")
                .asObject(new GenericType<List<Peminjaman>>(){}).getBody();
        return pinjamList;
    }
    
    public Peminjaman updatePinjam(Peminjaman pinjam){
        HttpResponse<JsonNode> response = Unirest.put(URL+"/peminjaman/")
                .header("content-type", "application/json")
                .body(pinjam)
                .asJson();
        Gson gson = new Gson();
        Peminjaman p = gson
                .fromJson(response.getBody().toString(), Peminjaman.class);
        return p;
    }
    
    public void deletePinjamById(Long id){
        Unirest.delete(URL+"/peminjaman/{id}").asEmpty();
    }
}
