package com.romanmufid.client.service;

import com.google.gson.Gson;
import com.romanmufid.client.model.Anggota;
import java.util.List;
import kong.unirest.GenericType;
import kong.unirest.HttpResponse;
import kong.unirest.JsonNode;

import kong.unirest.Unirest;

/**
 *
 * @author Acer
 */
public class AnggotaService {
    private final String URL = "http://localhost:8080";
    
    public Anggota getAnggota(Long id){
        Anggota anggota = Unirest.get(URL+"/anggota/"+id).asObject(Anggota.class).getBody();
        if (anggota !=null) {
            return anggota;
        }
        return null;
    }
    
    public Anggota saveAnggota(Anggota anggota){
        HttpResponse<JsonNode> response = Unirest.post(URL+"/anggota/").header("content-type", "application/json").body(anggota).asJson();
        Gson gson = new Gson();
        Anggota a = gson.fromJson(response.getBody().toString(), Anggota.class);
        return a;
    }

    public List<Anggota> getAllAnggota() {
        List<Anggota> anggotaList = Unirest.get(URL+"/anggota/").asObject(new GenericType<List<Anggota>>(){}).getBody();
        return anggotaList;
    }
    
    public Anggota updateAnggota(Anggota anggota){
        HttpResponse<JsonNode> response = Unirest.put(URL+"/anggota/")
                .header("content-type", "application/json")
                .body(anggota)
                .asJson();
        Gson gson = new Gson();
        Anggota a = gson.fromJson(response.getBody().toString(), Anggota.class);
        return a;
    }
    
    public void deleteAnggota(Long id){
        Unirest.delete(URL+"/anggota/"+id).asEmpty();
    }
}
