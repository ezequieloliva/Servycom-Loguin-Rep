Imports MySql.Data.MySqlClient
Imports System.Data.OleDb
Public Class NuevoLegajo
    Dim CONECTOR As New MySqlConnection("server=127.0.0.1; database=rrhh; user id=root; password=;  Allow Zero DateTime=True;")
    Dim COMANDO As New MySqlCommand
    Dim ADAPTADOR As MySqlDataAdapter
    Dim TABLA As New DataTable
    Dim ds As DataSet
    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        guardarDatos()
        Me.Close()
    End Sub
    Sub guardarDatos()
        '' insertar nuevo legajo en tabla empledos
        ''La que me queda es ingresar fecha a un registro VARCHAR
        ''Agregar 3 combobox para mes y año y dia
        ''concatenar los 3 vaores y guardarlos para el cumple años
        Dim hoy As String
        hoy = txtHoy.Value.Date
        CONECTOR.Open()
        Dim comando As New MySqlCommand("insert into empledos values( " & txtDniNuevo.Text & ",'" & txtNombreNuevo.Text & "','" & dia.Text & "','" & txtmes.text & "','" & año.Text & "','" & txtDomicilioNuevo.Text & "','" & txtTelNuevo.Text & "','" & txtEmailNuevo.Text & "','" & txtCivilNuevo.Text & "','" & txtHijosNuevo.Text & "','" & txtIngresoNuevo.Text & "','" & txtCutNuevo.Text & "','" & txtCuentaNueva.Text & "','" & txtCbuNuevo.Text & "','" & txtSeguroNuevo.Text & "','" & txtCarnetNuevo.Text & "','" & txtAptoNuevo.Text & "','" & txtPuestoNuevo.Text & "','" & txtEstadoLegaoNuevo.Text & "')", CONECTOR)
        comando.ExecuteNonQuery()
        CONECTOR.Close()
        ''actualizar grilla
        Dim sql As String = "select * from empledos"
        ADAPTADOR = New MySqlDataAdapter(sql, CONECTOR)
        comando.CommandType = CommandType.TableDirect
        comando.CommandText = "empledos"
        ADAPTADOR.Fill(TABLA)
        rrhh.grillaEmpleados.DataSource = TABLA
        ''pintar los dados de baja
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
    End Sub

    Private Sub NuevoLegajo_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        For x = 1 To 31
            dia.Items.Add(x)
        Next
        For y = 1 To 12
            txtmes.Items.Add(y)
        Next
        For z = 1900 To 2100
            año.Items.Add(z)
        Next
    End Sub
End Class