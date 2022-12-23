/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package com.app.web.servicio;

import com.app.web.entidad.empleado;
import java.sql.SQLException;
import java.util.List;

/**
 *
 * @author calle
 */
public interface EmpleadoServicio {

    public List listartodoslosempleados();

    public Object CrearEmpleado(empleado InformacionEmpleado) throws SQLException;

    public Object ActualizarEmpleado(empleado InformacionEmpleado) throws SQLException;

    public Object eliminarEmpleado(empleado InformacionEmpleado) throws SQLException;

}
