/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.app.web.entidad;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

/**
 *
 * @author calle
 */
@Entity
//@Table(name = "cat_empleados")
public class empleado {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long pk_iud_empleado;

    @Column(name = "nom_empleado", nullable = false, length = 35)
    private String nom_empleado;

    @Column(name = "apellido_paterno_empleado", nullable = false, length = 35)
    private String apellido_paterno_empleado;

    @Column(name = "apellido_materno_empleado", nullable = false, length = 35)
    private String apellido_materno_empleado;

    @Column(name = "num_nomina_empleado", nullable = true, length = 35)
    private String num_nomina_empleado;

    /**/
    public empleado() {
    }

    public empleado(String nom_empleado, String apellido_paterno_empleado, String apellido_materno_empleado, String num_nomina_empleado) {
        this.nom_empleado = nom_empleado;
        this.apellido_paterno_empleado = apellido_paterno_empleado;
        this.apellido_materno_empleado = apellido_materno_empleado;
        this.num_nomina_empleado = num_nomina_empleado;
    }

    public String getNum_nomina_empleado() {
        return num_nomina_empleado;
    }

    public void setNum_nomina_empleado(String num_nomina_empleado) {
        this.num_nomina_empleado = num_nomina_empleado;
    }

    public Long getPk_iud_empleado() {
        return pk_iud_empleado;
    }

    public void setPk_iud_empleado(Long pk_iud_empleado) {
        this.pk_iud_empleado = pk_iud_empleado;
    }

    public String getNom_empleado() {
        return nom_empleado;
    }

    public void setNom_empleado(String nom_empleado) {
        this.nom_empleado = nom_empleado;
    }

    public String getApellido_paterno_empleado() {
        return apellido_paterno_empleado;
    }

    public void setApellido_paterno_empleado(String apellido_paterno_empleado) {
        this.apellido_paterno_empleado = apellido_paterno_empleado;
    }

    public String getApellido_materno_empleado() {
        return apellido_materno_empleado;
    }

    public void setApellido_materno_empleado(String apellido_materno_empleado) {
        this.apellido_materno_empleado = apellido_materno_empleado;
    }

}
