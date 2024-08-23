package com.romanmufid.client.service;

import com.google.gson.Gson;
import com.romanmufid.client.model.Buku;
import java.util.List;
import kong.unirest.GenericType;
import kong.unirest.HttpResponse;
import kong.unirest.JsonNode;
import kong.unirest.Unirest;

/**
 *
 * @author Acer
 */
public class BukuService {
    private final String URL = "http://localhost:8090";
    
    public Buku getBuku(Long id){
        Buku buku = Unirest.get(URL+"/buku/"+id)
                .asObject(Buku.class).getBody();
        if (buku != null) {
            return buku;
        }
        return null;
    }
    
    public Buku saveBuku(Buku buku){
        HttpResponse<JsonNode> response = Unirest.post(URL+"/buku/")
                .header("content-type", "application/json")
                .body(buku)
                .asJson();
        Gson gson = new Gson();
        Buku b = gson.fromJson(response.getBody().toString(), Buku.class);
        return b;
    }
   
    public List<Buku> getAllBuku(){
        List<Buku> bukuList = Unirest.get(URL+"/buku/")
                .asObject(new GenericType<List<Buku>>(){}).getBody();
        return bukuList;
    }
    
    public Buku updateBuku(Buku buku){
        HttpResponse<JsonNode> response = Unirest.put(URL+"/anggota/")
                .header("content-type", "application/json")
                .body(buku)
                .asJson();
        Gson gson = new Gson();
        Buku b = gson.fromJson(response.getBody().toString(), Buku.class);
        return b;
    }
    
    public void deleteBukuById(Long id){
        Unirest.delete(URL+"/anggota/{id}").asEmpty();
    }
}
