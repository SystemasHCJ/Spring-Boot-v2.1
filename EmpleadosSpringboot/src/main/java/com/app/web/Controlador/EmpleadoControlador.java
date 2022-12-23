/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.app.web.Controlador;

import com.app.web.entidad.empleado;
import com.app.web.servicio.EmpleadoServicio;
import java.sql.SQLException;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

/**
 *
 * @author calle
 */
@RestController
@CrossOrigin(origins = "*")
public class EmpleadoControlador {

    @Autowired
    private EmpleadoServicio servicio;

    //Empieza el select
    @RequestMapping(value = "/api/empleados", method = RequestMethod.GET)
    private List ListarEmpleados() {
        return servicio.listartodoslosempleados();
    }

    //Termina el select+
    //
    //Empieza el insert
    @PostMapping(
            value = "/api/user/CrearEmpleado",
            consumes = MediaType.APPLICATION_JSON_VALUE,
            produces = MediaType.APPLICATION_JSON_VALUE
    )
    @ResponseBody
    private Object CrearEmpleado(@RequestBody empleado InformacionEmpleado) throws SQLException {
        return servicio.CrearEmpleado(InformacionEmpleado);
    }
    //Termina el insert

    //Empieza el actualizar
    @PostMapping(
            value = "/api/user/actualizar",
            consumes = MediaType.APPLICATION_JSON_VALUE,
            produces = MediaType.APPLICATION_JSON_VALUE
    )
    @ResponseBody
    private Object ActualizarEmpleado(@RequestBody empleado InformacionEmpleado) throws SQLException {
        return servicio.ActualizarEmpleado(InformacionEmpleado);
    }
    //Termina el actualizar

    //empieza eliminar 
    @PostMapping(
            value = "/api/user/Eliminar",
            produces = MediaType.APPLICATION_JSON_VALUE
    )
    @ResponseBody
    private Object eliminarEmpleado(@RequestBody empleado InformacionEmpleado) throws SQLException {
        return servicio.eliminarEmpleado(InformacionEmpleado);
    }
    //Termina Eliminar

}
