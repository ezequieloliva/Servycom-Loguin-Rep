Imports System.Data.OleDb
Public Class login
    Dim CONECTOR As New OleDbConnection(My.Settings.CADENA)
    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Dim dr As OleDb.OleDbDataReader
        Dim COMANDO As New OleDbCommand
        COMANDO.CommandType = CommandType.Text
        COMANDO.Connection = CONECTOR
        COMANDO.CommandText = "select * from usuarios where user= '" & txtUusario.Text & "'"
        CONECTOR.Open()
        dr = COMANDO.ExecuteReader()
        If dr.HasRows Then
            While dr.Read
                If dr("user") = txtUusario.Text Then
                    If dr("pass") = txtClave.Text Then
                        ''entrar a la app
                        rrhh.Show()

                    Else
                        '' no entrar y quedarse aqui
                        MsgBox("Clave incorrecta")
                    End If
                    '' Else
                    '' no entrar y quedarse aqui
                    'MsgBox("Nombre de usuario incorrecto")
                End If

            End While
        End If
        CONECTOR.Close()
    End Sub
    Private Sub checkClave_CheckedChanged_1(sender As Object, e As EventArgs) Handles checkClave.CheckedChanged
        If checkClave.Checked Then
            txtClave.UseSystemPasswordChar = False
        Else
            txtClave.UseSystemPasswordChar = True
        End If
    End Sub
End Class