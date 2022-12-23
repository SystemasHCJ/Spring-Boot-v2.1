/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.app.web.servicio;

import com.app.web.entidad.empleado;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Collections;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.PreparedStatementCreator;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Service;


/**
 *
 * @author calle
 */
@Service
public class EmpleadoServicioImpl implements EmpleadoServicio {

    @Autowired
    private JdbcTemplate jdbcTemplate;

    @Override
    public List listartodoslosempleados() {
        String query = "CALL `SP_OBTENER_EMPLEADOS`();";
        List<empleado> users = this.jdbcTemplate.query(query, new EmpleadoServicioImpl.UserRowMapper());
        return users;
    }

    public Object CrearEmpleado(empleado InformacionEmpleado) throws SQLException {
        String query = "CALL `sp_crear_empleado` (?, ?, ?, ?)";
        PreparedStatementCreator statementCreator = (Connection connection) -> {
            PreparedStatement preparedStatement = connection.prepareStatement(query, Statement.RETURN_GENERATED_KEYS);
            preparedStatement.setString(1, InformacionEmpleado.getNom_empleado());
            preparedStatement.setString(2, InformacionEmpleado.getApellido_paterno_empleado());
            preparedStatement.setString(3, InformacionEmpleado.getApellido_materno_empleado());
            preparedStatement.setString(4, InformacionEmpleado.getNum_nomina_empleado());
            return preparedStatement;
        };
        int respuesta = this.jdbcTemplate.update(statementCreator);
        return Collections.singletonMap("result", respuesta == 1);

    }

    @Override
    public Object ActualizarEmpleado(empleado InformacionEmpleado) throws SQLException {
        String query = "CALL `sp_actualizar_empleado`(?, ?, ?, ?, ?);";
        PreparedStatementCreator statementCreator = (Connection connection) -> {
            PreparedStatement preparedStatement = connection.prepareStatement(query, Statement.RETURN_GENERATED_KEYS);
            preparedStatement.setLong(1, InformacionEmpleado.getPk_iud_empleado());
            preparedStatement.setString(2, InformacionEmpleado.getNom_empleado());
            preparedStatement.setString(3, InformacionEmpleado.getApellido_paterno_empleado());
            preparedStatement.setString(4, InformacionEmpleado.getApellido_materno_empleado());
            preparedStatement.setString(5, InformacionEmpleado.getNum_nomina_empleado());
            return preparedStatement;
        };
        int respuesta = this.jdbcTemplate.update(statementCreator);
        return Collections.singletonMap("result", respuesta == 1);
    }

    @Override
    public Object eliminarEmpleado(empleado InformacionEmpleado) throws SQLException {
        String query = "CALL `sp_eliminar_empleado`(?); ";
        PreparedStatementCreator statementCreator = (Connection connection) -> {
            PreparedStatement preparedStatement = connection.prepareStatement(query);
            preparedStatement.setLong(1, InformacionEmpleado.getPk_iud_empleado());
            return preparedStatement;
        };
        int respuesta = this.jdbcTemplate.update(statementCreator);
        return Collections.singletonMap("result", respuesta == 1);

    }

    public class UserRowMapper implements RowMapper<empleado> {

        @Override
        public empleado mapRow(ResultSet resultSet, int rowNumber) throws SQLException {
            empleado empleado = new empleado();
            empleado.setPk_iud_empleado(resultSet.getLong("pk_iud_empleado"));
            empleado.setNom_empleado(resultSet.getString("nom_empleado"));
            empleado.setApellido_materno_empleado(resultSet.getString("apellido_materno_empleado"));
            empleado.setApellido_paterno_empleado(resultSet.getString("apellido_paterno_empleado"));
            empleado.setNum_nomina_empleado(resultSet.getString("num_nomina_empleado"));
            return empleado;
        }
    }

}
