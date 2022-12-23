package com.app.web;

import com.app.web.entidad.empleado;
import com.app.web.repositorio.EmpleadoRepositorio;
import java.awt.print.Book;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;

@SpringBootApplication
public class CrudSpringBootApplication implements CommandLineRunner {
    
    @Autowired
JdbcTemplate jdbcTemplate;

    public static void main(String[] args) {
        SpringApplication.run(CrudSpringBootApplication.class, args);
    }

    @Autowired
    private EmpleadoRepositorio repositorio;

    @Override
    public void run(String... args) throws Exception {

        
        
       /* empleado empleado1 = new empleado(
                "HUMBERTO", 
                "CALLEJA", 
                "JUAREZsadnbs",
                "0002"            
        );
        repositorio.save(empleado1);*/
    }
}
