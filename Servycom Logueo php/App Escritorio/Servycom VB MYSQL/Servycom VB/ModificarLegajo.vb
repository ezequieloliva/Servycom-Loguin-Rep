Imports MySql.Data.MySqlClient
Imports System.Data.OleDb
Public Class ModificarLegajo
    Dim CONECTOR As New MySqlConnection("server=127.0.0.1; database=rrhh; user id=root; password=; Allow Zero DateTime=True;")
    Dim COMAND As MySqlCommand
    Dim COMANDO As MySqlCommand
    Dim ADAPTADOR As MySqlDataAdapter
    Dim TABLA As New DataTable
    Dim ds As DataSet
    Private Sub btnGuardarCambios_Click(sender As Object, e As EventArgs) Handles btnGuardarCambios.Click
        ''actualizar datos de un empleado en tabla empledos
        ''rrhh.grillaEmpleados.Rows.Clear()
        CONECTOR.Open()
        Dim hoy As String
        hoy = txtFechaHoy.Value.Date
        Dim comando As New MySqlCommand("update empledos set dni=" & txtDniMod.Text & ",nombre='" & txtNombreMod.Text & "',dia='" & diaMod.Text & "',mes='" & mesMod.Text & "',ano='" & añoMod.Text & "',domicilio='" & txtDomicilioMod.Text & "',telefono='" & txtTelMod.Text & "',email='" & txtEmailMod.Text & "',civil='" & txtCivilMod.Text & "',hijos='" & txtHijosMod.Text & "',ingreso='" & txtIngresoMod.Text & "',cuit='" & txtCutMod.Text & "',cuenta='" & txtCuentaMod.Text & "',cbu='" & txtCbuMod.Text & "',seguro='" & txtSeguroMod.Text & "',carnet='" & txtCarnetMod.Text & "',apto='" & txtAptoMod.Text & "',puesto='" & txtPuestoMod.Text & "',estado='" & txtEstadoLegaoMod.Text & "' where nombre='" & txtNombreMod.Text & "'", CONECTOR)
        comando.ExecuteNonQuery()
        CONECTOR.Close()
        ''actualizar grilla
        Dim sql As String = "Select * from empledos"
        ADAPTADOR = New MySqlDataAdapter(sql, CONECTOR)
        comando.CommandType = CommandType.TableDirect
        comando.CommandText = "empledos"
        ADAPTADOR.Fill(TABLA)
        rrhh.grillaEmpleados.DataSource = TABLA
        For Each Row As DataGridViewRow In rrhh.grillaEmpleados.Rows
            ''pintar de rojo los empleados dados de baja
            If Row.Cells("estado").Value = "Baja" Then
                Row.DefaultCellStyle.BackColor = Color.Red
            Else
                If Row.Cells("apto").Value <= hoy Or Row.Cells("carnet").Value <= hoy Then
                    Row.DefaultCellStyle.BackColor = Color.Yellow
                Else
                    Row.DefaultCellStyle.BackColor = Color.Green
                End If
            End If

        Next
        ''cargar cumples del mes
        Dim mes As Integer
        rrhh.cumples.Items.Clear()
        mes = rrhh.dateHoy.Value.Month
        Dim dr3 As MySqlDataReader
        comando = New MySqlCommand("select * from empledos where mes= " & mes, CONECTOR)
        CONECTOR.Open()
        dr3 = comando.ExecuteReader()
        If dr3.HasRows Then
            While dr3.Read

                rrhh.lblCumple.Visible = True
                rrhh.torta.Visible = True
                rrhh.cumples.Items.Add(dr3("nombre"))
            End While
        End If
        CONECTOR.Close()
        rrhh.llenar_combo_empleados_premios(rrhh.comboFiltroEmpleados)
        rrhh.llenar_combo_empleados_premios(rrhh.comboEmpleadoLlamado)
        rrhh.llenar_combo_empleados_premios(rrhh.comboCapaEmpleado)
        rrhh.llenar_combo_empleados_premios(rrhh.comboEmpleadoNuevaCapa)
        rrhh.llenar_combo_empleados_premios(rrhh.comboEmplEntregasFiltro)
        rrhh.llenar_combo_empleados_premios(rrhh.comboEmpleadosEntregas)
        Me.Close()
    End Sub

    Private Sub ModificarLegajo_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        CONECTOR.Open()
        ''Llenar combo box de empleados a modificar
        Dim sql1 As String = "select * from empledos "
        ADAPTADOR = New MySqlDataAdapter(sql1, CONECTOR)
        ds = New DataSet
        ds.Tables.Add("empledos")
        ADAPTADOR.Fill(ds.Tables("empledos"))
        txtNombreMod.DataSource = ds.Tables("empledos")
        txtNombreMod.DisplayMember = "nombre"
        txtNombreMod.ValueMember = "dni"
        CONECTOR.Close()
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        '' mostrar las cajas de textos con datos del empleado elegido
        Dim CONECTOR1 As New MySqlConnection("server=127.0.0.1; database=rrhh; user id=root; password=; Allow Zero DateTime=True;")

        Dim dr As MySqlDataReader
        COMAND = New MySqlCommand("select * from empledos where dni=" & txtNombreMod.SelectedValue, CONECTOR1)
        CONECTOR1.Open()
        dr = COMAND.ExecuteReader()
        If dr.HasRows Then
            While dr.Read
                '' INGRESAR EN LAS CAJS DE TEXTO
                txtDniMod.Text = dr("dni")
                diaMod.Text = dr("dia")
                mesMod.Text = (dr("mes"))
                añoMod.Text = dr("ano")
                txtDomicilioMod.Text = dr("domicilio")
                txtTelMod.Text = dr("telefono")
                txtEmailMod.Text = dr("email")
                txtCivilMod.Text = dr("civil")
                txtHijosMod.Text = dr("hijos")
                txtIngresoMod.Text = dr("ingreso")
                txtCutMod.Text = dr("cuit")
                txtCuentaMod.Text = dr("cuenta")
                txtCbuMod.Text = dr("cbu")
                txtSeguroMod.Text = dr("seguro")
                txtCarnetMod.Text = dr("carnet")
                txtAptoMod.Text = dr("apto")
                txtPuestoMod.Text = dr("puesto")
                txtEstadoLegaoMod.Text = dr("estado")
            End While
        End If
        CONECTOR1.Close()
    End Sub
End Class